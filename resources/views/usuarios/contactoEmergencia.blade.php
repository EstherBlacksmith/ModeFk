@extends ('layout')
@section('tittle2','Contacto de emergencia')

@section('contenido1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<table  class="table">
    <thead>Contactos</thead>
    <tbody>
        <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Eliminar</th>
    </tr>
    @foreach($contactosEmergencia as $contactos)
    <tr>
        <td>{{$contactos->nombre}}</td>
        <td>{{$contactos->primerApellido}}</td>
        <td>{{$contactos->telefono}}</td>

        <form method="post" action="{{route('contactoEliminarStore')}}">
          @csrf
          <input type="hidden" name="contacto_id" id="contacto_id" value="{{$contactos->id}}">

        <td> <button class="btn " type="submit">
          <i class="fas fa-trash-alt" style=" color: Tomato;font-size: 2em;"></i></button>
        </td>
      </form>

    </tr>
    @endforeach
    </tbody> 

</table>
            <div class="card">
                <div class="card-header">Datos de tu nuevo contacto</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contactoEmergenciaStore') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="primerApellido" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input id="primerApellido" type="text" class="form-control @error('primerApellido') is-invalid @enderror" name="primerApellido" value="{{ old('primerApellido') }}"  autocomplete="primerApellido" autofocus>

                                @error('primerApellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}"  autocomplete="" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>

    
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
