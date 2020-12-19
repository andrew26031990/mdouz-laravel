<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // I'm using the api guard
        $role = strtolower( $request->user()->role );
        $allowed_roles = array_slice(func_get_args(), 2);

        if( in_array($role, $allowed_roles) ) {
            return $next($request);
        }

        throw new AuthenticationException();
    }
}
