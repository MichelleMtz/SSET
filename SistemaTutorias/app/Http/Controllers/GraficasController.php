<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Grafica;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use function PHPSTORM_META\map;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        //dd($request->user());
        //$request->user()->authorizeRoles('2');
        //$datos=Grafica::getGraficasTutor();
       // $datosG=Profesor::getGeneroChar();//no tocar
        //$arr=['Datos Generales','Antecedentes Academicos','Datos Familiares','Habitos de Estudios','Formacion Integral/Salud','Area Psicopedagogica'];

        //dd($datos);
        return view('profesor.estadisticas');
    }
    public function genero(Request $request)
    {
        $hombres=DB::select('select count(gnral_alumnos.id_alumno) as hombres FROM gnral_alumnos JOIN exp_asigna_alumnos 
        ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
        exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
        gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE gnral_alumnos.genero="M" AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id);

        $mujeres=DB::select('SELECT COUNT(gnral_alumnos.id_alumno) as mujeres FROM gnral_alumnos JOIN exp_asigna_alumnos 
        ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
        exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
        gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE gnral_alumnos.genero="F" AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id);

        return response()->json(
            ["hombres"=>$hombres,
                "mujeres"=>$mujeres],200
        );
    }
    public function estadocivil(Request $request)
    {
        $estado=DB::select('select COUNT(exp_generales.id_exp_general) as cant, exp_civil_estados.desc_ec
                     as estado FROM exp_generales JOIN exp_civil_estados ON exp_generales.id_estado_civil=exp_civil_estados.id_estado_civil
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                      GROUP BY exp_civil_estados.id_estado_civil');
        //dd($estado);


        return response()->json(
            ["nombre"=>array_pluck($estado, 'estado'),
                "cantidad"=>array_pluck($estado, 'cant')],200
        );
    }
    public function getAll(){
        $datos=Grafica::getGraficasTutor();
        //dd($datos);
        //$datosAlum=Profesor::getAlumnos();
        //dd($datos);
        return $datos;
    }

    public function updateEstado(Request $request){
        //dd($request);
        //Alumno::updateEst($request);
        //return redirect('profesor');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
