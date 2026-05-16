<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || $request->user()->tipo !== 1) {
            return response()->json([
                'message' => 'Acceso restringido a administradores'
            ], 403);
        }

        return $next($request);
    }
}
