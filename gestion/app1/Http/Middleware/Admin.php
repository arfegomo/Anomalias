<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if($request->user()->idperfil!=1)
            return redirect()->route('calidad-productos');

        return $next($request);
    }
}
