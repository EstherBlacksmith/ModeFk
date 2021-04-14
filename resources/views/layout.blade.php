<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<link rel="icon" href="{{ asset('images/panda-ico.ico') }}">
    <title>ModeFk</title>    
  </head>

  <body>
 
    <div class="container-fluid">
  		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<div class="container-fluid">
  				<div class="collapse navbar-collapse" id="navbarSupportedContent">
  				    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  				        <li class="nav-item">
  				        	<a class="navbar-brand" href="{{ route('home') }}">Inicio</a>
  				        </li>
  				        <li class="nav-item">
  				        	<a class="navbar-brand" href="{{ route('estados') }}">Estados de ánimo</a>
  				        </li>
                  <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('realizados') }}">Ejercicios realizados</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('inicioSesion') }}">Inicia sesión</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('registroUsuario') }}">Regístrate</a>
                  </li>
  				    </ul>	   
  				</div>
  			</div>
  		</nav>
	  </div>

  	<div class="container-fluid">
  		<div id="encabezado">  			
  			<img src="{{ asset('images/panda-logo.png') }}"  class="rounded float-start" alt="La imagen Logo de Panda rojo no se ouede mostrar" style="max-width: 10%;  height: auto;">
  			<h3> @yield('tittle2')</h3>
  		</div>
  	</div>
  	@yield('contenido1')
  	@yield('contenido2')

  	<footer>  
    		@yield('footer','DAW 2 M7')
   	</footer>  
 </body>
 </html>