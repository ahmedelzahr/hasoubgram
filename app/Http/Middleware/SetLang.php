<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;
use Symfony\Component\HttpFoundation\Response;


class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if(Auth::user()?->lang=='ar'){
            app()->setLocale('ar');
               
        }elseif(Auth::user()?->lang=='en'){
              app()->setLocale('en');
         
        }
       elseif(Session::has('lang')){
              App::setlocale(Session::get('lang'));
              
        }
        return $next($request);
    }
}
