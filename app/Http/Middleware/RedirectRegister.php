<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Permitir acceso a la ruta de registro
        if ($request->is('register')) {
            return $next($request);
        }

        // Continuar con el middleware predeterminado para otras rutas
        $response = $next($request)->middleware(['guest:' . config('fortify.guard')]);

        // Modificar el comportamiento después del registro
        if ($request->is('register') && $response instanceof RedirectResponse) {
            // Modificar la redirección para que el usuario permanezca en la misma página
            return Redirect::to($response->getTargetUrl());
        }

        return $response;
    }
}
