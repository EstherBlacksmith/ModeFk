 <div class="row justify-content-md-center">

    <div class="col col-md-2">   

      <form id="form">
        <label for="contactoEmergencia">Mándale un mensaje a una persona de confianza para que te ayude</label>
        <select name="contactoEmergencia" id="contactoEmergencia" onChange="myFunction()">
          <option>Elige un ncontacto</option>
          @foreach($contactosEmergencia as $contacto)
          <option value="{{$contacto->telefono}}" id="nombreContacto" name="{{$contacto->nombre}}">{{$contacto->nombre}}</option>
          @endforeach
        </select>
       
        
        <div class="flex items-center justify-between">
          <button id="submit"    type="submit">
          <i class="fab fa-whatsapp"></i> Enviar WhatsApp
        </button>
      </div>
    </form>

  </div> 
</div>

@include('scriptWhatsapp')