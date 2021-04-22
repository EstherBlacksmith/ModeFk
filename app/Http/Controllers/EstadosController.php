<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\ejercicio;

class EstadosController extends Controller
{
    public function estadosEdicion(){
       
        $estados = Estado::all(); 
        return view('estados.estadosEdicion',compact('estados'));
    }

     public function editar( $id){
        $estado = Estado::find($id); 
        return view('estados.editar',compact('estado'));
    }
}
 