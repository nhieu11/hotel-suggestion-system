<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) { //Khi chưa đăng nhập bị đẩy về home
            switch ($guard) {
                case 'web':
                    return redirect('/admin');

                default:
                    return redirect('/flybleu');
            }
            return redirect(RouteServiceProvider::HOME);
        }


        return $next($request);
    }
}
