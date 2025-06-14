<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $roleName)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->nome !== $roleName) {
            return redirect('/dashboard')->with('error', 'Acesso não autorizado para esta área.');
        }
        return $next($request);
    }
}