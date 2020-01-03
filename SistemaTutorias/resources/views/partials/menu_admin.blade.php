
@section('menu')
    <?php
    //   $permiso_noregis=Session::get('personal_noregis');

    //dd(session());
    $personal_noregis=session()->has('personal_noregis')?session()->has('personal_noregis'):false;
    $palumno=session()->has('palumno')?session()->has('palumno'):false;
    $alumno_act=session()->has('alumno_act')?session()->has('alumno_act'):false;
    $profesor_conact=session()->has('profesor_conact')?session()->has('profesor_conact'):false;
    $profesor_sinact=session()->has('profesor_sinact')?session()->has('profesor_sinact'):false;
    $jefe_division=session()->has('jefe_division')?session()->has('jefe_division'):false;
    $directivo=session()->has('directivo')?session()->has('directivo'):false;
    $consultas=session()->has('consultas')?session()->has('consultas'):false;
    $sin_permiso=session()->has('sin_permiso')?session()->has('sin_permiso'):false;
    $desa=session()->has('desa')?session()->has('desa'):false;
    $ver_eva=session()->has('ver_eva')?session()->has('ver_eva'):false;
    $ver_carga=session()->has('ver_carga')?session()->has('ver_carga'):false;
    $verrifica_carga=session()->has('verrifica_carga')?session()->has('verrifica_carga'):false;
    $escolar=session()->has('escolar')?session()->has('escolar'):false;

    $id_unidad_admin=session()->has('id_unidad_admin')?session()->has('id_unidad_admin'):false;

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <?php
                $nombre=Session::get('nombre');
                $cambio_c=Session::get('cambio_carreras');
                $carreras=Session::get('carreras');
                $usuario=Session::get('usuario_alumno');
                $nperiodo=Session::get('nombre_periodo');
                ?>
                @if($jefe_division==true || $consultas==true)
                    <?php
                    $nombre_carrera=Session::get('nombre_carrera');
                    $id_carrera=Session::get('id_carrera');
                    ?>
                    <label >{{$nombre}} . {{ $nombre_carrera }}</label> {{ $nperiodo }}
                @else
                    <label >{{$nombre}}  </label> {{ $nperiodo }}
                @endif
            </div>
        </div>


        <div class="row ">
            <div class="" >
                <nav class="navbar navbar-default navbar-static-top">

                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->

                    </div>

                    <div class="collapse navbar-collapse " id="app-navbar-collapse" >
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        @if($profesor_conact==true || $jefe_division==true || $directivo==true ||$desa==true)
                            <ul class="nav navbar-nav navbar-right">

                                <!-- Authentication Links -->
                                <li class="dropdown bloqueo tooltip-options link" data-toggle="tooltip" data-placement="top" title ="{{ $nperiodo }}<br>Cambia periodo aqui">
                                    <a id="periodo" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if($cambio_c==1)
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown tooltip-options link" data-toggle="tooltip" data-placement="top" title ="CAMBIO DE CARRERA">
                                    <a id="selectCarrera" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="glyphicon glyphicon-education"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($carreras as $carrera)
                                            <li><a href="/recarga_personal/{{ $carrera->id_carrera }}">{{ $carrera->nombre }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-left ">
                            <!-- Authentication Links -->

                            <li class="dropdown bloqueo">
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Salir
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                        <!--MENU PROFESOR CON ACT-->
                        @if($profesor_conact==true)
                            <?php
                            $id_perso=Session::get('id_perso');
                            ?>
                            <ul class="nav navbar-nav navbar-left docente uno">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Complementarias
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/planeacion_actividad')}}">Planeación de Actividades</a></li>
                                        <li><a href="{{url('/consulta_general')}}">Evaluación </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left docente uno">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos P.
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/docente/{{ $usuario }}/edit">Editar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left docente uno">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluacion Docente
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/reportes2/{{$id_perso}}/{{1}}/{{0}}">Resultados de Evaluación</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="dropdown"><a href="/docente/{{$id_perso}}/carreras">Calificaciones</a></li>
                            </ul>
                        @endif

                    <!--MENU DESARROLLO-->





                        <!--MENU PROFESOR SIN ACT-->
                        @if($profesor_sinact==true ||$desa==true)
                            <?php
                            $id_perso=Session::get('id_perso');
                            ?>
                            <ul class="nav navbar-nav navbar-left docente uno">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos P.
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/docente/{{ $usuario }}/edit">Editar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                        @if($profesor_sinact==true)
                            <ul class="nav navbar-nav navbar-left docente uno">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluacion Docente
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/reportes2/{{$id_perso}}/{{1}}/{{0}}">Resultados de Evaluación</a></li>
                                    </ul>
                                </li>
                            </ul>

                        @endif
                    <!-- MENU JEFE-->
                        @if($jefe_division==true)
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown bloqueo">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos P.
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/docente/{{ $usuario }}/edit">Editar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left dos">
                                <li class="dropdown bloqueo">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Complementarias
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/docente_actividad')}}">Asignar Docente a Actividad</a></li>
                                        <li><a href="{{url('/alumnos_actividades')}}">Liberar Solicitud Alumnos</a></li>
                                        <li><a href="{{url('/libera_planeacion')}}">Liberar Planeación Docente</a></li>
                                        <li><a href="{{url('/constancias')}}">Constancia Individual</a></li>
                                        <li><a href="{{url('/constancia_gen')}}">Constancia General</a></li>
                                        <li><a href="{{url('/datos_historicos')}}">Datos Históricos</a></li>
                                    </ul>
                                </li>
                            </ul>


                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Evaluacion <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/buscar_profesores_carrera')}}">
                                                Profesores
                                            </a>
                                        </li>
                                    <!--<li>
                                        <a href="{{url('/buscar_alumnos')}}">
                                          Alumnos
                                        </a>
                                    </li>-->
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-left">
                                <li class="bloqueo"><a href="{{url('/reticulass')}}">Reticulas</a></li>
                                <li class="bloqueo"><a href="{{url('/docente')}}">Docentes</a></li>
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Horarios<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/horarios/armar_horarios')}}">Armar Horarios</a></li>
                                        <li><a href="{{url('/horarios/hrs_grupos/jefes')}}">Ver Horarios Grupos</a></li>
                                        <li><a href="{{url('/horarios/hrs_aulas/jefes')}}">Ver Horarios Aulas</a></li>
                                        <li><a href="{{url('/profesores/materias')}}">Profesores Materias</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formatos<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/formatos/distribucion')}}">Distrib.de hrs. frente a grupo</a></li>
                                        <li><a href="{{url('/formatos/relacion')}}">Relación de personal docente</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plantilla<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/plantilla/docentes')}}">Agregar Docentes</a></li>
                                        <li><a href="{{url('/plantilla/ver')}}">Ver Plantilla</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generales<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/generales/situaciones')}}">Situación Profesional</a></li>
                                        <li><a href="{{url('/generales/perfiles')}}">Perfil</a></li>
                                        <li><a href="{{url('/generales/edificios')}}">Edificios</a></li>
                                        <li><a href="{{url('/generales/aulas')}}">Aulas</a></li>
                                    </ul>
                                </li>
                                <li class="bloqueo"><a href="{{url($id_carrera.'/docentes')}}">Calificaciones</a></li>
                            </ul>
                        @endif

                    <!--MENU DESARROLLO ACADEMICO-->
                        @if($desa==true )
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Evaluacion Docente<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/buscar_profesores')}}">
                                                Profesores
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/buscar_alumnos')}}">
                                                Alumnos
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        @endif

                    <!--CONTROL ESCOLAR-->
                        @if($escolar==true || $directivo==true)
                            <ul class="nav navbar-nav navbar-left" style="display:none;">
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Control Escolar <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/validacion_de_carga')}}">
                                                Revision de cargas
                                            </a>
                                        </li>
                                        <li><a href="/servicios_escolares/evaluaciones" class="">Evaluaciones</a></li>
                                        <li><a href="/servicios_escolares/estadisticas" class="">Estadísticas</a></li>
                                        <li><a href="/servicios_escolares/bitacora_periodos" class="">Modificaciones en periodos</a></li>
                                        <li><a href="/servicios_escolares/bitacora_evaluaciones" class="">Modificaciones en evaluaciones</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    <!--MENU DIRECTIVO-->
                        @if($directivo==true || $consultas==true)
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos P.
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/docente/{{ $usuario }}/edit">Editar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left tres">
                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Complementarias
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/nueva_actividad')}}">Registrar Nueva Actividad</a></li>
                                        <li><a href="{{url('/solicitud_alumnos')}}">Solicitud Alumnos</a></li>
                                        <li><a href="{{url('/datos_estadisticos')}}">Datos Estadísticos</a></li>
                                        <li><a href="{{url('/datos_historicos_graficos')}}">Datos Históricos</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown bloqueo">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Evaluacion Doc. <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/buscar_profesores')}}">
                                                Profesores
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/buscar_alumnos')}}">
                                                Alumnos
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Oficios Com.<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/oficios/solicitud')}}">Solicitud Oficio</a></li>
                                        <li><a href="{{url('/oficios/registro')}}">Ver Oficios</a></li>

                                    </ul>
                                </li>
                                <li><a href="{{url('/reticulass')}}">Reticulas</a></li>
                                <li><a href="{{url('/docente')}}">Docentes</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Horarios<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/horarios/horarios_docentes')}}">Ver Horarios Docentes</a></li>
                                        <li><a href="{{url('/horarios/hrs_grupos')}}">Ver Horarios Grupos</a></li>
                                        <li><a href="{{url('/horarios/hrs_aulas')}}">Ver Horarios Aulas</a></li>
                                        <li><a href="{{url('/hrs_carrera')}}">Horas por carrera</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formatos<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/formatos/con_edu')}}">Concentrado Estructura Educ.</a></li>
                                        <li><a href="{{url('/formatos/distribucion')}}">Distrib.de hrs. frente a grupo</a></li>
                                        <li><a href="{{url('/formatos/relacion')}}">Relación de personal docente</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plantilla<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/plantilla/ver')}}">Ver Plantilla</a></li>
                                        <li><a href="{{url('/plantilla/educativa')}}">Plantilla Educativa</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generales<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/generales/edificios')}}">Edificios</a></li>
                                        <li><a href="{{url('/generales/aulas')}}">Aulas</a></li>
                                        @if($directivo==true)
                                            <li><a href="{{url('/generales/situaciones')}}">Situación Profesional</a></li>
                                            <li><a href="{{url('/generales/perfiles')}}">Perfil</a></li>
                                            <li><a href="{{url('/generales/carreras')}}">Carreras</a></li>
                                            <li><a href="{{url('/generales/extra_clases')}}">Extra Clase</a></li>
                                            <li><a href="{{url('/generales/cargos')}}">Categoría Docente</a></li>
                                            <li><a href="{{url('/generales/jefaturas')}}">Jefaturas de División</a></li>
                                            <li><a href="{{url('/personales')}}">Asignación de Permisos</a></li>
                                            <li><a href="{{url('/generales/unidad_administrativa')}}">Unidades Administrativas</a></li>

                                            <li><a href="{{url('/generales/jefe_unidad_administrativa')}}">Jefes Unidades Administrativas</a></li>
                                        @endif
                                    </ul>
                                </li>
                                {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

                                <li class="dropdown bloq">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Riesgos y Oportunidades<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @if($id_unidad_admin)
                                            <li><a href="{{url('/riesgos/proceso')}}">Registro Procesos</a></li>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registro Catálogos Riesgos</a>
                                                <ul class="dropdown-menu der">
                                                    <li><a href="{{url('/riesgos/riesgo')}}">Riesgos</a></li>
                                                    <li><a href="{{url('/riesgos/seleccion')}}">Selecciones</a></li>
                                                    <li><a href="{{url('/riesgos/tipoeva')}}">Tipo Evaluación</a></li>
                                                    <li><a href="{{url('/riesgos/factor')}}">Factor</a></li>
                                                    <li><a href="{{url('/riesgos/tipof')}}">Tipo Factor</a></li>
                                                    <li><a href="{{url('/riesgos/estrategia')}}">Estrategias</a></li>
                                                    <li><a href="{{url('/riesgos/decision')}}">Nivel Decisión</a></li>
                                                    <li><a href="{{url('/riesgos/clasifica')}}">Clasificación Riesgo</a></li>
                                                    <li><a href="{{url('/riesgos/sistema')}}">Categoria del Proceso</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Registro Catálogos Oportunidades</a>
                                                <ul class="dropdown-menu der" >
                                                    <li><a href="{{url('/riesgos/mejoracliente')}}">Mejoras del Cliente</a></li>
                                                    @if($directivo==true)
                                                        <li><a href="{{url('/riesgos/mejorareputacion')}}">Reputacion Institucional</a></li>
                                                        <li><a href="{{url('/riesgos/mejorasgc')}}">Mejora SGC</a></li>
                                                        <li><a href="{{url('/riesgos/potencialapertura')}}">Potencial Apertura Nuevos Programas de Estudio</a></li>
                                                        <li><a href="{{url('/riesgos/potencialcosto')}}">Potencial Costo de Implementación</a></li>
                                                        <li><a href="{{url('/riesgos/potencialcrecimiento')}}">Potencial de Crecimiento de la Matrícula Actual</a></li>
                                                        <li><a href="{{url('/riesgos/probabilidad')}}">Registra Probabilidad</a></li>
                                                        <li><a href="{{url('/riesgos/ocurrenciasp')}}">Registra Ocurrencias Previas</a></li>
                                                        <li><a href="{{url('/riesgos/calificacion')}}">Registra Calificación Máxima</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                            {{--<li><a href="{{url('/riesgos/registroriesgos')}}">Registro Riesgos</a></li>--}}
                                            <li><a href="{{url('/riesgos/partes')}}">Partes Interesadas</a></li>
                                            {{--                                    <li><a href="{{url('/riesgos/add_partes')}}">Agregar Partes Interesadas</a></li>--}}
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    <!--MENU ALUMNO-->
                        @if($palumno==true)
                            <ul class="nav navbar-nav navbar-left alumno">

                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Complementarias
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/consulta_actividades')}}">Registrar</a></li>
                                        <li><a href="{{url('/evidencias_alumnos')}}">Evidencias</a></li>
                                        <li><a href="{{url('/liberacion_alumno')}}">Liberación</a></li>
                                        <li><a href="{{url('/creditos')}}">Créditos</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-left alumno">

                                <li class="dropdown">
                                    <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos Alumno(a)
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/datos_alumno')}}">Actualizar</a></li>
                                        @if($ver_carga==false)
                                            <li><a href="{{url('/carga_academica')}}">Llenar Carga Académica</a></li>
                                        @endif
                                        <li><a href="{{url('/checar_carga')}}">Revisión Carga Académica</a></li>

                                    </ul>
                                </li>
                            </ul>
                            @if($ver_eva==true)
                                <ul class="nav navbar-nav navbar-left alumno">

                                    <li class="dropdown">
                                        <a class="dropdown-toogle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluacion Docente
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/evaluacion_alumno')}}">Iniciar Evaluación</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="{{url('/calificaciones')}}">Calificaciones</a></li>
                            </ul>
                        @endif
                    </div>

                </nav>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".link").tooltip({html:true});
        });
    </script>
@endsection