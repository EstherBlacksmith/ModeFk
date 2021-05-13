<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">       

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.tabledit.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>ModeFk</title>    

    <style>            
        .verde{
          background-color:#5f6c11;
        }
        .platano{
          background-color:#fbc11a;
        }
        .limon{
          background-color:#fade98;
        }
        .gris{
          background-color:#eae7e0;
        }
       
        .mar{
          background-color:#4d9699;
        }
       
    </style>

  </head>

  <body class="gris">
     <i class="fas fa-dragon"></i>

    <div class="container-fluid " >
  		<nav class="navbar navbar-expand-lg navbar-light ">
  			<div class="container-fluid">
  				<div class="collapse navbar-collapse" id="navbarSupportedContent">
  				    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
  				        <li class="nav-item">
  				        	<a class="navbar-brand text-white" href="{{ route('home') }}">Inicio</a>
  				        </li>
  				        <li class="nav-item">
  				        	<a class="navbar-brand text-white" href="{{ route('estados') }}">Estados de ánimo</a>
  				        </li>
                  <li class="nav-item">
                    <a class="navbar-brand text-white" href="{{ route('realizados') }}">Ejercicios realizados</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand text-white" href="{{ route('inicioSesion') }}">Inicia sesión</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand text-white" href="{{ route('registroUsuario') }}">Regístrate</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand text-white" href="{{ route('contactoEmergencia') }}">Contacto emergencia</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand text-white" href="{{ route('estadosEdicion') }}">Edición de estados</a>
                  </li>
  				    </ul>	   
  				</div>
  			</div>
  		</nav>
	  </div>

  	<div class="container-fluid text-white">
  		<div id="encabezado ">  			  		
  			<h3> @yield('tittle2')</h3>
  		</div>
  	</div>
    
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
     <button><a> Logout</a></button>

  </form>
    
  	@yield('contenido1')
  	@yield('contenido2')

  	<footer class="text-center " style="position: absolute;
                            bottom: 0;
                            width: 100%;
                            height: 2.5rem;">  
      <h5 class="font-weight-bold">DAW 2 M7 2021</h5>
   	</footer>  
 </body>
 </html>