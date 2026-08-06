<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponderSolicitacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            // Garante que o Admin só envie as palavras exatas, evitando falha no banco
            'status' => 'required|string|in:aprovado,rejeitado',

            // Obrigatório só quando o status for "rejeitado"
            'justificativa' => 'required_if:status,rejeitado|nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => 'O status enviado é inválido. Use apenas "aprovado" ou "rejeitado".',
            'justificativa.required_if' => 'Por favor, informe o motivo da recusa.',
            'justificativa.max' => 'A justificativa pode ter no máximo 500 caracteres.',
        ];
    }
}