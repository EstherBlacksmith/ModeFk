<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UsuariosController extends Controller
{
    public function inicioSesionShow(){
        return view('usuarios/inicioSesion');
    }

    public function inicioSesion(Request $request){

		//campos requeridos
    	$validated = $request->validate([
	        'email' => 'required | email',
	        'password' => 'required', 
	    ],
   		[
	        'email.required' => 'El email es necesario',	    
  	        'password.required' => 'La contraseña es necesaria',	
    	]);

    	//Autentifiación
    	$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('estados');
        }

        return back()->withErrors([
            'email' => 'El email o la contraseña no coinciden con ninguno registrado',
        ]);

    
    }



    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }





}

