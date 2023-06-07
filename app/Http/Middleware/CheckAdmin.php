<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (is_null(auth()->user()) || !auth()->user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', "Vous n'avez pas l'autorisation d'accéder à cette page.");
        }

        return $next($request);
    }
}
