<?php

namespace App\Http\Middleware;

use Closure;

class CheckOrders
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
        $orders = $request->user()->orders()->where('status', 'unconfirmed')->get();
        if ($orders->isEmpty()) {
            return redirect('/order');
        }
        return $next($request);
    }
}
