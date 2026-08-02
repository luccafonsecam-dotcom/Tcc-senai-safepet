<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class VitrineController extends Controller
{
    /**
     * Exibe a vitrine pública de pets com suporte a filtros dinâmicos
     */
   public function index(Request $request)
{
    // Começa a busca trazendo apenas animais disponíveis para adoção
    $query = Animal::where('status', 'disponivel');

    if ($request->filled('especie')) {
        $query->where('especie', $request->especie);
    }

    if ($request->filled('porte')) {
        $query->where('porte', $request->porte);
    }

    if ($request->filled('idade')) {
        $query->where('idade', $request->idade);
    }

    if ($request->filled('busca')) {
        $query->where('nome', 'like', '%' . $request->busca . '%');
    }

    switch ($request->input('ordenar')) {
        case 'nome_asc':
            $query->orderBy('nome', 'asc');
            break;
        case 'nome_desc':
            $query->orderBy('nome', 'desc');
            break;
        case 'antigos':
            $query->oldest();
            break;
        default:
            $query->latest();
            break;
    }

    $animais = $query->get();

    return view('vitrine.index', compact('animais'));
}
    /**
     * Exibe os detalhes de um pet específico
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        
        // Caminho para apontar para a sua pasta 'vitrine.show'
        return view('vitrine.show', compact('animal'));
    }
}