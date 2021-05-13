@extends ('layout')
@section('tittle2','Edición ejercicios')

@section('contenido1')

<div class="container">
  <div class="row">
    <div class="col-7w">
      <table class="table  table-striped gris" >
          <thead class="mar">
            <tr>
              <th scope="col">Ejercicio</th>
              <th scope="col">Descripción</th>         
              <th scope="col">Quitar ejercicio</th>

              
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($ejercicioConEstado as $ejercicioEst)

              @foreach($ejercicios as $ejercicio)
                @if($ejercicioEst->ejercicio_id == $ejercicio->id)

                  <td style="font-weight: bold; "> {{ $ejercicio->nombre }}</td>
                    <td > {{ $ejercicio->descripcion }} </td>
                    <form method="post" action="{{route('ejerciciosQuitarStore')}}">
                      @csrf
                      <input type="hidden" name="ejercicio_id" id="ejercicio_id" value="{{$ejercicio->id}}">
                      <input type="hidden" name="estado_id" id="estado_id" value="{{$estado->id}}">                            
          
                    <td> <button class="btn " type="submit">
                      <i class="fas fa-trash-alt" style=" color: Tomato;font-size: 2em;"></i></button>
                    </td>
                  </form>
                
                  @endif

              
              @endforeach
       
            </tr>
            @endforeach 
          </tbody>       

        </table>
      </div>
    </div>
  </div>

    @endsection