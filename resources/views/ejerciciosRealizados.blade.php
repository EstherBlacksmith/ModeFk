@extends ('layout')
@section('tittle2','ModeFk Ejercicio realizados')



@section('contenido1')
<div class="container">
	<div class="row justify-content-md-center">
		<ul class="list-group">
			@foreach ($ejerciciosRealizados as $ejercicioHecho)
				@foreach($sumaEjercicios as $suma)

				  
				<li class="list-group-item align-items-center">
    			{{ $ejercicioHecho->nombre }}
    			{{ $ejercicioHecho->ejercicio_id }}
    			<span class="badge badge-primary badge-pill">@if($ejercicioHecho->ejercicio_id == $suma['ejercicio_id']  ) {{$suma['total']}} @endif</span>
  				</li> 
				    

<!--  			<li class="list-group-item align-items-center">
    			{{ $ejercicioHecho->nombre }}
    			{{ $ejercicioHecho->ejercicio_id }}
    			<span class="badge badge-primary badge-pill">@if($ejercicioHecho->ejercicio_id == $suma['ejercicio_id']  ) {{$suma['total']}} @endif</span>
  			</li> -->
  				@endforeach
  			@endforeach
		</ul>
	</div>
</div>
@endsection