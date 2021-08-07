<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class studentCheck
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
        if (!Session()->has('student')) {
            return redirect()->route('home')->with('fail','You must login first');
        }
        return $next($request);
    }
}
