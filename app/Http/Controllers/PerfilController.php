<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AtualizarPerfilRequest; 

class PerfilController extends Controller
{
    /**
     * Exibe a tabela/formulário com os dados do usuário logado.
     */
    public function meusDados()
    {
        // O código original da sua função voltou inteiro para cá
        $usuario = Auth::user();

        return view('candidato.meus-dados', compact('usuario'));
    }

    /**
     * Atualiza os dados de endereço do usuário logado.
     */
  public function atualizar(AtualizarPerfilRequest $request)
    {
        // Esta linha abaixo ao avisa ao VS Code 
        // exatamente qual é o tipo de usuário que estamos usando.
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $user->update($request->validated());

        return redirect()->route('perfil.meusDados')->with('sucesso', 'Seus dados foram atualizados com sucesso!');
    }
}