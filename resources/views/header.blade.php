<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}"  />

    <script src="main.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg menu-estilo-navegacion">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto menu-estilo-principal">
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Softskills</a></li>
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Quienes Somos</a></li>
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Servicios</a></li>
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Staff</a></li>
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Bibliografía</a></li>
                    <li class="nav-item menu-estilo"><a class="menu nav-link" href="#"> Contactos</a></li>
                
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item menu-estilo">
                            <a class="menu nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        <li class="nav-item menu-estilo">
                            <a class="menu nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown menu-estilo">
                            <a id="navbarDropdown" class="menu nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
   <!-- <main role= "main" class="container">-->
 
        