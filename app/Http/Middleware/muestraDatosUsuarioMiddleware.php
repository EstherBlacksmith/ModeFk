<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class muestraDatosUsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        $response = $next($request);
        
               
       if (Auth::check()){
            $user = Auth()->user();
            
            if($user->id == null){
                echo "Inicia sesión";
            }
            else{
                echo "Hola ".$user->name;
            }
        }else{
            echo "Inicia sesión";
        }


        return $response;
    }
}


    