<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        //OMOGUDJEN PRISTUP SAMO AKTIVNOM KORISNIKU SA ROLOM ADMINISTRATOR
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }
        return redirect('events');
    }
}
