<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Alumno;
use App\AsignaExpediente;
use App\AsignaCoordinador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datosAlum=Profesor::getAlumnos();
        return $datosAlum;

    }
    public function getAll(){
        //dd($request);
        $datosAlum=Profesor::getAlumnos();
        //dd($datos);
        return $datosAlum;
    }
    public function updateEstado(Request $request){
        //dd($request);
        Alumno::updateEst($request);
        return redirect('profesor');
    }
    public function setAlumnoId(Request $request){
        //dd($request);
        Session::put('id_alumno',$request->id_alumno);
        return Session::get('id_alumno');
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
        DB::update('UPDATE exp_asigna_alumnos set estado='.$request->estado.' where id_asigna_alumno='.$request->id_asigna_alumno);
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
