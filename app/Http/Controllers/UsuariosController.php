<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\contactoEmergencia;

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

        return redirect('/inicioSesion');
    }


    public function contactoEmergenciaView(){
      $contactosEmergencia = contactoEmergencia::where('user_id' , Auth::id())->get();

      return view ('usuarios/contactoEmergencia',compact('contactosEmergencia'));
    }

   public function contactoEmergenciaStore(Request $request){


      $validated = $request->validate([
        'nombre' => 'required|max:45',
        'primerApellido'=> 'required|max:45',
        'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
      ]);

      $contactoEmergencia = new contactoEmergencia();
     
      
      $contactoEmergencia->nombre = $request->nombre;
      $contactoEmergencia->primerApellido = $request->primerApellido;
      $contactoEmergencia->telefono = $request->telefono;
      $contactoEmergencia->user_id = Auth::id();

      $contactoEmergencia->save();

      return redirect()->back()->with('success', 'Contacto creado correctamente');   

    }

    public function contactoEliminarStore(Request $request){
      $contactoEmergencia = contactoEmergencia::find($request->contacto_id);

      if($contactoEmergencia->id != 0){
        $contactoEmergencia->delete();
      }
      return redirect()->back()->with('success', 'Contacto eliminado');   


    }


}

