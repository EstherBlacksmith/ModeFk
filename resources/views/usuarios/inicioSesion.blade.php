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
				<a href="#" class="fas fa-eye" id="eye" onclick="myFunction()"></a>
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
<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("password");
  var y = document.getElementById("eye");

  if (x.type === "password") {
    	x.type = "text";
        y.classList.remove('fa-eye');
		y.classList.add('fa-eye-slash');
  } else {
  	x.type = "password";
    y.classList.remove('fa-eye-slash');
    y.classList.add('fa-eye');
  }
}

</script>