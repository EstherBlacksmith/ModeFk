@extends ('layout')

@section('tittle2','ModeFk Edición estados de ánimo')

@section('contenido1')


 <div class="row">
    <div class="col-5">   
		<div class="card" style="background-color: AntiqueWhite;">
			<form method="post" action="{{ route('estadoEditarStore') }}">
				@csrf
			  	<div class="form-group">
				    <label for="nombreEstado">Nombre</label>		    
				    <input type="text" class="form-control" id="nombreEstado" name="nombreEstado" placeholder="Nombre del estado de ánimo" value=" {{ $estado->nombre}}">
			  	</div>	 
			  
			  	<div class="form-group">
				    <label for="exampleFormControlTextarea1">Descripción de estado de ánimo</label>
				    <textarea class="form-control" id="descripcionEstado" name="descripcionEstado" rows="3" >{{$estado->descripcion}}</textarea>
			  	</div>
				<input type="hidden" name="idEstado" value="{{$estado->id}}">
				<button type="submit" class="btn btn-outline-info">Editar</button>
			</form>
				
	
			@if ($errors->any())
		        <div class="alert alert-danger">
		            <ul>
		                @foreach ($errors->all() as $error)
		                    <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
	        @endif
    	</div>
	</div>
</div>
@stop