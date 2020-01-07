<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutorias</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/highcharts.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('css/all.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>
@section('header')
@include('partials.head')
@show
<body>
    <div id="app" class="p-4">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Tutorias
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @if (Session::has('cuenta'))
                            <li class="nav-item">
                                    <a class="nav-link" href="panel">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Session::get('nombre') }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                {{-- <a class="nav-link btn" href="Alumno" onclick="document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                    <form id="logout-form" action="cerrar" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
                            @else


                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                    </li>
                                @endif
                            @else
                            @if (Session::get('jefe'))
                                <li class="nav-item">
                                    <a class="nav-link" href="jefevista">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="asignacovista">Asigna Coordinador</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="asignatuvista">Asigna Tutor</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="alumnos">Alumnos</a>
                                </li>
                            @endif
                            @if (Auth::user()->tipo_usuario ==2 && !Session::get('jefe'))
                                <li class="nav-item">
                                    <a class="nav-link" href="tutorvista">Inicio</a>
                                </li>
                                @if (Session::get('coordinador'))
                                <li class="nav-item">
                                        <a class="nav-link" href="graficasCoordinador">Estadisticas Coordinador</a>
                                    </li>
                                @endif
                            @endif
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->email }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">

                    @yield('content')
                </div>
            </main>
        </div>
</body>
    @section('footer')
    @include('partials.footer')
    @show

</html>
