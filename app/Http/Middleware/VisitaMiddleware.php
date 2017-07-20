<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facade\Auth;

class VisitaMiddleware
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
            return redirect()->to('cliente');
          break;
       case 'visita':
            // return $next($request);
         break;
      }
      return $next($request);
    }
}
