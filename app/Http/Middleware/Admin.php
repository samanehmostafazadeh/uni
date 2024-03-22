<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next,  ...$guards): Response
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
