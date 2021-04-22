@extends ('layout')
@section('tittle2','ModeFk Edición estados de ánimo')

@section('contenido1')

<!-- Botones Estados -->
<div class="container">
	<div class="row ">
    <div class="col ">  
      <div class="row">		
        <table class="table  table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Estado</th>
              <th scope="col">Descripción</th>
              <th scope="col">Editar Estado</th>
              <th scope="col">Añadir ejercicio</th>
              <th scope="col">Eliminar Estado</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($estados as $estado)
            <td style="font-weight: bold;" > {{ $estado->nombre }}</td>
              <td > {{ $estado->descripcion }}</td>
              <td> <a href="{{route ('editar',$estado->id)}}" class="btn btn-lg"><i class="fas fa-edit " style="  color:RoyalBlue;font-size: 2em;"></i></a></td>
              <td> <a href="{{route ('ejerciciosEdicion')}}" class="btn btn-lg"><i class="fas fa-plus-square" style="color: ForestGreen ;font-size: 2em;"></i></a></td>
              <td> <a href="{{route ('ejerciciosEdicion')}}" class="btn  btn-lg"><i class="fas fa-trash-alt" style=" color: Tomato;font-size: 2em;"></i></a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Añadir Estado</h5>
            <h6 class="card-subtitle mb-2 text-muted">Crea un nuevo estado de ánimo</h6>
            <form method="post" action="">
              <div class="form-group">
                <input type="text" name="nombreEstado" id="nombreEstado" placeholder="Nombre del estado">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="descripcionEstado" id="descripcionEstado"  placeholder="Descripción del estado" rows="3"></textarea>
              </div>
            </form>
           
            <a href="#" class="card-link">Card link</a> 
          </div>
        </div>

      </div>  
    </div>
  </div>
</div>
		
@stop


