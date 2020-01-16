<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class AsignaSemestre extends Model
{
    //
    public static function getAl($dato){

        //dd($carrera);
        $datos=DB::select('SELECT asigna_semestre.id_grupo, alumnos.nombre FROM asigna_semestre,alumnos,grupos,periodos where
        asigna_semestre.id_alumno=alumnos.id_alumno and
        asigna_semestre.id_grupo=grupos.id_grupo and
        asigna_semestre.id_periodo=periodos.id_periodo and
        asigna_semestre.id_grupo='.$dato);
        return $datos;
    }
}
