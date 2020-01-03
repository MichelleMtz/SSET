<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Grafica;

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
        $request->user()->authorizeRoles('2');
        //$datos=Grafica::getGraficasTutor();
        $datosG=Profesor::getGeneroChar();//no tocar
        //$arr=['Datos Generales','Antecedentes Academicos','Datos Familiares','Habitos de Estudios','Formacion Integral/Salud','Area Psicopedagogica'];

        //dd($datos);
        return view('profesor.graficas')->with(compact('datosG'));
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
