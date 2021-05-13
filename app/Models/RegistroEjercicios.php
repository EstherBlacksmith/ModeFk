<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEjercicios extends Model
{
    use HasFactory;
    //atributos/campos de la tabla de Registro de Ejercicios
    protected $fillable = [
    	'ejercicio_id',
    	'user_id',
    	'ejercicioHecho',
    ];
}
