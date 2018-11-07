@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-10 escritorioA">
    <div class="list-group">
    <div class="row">
        <div class="col-md-12 list-group-item text-center top-bar">
            <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
            <h1 style="float:right">Asesorías</h1>
        </div>
    </div>
    <div class="row" style="min-height: 70vh">
        <div class="col-md-6 list-group-item contentAlv">
            <h2 class="escritorioH2 text-center">Asesorías Activas:</h2>
            <ul class="list-group">
                @forelse($asesorias as $ase)
                @if($ase->estado == "activa")
                    @if(((Auth::user()->tipo_usu == "asesor") && ($ase->user_id == Auth::user()->id)) || ((Auth::user()->tipo_usu == "cliente")&&($ase->id_cliente == Auth::user()->id)))
                        <div class="asesoria">
                            <li class="list-group-item listaAsesSolic">
                                <a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a>
                                <small>{{\App\User::find($ase->id_cliente)->nombre .' '. \App\User::find($ase->id_cliente)->apellido}}</small>
                            </li>
                        </div>
                    @endif
                @endif
                @empty
                    <p>No hay asesorías activas</p>                    
                @endforelse                
            </ul>
            {{$asesorias->links()}}
        </div>
        <div class="col-md-6 list-group-item contentAlv1">
            <h2 class="escritorioH2 text-center">Asesorías Finalizadas:</h2>
            <ul class="list-group">
                @forelse($asesorias as $ase)
                    @if($ase->estado == "finalizada")
                        @if(((Auth::user()->tipo_usu == "asesor") && ($ase->user_id == Auth::user()->id)) || ((Auth::user()->tipo_usu == "cliente")&&($ase->id_cliente == Auth::user()->id)))
                            <div class="asesoria">
                                <li class="list-group-item listaAsesSolic">
                                    <a href="{{route('moduloasesoria.show',['id'=> $ase->id])}}">{{$ase->titulo}}</a>
                                    <small>{{\App\User::find($ase->id_cliente)->nombre .' '. \App\User::find($ase->id_cliente)->apellido}}</small>
                                </li>
                            </div>
                        @endif
                    @endif           
                @empty
                    <li class="list-group-item">No hay asesorías finalizadas</li>
                @endforelse            
            </ul>
            {{$asesorias->links()}}
        </div>
    </div>
    </div>
</div>
@endsection