<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Worker;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
use \Crypt;

class AuthController extends Controller
{
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirctTo ='/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   
    //login
    protected function getLogin()
    {

        return view("login");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {   
            if(\Auth::user()->tipoUsuario == '2')
            {
               //$usuarioactual=\Auth::user();
               return view('vacation.create')
               ->with("id_worker", \Auth::user()->id)
               ->with("name_worker",  \Auth::user()->name);

           }else{
                $usuarioactual=\Auth::user();
               return view('home')->with("usuario",  $usuarioactual);
           }
        }else{
            return back()->with('error','Credenciales incorrectas');
        }
    }

    //registro   
    protected function getRegister()
    {
        return view("register");
    }

    protected function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request;

        $user=new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);

        if($user->save())
        {
             return "se ha registrado correctamente el usuario";
        }
    }

    //registro
    protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }
protected function sendFailedLoginResponse(Request $request)
{
    if ($request->ajax()) {
    return response()->json([
        'error' => Lang::get('auth.failed')
    ], 401);
    }

    return redirect()->back()
    ->withInput($request->only($this->username(), 'remember'))
    ->withErrors([
        $this->username() => Lang::get('auth.failed'),
    ]);
} 
}