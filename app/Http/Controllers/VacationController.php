<?php

namespace App\Http\Controllers;

use Mail;
use App\Vacation;
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
        //sendmail
        $data = request()->all();
        Mail::send("correo.solicitud", $data, function($message) use ($data){
            $message->to('dpazolopez@gmail.com','David')
            ->subject("Solicitud de vacación");
        });

        $vacation = new Vacation();
        $vacation-> worker_id = $request['worker_id'];
        $vacation-> type = $request['type'];
        $vacation-> observations = $request['observations'];
        //parse dates
        $date  = explode('-',$request['datefilter']);
        $dateFrom = date("y-m-d",strtotime( $date[0]));
        $dateTo = date("y-m-d",strtotime($date[1]));
        
        $vacation -> date_from = $dateFrom;
        $vacation -> date_to = date("y-m-d", strtotime( $dateTo ));
        
        $vacation->save();

        return redirect('/home');
    }

    public function update(Request $request)
    {
         $this->validate($request, [
            'aceptado' => 'required',
        ]);
         //TODO comprobar funcionamiento
        $vacation = new Vacation();
        $vacation-> aceptado = $request['aceptado'];

        $vacation->save();

        Mail::send("correo.solicitud", $data, function($message) use ($data){
            $message->to('email','user')
            ->subject("Respuesta a su solicitud");
        });

        return redirect('/home');

    }

    public function solicitudes()
    {
        $vacations =  \DB::table('vacations')
            ->select('workers.name','vacations.type','vacations.date_from','vacations.date_to','vacations.observations','vacations.aceptado')
            ->join('workers','workers.id','=','vacations.worker_id')
            ->where(['vacations.aceptado' => '0'])
            ->get();

        return view('vacation.showvac', ['vacations' => $vacations]);              
    }
}