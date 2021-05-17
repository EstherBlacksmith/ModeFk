@extends ('layout')
@section('tittle2','Crear ejercicios')

@section('contenido1')

<div class="container">
  <p  class="font-weight-bold">Estado: {{$estado->nombre}}</p>
  <div class="row">
    <div class="col-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Añade un ejercicio existente</h5>
          <h6 class="card-subtitle mb-2 ">Añade un ejercicio existente para el estado </h6>

          <div class="form-group">
            <form method="post" action = "{{ route('ejercicioAnadirStore')}} ">
              @csrf

              <input type="hidden" name="id_estado" id="id_estado" value="{{ $estado->id}}">

              <label for="ControlSelect">Selecciona un ejercicio</label>
              <select class="form-control form-select" name="ejercicio_id" id="ejercicio_id"> 


                @foreach ($ejercicios as $ejercicio)

                <option name="ejercicio_id" value="{{$ejercicio['id']}}">{{$ejercicio['nombre']}}</option>

                @endforeach
              </select>      
              <br>           
              <button class="btn btn-primary" type="submit">Añadir</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-5">
      <div class="card text-white mb-3 " >

        <div class="card-header  bg-info">
          Ejercicios ya incluidos
        </div>
        <div class="card-body ">
          <div class="overflow-auto" style="max-height: 150px;">
          <ul class="list-group">            
            @foreach ($ejerciciosIncluidos as $incluido)
            <li name="ejercicio_id" class="text-dark" value="{{$incluido['id']}}">{{$incluido['nombre']}}</li>
            @endforeach

          </ul>
          </div>
        </div>
      </div>
    </div>
</div>
    <div class="row">
      <div class="col-10">
        <div class="card mar">
          <div class="card-body">
            <h5 class="card-title">Crea un ejercicio nuevo</h5>
            <h6 class="card-subtitle mb-2 ">Crea un nuevo ejercicio para el estado. Este nuevo ejercicio estará disponible apra el resto de estados </h6>
            <form method="post" action=" {{ route('ejercicioCrearStore')}} ">
              @csrf
              <div class="form-group">

                <input class="form-control" type="text" name="nombreEjercicio" id="nombreEjercicio" placeholder="Nombre del ejercicio">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="descripcionEjercicio" id="descripcionEjercicio"  placeholder="Descripción del ejercicio" rows="3"></textarea>
                <input type="hidden" name="id_estado" id="id_estado" value="{{ $estado->id}}">
              </div>
              <button class="btn btn-primary" type="submit">Crear</button>

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