@extends('errors::minimal')

<div class="card text-center">
  <div class="card-header">
  	404
  </div>
  <div class="card-body">
    <h3 class="card-title">La página que estás bucando no se encuentra disponible en este momento</h3>
    <p class="card-text">Puede que esté tomándose un café. O que aun no haya vuelto de la case de yoga. Pero esto tiene solución. </p>
 		<a  href="{{route('home')}}" class="text-info"> <h2 >Deja que te llevemos de vuelta </h2></a> 

  </div>
  <div class="card-footer text-muted">
  	 <img src="{{asset('images/404-gif-3.gif')}}">
  </div>
</div>
