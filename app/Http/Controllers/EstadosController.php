<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\ejercicio;
use App\Models\registroEjercicios;

class EstadosController extends Controller
{
    public function index()
    {
        
        //comprobamos que el usuario haya inciado sesión
        if (Auth::check()){
            $id = Auth::id(); 
        }else{
            return view('usuarios/inicioSesion');
        }

        $registroEjercicios = DB::table('registro_Ejercicios')
                                    ->whereDate('ejercicioHecho', today())
                                    ->where('user_id',$id)
                                    ->get();
                                    
        $estados = Estado::all(); 


        $ejercicios = DB::table('ejercicios')
                            ->join('estados', 'estados.id', '<', 'ejercicios.estados_id')
                            ->select('ejercicios.*')
                            ->get();


        $ejercicioSinRealizar = DB::table('ejercicios')
                                    ->join('registro_Ejercicios','ejercicio_id','<>','ejercicios.id')
                                    ->select('ejercicios.*','registro_Ejercicios.ejercicio_id')
                                    ->get();

        return view('estados',compact('estados','ejercicios','ejercicioSinRealizar'));

    }
}
 