@extends ('layout')
@section('tittle2','Crear ejercicios')

@section('contenido1')

<div class="container">
  <div class="row">
    <div class="col-7w">
          <div class="card mar">
            <div class="card-body">
              <h5 class="card-title">Añadir Ejercicio</h5>
              <h6 class="card-subtitle mb-2 ">Crea un nuevo ejercicio para el estado <p class="font-weight-bold">{{$estado->nombre}}<p></h6>
              <form method="post" action=" {{ route('ejercicioCrearStore')}} ">
                <div class="form-group">
                  @csrf
                  <input class="form-control" type="text" name="nombreEjercicio" id="nombreEjercicio" placeholder="Nombre del ejercicio">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="descripcionEjercicio" id="descripcionEjercicio"  placeholder="Descripción del ejercicio" rows="3"></textarea>
                  <input type="hidden" name="id_estado" id="id_estado" value="{{ $estado->id}}">
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
@stop