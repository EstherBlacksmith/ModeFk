<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //atributos/campos de la tabla de Estados
    protected $fillable = [
    	'estado',
    	'descripcion',    	
    ];

  
}
