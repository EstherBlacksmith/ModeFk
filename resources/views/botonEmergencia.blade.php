 
<br>
<br>

 <div class="row justify-content-center">

    <div class="col col-md-2 text-white rounded-2"  style="background-color: CadetBlue;">   
      <form id="form">
        <label for="contactoEmergencia">Mándale un mensaje a una persona de confianza para que te ayude</label>
        <select name="contactoEmergencia" class="form-control form-select form-control-md" id="contactoEmergencia" onChange="myFunction()">
          <option>Elige un contacto</option>

          @foreach($contactosEmergencia as $contacto)
          <option value="{{$contacto->telefono}}" id="nombreContacto" name="{{$contacto->nombre}}">{{$contacto->nombre}}</option>
          @endforeach
        </select>
       
          <br>
        <div class="flex items-center justify-between">
          <button id="submit"    type="submit" class="btn text-white" style="background-color: DarkOrange;">
          <i class="fab fa-whatsapp"></i> Enviar WhatsApp
        </button>
      </div>
    </form>
    <br>

  </div> 
</div>

@include('scriptWhatsapp')