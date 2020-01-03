<?php
use Illuminate\Support\Facades\Auth;
use App\Profesor;
use App\DatosPersonales;
use App\AsignaExpediente;
use App\Carrera;
use App\Periodo;
use App\Grupo;
use App\Semestre;
use App\CivilEstado;
use App\Escala;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('pdf', function () {

    $datosAlum=Profesor::getAlumnos();
    $datosTutor=DatosPersonales::where("id_user",Auth::user()->id)->get();
    //dd($datosTutor);
    $pdf = PDF::loadView('pdf',['datosAlum'=>$datosAlum],['datosTutor'=>$datosTutor]);
    return $pdf->stream();
    //return $pdf->download('archivo.pdf');
});
Route::get('expPdf/{id}', function ($id) {
    //dd($id);
    if (Session::get('id_alumno')) {
        $datos=AsignaExpediente::getDatos();
    }else {
        $datos=AsignaExpediente::getDatosId($id);
        if ($datos) {
            # code...
        }else {
            return view('noexp');
        }
    }

    //$carreras=DB::table('gnral_carreras')->get();
    $carreras=\Illuminate\Support\Facades\DB::table('gnral_carreras')->get();
    $periodos=\Illuminate\Support\Facades\DB::table('gnral_periodos')->get();
    $grupos=\Illuminate\Support\Facades\DB::table('gnral_grupos')->get();
    $semestres=\Illuminate\Support\Facades\DB::table('gnral_semestres')->get();
    $estadoC=\Illuminate\Support\Facades\DB::table('exp_civil_estados')->get();
    $escalas=\Illuminate\Support\Facades\DB::table('exp_escalas')->get();
    //dd($escalas);

    //dd();
    //dd($datosTutor);
    //$pdf = PDF::loadView('alumnos.pdf',['datos'=>$datos]);
    //return $pdf->stream();
    return view('alumnos.pdf',['periodos'=>$periodos,'datos'=>$datos,'carreras'=>$carreras,'estadoC'=>$estadoC,'semestres'=>$semestres,'grupos'=>$grupos,'escalas'=>$escalas]);
    //return $pdf->download('archivo.pdf');
});

Auth::routes();
{
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('/home', 'HomeController@index')->name('home');

}

{
    Route::Resource('/jefevista','JefeVistaController');
    Route::Resource('/asignacovista','AsignaCoController');
    Route::Resource('/asignatuvista','AsignaTuController');


    Route::Resource('/tutorvista','TutorVistaController');



    Route::Resource('/jefe','JefeController');
    Route::post('/jefeAct','JefeController@UpdateCoo');
    Route::post('/jefeActTuto','JefeController@UpdateTuto');

}

{
    Route::Resource('/graficas','GraficasController');
    Route::get('/getAllDatos','GraficasController@getAll');

}

{
    Route::Resource('/profesor','ProfesorController');
    Route::post('/uE','ProfesorController@updateEstado');
    Route::get('/getAll','ProfesorController@getAll');
    Route::get('/setAlumnId','ProfesorController@setAlumnoId');

}
{
    Route::Resource('/Alum','ViewAlumnosController');
    Route::post('/UpdateAlum','ViewAlumnosController@updateExp');
    Route::post('/cerrar','ViewAlumnosController@cerrar');
    Route::post('/UpdateA','TutorExpedienteController@mostrar');

}

{
    Route::Resource('/alumnos','AlumnosController');
    Route::Resource('/AlumUpdate','UpdateAlumnosController');
    Route::Resource('/Alumno','LoginAlumnosController');
    Route::Resource('/panel','PanelAlumnoController');
    Route::get('/getAl', 'AlumnosController@getAl');
    Route::get('/gen', 'AlumnosController@getGen');

    Route::get('/list', 'AlumnosController@getlist');

}
//Route::Resource('/tutorados','TutoradosController');

    Route::Resource('/graficasCoordinador','GraficasCoordinadorController');
    Route::get('/getCarrCoo','GraficasCoordinadorController@getCarrCoo');
    Route::get('/getAG','GraficasCoordinadorController@getAlCoo');




//Route::get('/ftp', 'FtpController@index');
Route::get('/ftp', ['as ' => 'ftp', 'uses' => 'FtpController@index']);
Route::post('/ftp/Up', 'FtpController@upload');

{
    Route::get('/getG', 'AsignaTutorController@getAllGrupoAct');
    Route::Resource('/asignacoordinador','AsignaCoordinadorController');
    Route::get('/repo','AsignaCoordinadorController@repo');

    Route::Resource('asignatutores','AsignaTutorController');

    Route::get('asignatutores/{id}/destroy',[
        'uses' => 'AsignaTutorController@destroy',
        'as' => 'asignatutores.destroy'
    ]);
}
{
    Route::get('/prueba2','Prueba2Controller@prueba');
}
