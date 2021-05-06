@extends ('layout')
@section('tittle2','Ejercicios realizados')

@section('contenido1')

<div class="container" >
  <div class="col-5" >
  	<div class="row justify-content-md-center" >
  		<ul class="list-group" >

  			@foreach ($ejerciciosRealizados as $ejercicioHecho)				  
  				<li class="list-group-item align-items-center verde" >
      			<h3 style="font-weight: bold; ">{{ $ejercicioHecho->nombre }}</h3>
            Realizado un total de <span class="badge badge-info verdeClaro"> {{ $ejercicioHecho->total }} </span>  veces        
    		 
            @foreach($ejercicioEstados as $ejerEstado)
              @if($ejerEstado = $ejercicioHecho->ejercicio_id)
              @if($loop->first)
               <h4 class="text-white"> {{$ejercicioEstados[$ejerEstado ]}}</h4>
                @endif
              @endif
            @endforeach
           </li>
      	@endforeach
        
  		</ul>   
  	</div>
  </div>
</div>
@endsection