<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioPet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Importação caso precise manipular arquivos futuramente

class AnuncioController extends Controller
{
    // Exibe a página com base no tipo (doar, perdi, encontrei)
    public function carregarPagina($tipo)
    {
        // Só mostra anúncios já aprovados pela ONG
        $anuncios = AnuncioPet::where('tipo_anuncio', $tipo)
            ->where('status', 'aprovado')
            ->with('usuario')
            ->latest()
            ->get();

        return view('paginas.comunidade', compact('anuncios', 'tipo'));
    }

    // Salva o anúncio no banco de dados
    public function salvarAnuncio(Request $request, $tipo)
    {
        $dados = $request->validate([
            'nome_pet' => 'nullable|string|max:255',
            'especie' => 'required|string',
            'contato' => 'required|string',
            'cidade' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $caminhoFoto = 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=500';

        if ($request->hasFile('foto_url') && $request->file('foto_url')->isValid()) {
            $caminhoFoto = $request->file('foto_url')->store('anuncios', 'public');
        }

        AnuncioPet::create([
            'user_id' => Auth::id(),
            'tipo_anuncio' => $tipo,
            'nome_pet' => $dados['nome_pet'],
            'especie' => $dados['especie'],
            'contato' => $dados['contato'],
            'cidade' => $dados['cidade'],
            'descricao' => $dados['descricao'],
            'foto_url' => $caminhoFoto,
            'status' => 'pendente',
        ]);

        return redirect()->back()->with('sucesso', 'Anúncio enviado! Ele vai aparecer no site assim que a ONG aprovar. 🐾');
    }
}