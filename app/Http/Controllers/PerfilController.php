<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Exibe a tabela/formulário com os dados do usuário logado.
     */
    public function meusDados()
    {
        $usuario = Auth::user();

        return view('candidato.meus-dados', compact('usuario'));
    }

    /**
     * Atualiza os dados de endereço do usuário logado.
     */
    public function atualizar(Request $request)
    {
        $dados = $request->validate([
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'uf' => 'required|string|max:2',
        ]);

        Auth::user()->update($dados);

        return redirect()->route('perfil.meusDados')->with('sucesso', 'Seus dados foram atualizados com sucesso!');
    }
}