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
       if (Auth::check()){
            $user = User::where('email', request()->cookie('email'))->first();
            
            if(! $user){
                echo "Inicia sesión"        ;
            }
            else{
                echo "Hola ".$user->name;
            }
        }
        return $next($request);
    }
}
