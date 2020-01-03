@section('header')

    <header id="header" class="header-responsive " >

        <div  class="colorheader offset-sm-1 col-12 card "  >
             <link rel="stylesheet" href="{{ asset ('assets/css/estilos.css') }}">

            <div class="row">
                <div class="col-2 col-md-1">
                    <label href="{{ asset ('assets/img/gem.png') }}" target="_blank"><img id="logo1" src="{{ asset ('assets/img/gem.png') }}" /></label>
                </div>
                <div class="col-2 col-md-1">
                    <label  href="{{ asset ('img/logos/EdoMEXvertical.png') }}" target="_blank"><img id="logo2" src="{{ asset ('img/logos/EdoMEXvertical.png') }}" /></label>
                </div>

                <div class="col-5 col-md-8 lineas text-center">
                  Portal del Tecnológico de Estudios Superiores de Valle de Bravo
                </div>

                <div class="col-3 col-md-2">
                  <label  href="{{ asset ('assets/img/tes.png') }}" target="_blank"><img id="logo3" src="{{ asset ('assets/img/tes.png') }}" /></label>
                </div>
            </div>


        </div>
    </header>
 <script type="text/javascript">
         $(document).ready(function(){
    });
 </script>
 @endsection
