<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facade\Auth;

class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      switch (auth()->user()->rol) {
        case 'admin':
           return redirect()->to('admin');
          break;
        case 'cliente':
            //return $next($request);
          break;
       case 'visita':
             return redirect()->to('visita');
         break;
      }
      return $next($request);
    }
}
