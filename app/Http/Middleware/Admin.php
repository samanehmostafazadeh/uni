<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin extends Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        if( $request->user($guards)->id != 1 ) {
            throw new AuthenticationException(
                'Access Deny!',
                $guards,
                $request->expectsJson() ? null : $this->redirectTo($request),
            );
        }
        return $next($request);
    }
}
