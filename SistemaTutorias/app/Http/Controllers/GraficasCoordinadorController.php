<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grafica;
use App\Profesor;
use App\AsignaCoordinador;

class GraficasCoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos=Grafica::getGraficas(0);
        $dat=Profesor::getAllGen();
        $carr=AsignaCoordinador::getCarrCoo();
        //Grafica::getGraficasCoo();
        //Grafica::getGraficasTutor();
        //dd($carr);
        return view('graficas.graficasCoo')->with(compact('datos','dat','carr'));
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
    public function getAlCoo(Request $id){
        $dat=Profesor::getAlGen($id->id);
        //dd($dat);
        return json_encode($dat);
    }
    public function getCarrCoo(Request $id){

        $datos=Grafica::getGraficas($id->id);
        //dd($datos);
        return json_encode($datos);
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
