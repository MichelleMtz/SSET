@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <ul class="nav">
            <button type="button" class="btn btn-primary">
                <span class="badge badge-light">ISC</span>
            </button>
            <button type="button" class="btn btn-primary">
                    <span class="badge badge-light">Admon</span>
            </button>
            <button type="button" class="btn btn-primary">
                    <span class="badge badge-light">Gastro</span>
            </button>
            <button type="button" class="btn btn-primary">
                    <span class="badge badge-light">Arq</span>
            </button>

        </ul>
    </div>
    @for ($i = 0; $i < count($datos); $i++)
    @for ($j = 0; $j < count($datos[$i]); $j++)
    <div class="col-4 card" id="cont{{$i.$j}}" style="width:100%; height:200px;"></div>
        @endfor
    @endfor
</div>


@endsection
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script>

    var titles =[['Estado Civil','Nivel Socio-Economico','Trabaja','Beca','Estado','Turno']
        ,['Bachillerato','Otra carrera inicial','Interrupcion de estudios','Opciones vocales','Te gusta la carrera','Te estimula familia','Suspensión de Estudios después de terminado el Bachillerato']
        ,['Actualmente viven con','Pertenecen a Etnia Indigena','Hablan lengua indigena','Consideran a su familia']
        ,['Tiempo dedicado a estudiar','Forma de trabajo intelectual']
        ,['Practican deporte','Practican actividades artisticas','Participa en actividades culturales','Estado de salud','Enfermedades cronicas',
        'Padres con enfermedades cronicas','Operacion medico-quirurgica',
        'Usan lentes','Padecen enfermedad visual','Toman medicamento controlado','Accidentes graves']
        ,['Rendimiento escolar','Dominio del propio idioma','Otro idioma','Conocimiento en computo','Aptitudes especiales',
            'Comprension y redaccion','Preparacion y presentacion de examenes','Aplicacion de estrategias de aprendizaje',
            'Organizacion en actividades de estudio','Concentracion durante estudio',
            'Solucion de problemas y aprendizaje de las matematicas','Condiciones ambientales durante el estudio',
            'Busqueda bibliografica e integracion de informacion','Trabajo en equipo',]
        ];
    document.addEventListener('DOMContentLoaded', function ()
    {

        @for ($i = 0; $i < count($datos); $i++)
            @for ($j = 0; $j < count($datos[$i]); $j++)
            var {{'cont'.$i.$j}} = Highcharts.chart('cont{{$i.$j}}', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: titles[{{$i}}][{{$j}}]
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.y} ',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Total',
                        colorByPoint: true,
                        data: [
                        @for ($k = 0; $k < count($datos[$i][$j]); $k++)
                            {
                            name: '{{$datos[$i][$j][$k]->nom}}',
                            y: {{$datos[$i][$j][$k]->cantidad}},
                            sliced: false,
                            selected: true
                        },
                        @endfor

                        ]
                    }]
                });

            @endfor
        @endfor
    });
</script>
