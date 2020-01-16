<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Prueba2Controller extends Controller
{
    //
    public function prueba(){

        $datos=["Tiempo_dedicado_a_estudiar_diariamente_fuera_de_clase","Como_es_tu_forma_de_trabajo_intelectual","
        Tu_forma_de_estudio_mas_utilizada","
        Como_empleas_tu_tiempo_libre","
        Asignaturas_preferidas","
        Por_que","
        Asignaturas_que_te_han_sido_dificiles","
        Por_que","
        Que_opinion_tienes_de_ti_mismo_como_estudiante"];

        $tipo=["int","varchar(255)","varchar(255)","varchar(255)","varchar(255)","varchar(255)","varchar(255)","varchar(255)","varchar(255)"];

        for($i=0;$i<count($datos);$i++){
           echo "create table ExpHE_".$datos[$i]."(id_exp".($i+1)."_g int primary key, id_alumno int, valor ".$tipo[$i].");";
        echo "<br>";
        }
        return 'echo';
    }
}
