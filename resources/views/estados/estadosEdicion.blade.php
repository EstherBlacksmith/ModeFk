@extends ('layout')
@section('tittle2','Edición estados de ánimo')

@section('contenido1')
<script type="text/javascript">
  $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<!-- Botones Estados -->
<div class="container">
	<div class="row ">
    <div class="col ">  
        <table class="table  table-striped " >
          <thead >
            <tr>
              <th scope="col">Estado</th>
              <th scope="col">Descripción</th>
              <th scope="col" style="width: 5%;">Editar Estado</th>
              <th scope="col" style="width: 5%;">Añadir ejercicio</th>
              <th scope="col" style="width: 5%;">Quitar ejercicio</th>
              <th scope="col" style="width: 5%;">Eliminar Estado</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($estados as $estado)
            <td style="font-weight: bold; " > {{ $estado->nombre }}</td>
              <td > {{ $estado->descripcion }}</td>
              <td> <a href="{{route ('editar',$estado->id)}}" class="btn btn-lg"><i class="fas fa-edit" style="  color:RoyalBlue;font-size: 1em;"></i></a></td>

              <td> <a href="{{route ('ejercicioCrear',$estado->id)}}" class="btn btn-lg"><i class="fas fa-plus-square" style="color: ForestGreen ;font-size: 1em;"></i></a></td>

              <td> <a href="{{route ('ejerciciosQuitar',$estado->id)}}" class="btn btn-lg"><i class="fas fa-minus-circle" style="color: orange ;font-size: 1em;"></i></a></td>

              <td> <button type="button" class="btn btn-lg" data-bs-toggle="modal"  data-bs-target="#es-{{ $estado->id }}" data-bs-dismiss="modal">
                    <i class="fas fa-trash-alt" style=" color: Tomato;font-size: 1em;"></i>
                  </button></td>

                  <!-- Modal -->
                  <div class="modal fade" id="es-{{ $estado->id }}" tabindex="-1" aria-labelledby="{{ $estado->nombre }}" aria-hidden="true" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="{{ $estado->nombre }}">Eliminar</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Se va a eliminar el estado <p class="text-danger">{{ $estado->nombre }}</p>
                        </div> 
                        <div class="modal-footer">
                           <form method="post" action="{{route ('estadosEliminar')}}">
                            @csrf
                            <input type="hidden" name="estado_id" id="estado_id" value="{{$estado->id}}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn  btn-danger">Eliminar</button>
                        </form>
                        </div>   
                      </div>
                    </div>
                  </div>

            </tr>
            @endforeach 
          </tbody>       

        </table>
    
        <div class="card mar">
             <div class="card-header text-white" style="background-color: CadetBlue !important;">Añadir Estado</div>
          <div class="card-body">
        
            <h6 class="card-subtitle mb-2 text-muted">Crea un nuevo estado de ánimo</h6>
            <form method="post" action=" {{ route('estadoCrearStore')}} ">
              @csrf
              <div class="form-group">                
                <input class="form-control" type="text" name="nombreEstado" id="nombreEstado" placeholder="Nombre del estado">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="descripcionEstado" id="descripcionEstado"  placeholder="Descripción del estado" rows="3"></textarea>
              </div>
                <button class="btn text-white" type="submit" style="background-color: DarkOrange;">Crear</button>

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
  </div>
</div>
		
@endsection


