<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // A autorização de Admin será feita na Parede 1 (Middlewares)
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'idade' => 'required|string',
            'porte' => 'required|string',
            'descricao' => 'required|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }
}