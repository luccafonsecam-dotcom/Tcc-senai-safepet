<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtualizarPerfilRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Retornamos true porque o usuário já estará logado 
        // e o bloqueio de rotas será feito na Parede 1 (Middlewares)
        return true; 
    }

    public function rules(): array
    {
        return [
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'uf' => 'required|string|max:2',
        ];
    }
}