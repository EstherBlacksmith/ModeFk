<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /* Controlamos si el usuario es propietario o es usuario final
    *  para que pueda acceder a la edición de los datos
    */
    public function handle(Request $request, Closure $next)

    {
        if (auth()->check() && auth()->user()->esUsuario()){

              abort(401, 'Esta acción no está permitida.');
           }     

        if ( ! auth()->user() ){
             return route('inicioSesion');
        }

        return $next($request);
        
    }

}
