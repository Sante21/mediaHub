<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Roles;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, Roles $roles)
    {
        if (!$request->user() || !$request->user()->roles()->whereIn('name', $roles)->first()) {
            // Redirigir o abortar si el usuario no tiene el rol necesario
            abort(403);
        }
        return $next($request);
    }
}
