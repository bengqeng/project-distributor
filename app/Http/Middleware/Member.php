<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Member
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
        if (!Auth::check()){return redirect()->route('landingpage.index')->with('message', 'Anda Harus Login Sebagai Admin');}

        $user = Auth::user();

        if($user->hasRole(['Agent', 'Distributor'])){return $next($request);}

        return redirect()->route('login')->withErrors('message', 'Please Login!');
    }
}
