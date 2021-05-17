<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Estado;
use App\Models\ejercicioConEstado;
use App\Models\contactoEmergencia;

class EstadosController extends Controller
{
	public $id;

    public function loggeado(){
        date_default_timezone_set('Europe/Madrid');

        if (Auth::check()){
            $this->id = Auth::id();            
            
         }else{
            return view('usuarios/inicioSesion');
        }

    }  

    public function estadosEdicion(){
    	$this->loggeado();
       
        $estados = Estado::all(); 
        return view('estados.estadosEdicion',compact('estados'));
    }

     public function editar( $id){
     	$this->loggeado();

        $estado = Estado::find($id); 
        return view('estados.editar',compact('estado'));
    }

    public function estadoEditarStore(Request $request){
		$this->loggeado();

    	$validated = $request->validate([
        'nombreEstado' => 'required|max:45',
        'descripcionEstado' => 'required|max:255',
    	]);

    	$estado = Estado::find($request->idEstado);

    	if(!$estado){
    		return Redirect::back()->withErrors(['El estado a editar no se encuentra', 'The Message']);
    	}
    	
    	$estado->nombre = $request->nombreEstado;
    	$estado->descripcion = $request->descripcionEstado;

		$estado->save();

        $estados = Estado::all(); 
        return view('estados.estadosEdicion',compact('estados'));
    }

    public function estadoCrear(Request $request){
		$this->loggeado();

    	$validated = $request->validate([
        'nombreEstado' => 'required|max:45',
        'descripcionEstado' => 'required|max:255',
    	]);

    	$estado = new Estado();
		$estado->nombre = $request->nombreEstado;
    	$estado->descripcion = $request->descripcionEstado;

        $estado->save();

        $estados = Estado::all(); 
        return view('estados.estadosEdicion',compact('estados'));

    }

    public function estadosEliminar(Request $request){
    	$this->loggeado();

    	$estado = Estado::find($request->estado_id);

    	if(!$estado){
    		return Redirect::back()->withErrors(['El estado a editar no se encuentra', 'The Message']);
    	}

        //Eliminamos los registros de la tabla que vincula los estados con los ejercicios.
        while ($ejercicioConEstado = ejercicioConEstado::where('estado_id', $request->estado_id)->first()) {
           $ejercicioConEstado->forceDelete();
        }
        
    	$estado->forceDelete();

        $estados = Estado::all(); 
        return view('estados.estadosEdicion',compact('estados'));
    }
}
 