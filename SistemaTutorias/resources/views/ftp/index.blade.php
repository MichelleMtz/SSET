@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="/ftp/Up" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5>Seleccciona un archivo</h5>
                        <input type="file" name="archivo" id="archivo">
                        <button type="submit" class="btn btn-info">Aceptar</button>
                    </form>
                </div>

                <div class="card-body">
                    @foreach ($listing as $item)
                        <p>{{$item}}</p>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function(){

    });
</script>
