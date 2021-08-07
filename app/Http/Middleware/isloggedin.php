<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isloggedin
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
        if (Session()->has('admin') or Session()->has('student') && (url('/') == $request->url())) {
            return back();
          }
        return $next($request);
    }
}
