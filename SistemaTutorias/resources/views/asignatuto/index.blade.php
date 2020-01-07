@extends('layouts.app')
@section('content')
    <div class="container" id="principaltutor">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                                Asigna Tutor
                        </div>
                        <div class="offset-3 col-1">
                            <button class="btn btn-outline-success" v-if="selected!=null" v-on:click.prevent="abrir()">+</button>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-6 text-center">
                                <h5>Selecciona el periodo</h5>
                                <select name="periodo" id="periodo" class="form-control" v-model="selected">
                                    <option value="">Selecciona el periodo</option>
                                    <option  v-bind:value="periodo.id_periodo" v-for="periodo in datos.periodos">@{{ periodo.periodo }}</option>
                                </select>
                            </div>
                        </div>
                        <div id="" class="row pt-4" v-if="valida">
                            <div class="offset-3 col-6">
                                <h5 class="text-center">Asignacion realizada</h5>
                            </div>
                            <br>
                            <div class=" offset-md-2 col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Tutor</th>
                                        <th>Grupo</th>
                                    </thead>
                                    <tbody id="datostut">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div>
                            <div id="form_asig">
                                <div class="row offset-md-4">
                                    <button id="btnGuardar" @click="guardar()" class="btn btn-outline-success btn-lg m-2">Aceptar</button>
                                    <button id="btnCancelar" @click="cancel()" class="btn btn-outline-danger btn-lg m-2">Cancelar</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        @include('asignatuto.add');

    </div>

    <script>
        new Vue({
            el:"#principaltutor",
            created:function(){
                this.getDatos();
                $('#btnAsigCoo').hide();
                $('#btnGuardar').hide();
                $('#btnCancelar').hide();

            },
            data:{
                tut:"{{url("/asignatutores")}}",
                datos:[],
                selected:null,
                grup:null,
                gen:null,
                idgene:null,
                conG:false,
                conP:false,
                nameP:"",
                idP:"",
                cat:"",
                code:"",
                dat:"",
                valida:false,
                generaciong:"",
            },
            methods:{
                getDatos:function () {
                    axios.get(this.tut).then(response=>{
                        this.datos=response.data;
                    }).catch(error=>{ });
                },
                abrir:function () {
                    $('#add').modal('show');
                },
                funclick:function (profesor) {
                    this.nameP= profesor.nombre;
                    this.idP= profesor.id_personal;
                    $('#btnAsigCoo').show();
                },
                borrar:function () {
                    $('#valG').html('');
                    $('#valP').html('');
                    $('#btnAsigCoo').hide();
                    this.nameP="";
                },
                generaciones:function (genera) {
                    this.grup=genera.grupo;
                    this.gen=genera.generacion;
                    this.idgene=genera.id_asigna_generacion;

                    //$('#valG').html('<th data-id="'+this.idgene+'" id="asig" scope="row">'+this.gen+' grupo: '+this.grup+'</th>');

                    this.generaciong=this.gen+" grupo: "+this.grup;
                    this.conG=true;
                    if (this.conP && this.conG) {
                        $('#btnAsigCoo').show();
                        this.conP=false;
                        this.conG=false;
                    }
                },
                profesores:function (profesor) {
                    this.nameP=profesor.nombre;
                    this.idP=profesor.id_personal;
                    this.conP=true;
                },
                addprev:function () {
                    //alert();

                    $('#'+this.idgene).toggle();
                    this.cat+=this.idP+","+this.idgene+",";
                    this.code+="<tr><th>"+this.nameP+"</th><th>"+this.gen+" grupo: "+this.grup+"</th></tr>";

                    $('#datostut').html(this.code);

                    $('#btnGuardar').show();
                    $('#btnCancelar').show();
                    //$('#prof'+idP).fadeOut();
                    $('#btnAsigCoo').hide();
                    this.nameP="";
                    this.generaciong="";
                    this.dat=this.cat;
                    this.valida=true;
                    //$('#arr').val(this.cat);
                },
                guardar:function () {
                    axios.post(this.tut,{da:this.dat}).then(response=>{
                        this.valida=false;
                        $('#btnGuardar').hide();
                        $('#btnCancelar').hide();
                    });
                },
                cancel:function () {
                  this.dat="";
                    $('#datostut').html("");
                    $('#btnGuardar').hide();
                    $('#btnCancelar').hide();
                    //$('#prof'+idP).fadeOut();
                    $('#btnAsigCoo').hide();
                    $('#valP').html('');
                    $('#valG').html('');
                }

            },
        });
    </script>
@endsection
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
<script src="{{asset('js/jquery.js')}}"></script>
