@extends ('layout')
@section('tittle2','Edición ejercicios')

@section('contenido1')
<div class="container">
  <div class="row">
    <div class="col-7w">
          <div class="card mar">
            <div class="card-body">
              <h5 class="card-title">Añadir Ejercicio</h5>
              <h6 class="card-subtitle mb-2 text-muted">Crea un nuevo ejercicio para el estado </h6>
              <form method="post" action=" {{ route('ejercicioCrearStore')}} ">
                <div class="form-group">
                  @csrf
                  <input class="form-control" type="text" name="nombreEstado" id="nombreEstado" placeholder="Nombre del estado">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="descripcionEstado" id="descripcionEstado"  placeholder="Descripción del estado" rows="3"></textarea>
                </div>
                  <button class="btn btn-light" type="submit">Crear</button>

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