@extends ('layout')
@section('tittle2','Ejercicios realizados')

@section('contenido1')

<div class="container" >
  <div class="col-5" >
  	<div class="row justify-content-md-center" >
  		<ul class="list-group" >
  			@foreach ($ejerciciosRealizados as $ejercicioHecho)				  
  				<li class="list-group-item align-items-center verde" >
      			<h4 style="font-weight: bold; ">{{ $ejercicioHecho->nombre }}</h4>
            Realizado un total de <span class="badge badge-info verdeClaro"> {{ $ejercicioHecho->total }} </span>  veces        
    			</li> 
          @foreach($ejercicioEstados as $ejerEstado)
            @if($ejerEstado->id = $ejercicioHecho->ejercicio_id)
              {{$ejerEstado->nombre}}
            @endif
          @endforeach
    		@endforeach
  		</ul>
  	</div>
  </div>
</div>
@endsection