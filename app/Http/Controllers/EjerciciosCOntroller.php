<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroEjercicios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;
use App\Models\ejercicio;

class EjerciciosCOntroller extends Controller
{
    //comprobamos que el usuario haya iniciado sesión
    public function loggeado(){
         if (Auth::check()){
            $id = Auth::id(); 
            return  $id;
         }else{
            return view('usuarios/inicioSesion');
        }
    } 
    
	public function marcaHecho(request $request ){

		if (Auth::check()){
            $id = Auth::id(); 
        }else{
            return view('usuarios/inicioSesion');
        }

		$registroEjercicio = new RegistroEjercicios;

		$registroEjercicio->ejercicio_id = $request->fk_ejercicio_id;
		$registroEjercicio->user_id = $request->fk_user_id;
		$registroEjercicio->save();

        return "ejercicio guardado";

	}

    public function ejerciciosRealizados(){

        $id =$this->loggeado();

        $ejerciciosRealizados = DB::table('ejercicios')
                            ->join('registro_Ejercicios','ejercicio_id','=','ejercicios.id')
                            ->select('ejercicios.*','registro_Ejercicios.ejercicio_id')
                            ->where('registro_Ejercicios.user_id','=',$id)
                            ->get()
                            ->toArray();  
        return $ejerciciosRealizados;
    }

    public function sumaRealizados(){
        $sumaEjercicios = RegistroEjercicios::groupBy('ejercicio_id')->select('ejercicio_id', DB::raw('count(*) as total'))->get()->toArray();
        return $sumaEjercicios;
    }

	public function realizados(){

        $id =$this->loggeado();

        $registroEjercicios = DB::table('registro_Ejercicios')
                                    ->where('user_id',$id)
                                    ->get();
                                    
        $estados = Estado::all(); 


        $ejercicios = DB::table('ejercicios')
                            ->join('estados', 'estados.id', '<', 'ejercicios.estados_id')
                            ->select('ejercicios.*')
                            ->get();

        $ejerciciosRealizados = $this-> ejerciciosRealizados(); 
        $sumaEjercicios = $this-> sumaRealizados();   

        return view('ejerciciosRealizados',compact('estados','ejercicios','ejerciciosRealizados','sumaEjercicios'));
	}  

    public function listadoRealizados(){
        $ejerciciosRealizados = $this-> ejerciciosRealizados(); 
        $sumaEjercicios = $this-> sumaRealizados();   

        $listaSuma = array();
        foreach ($ejerciciosRealizados as $ejercicioHecho) {
            foreach($sumaEjercicios as $suma){
                echo $ejercicioHecho->id;
             
                // $listaSuma[$ejercicioHecho->id][$suma];
              }
        }
            

    }


}
	