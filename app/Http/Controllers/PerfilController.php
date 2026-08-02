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
     * Atualiza os dados de endereço e contato do usuário logado.
     */
    public function atualizar(Request $request)
    {
        $dados = $request->validate([
            'whatsapp' => 'required|string|max:20',
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'complemento' => 'nullable|string|max:100',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'uf' => 'required|string|max:2',
        ]);

        Auth::user()->update($dados);

        return redirect()->route('perfil.meusDados')->with('sucesso', 'Seus dados foram atualizados com sucesso!');
    }
}