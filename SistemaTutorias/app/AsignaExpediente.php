<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class AsignaExpediente extends Model
{

    //

    public static function getDatosId($id){
        $datos=DB::select('SELECT * FROM exp_generales WHERE id_alumno='.$id.';');
        $datos2=DB::select('SELECT * FROM exp_antecedentes_academicos WHERE id_alumno='.$id.';');
        $datos3=DB::select('SELECT * FROM exp_datos_familiares WHERE id_alumno='.$id.';');
        $datos4=DB::select('SELECT * FROM exp_habitos_estudio WHERE id_alumno='.$id.';');
        $datos5=DB::select('SELECT * FROM exp_formacion_integral WHERE id_alumno='.$id.';');
        $datos6=DB::select('SELECT * FROM exp_area_psicopedagogica WHERE id_alumno='.$id.';');
        $array=array_merge($datos,$datos2,$datos3,$datos4,$datos5,$datos6);
        //dd($array);
     return $array;
    }
    public static function getDatos(){
        $datos=DB::select('SELECT * FROM exp_generales WHERE id_alumno='.Session::get('id_alumno').';');
        $datos2=DB::select('SELECT * FROM exp_antecedentes_academicos WHERE id_alumno='.Session::get('id_alumno').';');
        $datos3=DB::select('SELECT * FROM exp_datos_familiares WHERE id_alumno='.Session::get('id_alumno').';');
        $datos4=DB::select('SELECT * FROM exp_habitos_estudio WHERE id_alumno='.Session::get('id_alumno').';');
        $datos5=DB::select('SELECT * FROM exp_formacion_integral WHERE id_alumno='.Session::get('id_alumno').';');
        $datos6=DB::select('SELECT * FROM exp_area_psicopedagogica WHERE id_alumno='.Session::get('id_alumno').';');
        $array=array_merge($datos,$datos2,$datos3,$datos4,$datos5,$datos6);

        //dd($array);
     return $array;
    }
    public static function insert($datos){

        //dd($dat);
        $fecha = date("Y-m-d", strtotime($datos->fecha_nacimiento));

        //dd($datos->bachillerato.',"'.$datos->otro_estudio.'",'.$datos->ano_curso_bachillerato.',"'.$datos->ano_terminacion.'","'.$datos->escuela_procedencia.'",'.$datos->promedio.',"'.$datos->materias_reprobadas.'",'.$datos->otra_carrera_ini.',"'.$datos->institucion.'",'.$datos->semestre_cursado.','.$datos->interrucpion_estudio.',"'.$datos->razones_interrupcion.'","'.$datos->razon_decide_estudiar_tesvb.'","'.$datos->perfil.'",'.$datos->otras_opciones_vocacionales.',"'.$datos->cuales.'",'.$datos->tegusta_carrera_elegida.',"'.$datos->pq.'",'.$datos->suspension_estudios_bachillerato.',"'.$datos->razonesSus.'",'.$datos->te_estimula_familia.','.Session::get('id_alumno'));
        //dd('INSERT INTO `exp_generales` (`id_carrera`, `id_periodo`, `id_grupo`, `nombre`, `edad`, `sexo`, `fecha_nacimientos`, `lugar_naciemientos`, `id_semestre`, `id_estado_civil`, `no_hijos`, `direccion`, `correo`, `tel_casa`, `cel`, `id_nivel_economico`, `trabaja`, `ocupacion`, `horario`, `no_cuenta`, `beca`, `tipo_beca`, `estado`, `turno`, `id_alumno`) VALUES ('.$datos->carrera.','.$datos->periodo.','.$datos->grupo.', "'.$datos->nombre.'", '.$datos->edad.', "'.$datos->sexo.'", "'.$fecha.'","'.$datos->lugar_nacimiento.'",'.$datos->semestre.', '.$datos->estado_civil.','.$datos->no_hijos.', "'.$datos->direccion.'","'.$datos->correo.'", "'.$datos->tel_casa.'","'.$datos->cel.'", '.$datos->nivel_socioeconomico.','.$datos->trabaja.', "'.$datos->ocupacion.'","'.$datos->horario.'", "'.$datos->no_cuenta.'",'.$datos->beca.',"'.$datos->tbeca.'",'.$datos->estado.',"'.$datos->turno.'",'.Session::get('id_alumno').');');

        //dd('INSERT INTO `exp_antecedentes_academicos` (`id_bachillerato`, `otros_estudios`, `años_curso_bachillerato`, `año_terminacion`, `escuela_procedente`, `promedio`, `materias_reprobadas`, `otra_carrera_ini`, `institucion`, `semestres_cursados`, `interrupciones_estudios`, `razones_interrupcion`, `razon_descide_estudiar_tesvb`, `sabedel_perfil_profesional`, `otras_opciones_vocales`, `cuales_otras_opciones_vocales`, `tegusta_carrera_elegida`, `porque_carrera_elegida`, `suspension_estudios_bachillerato`, `razones_suspension_estudios`, `teestimula_familia`, `id_alumno`) VALUES('.$datos->bachillerato.',"'.$datos->otro_estudio.'",'.$datos->ano_curso_bachillerato.',"'.$datos->ano_terminacion.'","'.$datos->escuela_procedencia.'",'.$datos->promedio.',"'.$datos->materias_reprobadas.'",'.$datos->otra_carrera_ini.',"'.$datos->institucion.'",'.$datos->semestre_cursado.','.$datos->interrucpion_estudio.',"'.$datos->razones_interrupcion.'","'.$datos->razon_decide_estudiar_tesvb.'","'.$datos->perfil.'",'.$datos->otras_opciones_vocacionales.',"'.$datos->cuales.'",'.$datos->tegusta_carrera_elegida.',"'.$datos->pq.'",'.$datos->suspension_estudios_bachillerato.',"'.$datos->razonesSus.'",'.$datos->te_estimula_familia.','.Session::get('id_alumno').');');
        //dd('INSERT INTO `exp_datos_familiares` (`nombre_padre`, `edad_padre`, `ocupacion_padre`, `lugar_residencia_padre`, `nombre_madre`, `edad_madre`, `ocupacion_madre`, `lugar_residencia_madre`, `no_hermanos`, `lugar_ocupas`, `vivienda_actual`, `no_personas`, `etnia_indigena`, `cual_etnia`, `hablas_lengua_indigena`, `sostiene_economia_hogar`, `id_consideras_familia`, `nombre_tutor`, `id_parentesco`, `id_alumno`) VALUES ("'.$datos->nombre_padre.'",'.$datos->edad_padre.',"'.$datos->ocupacion_padre.'","'.$datos->lugar_residencia_padre.'","'.$datos->nombre_madre.'",'.$datos->edad_madre.',"'.$datos->ocupacion_madre.'","'.$datos->lugar_residencia_madre.'",'.$datos->no_hermanos.',"'.$datos->lugar_que_ocupas.'",'.$datos->actualmente_vives.','.$datos->no_persona.','.$datos->etnia.',"'.$datos->cual_etnia.'",'.$datos->hablas.',"'.$datos->sosten_hogar.'",'.$datos->consideras_a_familia.',"'.$datos->nombre_tutor.'","'.$datos->parentesco.'",'.Session::get('id_alumno').');');
        //dd('INSERT INTO `exp_habitos_estudio` (`tiempo_empelado_estudiar`, `id_forma_trabajo`, `forma_estudio`, `tiempo_libre`, `asignatura_preferida`, `porque_asignatura`, `asignatura_dificil`, `porque_asignatura_dificil`, `opinion_tu_mismo_estudiante`, `id_alumno`) VALUES ('.$datos->tiempo_empleado_estudiar.','.$datos->forma_trabajo.',"'.$datos->forma_estudio.'","'.$datos->tiempo_libre.'","'.$datos->asigna_preferida.'","'.$datos->porque_asignatura.'","'.$datos->asignatura_dificil.'","'.$datos->porque_asignatura_dificil.'","'.$datos->opinion_tu_mismo_estudiante.'",'.Session::get('id_alumno').');');
        //dd('INSERT INTO `exp_formacion_integral` (`practica_deporte`, `especifica_deporte`, `practica_artistica`, `especifica_artistica`, `pasatiempo`, `actividades_culturales`, `cuales_act`, `estado_salud`, `enfermedad_cronica`, `especifica_enf_cron`, `enf_cron_padre`, `especifica_enf_cron_padres`, `operacion`, `deque_operacion`, `enfer_visual`, `especifica_enf`, `usas_lentes`, `medicamento_controlado`, `especifica_medicamento`, `estatura`, `peso`, `accidente_grave`, `relata_breve`, `id_alumno`) VALUES ('.$datos->depo.',"'.$datos->especifica1.'",'.$datos->artistica.',"'.$datos->especifica2.'","'.$datos->pasatiempo.'",'.$datos->actC.',"'.$datos->cualesAc.'",'.$datos->estSalud.','.$datos->enferCron.',"'.$datos->especificaEnf.'",'.$datos->EnfPa.',"'.$datos->especificarEnfPa.'",'.$datos->operacion.',"'.$datos->especificarOpe.'",'.$datos->EnVisual.',"'.$datos->especificarEnVisual.'",'.$datos->lentes.','.$datos->mediContro.',"'.$datos->especificarMed.'",'.$datos->estatura.','.$datos->peso.','.$datos->accidente.',"'.$datos->relata.'",'.Session::get('id_alumno').');');
        //dd('INSERT INTO `exp_area_psicopedagogica` (`rendimiento_escolar`, `dominio_idioma`, `otro_idioma`, `conocimiento_compu`, `aptitud_especial`, `comprension`, `preparacion`, `estrategias_aprendizaje`, `organizacion_actividades`, `concentracion`, `solucion_problemas`, `condiciones_ambientales`, `busqueda_bibliografica`, `trabajo_equipo`, `id_alumno`) VALUES ('.$datos->rendimiento_escolar.','.$datos->dominio.','.$datos->otro_idioma.','.$datos->conocimiento_computo.','.$datos->aptitudes.','.$datos->comprension.','.$datos->preparacion.','.$datos->estrategias.','.$datos->organizacion_actividades.','.$datos->concentracion.','.$datos->solucion.','.$datos->condiciones.','.$datos->bibliografica.','.$datos->equipo.','.Session::get('id_alumno').');');


        DB::insert('INSERT INTO `exp_generales` (`id_carrera`, `id_periodo`, `id_grupo`, `nombre`, `edad`, `sexo`, `fecha_nacimientos`, `lugar_naciemientos`, `id_semestre`, `id_estado_civil`, `no_hijos`, `direccion`, `correo`, `tel_casa`, `cel`, `id_nivel_economico`, `trabaja`, `ocupacion`, `horario`, `no_cuenta`, `beca`, `tipo_beca`, `estado`, `turno`, `id_alumno`) VALUES ('.$datos->carrera.','.$datos->periodo.','.$datos->grupo.', "'.$datos->nombre.'", '.$datos->edad.', "'.$datos->sexo.'", "'.$fecha.'","'.$datos->lugar_nacimiento.'",'.$datos->semestre.', '.$datos->estado_civil.','.$datos->no_hijos.', "'.$datos->direccion.'","'.$datos->correo.'", "'.$datos->tel_casa.'","'.$datos->cel.'", '.$datos->nivel_socioeconomico.','.$datos->trabaja.', "'.$datos->ocupacion.'","'.$datos->horario.'", "'.$datos->no_cuenta.'",'.$datos->beca.',"'.$datos->tbeca.'",'.$datos->estado.',"'.$datos->turno.'",'.Session::get('id_alumno').');');
        DB::insert('INSERT INTO `exp_antecedentes_academicos` (`id_bachillerato`, `otros_estudios`, `años_curso_bachillerato`, `año_terminacion`, `escuela_procedente`, `promedio`, `materias_reprobadas`, `otra_carrera_ini`, `institucion`, `semestres_cursados`, `interrupciones_estudios`, `razones_interrupcion`, `razon_descide_estudiar_tesvb`, `sabedel_perfil_profesional`, `otras_opciones_vocales`, `cuales_otras_opciones_vocales`, `tegusta_carrera_elegida`, `porque_carrera_elegida`, `suspension_estudios_bachillerato`, `razones_suspension_estudios`, `teestimula_familia`, `id_alumno`) VALUES('.$datos->bachillerato.',"'.$datos->otro_estudio.'",'.$datos->ano_curso_bachillerato.',"'.$datos->ano_terminacion.'","'.$datos->escuela_procedencia.'",'.$datos->promedio.',"'.$datos->materias_reprobadas.'",'.$datos->otra_carrera_ini.',"'.$datos->institucion.'",'.$datos->semestre_cursado.','.$datos->interrucpion_estudio.',"'.$datos->razones_interrupcion.'","'.$datos->razon_decide_estudiar_tesvb.'","'.$datos->perfil.'",'.$datos->otras_opciones_vocacionales.',"'.$datos->cuales.'",'.$datos->tegusta_carrera_elegida.',"'.$datos->pq.'",'.$datos->suspension_estudios_bachillerato.',"'.$datos->razonesSus.'",'.$datos->te_estimula_familia.','.Session::get('id_alumno').');');
        DB::insert('INSERT INTO `exp_datos_familiares` (`nombre_padre`, `edad_padre`, `ocupacion_padre`, `lugar_residencia_padre`, `nombre_madre`, `edad_madre`, `ocupacion_madre`, `lugar_residencia_madre`, `no_hermanos`, `lugar_ocupas`, `id_opc_vives`, `no_personas`, `etnia_indigena`, `cual_etnia`, `hablas_lengua_indigena`, `sostiene_economia_hogar`, `id_familia_union`, `nombre_tutor`, `id_parentesco`, `id_alumno`) VALUES ("'.$datos->nombre_padre.'",'.$datos->edad_padre.',"'.$datos->ocupacion_padre.'","'.$datos->lugar_residencia_padre.'","'.$datos->nombre_madre.'",'.$datos->edad_madre.',"'.$datos->ocupacion_madre.'","'.$datos->lugar_residencia_madre.'",'.$datos->no_hermanos.',"'.$datos->lugar_que_ocupas.'",'.$datos->actualmente_vives.','.$datos->no_persona.','.$datos->etnia.',"'.$datos->cual_etnia.'",'.$datos->hablas.',"'.$datos->sosten_hogar.'",'.$datos->consideras_a_familia.',"'.$datos->nombre_tutor.'","'.$datos->parentesco.'",'.Session::get('id_alumno').');');
        DB::insert('INSERT INTO `exp_habitos_estudio` (`tiempo_empelado_estudiar`, `id_opc_intelectual`, `forma_estudio`, `tiempo_libre`, `asignatura_preferida`, `porque_asignatura`, `asignatura_dificil`, `porque_asignatura_dificil`, `opinion_tu_mismo_estudiante`, `id_alumno`) VALUES ('.$datos->tiempo_empleado_estudiar.','.$datos->forma_trabajo.',"'.$datos->forma_estudio.'","'.$datos->tiempo_libre.'","'.$datos->asigna_preferida.'","'.$datos->porque_asignatura.'","'.$datos->asignatura_dificil.'","'.$datos->porque_asignatura_dificil.'","'.$datos->opinion_tu_mismo_estudiante.'",'.Session::get('id_alumno').');');


        DB::insert('INSERT INTO `exp_formacion_integral` (`practica_deporte`, `especifica_deporte`, `practica_artistica`, `especifica_artistica`, `pasatiempo`, `actividades_culturales`, `cuales_act`, `estado_salud`, `enfermedad_cronica`, `especifica_enf_cron`, `enf_cron_padre`, `especifica_enf_cron_padres`, `operacion`, `deque_operacion`, `enfer_visual`, `especifica_enf`, `usas_lentes`, `medicamento_controlado`, `especifica_medicamento`, `estatura`, `peso`, `accidente_grave`, `relata_breve`, `id_alumno`) VALUES ('.$datos->depo.',"'.$datos->especifica1.'",'.$datos->artistica.',"'.$datos->especifica2.'","'.$datos->pasatiempo.'",'.$datos->actC.',"'.$datos->cualesAc.'",'.$datos->estSalud.','.$datos->enferCron.',"'.$datos->especificarEnf.'",'.$datos->EnfPa.',"'.$datos->especificarEnfPa.'",'.$datos->operacion.',"'.$datos->especificarOpe.'",'.$datos->EnVisual.',"'.$datos->especificarEnVisual.'",'.$datos->lentes.','.$datos->mediContro.',"'.$datos->especificarMed.'",'.$datos->estatura.','.$datos->peso.','.$datos->accidente.',"'.$datos->relata.'",'.Session::get('id_alumno').');');


        DB::insert('INSERT INTO `exp_area_psicopedagogica` (`rendimiento_escolar`, `dominio_idioma`, `otro_idioma`, `conocimiento_compu`, `aptitud_especial`, `comprension`, `preparacion`, `estrategias_aprendizaje`, `organizacion_actividades`, `concentracion`, `solucion_problemas`, `condiciones_ambientales`, `busqueda_bibliografica`, `trabajo_equipo`, `id_alumno`) VALUES ('.$datos->rendimiento_escolar.','.$datos->dominio.','.$datos->otro_idioma.','.$datos->conocimiento_computo.','.$datos->aptitudes.','.$datos->comprension.','.$datos->preparacion.','.$datos->estrategias.','.$datos->organizacion_actividades.','.$datos->concentracion.','.$datos->solucion.','.$datos->condiciones.','.$datos->bibliografica.','.$datos->equipo.','.Session::get('id_alumno').');');
        //DB::insert('INSERT INTO `asigna_expediente` (`id_user`, `id_exp_general`, `id_exp_antecedentes_academicos`, `id_exp_datos_familiares`, `id_exp_habitos_estudio`, `id_exp_formacion_integral`, `id_exp_area_psicopedagogica`) VALUES (null, 1, 1, 1, 1, 1, 1);');
    }
    public static function updateExp($datos){
        $fecha = date("Y-m-d", strtotime($datos->fecha_nacimiento));
        //dd($datos);
        DB::update('UPDATE `exp_generales` SET `id_carrera` = '.$datos->carrera.', `id_periodo` = '.$datos->periodo.', `id_grupo` = '.$datos->grupo.', `nombre` = "'.$datos->nombre.'", `edad` = '.$datos->edad.', `sexo` = '.$datos->sexo.', `fecha_nacimientos` = "'.$fecha.'", `lugar_naciemientos` = "'.$datos->lugar_nacimiento.'", `id_semestre` = '.$datos->semestre.', `id_estado_civil` = '.$datos->estado_civil.', `no_hijos` = '.$datos->no_hijos.', `direccion` = "'.$datos->direccion.'", `correo` = "'.$datos->correo.'", `tel_casa` = "'.$datos->tel_casa.'", `cel` = "'.$datos->cel.'", `id_nivel_economico` = '.$datos->nivel_socioeconomico.', `trabaja` = '.$datos->trabaja.', `ocupacion` = "'.$datos->ocupacion.'", `horario` = "'.$datos->horario.'", `no_cuenta` = "'.$datos->no_cuenta.'", `beca` = '.$datos->beca.', `tipo_beca` = "'.$datos->tbeca.'", `estado` = '.$datos->estado.', `turno` = '.$datos->turno.' WHERE (`id_alumno` = '.Session::get('id_alumno').');');
        DB::update('UPDATE `exp_antecedentes_academicos` SET `id_bachillerato` = '.$datos->bachillerato.', `otros_estudios` = "'.$datos->otro_estudio.'", `años_curso_bachillerato` = '.$datos->ano_curso_bachillerato.', `año_terminacion` = "'.$datos->ano_terminacion.'", `escuela_procedente` = "'.$datos->escuela_procedencia.'", `promedio` = '.$datos->promedio.', `materias_reprobadas` = "'.$datos->materias_reprobadas.'", `otra_carrera_ini` = '.$datos->otra_carrera_ini.', `institucion` = "'.$datos->institucion.'", `semestres_cursados` = '.$datos->semestre_cursado.', `interrupciones_estudios` = '.$datos->interrucpion_estudio.', `razones_interrupcion` = "'.$datos->razones_interrupcion.'", `razon_descide_estudiar_tesvb` = "'.$datos->razon_decide_estudiar_tesvb.'", `sabedel_perfil_profesional` = "'.$datos->perfil.'", `otras_opciones_vocales` = '.$datos->otras_opciones_vocacionales.', `cuales_otras_opciones_vocales` = "'.$datos->cuales.'", `tegusta_carrera_elegida` = '.$datos->tegusta_carrera_elegida.', `porque_carrera_elegida` = "'.$datos->pq.'", `suspension_estudios_bachillerato` = '.$datos->suspension_estudios_bachillerato.', `razones_suspension_estudios` = "'.$datos->razonesSus.'", `teestimula_familia` = '.$datos->te_estimula_familia.' WHERE (`id_alumno` = '.Session::get('id_alumno').');');
        DB::update('UPDATE `exp_datos_familiares` SET `nombre_padre` = "'.$datos->nombre_padre.'", `edad_padre` = '.$datos->edad_padre.', `ocupacion_padre` = "'.$datos->ocupacion_padre.'", `lugar_residencia_padre` = "'.$datos->lugar_residencia_padre.'", `nombre_madre` = "'.$datos->nombre_madre.'", `edad_madre` = '.$datos->edad_madre.', `ocupacion_madre` = "'.$datos->ocupacion_madre.'", `lugar_residencia_madre` = "'.$datos->lugar_residencia_madre.'", `no_hermanos` = '.$datos->no_hermanos.', `lugar_ocupas` = "'.$datos->lugar_que_ocupas.'", `id_opc_vives` = '.$datos->actualmente_vives.', `no_personas` = '.$datos->no_persona.', `etnia_indigena` = '.$datos->etnia.', `cual_etnia` = "'.$datos->cual_etnia.'", `hablas_lengua_indigena` = '.$datos->hablas.', `sostiene_economia_hogar` = "'.$datos->sosten_hogar.'", `id_familia_union` = '.$datos->consideras_a_familia.', `nombre_tutor` = "'.$datos->nombre_tutor.'", `id_parentesco` = "'.$datos->parentesco.'" WHERE (`id_alumno` = '.Session::get('id_alumno').');');
        DB::update('UPDATE `exp_habitos_estudio` SET `tiempo_empelado_estudiar` = '.$datos->tiempo_empleado_estudiar.', `id_opc_intelectual` = '.$datos->forma_trabajo.', `forma_estudio` = "'.$datos->forma_estudio.'", `tiempo_libre` = "'.$datos->tiempo_libre.'", `asignatura_preferida` = "'.$datos->asigna_preferida.'", `porque_asignatura` = "'.$datos->porque_asignatura.'", `asignatura_dificil` = "'.$datos->asignatura_dificil.'", `porque_asignatura_dificil` = "'.$datos->porque_asignatura_dificil.'", `opinion_tu_mismo_estudiante` = "'.$datos->opinion_tu_mismo_estudiante.'" WHERE (`id_alumno` = '.Session::get('id_alumno').');');
        DB::update('UPDATE `exp_formacion_integral` SET `practica_deporte` = '.$datos->depo.', `especifica_deporte` = "'.$datos->especifica1.'", `practica_artistica` = '.$datos->artistica.', `especifica_artistica` = "'.$datos->especifica2.'", `pasatiempo` = "'.$datos->pasatiempo.'", `actividades_culturales` = '.$datos->actC.', `cuales_act` = "'.$datos->cualesAc.'", `estado_salud` = '.$datos->estSalud.', `enfermedad_cronica` = '.$datos->enferCron.', `especifica_enf_cron` = "'.$datos->especificarEnf.'", `enf_cron_padre` = '.$datos->EnfPa.', `especifica_enf_cron_padres` = "'.$datos->especificarEnfPa.'", `operacion` = '.$datos->operacion.', `deque_operacion` = "'.$datos->especificarOpe.'", `enfer_visual` = '.$datos->EnVisual.', `especifica_enf` = "'.$datos->especificarEnVisual.'", `usas_lentes` = '.$datos->lentes.', `medicamento_controlado` = '.$datos->mediContro.', `especifica_medicamento` = "'.$datos->especificarMed.'", `estatura` = "'.$datos->estatura.'", `peso` = "'.$datos->peso.'", `accidente_grave` = '.$datos->accidente.', `relata_breve` = "'.$datos->relata.'" WHERE (`id_alumno` = '.Session::get('id_alumno').');');
        DB::update('UPDATE `exp_area_psicopedagogica` SET `rendimiento_escolar` = '.$datos->rendimiento_escolar.', `dominio_idioma` = '.$datos->dominio.', `otro_idioma` = '.$datos->otro_idioma.', `conocimiento_compu` = '.$datos->conocimiento_computo.', `aptitud_especial` = '.$datos->aptitudes.', `comprension` = '.$datos->comprension.', `preparacion` = '.$datos->preparacion.', `estrategias_aprendizaje` = '.$datos->estrategias.', `organizacion_actividades` = '.$datos->organizacion_actividades.', `concentracion` = '.$datos->concentracion.', `solucion_problemas` = '.$datos->solucion.', `condiciones_ambientales` = '.$datos->condiciones.', `busqueda_bibliografica` = '.$datos->bibliografica.', `trabajo_equipo` = '.$datos->equipo.' WHERE (`id_alumno` = '.Session::get('id_alumno').');');
    }
    public static function getExist(){
        $datos=DB::select('SELECT id_alumno FROM exp_generales ;');
        return $datos;
    }
}
