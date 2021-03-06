<?php

namespace App\Http\Controllers;

use App\Area;
use App\Worker;
use Illuminate\Http\Request;

use App\Http\Requests;

class WorkerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showall(){
         $workers = Worker::where('state',1);
        return view('worker.showall')->with('workers',$workers->get());
    }
    
    public function create()
    {
        $areas = Area::lists('name','id')->toArray();
        return view('worker.create')->with('areas',$areas);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'date_in' => 'required',
            'position' => 'required',
            'email' => 'required',
            'area_id' => 'required'
        ]);

        $worker = new Worker();
        $worker->name = $request['name'];
        //$worker->cellphone = $request['cellphone'];
        //$worker->date_from = date("Y-m-d", strtotime($request['date_from']));
        //$worker->date_to = date("Y-m-d", strtotime($request['date_from']));
        $worker->position = $request['position'];
        $worker->email = $request['email'];
        $worker->state = '1';
        $worker->area_id = $request['area_id'];
        $worker->save();

        return redirect('/home');
    }

    public function upload(Request $request) {
        if($request->file('file')) {
            //upload an image to the /img/tmp directory and return the filepath.
            $file = $request->file('file');
            $tmpFilePath = '/img/tmp/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            return response()->json(array('path'=> $path), 200);
        } else {
            return response()->json(false, 200);
        }
    }

    public function show($id){
        try {
            $decrypted_id = \Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect('/home');
        }
        $worker = Worker::find($decrypted_id);
        return view('worker.show')->with('worker',$worker);
    }

    public function edit($id){
        try {
            $decrypted_id = \Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect('/home');
        }
        $worker = Worker::find($decrypted_id);
        $areas = Area::lists('name','id')->toArray();
        return view('worker.edit')->with('worker',$worker)->with('areas',$areas);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cellphone' => 'required',
            'date_in' => 'required',
            'position' => 'required',
            'email' => 'required',
            'area_id' => 'required'
        ]);

        $worker = Worker::find($request['id_worker']);
        $worker-> name = $request['name'];
        $worker-> cellphone = $request['cellphone'];
        $worker-> date_from = date("Y-m-d", strtotime($request['date_in']));
        $worker-> date_to = 0;
        $worker-> position = $request['position'];
        $worker-> email = $request['email'];
        $worker-> area_id = $request['area_id'];
        $worker->save();

        return redirect('/home');
    }

    public function remove (Request $request){
        $this->validate($request, [
            'id_worker' => 'required',
            'fecha_retiro' => 'required',
            'motivo_retiro' => 'required',
        ]);
        $worker = Worker::find($request['id_worker']);
        $worker->state = '0';
        $worker->date_out = date("Y-m-d", strtotime($request['fecha_retiro']));
        $worker->reason_retirement = $request['motivo_retiro'];
        $worker->save();
        return redirect('/home');
    }

    public function retirados(){
        $workers = Worker::where('state',0);
        return view('worker.retirados')->with('workers',$workers->get());
    }


   
}
