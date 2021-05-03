<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Estado;
use App\Models\ejercicio;
use App\Models\RegistroEjercicios;
use App\Models\ejercicioConEstado;

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

    public function ejerciciosYEstados(){

        $ejerciciosYEstados = DB::table('ejercicios')
                                ->join('estados', 'estados.id', '=', 'ejercicios.estados_id')
                                ->select('ejercicios.*')
                                ->get();

        return $ejerciciosYEstados;
    }
    
    
	public function marcaRealizado(request $request ){
        $this->loggeado();

		$registroEjercicio = new RegistroEjercicios;

		$registroEjercicio->ejercicio_id = $request->fk_ejercicio_id;
		$registroEjercicio->user_id = $this->id;
        $registroEjercicio->ejercicioHecho = now();
		$registroEjercicio->save();

        return Redirect::back();

	}

    public function ejerciciosRealizados(){

        $this->loggeado();

        $ejerciciosRealizados = DB::table('ejercicios')
                                    ->join('registro_Ejercicios','ejercicio_id','=','ejercicios.id')
                                    ->select('ejercicios.id','ejercicios.nombre','registro_Ejercicios.ejercicio_id')
                                    ->where('registro_Ejercicios.user_id','=',$this->id)
                                    ->orderBy('registro_Ejercicios.ejercicio_id')
                                    ->groupBy('ejercicios.id','ejercicios.nombre','registro_Ejercicios.ejercicio_id')
                                    ->selectRaw('count(*) as total, ejercicios.id')
                                    ->get()
                                    ->toArray();
        return $ejerciciosRealizados;
    }

    public function realizadosHoy(){        

        $this->loggeado();
        $carbon = new Carbon();                  
        $today = Carbon::now();
        $yesterday = Carbon::now()->subHours(24);

        $realizadosHoy = RegistroEjercicios::where('ejercicioHecho', '>',$yesterday)
                                ->where('user_id',$this->id)
                                ->get();

         return $realizadosHoy;
                                                 
    }

   /* public function sumaRealizados(){
        $sumaEjercicios = RegistroEjercicios::groupBy('ejercicio_id')->select('ejercicio_id', DB::raw('count(*) as total'))->get()->toArray();
        return $sumaEjercicios;
    }*/

	public function realizados(){        
        $ejercicioEstados = array();
        $ejercicios = $this->ejerciciosYEstados();
        $ejerciciosRealizados = $this-> ejerciciosRealizados(); 

        foreach ($ejercicios as $ejer ) {
            foreach ($ejerciciosRealizados as $ejerRealizado ) {
                if($ejer->id == $ejerRealizado->id){
                    
                    $ejercicioEstados[] = $ejer->id;

                    $estado = Estado::find($ejer->estados_id);
                    if ($estado){
                        $ejercicioEstados[$ejer->id] = $estado->nombre;
                    }
                }
            }
        }
        dd($ejercicioEstados);
        return view('ejerciciosRealizados',compact('ejercicios','ejerciciosRealizados','ejercicioEstados'));
	}  


    public function index()
    {
        $this->loggeado();

        $realizadosHoy = $this->realizadosHoy();
                                
        $estados = Estado::all(); 

        $ejercicios = $this->ejerciciosYEstados();

        return view('estados',compact('estados','ejercicios','realizadosHoy'));

    }


   /* public function ejerciciosEdicion($id){
        $this->loggeado();

        $estado = Estado::find($id);

        if(!$estado){
            return Redirect::back()->withErrors(['El estado no se encuentra', 'The Message']);
        }

        return view('ejercicios.ejerciciosEdicion',compact('estado'));
    }*/


    public function ejercicioCrear($id){
        $this->loggeado();

        $estado = Estado::find($id);
        $ejercicios = ejercicio::all();

        if(!$estado){
            return Redirect::back()->withErrors(['El estado no se encuentra', 'The Message']);
        }

        return view('ejercicios.ejerciciosCrear',compact('estado','ejercicios'));
    }



    public function ejercicioCrearStore(Request $request){

        $this->loggeado();

        $validated = $request->validate([
                'nombreEjercicio' => 'required|max:45',
                'descripcionEjercicio' => 'required|max:255',
                'id_estado'=> 'required',
            ]);

        $estado = Estado::find($request->id_estado);

        if(!$estado){
            return Redirect::back()->withErrors(['Error', 'El estado no se encuentra']);
        }
 
        $ejercicio = new ejercicio();

        $ejercicio->nombre = $request->nombreEjercicio;
        $ejercicio->descripcion = $request->descripcionEjercicio;
        //$ejercicio->estados_id = $request->id_estado;

        $ejercicio->save();

        //creamos el registro en la tabla que relaciona los estados con sus ejercicios
        $ejercicioConEstado = new ejercicioConEstado();
        $ejercicioConEstado->ejercicio_id = $ejercicio->id;
        $ejercicioConEstado->estado->id =  $request->id_estado;

        $ejercicioConEstado->save();

        return Redirect::back();

     }

     public function ejercicioAnadirStore($estado_id,$ejercicio_id){
        $this->loggeado();

        //creamos el registro en la tabla que relaciona los estados con sus ejercicios
        $ejercicioConEstado = new ejercicioConEstado();
        $ejercicioConEstado->ejercicio_id = $ejercicio_id;
        $ejercicioConEstado->estado->id =  $estado_id;



     }


}
	