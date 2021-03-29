@extends ('layout')
@section('tittle2','ModeFk Estados de ánimo')

@section('contenido1')



<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-1">  
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ejercicios ansiedad</button>

			<!--	<a href="{{ route('ansiedad')}}" class="btn btn-primary" >Ansiedad</a> -->
		</div>

		<div class="col col-md-1">
			<a href="{{ route('tristeza')}}" class="btn btn-primary">Tristeza</a>
		</div>

    	<div class="col col-md-1">
			<a href="{{ route('bienestar')}}" class="btn btn-primary">Bienestar</a>	    	
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">A continuación puedes escojer un ejercicio breve para reducir el nivel de ansiedad.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Estos ejercicios reducen el estrés y favorecen la relajación. Pueden ser ejercicios basados en respiraciones, en conjuntos musculares o de otros tipos.
      </div>
      <div class="modal-footer justify-content-md-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Ejercicio1"  data-bs-dismiss="modal">Ejercicio 1</button>
        <button type="button" class="btn btn-primary">Ejercicio 2</button>
        <button type="button" class="btn btn-primary">Ejercicio 3</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Ejercicio1" tabindex="-1" aria-labelledby="Ejercicio" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ejercicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
       Respira 3 veces contando entre respitraciones 3 segundos de inspirar y 3 de expirar
      </div>
 	  <div class="modal-footer justify-content-md-center">
 	  	<a class="btn btn-primary" href="#exampleModal" data-bs-toggle="modal" data-bs-dismiss="modal"  role="button">Volver</a>
      	<button type="button" class="btn btn-primary">Marcar como hecho</button>        
       </div>

   </div>
  </div>
</div>
@stop


