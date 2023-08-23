<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdministradorFiscal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check())
        {
            return redirect(route('login'))->with(['error_message' => 'Você precisa estar logado para acessar esta página!']);
        }
        if (Auth::user()->tipo_usuario_id == 1 || Auth::user()->tipo_usuario_id == 2) {
            return $next($request);
        } else {
            return redirect(route('home'))->with(['error_message' => 'Você não possui privilégios para acessar esta página!']);
        }
    }
}
