<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!Auth::user()->checkPermission([$permission])) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return view('errors.401');
            }
        }

        return $next($request);
    }
}
