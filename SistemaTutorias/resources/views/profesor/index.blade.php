@extends('layouts.app')
@section('content')
<div class="container" id="ind">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Tutorados
                    <a href="{{route('pdf_lista')}}" target="_blank" class="btn btn-danger text-white float-right"> <i class="fas fa-file-pdf"></i></a>
                </div>
                <div class="card-body row" >
                    <table class="table table-bordered table-sm">
                        <thead class="bg-secondary text-center">
                            <tr class="text-white">
                                <th>Cuenta</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                <th>Expendiente</th>
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
    </div>

</div>
<script>
    new Vue({
        el:"#ind",
        created:function(){
            this.getDatos();
        },
        data:{
            rut:"/profesor",
            act:'/UpdateA',
            datos:[],
            vista:[],
        },
        methods:{
            getDatos:function () {
                axios.get(this.rut).then(response=>{
                    this.datos=response.data;
                }).catch(error=>{ });
            },
            cambio:function (alumno,num) {
                axios.post(this.rut,{id_asigna_alumno:alumno.id_asigna_alumno,estado:num}).then(response=>{
                    this.getDatos();
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

<script src="{{asset('js/jquery.js')}}"></script>

<script>
    /*$(document).ready(function(){
        getAll();
        $('#content-info').on('click','a.expEdit',function(){
            var id_alumno = $(this).data('id');
                $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                url: "/setAlumnId",
                method: "GET",
                dataType: 'json',
                data:{'id_alumno':id_alumno},
                success: function(res)
                {
                    alert(res);
                }
            })
        });
            //alert(id_alumno);

        $('#content-info').on('click','a.bT',function(){
            var id=$(this).data('id');
            var estado=$(this).data('estado');
            getDatos(id,estado);
            //getAll();
            //$('#modal-act').modal("show");
            //alert(estado);
        }
        );
        $('#content-info').on('click','a.bD',function(){
            var id=$(this).data('id');
            var estado=$(this).data('estado');
            getDatos(id,estado);
            //getAll();
            //$('#modal-tuto-act').modal("show");
            //alert(estado);

        }
        );
        $('#content-info').on('click','a.al',function(){
            var id=$(this).data('id');
            var estado=$(this).data('estado');
            getDatos(id,estado);
            //getAll();
            //$('#modal-tuto-act').modal("show");
            //alert(estado);
        }
        );
    });

   */
</script>
