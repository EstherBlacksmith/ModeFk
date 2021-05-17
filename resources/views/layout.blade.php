  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.tabledit.js"></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>ModeFk</title>    

    <style>            
      

    </style>

  </head>

  <body class="bg-light">


    <nav class="navbar navbar-expand-lg navbar-dark navbar-light bg-secondary">
      <a class="navbar-brand" href="{{ route('home') }}">ModeFk</a>      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav"> 

          @guest

          <a class="{{ Request::is('inicioSesion') ? 'active' : '' }} nav-item nav-link " href="{{ route('inicioSesion') }}">Inicia sesión</a>

          <a class="{{ Request::is('registroUsuario') ? 'active' : '' }} nav-item nav-link " href="{{ route('registroUsuario') }}">Regístrate</a>

          @endguest

          @auth   
          <a class="{{ Request::is('estados') ? 'active' : '' }}  nav-item nav-link e" href="{{ route('estados') }}">Estados de ánimo</a>

          <a class="{{ Request::is('realizados') ? 'active' : '' }} nav-item nav-link " href="{{ route('realizados') }}">Ejercicios realizados</a>

          <a class="{{ Request::is('contactoEmergenciaView') ? 'active' : '' }} nav-item nav-link " href="{{ route('contactoEmergenciaView') }}">Contactos emergencia</a>
          @if (!Auth::guest() && Auth::user()->rol == 'admin')
          <a class="{{ Request::is('estadosEdicion') ? 'active' : '' }} nav-item nav-link " href="{{ route('estadosEdicion') }}">Edición de estados</a>

          <a class="{{ Request::is('ejerciciosEdicion') ? 'active' : '' }} nav-item nav-link " href="{{ route('ejerciciosEdicion') }}">Edición de ejercicios</a>

@endif
          <a href="{{ route('logout') }}" class="{{ Request::is('logout') ? 'active' : '' }} nav-item nav-link "  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form></a>

          @endauth
        </div>         
      </div>
          
      @auth
        @php
          //recuperamos el mail de usuario para ver si tiene cuenta en Gravatar
          $email = Auth::check() ? Auth::user()->email : 'email@example.com';
          $avatar = Gravatar::get($email);
          $name = Auth::check() ? Auth::user()->name : 'Desconocido';
        @endphp
        <span class="navbar-text w-25">
          <div class="row">
            <div class="col-10 text-right mt-3">
              <h4>Hi, {{$name}}!</h4>
            </div>
            <div class="col-2">
              <img src="{{$avatar}}" class="rounded-circle  mx-auto float-right" alt="{{$name}}" style="width: 52px;" />
            </div>
          </div>
        </span>
      @endauth
    </div>
  </div>
</nav>
   

    
<div class="container-fluid">
  <div id="encabezado " >  			  		
   <h3 class="text-info"> @yield('tittle2')</h3>
 </div>
</div>



@yield('contenido1')
@yield('contenido2')

@include('footer')
</body>
</html>
