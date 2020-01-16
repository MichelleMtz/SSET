@extends('layouts.app')
@section('content')
<style>
@media print {
  .hide-print {
    display: none;
  }
}
</style>
<div class="float-right">
        <button class="btn btn-danger btn-lg print hide-print">
                <i class="fas fa-print"></i>
        </button>
</div>
<div id="div-print">

    <div class="card">
        <div class="row">
            <div class="col-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @for ($i = 0; $i < count($carr); $i++)
                        @for ($j = 0; $j < count($carr[$i]); $j++)
                        <a class="nav-link btn-carr" data-id="{{$carr[$i][$j]->id_carrera}}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                {{$carr[$i][$j]->desc_carrera}}
                        </a>
                        @endfor
                    @endfor
                </div>
            </div>
            <div class="col-3" id="alum">
                <!--span class="badge badge-pill badge-primary">{$dat[0]->cantidad+$dat[1]->cantidad}}</span-->
            </div>
            <div id="container" class="col-4" style="width:50%; height:200px;"></div>
        </div>
    </div>
    <div id="content-nav" class="hide-print"></div>
    <div id="content-graf" class="tab-content">
    </div>
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
    var arr=['Datos Generales','Antecedentes Academicos','Datos Familiares','Habitos de Estudios','Formacion Integral/Salud','Area Psicopedagogica'];
    $(document).ready(function(){
        $('.print').click(function(){
            //$('#v-pills-tab').hide();
            //$('#myTab').hide();
            //$(this).hide();
            //var theHtml = $('#div-print').html();

            //console.log(theHtml);
            //var mywindow = window.open('', 'PRINT', 'height=800,width=1000');



            //mywindow.document.write(theHtml);

            //mywindow.document.close(); // necessary for IE >= 10
            //mywindow.focus(); // necessary for IE >= 10*/

            //mywindow.print();
            //mywindow.close();
            window.print();
        });
        $('.btn-carr').click(function(){
            var id= $(this).data('id');
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                url: "/getAG",
                method: "GET",
                dataType: "json",
                data:{"id":id,},
                success: function(datos)
                {

                    Highcharts.chart('alum', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: 0,
                            plotShadow: false
                        },
                        title: {
                            text: 'Total de Alumnos<br>'+(datos[0]['y']+datos[1]['y']),
                            align: 'center',
                            verticalAlign: 'middle',
                            y: 40
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                dataLabels: {
                                    enabled: true,
                                    distance: -50,
                                    style: {
                                        fontWeight: 'bold',
                                        color: 'white'
                                    }
                                },
                                startAngle: -90,
                                endAngle: 90,
                                center: ['50%', '75%'],
                                size: '110%'
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Total',
                            innerSize: '50%',
                            data: [
                                {
                                    name: '',
                                    y:1,
                                }
                            ]
                        }]
                    });
                    /////////////////////////////////////////
                    var myChart=Highcharts.chart('container',
                    {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Alumnos por Genero'
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Total Porcentaje'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.1f}'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total<br/>'
                        },

                        series: [
                            {
                                name: "Alumnos",
                                colorByPoint: true,
                                data: datos
                            }
                        ],
                    });
                    /////////////////////////////////////////
                }
            });
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                url: "getCarrCoo",
                method: "GET",
                dataType: "json",
                data:{"id":id,},
                success: function(datos)
                {
                    //console.log(datos[0][0]);
                    var html='';
                    var nav='';
                    nav+='<ul class="nav nav-tabs" id="myTab" role="tablist">';
                    for (let i = 0; i < datos.length; i++){

                        if (i==0) {
                            nav+='<li class="nav-item"><a class="nav-link active" id="tab'+i+'-g" data-toggle="tab" href="#tab'+i+'" role="tab" aria-controls="tab'+i+'" aria-selected="true">'+arr[i]+'</a></li>';
                            html+='<div class="tab-pane fade show active" id="tab'+i+'" role="tabpanel" aria-labelledby="tab'+i+'"><div class="row">';
                            }else{
                            nav+='<li class="nav-item"><a class="nav-link" id="tab'+i+'-g" data-toggle="tab" href="#tab'+i+'" role="tab" aria-controls="tab'+i+'" aria-selected="false">'+arr[i]+'</a></li>';
                            html+='<div class=" tab-pane fade" id="tab'+i+'" role="tabpanel" aria-labelledby="tab'+i+'"><div class="row">';
                        }
                        for (let j = 0; j < datos[i].length; j++){
                            html+='<div class="col-4" id="cont'+i+j+'" style="width:100%; height:200px;"></div>';
                        }
                        html+='</div></div>';
                    }
                    nav+='</ul>';
                    console.log(html);
                    $('#content-nav').html(nav);
                    $('#content-graf').html(html);
                    ////////////////////////////////////////////////
                    for (let i = 0; i < datos.length; i++){
                        for (let j = 0; j < datos[i].length; j++){

                            for (let k = 0; k < datos[i][j].length; k++){
                                        //datos[i][j][k];
                                        console.log(datos[i][j][k]);
                                    }

                            Highcharts.chart('cont'+i+j, {
                                chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'column'
                                },
                                title: {
                                    text: titles[i][j]
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    title: {
                                        text: 'Total Porcentaje'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:.1f}'
                                        }
                                    }
                                },

                                tooltip: {
                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total<br/>'
                                },

                                series: [{
                                    name: 'Total',
                                    colorByPoint: true,
                                    data:datos[i][j]


                                }]
                            });
                        }
                    }

                    ///////////////////////////////////////////////////

                }
            });
        });
    });
</script>
