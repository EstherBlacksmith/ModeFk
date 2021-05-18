@extends ('layout')
@section('tittle2','Edición ejercicios')
@section('contenido1')
@include('scriptEditTable')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
  <div class="row">
    <div class="col">
            <table class="table table-striped rounded" id="edicionEjercicios">
              <thead style="background-color: CadetBlue !important;" class="rounded">
                <tr>
                  <th scope="col"></th>
                  <th scope="col" style="font-weight: bold; ">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col" style="width: 7%;">Eliminar Ejercicio</th>
                </tr>
              </thead>
              <tbody>               
                <tr>
                   @foreach($ejercicios as $ejercicio)
                  <th scope="row" > {{ $ejercicio->nombre }}</th>

                  <td onfocusout="getCellValue(this, {{$ejercicio->id}},'nombre')"  class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span" style="font-weight: bold; ">{{$ejercicio->nombre}} </span><input class="tabledit-input form-control input-sm" type="text" id="nombre_{{$ejercicio->id}}" name="nombre" value="{{$ejercicio->nombre}}" style="display: none;" disabled=""></td>

                  <td onfocusout="getCellValue(this, {{$ejercicio->id}},'descripcion')"  class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span" style="">{{$ejercicio->descripcion}} </span><input id="descripcion_{{$ejercicio->id}}" class="tabledit-input form-control input-sm fill" type="text" name="descripcion"   value="{{$ejercicio->descripcion}}" style="display: none;" disabled=""></td>

                  <td> <button type="button" class="btn btn-lg" data-bs-toggle="modal"  data-bs-target="#es-{{ $ejercicio->id }}" data-bs-dismiss="modal">
                    <i class="fas fa-trash-alt" style=" color: Tomato;font-size: 1em;"></i>
                  </button></td>

                  <!-- Modal -->
                  <div class="modal fade" id="es-{{ $ejercicio->id }}" tabindex="-1" aria-labelledby="{{ $ejercicio->nombre }}" aria-hidden="true" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="{{ $ejercicio->nombre }}">Eliminar</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Se va a eliminar el ejercicio <p class="text-danger">{{ $ejercicio->nombre }} {{$ejercicio->id}}</p>
                        </div> 
                        <div class="modal-footer">
                           <form method="post" action="{{route ('eliminarEjercicios')}}">
                            @csrf
                            <input type="hidden" name="ejercicio_id" id="ej-{{$ejercicio->id}}" value="{{$ejercicio->id}}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn  btn-danger">Eliminar</button>
                        </form>
                        </div>   
                      </div>
                    </div>
                  </div>
                </td>

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
@endsection

