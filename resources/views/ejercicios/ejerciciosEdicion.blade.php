@extends ('layout')
@section('tittle2','Edición ejercicios')
@section('contenido1')
@include('scriptEditTable')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
  <div class="row">
    <div class="col-7w">
      <div class="card mar">
        <div class="card-body">
          <h5 class="card-title">Añadir Ejercicio</h5>
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="edicionEjercicios">
              <thead>
                <tr>
                  <th style="display: none;">#</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ejercicios as $ejercicio)
                <tr>
                  <th scope="row" style="display: none;">1</th>

                  <td onfocusout="getCellValue(this, {{$ejercicio->id}},'nombre')"  class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">{{$ejercicio->nombre}} </span><input class="tabledit-input form-control input-sm" type="text" id="nombre_{{$ejercicio->id}}" name="nombre" value="{{$ejercicio->nombre}}" style="display: none;" disabled=""></td>

                  <td onfocusout="getCellValue(this, {{$ejercicio->id}},'descripcion')"  class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span" style="">{{$ejercicio->descripcion}} </span><input id="descripcion_{{$ejercicio->id}}" class="tabledit-input form-control input-sm fill" type="text" name="descripcion"   value="{{$ejercicio->descripcion}}" style="display: none;" disabled=""></td>

                </tr>

                @endforeach

                  </tbody>
                </table>
              </div>

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

