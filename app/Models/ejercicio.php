<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;

    //atributos/campos de la tabla de Estados
    protected $fillable = [
    	'nombre',
    	'descripcion',    	
    ];


}
