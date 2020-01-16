<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Auth;
use App\Alumno;
use App\AsignaCoordinador;
use App\GnralJefePeriodos;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     protected function authenticated($request,$user){
        //dd($request);
        //dd($user);

        if ($user->tipo_usuario==1) {
            $alumno=Alumno::getCuenta();
            //dd($alumno);
            Session::put('cuenta',$alumno[0]->cuenta);
            Session::put('nombre',$alumno[0]->apaterno." ".$alumno[0]->amaterno." ".$alumno[0]->nombre);
            # code...
            return redirect('/panel');
        }else
        if ($user->tipo_usuario==2) {

            $jefe=GnralJefePeriodos::isJefe($user);
            //dd($jefe);
            if($jefe && $jefe[0]->id_departamento==2){
                //dd();
                Session::put('jefe',$jefe[0]->id_carrera);
                return redirect('/jefevista');
            }else{
                //Session::put('coordinador',AsignaCoordinador::isCoordinador());
                return redirect('/tutorvista');
            }

        }
     }
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
}
