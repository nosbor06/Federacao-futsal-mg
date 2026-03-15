<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsavelMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->tipo !== 'responsavel') 
            {
            return redirect('/admin/dashboard')->with('error','Acesso não autorizado');
            }

        return $next($request);
    }
}