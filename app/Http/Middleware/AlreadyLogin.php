<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlreadyLogin
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
        if(!Auth::check()){
            return $next($request);
        }

        if (Auth::User()->hasRole('Admin')){
            return redirect()
                ->route('index.admin');
        }
        elseif(Auth::User()->hasRole(['Agent', 'Distributor'])) {
            return redirect()
                ->route('member.index');
        }
    }
}
