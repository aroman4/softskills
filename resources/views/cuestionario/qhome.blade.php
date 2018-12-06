@extends('layouts.plantillaQ')

@section('content')
    <div class="col-md-9 listaQuest">
        <ul class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">
                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                    @if(auth()->user()->tipo_usu == "asesor")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios y rúbricas creados</h2>
                    @elseif(auth()->user()->tipo_usu == "cliente")
                        <h2 class="Titulo" style="float:right;"> Cuestionarios y rúbricas recibidos</h2>
                    @endif
                    {{-- <a href="{{route('cuestionario.nuevo') }}">Crear</a> --}}
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12 list-group-item" style="background:black; color: darkgray">
            @if(auth()->user()->tipo_usu == "asesor")                
                <small style="font-style: italic; float:right">Para crear un nuevo cuestionario o rúbrica, debe hacerlo desde una asesoría activa   <a href="{{route('asesescritorio')}}" class="btn btn-dark" >Ir a asesorías</a></small>         
            @else
                <small style="font-style: italic; float:right">Seleccione el título para responder o tambien puede enviar el Enlace público a quien desee</small>
            @endif
                </div>
            </div>
            <div class="row" style="min-height: 70vh">
                <div class="col-md-6 list-group-item contentAlv">
                    <h2>Cuestionarios:</h2>
                    <ul class="list-group">
                        @forelse ($cuestionarios as $cuestionario)
                            @if(auth()->user()->id == $cuestionario->user_id)                            
                                <li class="list-group-item listaAsesSolic">
                                    <div>
                                        <a href="{{route('cuestionario.detalle', $cuestionario->id)}}" style="float:left">{{$cuestionario->titulo}}</a>
                                        <div class="text-right">
                                            <a href="{{route('cuestionario.detalle', $cuestionario->id) }}" title="Editar cuestionario" ><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('cuestionario.respuestas', $cuestionario->id) }}" title="Ver respuestas del cuestionario"><i class="fas fa-chart-pie"></i></a>     
                                            <a href="{{route('cuestionario.delete', $cuestionario->id) }}" title="Eliminar cuestionario"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                        <p>Enlace público: <a style="font-size:10px;" href="{{route('cuestionariopublico', $cuestionario->id) }}" title="Enlace público:">{{route('cuestionariopublico', $cuestionario->id) }}</a></p>
                                    </div>
                                    @if($cuestionario->respondido == false)
                                        <span style="color:black">No respondido</span>
                                    @else
                                        <span style="color:black">Respondido</span>
                                    @endif
                                    <p>{{$cuestionario->created_at}}</p>
                                </li>                                                                                
                            @elseif(auth()->user()->id == $cuestionario->cliente_id && $cuestionario->enviar)
                                <li class="list-group-item listaAsesSolic">
                                    <a href="{{route('cuestionario.ver', $cuestionario->id) }}" title="Responder cuestionario" class="secondary-content">{{$cuestionario->titulo}}</a>  
                                    <p>Enlace público: <a style="font-size:10px;" href="{{route('cuestionariopublico', $cuestionario->id) }}" title="Enlace público:">{{route('cuestionariopublico', $cuestionario->id) }}</a></p>
                                    <p>{{$cuestionario->created_at}}</p>
                                </li>
                            @endif
                        @empty
                        <div class="list-group-item contentAlv">
                            <p class="flow-text center-align">No hay cuestionarios creados</p>
                        </div>
                        @endforelse
                    </ul> 
                </div>    
                {{-- rubricas --}}
                <div class="col-md-6 list-group-item contentAlv1">
                    <h2>Rúbricas:</h2>
                    <ul class="list-group">
                        @forelse (\App\Rubrica::all() as $rubrica)
                            @if(auth()->user()->id == $rubrica->user_id)                 
                                <li class="list-group-item listaAsesSolic">
                                    <div>
                                        <a href="{{route('rubrica.ver', $rubrica->id)}}" style="float:left">{{$rubrica->titulo}}</a>
                                        <div class="text-right">
                                            <a href="{{route('rubrica.detalle', $rubrica->id) }}" title="Editar rúbrica"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('rubrica.respuesta', $rubrica->id) }}" title="Ver respuesta de rúbrica"><i class="fas fa-chart-pie"></i></a>                                    
                                            <a href="{{route('rubrica.responder', $rubrica->id) }}" title="Responder rúbrica"><i class="fab fa-wpforms"></i></a>                                    
                                            <a href="{{route('rubrica.eliminar', $rubrica->id) }}" title="Eliminar rúbrica"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @if($rubrica->respondidoc == false)
                                        <p style="color:black">No respondido</p>
                                    @else
                                        <p style="color:black">Respondido</p>
                                    @endif
                                    <p>{{$rubrica->created_at}}</p>
                                </li>                                   
                            @elseif(auth()->user()->id == $rubrica->cliente_id && $rubrica->respondidoc == false && $rubrica->enviar)
                                <li class="list-group-item listaAsesSolic">
                                    <a href="{{route('rubrica.responder', $rubrica->id) }}" title="Responder rubrica" class="secondary-content">{{$rubrica->titulo}}</a>  
                                    <p>{{$rubrica->created_at}}</p>
                                </li>
                            @endif
                        @empty
                        <div class="list-group-item contentAlv1">
                            <p class="flow-text center-align">No hay rúbricas creadas</p>
                        </div>
                        @endforelse  
                    </ul> 
                </div>        
            </div>
        </ul>
    </div>
@endsection