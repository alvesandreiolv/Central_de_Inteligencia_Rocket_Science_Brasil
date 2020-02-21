<?php

namespace App\Http\Middleware;

use Closure;

class ChecarAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {

        if ($request->user() && $request->user()->credencial != 10) {
            return redirect()->route('inicio')->with('mensagemErro',  'Acesso negado! Apenas administradores podem acessar a página.');
        }

        return $next($request);

    }

}
