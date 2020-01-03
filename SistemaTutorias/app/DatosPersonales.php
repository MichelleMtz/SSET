<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class DatosPersonales extends Model
{

    //
    public static function getAllProf(){

        $carrera=DB::select('SELECT datos_personales.id_carrera, datos_personales.nombre FROM datos_personales,users,carreras where
        datos_personales.id_user= users.id and
        datos_personales.id_carrera= carreras.id_carrera and
        users.id='.Auth::user()->id.';');

        //dd($carrera);
        $datos=DB::select('SELECT users.id,datos_personales.nombre FROM datos_personales,users,carreras where
        datos_personales.id_user= users.id and
        datos_personales.id_carrera= carreras.id_carrera and
        users.id_rol=2 and datos_personales.id_carrera='.$carrera[0]->id_carrera.';');
        return $datos;
    }
}
