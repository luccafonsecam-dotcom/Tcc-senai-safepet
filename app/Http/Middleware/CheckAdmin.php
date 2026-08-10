<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Colocamos o óculos para o VS Code entender o nosso Usuário
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // 2. A Pergunta do Segurança: "Está logado E é um administrador?"
        if ($user && $user->eAdmin()) {
            // Se sim, abre a porta e deixa ele acessar a página solicitada
            return $next($request);
        }

        // 3. Se for candidato (ou não estiver logado), é barrado e chutado pra vitrine!
        return redirect()->route('vitrine.index')->with('erro', 'Acesso negado. Esta área é restrita para administradores do SafePet.');
    }
}