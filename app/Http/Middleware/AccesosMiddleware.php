<?php

namespace App\Http\Middleware;

use Closure;

class AccesosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $a)
    {
      $Accesos = \Session::get('Accesos');
      
      foreach ($Accesos as $Acceso) {
        if($Acceso['COD_MODULO']==$a)
        {
            return $next($request);
        }
      }


      /*
      if(in_array($role,$Accesos))
      {
        return $next($request);
      }
*/
    }
}
