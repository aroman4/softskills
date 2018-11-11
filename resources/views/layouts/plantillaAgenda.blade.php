<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@include('header')

@include('inc.mensajes')
{{-- @include('layouts.barralateralasesoria') --}}

<div class="row filaEscritorio column">
        <div class="col-md-2 barraLateralEscritorio">
            <ul class="list-group list-group-flush  column">
                <li class="list-group-item">{{Auth::user()->nombre ." ". Auth::user()->apellido}}</li>
                @if(auth()->user()->tipo_usu == "asesor")
                    <li class="list-group-item {{ request()->is('escritorioasesor') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritorioasesor')}}"><i class="fas fa-tachometer-alt"></i> Escritorio</a></li>
                @elseif(auth()->user()->tipo_usu == "cliente")
                    <li class="list-group-item {{ request()->is('escritoriocliente') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritoriocliente')}}"><i class="fas fa-tachometer-alt"></i> Escritorio</a></li>
                @endif
                <li class="list-group-item {{ request()->is('asesescritorio') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('asesescritorio')}}"><i class="fas fa-handshake"></i> Asesorías</a></li>
                <li class="list-group-item {{ request()->is('solicitud.index') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('solicitud.index')}}"><i class="far fa-bell"></i> Solicitudes</a></li>
                <li class="list-group-item {{ request()->is('reportedetalle') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('reporteshome')}}"><i class="fas fa-chart-pie"></i> Reportes</a></li>
                <li class="list-group-item {{ request()->is('cuestionario.home') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('cuestionario.home')}}"><i class="fas fa-file-signature"></i> Instrumentos</a></li>
                <li class="list-group-item {{ request()->is('agenda') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('agenda')}}"><i class="fas fa-calendar-alt"></i> Agenda</a></li>
                <li class="list-group-item {{ request()->is('bancoclientes') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('bancoclientes')}}"><i class="fas fa-address-book"></i> Banco de clientes</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
    <button onclick="topFunction()" id="myBtn" title="Ir arriba"><i class="fas fa-arrow-up"></i></button>
{{-- @include('footer') --}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
{{-- <script src="{{ asset('js/fullcalendar/es.js') }}"></script> --}}
{!! $calendar->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>
{{-- <script>
    var height=$('body').height(); // Calculate primary wrapper height
    $('.barraLateralEscritorio').height(height); // Set the height it to sidebar
    </script> --}}
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>