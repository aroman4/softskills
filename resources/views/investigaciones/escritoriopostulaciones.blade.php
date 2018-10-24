@extends('layouts.plantilla')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(Auth::user()->sexo == "Femenino")
                    <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @else
                    <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Postulaciones Creadas (Pendientes por Aprobación):</b></p>
                    @if(count(\App\Postulacion::all())>0)
                        @foreach(\App\Postulacion::all() as $pos)
                            @if($post->nombre_inv=="pendiente")
                                <div class="solicitud">
                                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                                </div>
                             @endif
                        @endforeach
                    @else
                        <p><b>No hay Solicitudes Pendientes</b></p>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <p><b>Investigaciones Activas:</b></p>
                    @if(count(\App\Investigacion::all())>0)
                        @foreach(\App\Investigacion::all() as $inv)
                            @if(($inv->user_id == Auth::user()->id) && ($inv->estado == "activa"))
                                <div class="investigaciones">
                                    <h3><a href="{{route('moduloinvestigacion.show',['id'=> $inv->id])}}">{{$inv->titulo}}</a></h3>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p><b>No hay asesorías activas</b></p>
                     @endif
                     <a href="{{route('solicinvestigacion')}}" class="btn btn-primary">Crear Solicitud</a>
            </div>
        </div>
    </div>
</div>
@endsection