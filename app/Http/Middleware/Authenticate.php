<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if($guard == 'api') {
                //判断登录
                return $next($request);
            } elseif ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                $url = $guard == 'web'?'account/login':'admin/login';
                return redirect()->guest($url);
            }
        }
        return $next($request);
    }
}
