<?php

namespace App\Http\Controllers;

use Mail;
use App\Vacation;
use App\CalendarioEvento;
use App\Http\Requests;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Readers\dd;
use Illuminate\Support\Facades\Redirect;

class VacationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vacation.calendar');
    }

    public function create($id_worker,$name_worker)
    {
        try {
            $decrypted_id = \Crypt::decrypt($id_worker);
            $decrypted_name = \Crypt::decrypt($name_worker);
        } catch (DecryptException $e) {
            return redirect('/home');
        }
        return view('vacation.create')->with('id_worker',$decrypted_id)->with('name_worker',$decrypted_name);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'worker_id' => 'required',
            'type' => 'required',
            'observations' => 'required',
            'datefilter' => 'required',
        ]);
        
        $vacation = new Vacation();
        $vacation-> worker_id = $request['worker_id'];
        $vacation-> type = $request['type'];
        $vacation-> observations = $request['observations'];

        //parse dates
        $date  = explode('-',$request['datefilter']);
        $dateFrom = date("y-m-d",strtotime( $date[0]));
        $dateTo = date("y-m-d",strtotime($date[1]));
        
        $vacation -> date_from = date("y-m-d", strtotime($dateFrom));
        $vacation -> date_to = date("y-m-d", strtotime( $dateTo ));
        
        $vacation->save();

        //sendmail
        $data = request()->all();
        Mail::send("correo.solicitud", $data, function($message) use ($data){
            $message->to('david.pazo@globalretail.es','David')
            ->subject("Solicitud de vacación");
        });

        return redirect('/home');
    }

    public function update(Request $request)
    {
        
        $vacation=new Vacation();
        //$id = $request->get('id');
        $vacation = Vacation::find($request['id']);
        $vacation-> aceptado = '1';
        $vacation->save();
        
        $evento = new CalendarioEvento();
        $evento -> fechaIni = $vacation['date_from'];
        $evento -> fechaFin = $vacation['date_to'];
        $evento -> todoeldia = true;
        $evento -> color = 'rgb(244, 67, 54)';
        $evento -> titulo = $vacation['type'];
        $vacation-> evento()->save($evento);

        /**Mail::send("correo.solicitud", $data, function($message) use ($data){
            $message->to('email','user')
            ->subject("Respuesta a su solicitud");
        });*/

        return redirect('/vacation/request');

    }

    public function solicitudes()
    {
        $vacations =  \DB::table('vacations')
            ->select('workers.name','vacations.id' ,'vacations.type','vacations.date_from','vacations.date_to','vacations.observations','vacations.aceptado')
            ->join('workers','workers.id','=','vacations.worker_id')
            ->where(['vacations.aceptado' => '0'])
            ->get();

        return view('vacation.aprobarvac', ['vacations' => $vacations]);              
    }
    public function bloquearFechas()
    {
        
    }
}