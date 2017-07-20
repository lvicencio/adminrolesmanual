<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facade\Auth;

class AdminMiddleware
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
      // if (Auth::check() && Auth::user()->rol=='admin') {
      //     return $next($request);
      // }
      // return redirect('/');
       switch (auth()->user()->rol) {
         case 'admin':
            //return $next($request);
           break;
         case 'cliente':
             return redirect()->to('cliente');
           break;
        case 'visita':
              return redirect()->to('visita');
          break;
       }
       return $next($request);
    }
}
