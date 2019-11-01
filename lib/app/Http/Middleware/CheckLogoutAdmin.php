<?php

namespace App\Http\Middleware;

use Aws\Common\Facade\Ses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Closure;

class CheckLogoutAdmin
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
        if(Auth::guard('admin')->guest()){
            return \redirect('admin/login');
        }
        return $next($request);
    }
}
