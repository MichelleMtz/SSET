<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Periodo extends Model
{
    //
    public static function getPeriodos(){
        $datos=DB::select('SELECT id_periodo,periodo FROM gnral_periodos order by id_periodo');
        return $datos;
    }
}
