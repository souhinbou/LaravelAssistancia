<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          //administrateur role =admin
        //utilisateur role=""
       if(Auth::check()){
          if(Auth::user()->role=='admin'){
            return $next($request);
        } else{
            return redirect('/home')->with('message',"accés refusé vous n etes pas un administrateur!");
        }
        }else {
            return redirect('/login')->with('message',"il faut un login pour accéder aux informations du site ");
        }
        return $next($request);
    }
}
