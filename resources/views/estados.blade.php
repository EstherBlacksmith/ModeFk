@extends ('layout')
@section('tittle2','ModeFk Estados de ánimo')

@section('contenido1')

<!-- Botones Estados -->
<div class="container">
	<div class="row justify-content-md-center">
		@foreach ($estados as $estado)
		<div class="col col-md-1">  				
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#es-{{ $estado->id }}">Ejercicios {{ $estado->nombre }} </button>
		</div>
		@endforeach
	</div>
</div>

<!-- Modal 1-->
@foreach ($estados as $estado)
<div class="modal fade" id="es-{{ $estado->id }}" tabindex="-1" aria-labelledby="{{ $estado->nombre }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $estado->nombre }}">A continuación puedes escojer un ejercicio breve para reducir el nivel de {{ $estado->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Estos ejercicios reducen el estrés y favorecen la relajación. Pueden ser ejercicios basados en respiraciones, en conjuntos musculares o de otros tipos.
      </div>

      <div class="modal-footer justify-content-md-center">
      		@foreach($ejercicios as $ejercicio)
      			@if  ($ejercicio->estados_id == $estado->id )	      			
        			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ej-{{ $ejercicio->id }}"  data-bs-dismiss="modal">{{ $ejercicio->nombre }}</button>
    			@endif
			@endforeach
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal 2 
  'estados','ejercicios','ejerciciosRealizados','sumaEjercicios'-->
@foreach($ejercicios as $ejercicio)
  
<div class="modal fade" id="ej-{{ $ejercicio->id }}" tabindex="-1" aria-labelledby="{{ $ejercicio->nombre}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $ejercicio->id }}"> {{ $ejercicio->nombre }} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
     	{{ $ejercicio->descripcion }}
      </div>

 	  <div class="modal-footer justify-content-md-center">
 	  	<a class="btn btn-primary" href="#es-{{ $ejercicio->estados_id }}" data-bs-toggle="modal" data-bs-dismiss="modal" role="button">Volver</a>

        <form method="POST" action="{{ route('marcaHecho') }}">
          @csrf
          <input type="hidden" name="fk_ejercicio_id" id="fk_ejercicio_id" value="{{ $ejercicio->id }}">
          <input type="hidden" name="fk_user_id" id="fk_user_id" value="{{ $ejercicio->estados_id }}">
          @foreach($ejercicioSinRealizar as $pendiente)           
            @if($loop->first)
              @if($pendiente->ejercicio_id == $ejercicio->id)
                   <button  class=" disabled btn btn-success">Ejercicio realizado hoy</button>               
              @endif
              @endif

          @endforeach
          <button type="submit"  class="btn btn-primary">Marcar como hecho</button> 
        </form>

       </div>
   </div>
  </div>
</div>

@endforeach

@stop


