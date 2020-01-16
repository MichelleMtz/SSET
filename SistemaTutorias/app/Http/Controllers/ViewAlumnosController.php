<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Grupo;
use App\Periodo;
use App\AsignaExpediente;
use Illuminate\Support\Facades\DB;
use Session;

class ViewAlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$con= DB::select('SELECT * FROM gnral_alumnos where cuenta="'.$datos->contra.'";');select('SELECT *FROM carreras')DB::
        // $carreras=Carrera::all();
        $datos=AsignaExpediente::getDatos();
        $carreras=DB::table('gnral_carreras')->get();
        $grupos=DB::table('gnral_grupos')->get();
        $periodos= DB::table('gnral_periodos')->get();

        //dd($datos);
        //dd($carreras);
        //dd($grupos);
        //dd($periodos);
        return view('alumnos.expediente')->with(compact('carreras','grupos','periodos','datos'));
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
        //dd($request->request);
        AsignaExpediente::insert($request);

        //return '/panel';

        return 'alumnos.index';


    }
    public function updateExp(Request $request)
    {
        //
        AsignaExpediente::updateExp($request);
        return 'panel';

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
    public function cerrar()
    {
        //
        Session::flush();
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
