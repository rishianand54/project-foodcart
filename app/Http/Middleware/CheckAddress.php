<?php

namespace App\Http\Middleware;

use Closure;

class CheckAddress
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
        $address = $request->user()->addresses()->get();
        if ($address->isEmpty()) {
            return redirect('/user/edit-address');
        }
        return $next($request);
    }
}
