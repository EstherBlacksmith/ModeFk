@extends ('layout')

@section('tittle2','Edición estados de ánimo')

@section('contenido1')

<div class="container">
	<form method="post" action="{{ route('estadoEditarStore') }}">
		@csrf
	  	<div class="form-group">
		    <label for="nombreEstado">Nombre</label>		    
		    <input type="text" class="form-control" id="nombreEstado" name="nombreEstado" placeholder="Nombre del estado de ánimo" value=" {{ $estado->nombre}}">
	  	</div>	 
	  
	  	<div class="form-group">
		    <label for="descripcionEstado">Descripción de estado de ánimo</label>
		    <textarea class="form-control" id="descripcionEstado" name="descripcionEstado" rows="3" >{{$estado->descripcion}}</textarea>
	  	</div>
		<input type="hidden" name="idEstado" value="{{$estado->id}}">
		<button type="submit" class="btn btn-primary">Editar</button>
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


@endsection

