<?php

namespace App\Http\Middleware;

use Closure;

class demo
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
        if($request->has('aids'))
        {
            return redirect('dummies');
        }

        return $next($request);
    }
}
