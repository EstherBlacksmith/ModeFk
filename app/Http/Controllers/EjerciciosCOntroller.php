<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;
use App\Models\ejercicio;
use App\Models\RegistroEjercicios;
use Carbon\Carbon;

class EjerciciosCOntroller extends Controller
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

    public function ejerciciosConEstado(){

        $ejerciciosConEstado = DB::table('ejercicios')
                                ->join('estados', 'estados.id', '=', 'ejercicios.estados_id')
                                ->select('ejercicios.*')
                                ->get();

        return $ejerciciosConEstado;
    }
    
    
	public function marcaRealizado(request $request ){
        $this->loggeado();

		$registroEjercicio = new RegistroEjercicios;

		$registroEjercicio->ejercicio_id = $request->fk_ejercicio_id;
		$registroEjercicio->user_id = $this->id;
        $registroEjercicio->ejercicioHecho = now();
		$registroEjercicio->save();
        return "ejercicio guardado";

	}

    public function ejerciciosRealizados(){

        $this->loggeado();

        $ejerciciosRealizados = DB::table('ejercicios')
                                    ->join('registro_Ejercicios','ejercicio_id','=','ejercicios.id')
                                    ->select('ejercicios.*','registro_Ejercicios.*')
                                    ->where('registro_Ejercicios.user_id','=',$this->id)
                                    ->get()
                                    ->toArray();  
        return $ejerciciosRealizados;
    }

    public function realizadosHoy(){

        

        $this->loggeado();
        echo $this->id;
        $carbon = new Carbon();                  
        $today = Carbon::now();
        $yesterday = Carbon::now()->subHours(24);

        $realizadosHoy = RegistroEjercicios::where('ejercicioHecho', '>',$yesterday)
                                ->where('user_id',$this->id)
                                ->get();

         return $realizadosHoy;
                                                 
    }

    public function sumaRealizados(){
        $sumaEjercicios = RegistroEjercicios::groupBy('ejercicio_id')->select('ejercicio_id', DB::raw('count(*) as total'))->get()->toArray();
        return $sumaEjercicios;
    }

	public function realizados(){        

        $ejercicios = $this->ejerciciosConEstado();
        $ejerciciosRealizados = $this-> ejerciciosRealizados(); 
        $sumaEjercicios = $this-> sumaRealizados();   

        return view('ejerciciosRealizados',compact('ejercicios','ejerciciosRealizados','sumaEjercicios'));
	}  


    public function index()
    {
        $this->loggeado();

        $realizadosHoy = $this->realizadosHoy();
                                
        $estados = Estado::all(); 

        $ejercicios = $this->ejerciciosConEstado();

        return view('estados',compact('estados','ejercicios','realizadosHoy'));

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

    public function ejerciciosEdicion(){
        return view('ejercicios.ejerciciosEdicion');
    }


}
	