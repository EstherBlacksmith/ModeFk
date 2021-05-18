@extends ('layout')

@section('tittle2','Estados de ánimo')

@section('contenido1')
 <div class="row justify-content-md-center">
    <div class="col col-md-6 border-left border-dark rounded-2 border-4" >   

<p> Estos ejercicios reducen el estrés y favorecen la relajación. Pueden ser ejercicios basados en respiraciones, basados en conjuntos musculares o de otros tipos.</p>
</div>
</div>
<!-- Botones Estados -->
<div class="container">
	<div class="row justify-content-md-center">
		@foreach ($estados as $estado)

		<div class="col col-2">  				
			<!-- Button trigger modal -->
			<button type="button" class="btn text-white" style="background-color: DarkOrange !important;" data-bs-toggle="modal"  data-bs-target="#es-{{ $estado->id }}">Ejercicios {{ $estado->nombre }} </button>
		</div>
		@endforeach
	</div>


  <!-- Modal 1-->
  @foreach ($estados as $estado)

  <div class="modal fade" id="es-{{ $estado->id }}" tabindex="-1" aria-labelledby="{{ $estado->nombre }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: CadetBlue !important;" >
          <h5 class="modal-title" id="{{ $estado->nombre }}" >A continuación puedes escojer un ejercicio breve para reducir el nivel de {{ $estado->nombre }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Elije el ejercicio que más te apetezca. Puede repetirlo las veces que necesites
        </div>

        <div class="modal-footer justify-content-md-center">
         @foreach($ejerciciosYEstados as $ejercicio)        
         @if($ejercicio->estado_id == $estado->id )	              
         <button type="button" class="btn text-white" style="background-color: CadetBlue !important;" data-bs-toggle="modal" data-bs-target="#ej-{{ $ejercicio->id }}"  data-bs-dismiss="modal">{{$ejercicio->nombre }} </button>
         @endif
         @endforeach
        </div>
      </div>
    </div>
  </div>

 @endforeach
 <!-- Modal 2 -->
 @foreach($ejerciciosYEstados as $ejercicio)
   @if ( $ejercicio->estado_id = $estado->id)
    <div class="modal fade" id="ej-{{ $ejercicio->id }}" tabindex="-1" aria-labelledby="{{ $ejercicio->nombre}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header text-white" style="background-color: CadetBlue !important;">
          <h5 class="modal-title" id="{{ $ejercicio->id }}"> {{ $ejercicio->nombre }} </h5>
          <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <div class="modal-body">
          {{ $ejercicio->descripcion }}
         </div>

         <div class="modal-footer justify-content-md-center">
          <a class="btn btn-secondary" href="#es-{{ $ejercicio->estado_id }}" data-bs-toggle="modal" data-bs-dismiss="modal" role="button">Volver</a>

            <form method="POST" action="{{ route('marcaRealizado') }}">
               @csrf
               <input type="hidden" name="fk_ejercicio_id" id="fk_ejercicio_id" value="{{ $ejercicio->ejercicio_id }}">
               <input type="hidden" name="fk_user_id" id="fk_user_id" value="1">
               @foreach($realizadosHoy as $hecho)  
                 @if($hecho['ejercicio_id'] == $ejercicio->ejercicio_id)
                   @if($loop->depth == 2 and $loop->last)
                    <button  class=" disabled btn btn-success">Ejercicio realizado hoy</button>               
                   @endif
                 @endif
               @endforeach
               <button type="submit"  class="btn text-white" style="background-color: DarkOrange;">Marcar como hecho</button> 
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif
  @endforeach

</div>
@include('botonEmergencia')
</div>
@endsection


