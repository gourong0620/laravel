<?php

namespace App\Http\Middleware;

use Closure;
use Auth;//引入验证类
class AdminMiddleware
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
        if(!Auth::guard('admin')->check()){
            redirect('admin/login');
        }
        return $next($request);
    }
}
