@extends ('layout')
@section('tittle2','ModeFk Edición estados de ánimo')

@section('contenido1')


 <div class="row">
    <div class="col-5">   

		<form method="post" action="">
			@csrf
		  <div class="form-group">
		    <label for="nombreEstado">Nombre</label>
		    <input type="text" class="form-control" id="nombreEstado" name="nombreEstado" placeholder="Nombre del estado de ánimo" >{{ $estado->nombre}}
		  </div>	 
		  
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Descripción de estado de ánimo</label>
		    <textarea class="form-control" id="descripcionEstado" name="descripcionEstado" rows="3" >{{$estado->descripcion}}</textarea>
		  </div>
		</form>
		<button type="submit" class="btn btn-outline-info">Editar</button>
	</div>
</div>
@stop