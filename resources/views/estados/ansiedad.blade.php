 @extends('layout')
 

@section('tittle2','ModeFk Ansiedad')

@section('contenido1')
<div class="row">
	<div class="container">
		<div class="row justify-content-md-center">
			<p>A continuación, se proponen ejercicios para eliminar nervios y sentirnos relajados y motivados para enfrentarnos a los retos diarios.
			</p>
			<p>
			ansiedad
			</p>
		</div>
	</div>
</div>
<br>
<br>

@endsection

@section('contenido2')
<br>
<br>
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">'ejercicio1'</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Hacer este ejercicio</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">'ejercicio2'</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Hacer este ejercicio</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">'ejercicio3'</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Hacer este ejercicio</a>
      </div>
    </div>
  </div>
</div>

@endsection

<? php
require_once('footer.blade')
?>