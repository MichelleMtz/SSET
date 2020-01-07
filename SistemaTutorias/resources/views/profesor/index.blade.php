@extends('layouts.app')
@section('content')
<div class="container" id="ind">
    <div class="row" v-show="menugrupos==true">
        <div class="col-12">
            <div class="row">
                <div class="col-3" v-for="grupo in grupos">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold"> @{{ grupo.nombre }}</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Generación @{{ grupo.generacion }}</h5>
                            <p class="card-text">Grupo @{{ grupo.grupo }}</p>
                            <a href="#" @click="getlista(grupo)" class="btn btn-outline-primary">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-show="menu==true">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body" v-show="lista==true" >
                    <div class="row">
                        <div class="col-12">
                            <div class="row pb-2">
                                <div class="col-11"></div>
                                <div class="col-1"><a href="#!"  class="btn text-white btn-danger" ><i class="fas fa-file-pdf"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-sm">
                                <thead class=" text-center" >
                                <tr class="">
                                    <th>Cuenta</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                    <th>Expediente</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                <tr v-for="alumno in datos">
                                    <td class="text-center font-weight-bold" v-bind:class="[alumno.estado==2 ? 'bg-warning' : alumno.estado==3 ? 'bg-danger':'']">@{{ alumno.cuenta }}</td>
                                    <td class="">@{{ alumno.apaterno }} @{{ alumno.amaterno }} @{{ alumno.nombre }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-success" @click="cambio(alumno,1)">N</button>
                                        <button class="btn btn-outline-warning m-1" @click="cambio(alumno,2)">T</button>
                                        <button class="btn btn-outline-danger m-1" @click="cambio(alumno,3)">B</button>
                                    </td>
                                    <td class="text-center"><button class="btn btn-outline-primary" @click="ver(alumno)">E</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" v-show="graficas==true">
                    <div class="col-12">
                        <div class="row pt-3">
                            <div class="col-11"></div>
                            <div class="col-1"><a href="#!"  class="btn text-white btn-danger" ><i class="fas fa-file-pdf"></i></a></div>
                        </div>
                        <div class="row m-2"><div class="col-12 "><h5 class="alert alert-primary text-center">Estadísticas</h5></div></div>
                        <div class="row text-center"><div class="col-4"></div><div class="col-4 graf" id="genero"></div></div>
                        <div class="row pl-4">
                            <div class="col-12 pt-4">
                                <div class="nav  nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">Datos Generales</a>
                                    <a class="nav-link" id="v-pills-antecedentes-tab" data-toggle="pill" href="#v-pills-antecedentes" role="tab" aria-controls="v-pills-antecedentes" aria-selected="false">Antecedentes Acádemicos</a>
                                    <a class="nav-link" id="v-pills-familiares-tab" data-toggle="pill" href="#v-pills-familiares" role="tab" aria-controls="v-pills-familiares" aria-selected="false">Datos Familiares</a>
                                    <a class="nav-link" id="v-pills-habitos-tab" data-toggle="pill" href="#v-pills-habitos" role="tab" aria-controls="v-pills-habitos" aria-selected="false">Hábitos de Estudio</a>
                                    <a class="nav-link" id="v-pills-formacion-tab" data-toggle="pill" href="#v-pills-formacion" role="tab" aria-controls="v-pills-formacion" aria-selected="false">Formación Integral/Salud</a>
                                    <a class="nav-link" id="v-pills-area-tab" data-toggle="pill" href="#v-pills-area" role="tab" aria-controls="v-pills-area" aria-selected="false">Área Psicopedagógica</a>
                                </div>
                            </div>
                        </div>
                        <div class="row" id='cont-preg'>
                            <div class="col-12">
                                <div class="tab-content text-justify" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                        <div class="row pt-4">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 graf" id="estadoc"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-antecedentes" role="tabpanel" aria-labelledby="v-pills-antecedentes-tab">

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-familiares" role="tabpanel" aria-labelledby="v-pills-familiares-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-habitos" role="tabpanel" aria-labelledby="v-pills-habitos-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-formacion" role="tabpanel" aria-labelledby="v-pills-formacion-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    new Vue({
        el:"#ind",
        created:function(){
            this.lista=false;
            this.menugrupos=true;
            this.graficas=false;
            this.menu=false;
            this.getTut();
        },
        data:{
            rut:"/profesor",
            grup:"/grupos",
            act:'/UpdateA',
            cambios:'/cambio',
            estadociv:'graphics/estadocivil',
            rutgen:"/graphics/genero",
            datos:[],
            grupos:[],
            alumnog:[],
            ec:[],
            vista:[],
            lista:false,
            menugrupos:true,
            menu:false,
            graficas:false,
            carrera:"",
            gen:"",
            idca:null,
            idasigna:null,
        },
        methods:{
            getTut:function(){
                axios.get(this.grup).then(response=>{
                    this.grupos=response.data;
                }).catch(error=>{ });
            },
            getlista:function (grupo) {

                this.idca=grupo.id_carrera;
                this.idasigna=grupo.id_asigna_generacion;
                this.carrera=grupo.nombre;
                this.gen=" GENERACIÓN "+grupo.generacion+" GRUPO "+grupo.grupo;
                this.getAlumnos();
            },
            getAlumnos:function()
            {
                axios.post(this.rut,{id_asigna_generacion:this.idasigna,id_carrera:this.idca}).then(response=>{
                    this.menugrupos=false;
                    this.menu=true;
                    this.lista=true;
                    this.graficas=false;
                    this.datos=response.data;

                }).catch(error=>{ });
            },
            graficagenero:function()
            {
                this.lista=false;
                this.menugrupos=false;
                this.graficas=true;
                axios.post(this.rutgen,{id_carrera:this.idca}).then(response=>{
                    this.alumnog=response.data;
                    Highcharts.chart('genero', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Alumnos por género'
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Total'
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
                            data: [{
                                name: 'Mujeres',
                                y: this.alumnog.mujeres[0].mujeres,

                            }, {
                                name: 'Hombres',
                                y: this.alumnog.hombres[0].hombres,
                            }]
                        }]
                    });
                }).catch(error=>{ });
                axios.post(this.estadociv,{id_carrera:this.idca}).then(response=>{
                    this.ec=response.data;
                    Highcharts.chart('estadoc', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Estado civil'
                        },
                        xAxis: {
                            categories:this.ec.nombre,
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Total'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Estado civil',
                            data: this.ec.cantidad,
                        }]
                    });
                }).catch(error=>{ });
            },
            cambio:function (alumno,num) {
                axios.post(this.cambios,{id_asigna_alumno:alumno.id_asigna_alumno,estado:num}).then(response=>{
                    this.getAlumnos();
                });
            },
            ver:function (alumno) {
                axios.post(this.act,{id_alumno:alumno.id_alumno}).then(response=>{

                });
            }
        },

    });
</script>

@endsection

