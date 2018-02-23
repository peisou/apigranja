<?php

namespace App\Http\Controllers;

use Mail;
use App\Vacation;
use App\Worker;
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
        return view('vacation.create')
                ->with('id_worker',$decrypted_id)
                ->with('name_worker',$decrypted_name);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'observations' => 'required',
            'datefilter' => 'required',
        ]);

        $dep =\DB::table('workers')->select('workers.area_id')
            ->where(['workers.id' => $request->worker_id])
            ->get(); 
            
        $vacation = new Vacation();
        $vacation -> worker_id = $request['worker_id'];
        $vacation -> type = $request['type'];
        $vacation -> observations = $request['observations'];
        $vacation -> area_id = $dep[0]->area_id;
        //parse dates
        $date  = explode('-',$request['datefilter']);
        $dateFrom = date("y-m-d",strtotime( $date[0]));
        $dateTo = date("y-m-d",strtotime($date[1]));
        
        $vacation -> date_from = date("y-m-d", strtotime($dateFrom));
        $vacation -> date_to = date("y-m-d", strtotime( $dateTo ));

        $guardadas = \DB::table('vacations')
            ->where('date_from',  $dateFrom)
            ->where('date_to',  $dateTo)
            ->where('area_id',  $dep[0]->area_id )
            ->get();

        if(!$guardadas){
           $vacation->save();
       
            $data = request()->all();
           
            Mail::send("correo.solicitud", $data, function($message) use ($data){
            $message->to('david.pazo@globalretail.es','David')
             ->subject("Solicitud de vacación");
            });
           return back()->with('success','Vacaciones Solicitadas correctamente');
            
        }else{
            return back()->with('error','Fechas no disponibles');
        }

        return redirect('/home');
    }

    public function update(Request $request)
    {
        //aceptar las vacaciones
        $id = $request->get('vacation_id');
        $vacation = new Vacation();
        $vacation = Vacation::find($id);
        $vacation-> aceptado = '1';
        $vacation->save();

        //añadir eventos al calendario
        $evento = new CalendarioEvento();
        $evento -> fechaIni = $vacation['date_from'];
        $evento -> fechaFin = $vacation['date_to'];
        $evento -> todoeldia = true;
        $evento -> color = 'rgb(244, 67, 54)';
        $evento -> titulo = $vacation['type'];
        $vacation-> evento()->save($evento);

        
        
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
   
    public function delete(Request $request){
        
        //$vac = Vacation::find($request['vacation_id']);
        //$res=Vacation::where('id',$vac)->delete();
        Vacation::destroy($request['vacation_id']);
        
        return redirect()->back();
   }
    public function delSolicitudes()
    {
        $vacations =  \DB::table('vacations')
            ->select('workers.name','vacations.id' ,'vacations.type','vacations.date_from','vacations.date_to','vacations.observations','vacations.aceptado')
            ->join('workers','workers.id','=','vacations.worker_id')
            ->where(['vacations.aceptado' => '0'])
            ->get();

        return view('vacation.deletevac', ['vacations' => $vacations]);              
    }
}