@extends('errors::minimal')

<div class="card text-center">
  <div class="card-header">
  	401
  </div>
  <div class="card-body">
    <h3 class="card-title">No tienes acceso a esta página</h3>
    <p class="card-text">Si necesitas acceder, ponte en contacto con el administrador. Mientras, disfruta del resto de la web.</p>
 		 <h2 class="text-info"><a  href="{{route('home')}}">Deja que te llevemos de vuelta</a> </h2>
  </div>
  <div class="card-footer text-muted">
  	 <img src="{{asset('images/401-error-unauthorized-rafiki-2845.png')}}">
  </div>
</div>
