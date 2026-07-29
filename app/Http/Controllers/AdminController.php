<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\SolicitacaoAdocao;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\ResponderSolicitacaoRequest;

class AdminController extends Controller
{
    /* =========================================================================
     *  1. TRIAGEM & SOLICITAÇÕES DE ADOÇÃO
     * ========================================================================= */

    /**
     * Carrega a Central de Triagem / Dashboard
     */
    public function triagem()
    {
        $solicitacoes = SolicitacaoAdocao::with(['usuario', 'animal'])->latest()->get();

        $totalPets = Animal::count();
        $pendentes = SolicitacaoAdocao::where('status', 'pendente')->count();
        $adocoesSucesso = SolicitacaoAdocao::where('status', 'aprovado')->count();

        return view('admin.triagem', compact(
            'solicitacoes', 
            'totalPets', 
            'pendentes', 
            'adocoesSucesso'
        ));
    }

    /**
     * Exibe a ficha completa de uma solicitação de adoção
     */
    public function verSolicitacao($id)
{
    $solicitacao = SolicitacaoAdocao::with(['usuario', 'animal'])->findOrFail($id);

    // Alterado aqui: de 'admin.ver_solicitacao' para 'admin.detalhes-solicitacao'
    return view('admin.detalhes-solicitacao', compact('solicitacao'));
}

    /**
     * Aprova ou Rejeita a solicitação de adoção
     */
    public function responderSolicitacao(ResponderSolicitacaoRequest $request, $id)
    {
        $solicitacao = SolicitacaoAdocao::findOrFail($id);
        $status = $request->input('status');

        $solicitacao->update(['status' => $status]);

        if ($status === 'aprovado') {
            $solicitacao->animal->update(['status' => 'adotado']);
            $mensagem = 'Adoção aprovada com sucesso! O pet agora está com status Adotado.';
        } else {
            $solicitacao->animal->update(['status' => 'disponivel']);
            $mensagem = 'Adoção recusada. O pet voltou a ficar disponível para a vitrine.';
        }

        return redirect()->route('admin.triagem')->with('sucesso', $mensagem);
    }

    /* =========================================================================
     *  2. GERENCIAMENTO DE ANIMAIS
     * ========================================================================= */

    /**
     * Lista todos os animais no painel
     */
    public function indexAnimais()
    {
        $animais = Animal::latest()->get();
        return view('admin.animais', compact('animais'));
    }

    /**
     * Cadastra um novo animal
     */
    public function salvarAnimal(AnimalRequest $request)
    {
        $dados = $request->validated(); 

        $caminhoFoto = 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500'; 

        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            $caminhoFoto = $request->file('foto_url')->store('animais', 'public');
        }

        $dados['foto_url'] = $caminhoFoto;
        Animal::create($dados);
        
        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal cadastrado com sucesso!');
    }

    /**
     * Atualiza as informações de um animal
     */
    public function atualizarAnimal(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $dados = $request->validated();

        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            $caminhoFoto = $request->file('foto_url')->store('animais', 'public');
            $dados['foto_url'] = $caminhoFoto;
        } else {
            unset($dados['foto_url']);
        }

        $animal->update($dados);

        return redirect()->route('admin.animais.index')->with('sucesso', 'Informações do pet atualizadas com sucesso!');
    }

    /**
     * Remove um animal do sistema
     */
    public function deletarAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('admin.animais.index')->with('sucesso', 'Animal removido do sistema.');
    }
}