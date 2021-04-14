@extends ('layout')
@section('tittle2','ModeFk Inicio de sesión')

@section('contenido1')

<div class="container">
	<div class="row justify-content-md-center">
		<form method="POST" action="{{ route('inicioSesion') }}">
		@csrf
		<div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email del usuario">
		</div>	
		<div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
		</div>
  		
        <div class="form-check">
          <!--  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->

            <label class="form-check-label" for="remember">
                Recuérdame
            </label>
        </div>

    	<button type="submit" class="btn btn-primary">Enviar</button>
		</form>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

	</div>
	
  <!--  <div class="row justify-content-md-center">
        

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>-->

	<div class="row justify-content-md-center">
		<p>¿Aún no tienes usuario? Regístrate <a href="{{ route('registroUsuario') }}">aquí</a></p>
	</div>

</div>

@stop
