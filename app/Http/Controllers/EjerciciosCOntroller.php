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
                               // ->join('estados', 'estados.id', '=', 'ejercicios.estados_id')
                                ->join('ejercicio_con_estados', 'ejercicio_id', '=', 'ejercicios.id')
                                ->select('ejercicios.*','ejercicio_con_estados.*')
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

        $yesterday = Carbon::now()->subHours(24);

        $realizadosHoy = RegistroEjercicios::where('ejercicioHecho', '>',$yesterday)
                                ->where('user_id',$this->id)
                                ->get()
                                ->toArray();

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

                  $estado = Estado::find($ejer->estados_id);

                    if ($estado){  
                        $ejercicioEstados[$ejer->id] = $estado->nombre;                      
                    }
                }
            }
        }
        
        return view('ejerciciosRealizados',compact('ejercicios','ejerciciosRealizados','ejercicioEstados'));
	}  


    public function index()
    {
        $this->loggeado();

        $realizadosHoy = $this->realizadosHoy();
                                
        $estados = Estado::all(); 

        $ejerciciosYEstados = $this->ejerciciosYEstados();

        $yesterday = Carbon::now()->subHours(24);

        return view('estados',compact('estados','ejerciciosYEstados','realizadosHoy','yesterday'));

    }


    public function ejerciciosEdicion(){
        $this->loggeado();

        $ejercicios = ejercicio::all();

       /* if(!$estado){
            return Redirect::back()->withErrors(['El estado no se encuentra', 'The Message']);
        }*/

        return view('ejercicios.ejerciciosEdicion',compact('ejercicios'));
    }
 
    public function ejerciciosEdicionStore(Request $request){
        $ok = false;
        
        $ejercicio = ejercicio::find($request->id);
        
        if($ejercicio->id != 0){
            if ($request->elemento == "nombre" and ( $ejercicio->nombre != $request->valor)){
                $ejercicio->nombre = $request->valor;
            }

            if ($request->elemento == "descripcion" and ( $ejercicio->descripcion != $request->valor)){
                $ejercicio->descripcion = $request->valor;
            }

            $ejercicio->save();
            $ok = true;
        }
        return $request->elemento;
    }

    public function ejercicioCrear($id){
        $this->loggeado();

        $estado = Estado::find($id);

        if(!$estado){
            return Redirect::back()->withErrors(['El estado no se encuentra', 'The Message']);
        }

        // Llega el estado por id
        // Coger todos los ejercicos
        // Quitar todos los ejercicios que pertenecen al estado

        //$ejercicios = ejercicio

        $idsEjerciciosSinEstado = ejercicioConEstado::where('estado_id', [$id])
            ->select('ejercicio_id')
            ->get()
            ->toArray();

        $ejercicios = ejercicio::whereNotIn('id', $idsEjerciciosSinEstado)
            ->get()
            ->toArray();

        
        return view('ejercicios.ejerciciosCrear',compact('id','ejercicios','estado'));
    }

    public function ejerciciosQuitar($id){

        $this->loggeado();
        $estado = Estado::find($id);
        $ejercicios = ejercicio::all();
        $ejercicioConEstado = ejercicioConEstado::all()->where('estado_id',$id);


        if(!$estado){
            return Redirect::back()->withErrors(['El estado no se encuentra', 'The Message']);
        }

        return view('ejercicios.ejerciciosListaQuitar',compact('estado','ejercicios','ejercicioConEstado'));
    }

    public function ejerciciosQuitarStore( Request $request){

        $this->loggeado();
        $ejercicio = ejercicio::find($request->ejercicio_id);

        if(!$ejercicio){
            return Redirect::back()->withErrors(['El ejercicio a eliminar no se encuentra', 'The Message']);
        }

        $ejercicioConEstado = $this->buscaEjerEstado($request->ejercicio_id,$request->estado_id);
    
        if($ejercicioConEstado){
            $ejercicioConEstado->forceDelete();
        }
        
        return Redirect::back();

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

        $ejercicio->save();

        //creamos el registro en la tabla que relaciona los estados con sus ejercicios
        $this->crearRelacionEstadosEjercicios($request->id_estado,$ejercicio->id);       

        return Redirect::back();

    }

    public function crearRelacionEstadosEjercicios($estado_id,$ejercicio_id){


        //creamos el registro en la tabla que relaciona los estados con sus ejercicios
        $ejercicioConEstado = ejercicioConEstado::select('*')
                ->where('ejercicio_id', '=', $ejercicio_id)
                ->where('estado_id', '=',$estado_id)
                ->get();

        if(!$this->buscaEjerEstado($ejercicio_id,$estado_id)){
            $ejercicioConEstado = new ejercicioConEstado();
            $ejercicioConEstado->ejercicio_id = $ejercicio_id;
            $ejercicioConEstado->estado_id =  $estado_id;

            $ejercicioConEstado->save();             
        }

    }

    public function ejercicioAnadirStore(Request $request){
       
        $this->loggeado();
            
        //creamos el registro en la tabla que relaciona los estados con sus ejercicios
        $this->crearRelacionEstadosEjercicios($request->id_estado,$request->id_ejercicio);

        return Redirect::back();

    }
     
    
    

     public function buscaEjerEstado($ejercicio_id,$estado_id){

          $ejercicioConEstado = ejercicioConEstado::select('*')
            ->where('ejercicio_id', '=', $ejercicio_id)
            ->where('estado_id', '=',$estado_id)
            ->first();

            if($ejercicioConEstado){
                return $ejercicioConEstado;
            }
            else {
                return false;
            }
     }
     

}
	