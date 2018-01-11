<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('home');   
    }

    public function welcome(){
        //
        if (\Auth::check()) {
            return redirect('/home');
        }
        return redirect('/');
    }
    public function admin()
    {
        Session::put('tipoUsuario', 'admin');
        return view('/worker/create');
    }
}
