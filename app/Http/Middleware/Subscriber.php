<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Subscriber
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
        //DOZVOLJEN PRISTUP SAMO ULOGOVANOM KORISNIKU SA ROLOM SUBSCRIBER
        if(Auth::check()){
            if(Auth::user()->isSubscriber()){
                return $next($request);
            }
        }
        return redirect('events');
        return $next($request);
    }
}
