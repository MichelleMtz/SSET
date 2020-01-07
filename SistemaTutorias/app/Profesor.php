<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Profesor extends Model
{


    public static function getAlumnos(){
        $alumnos=DB::select('SELECT gnral_alumnos.*, exp_asigna_alumnos.estado,exp_asigna_alumnos.id_asigna_alumno
                from gnral_alumnos JOIN exp_asigna_alumnos ON exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno
                where exp_asigna_alumnos.id_asigna_generacion=(SELECT exp_asigna_tutor.id_asigna_generacion
                FROM exp_asigna_tutor JOIN gnral_personales on gnral_personales.id_personal=exp_asigna_tutor.id_personal
                WHERE gnral_personales.tipo_usuario='.Auth::user()->id.') order by(gnral_alumnos.apaterno)');
       // $prof=Auth::user()->id;
        return $alumnos;
    }





    public static function getAllGen(){
        $carrera=DB::select('SELECT * FROM datos_personales where id_user='.Auth::user()->id);
        $datos=DB::select('SELECT count(alumnos.id_alumno) cantidad, CASE alumnos.id_genero WHEN 1 THEN "Hombres" WHEN 2 THEN "Mujeres" END gen
        FROM asigna_semestre,alumnos,grupos,periodos,carreras
        where asigna_semestre.id_alumno=alumnos.id_alumno and
                asigna_semestre.id_grupo=grupos.id_grupo and
                alumnos.id_carrera=carreras.id_carrera and
                asigna_semestre.id_periodo=periodos.id_periodo and
                alumnos.id_carrera='.$carrera[0]->id_carrera.' group by alumnos.id_genero;');
        return $datos;
    }
    public static function getAlGen($id){

        $datos=DB::select('SELECT CASE alumnos.id_genero WHEN 1 THEN "Hombres" WHEN 2 THEN "Mujeres" END name, count(alumnos.id_alumno) y
        FROM asigna_semestre,alumnos,grupos,periodos,carreras
        where asigna_semestre.id_alumno=alumnos.id_alumno and
                asigna_semestre.id_grupo=grupos.id_grupo and
                alumnos.id_carrera=carreras.id_carrera and
                asigna_semestre.id_periodo=periodos.id_periodo and
                alumnos.id_carrera='.$id.' group by alumnos.id_genero;');
        return $datos;
    }
    public static function getGeneroChar(){

        $grupo=DB::select('SELECT * FROM asigna_tutor where id_docente='.Auth::user()->id);
        $carrera=DB::select('SELECT * FROM datos_personales where id_user='.Auth::user()->id);

        $hombres=DB::select('SELECT count(alumnos.id_alumno) hombres FROM asigna_semestre,alumnos,grupos,periodos,carreras where
        asigna_semestre.id_alumno=alumnos.id_alumno and
        asigna_semestre.id_grupo=grupos.id_grupo and
        alumnos.id_carrera=carreras.id_carrera and
        asigna_semestre.id_periodo=periodos.id_periodo and
        alumnos.id_carrera='.$carrera[0]->id_carrera.' and
        asigna_semestre.id_grupo='.$grupo[0]->id_grupo.' and
        alumnos.id_genero=1;');

        $mujeres=DB::select('SELECT count(alumnos.id_alumno) mujeres FROM asigna_semestre,alumnos,grupos,periodos,carreras where
           asigna_semestre.id_alumno=alumnos.id_alumno and
           asigna_semestre.id_grupo=grupos.id_grupo and
           alumnos.id_carrera=carreras.id_carrera and
           asigna_semestre.id_periodo=periodos.id_periodo and
           alumnos.id_carrera='.$carrera[0]->id_carrera.' and
           asigna_semestre.id_grupo='.$grupo[0]->id_grupo.' and
           alumnos.id_genero=2;');
        $array=array_merge($hombres,$mujeres);
        //dd($array);
        return $array;
    }
    //
}
