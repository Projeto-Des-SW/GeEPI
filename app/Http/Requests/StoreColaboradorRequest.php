<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min: 5',
            'setor_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do colaborador é obrigatório!',
            'nome.min' => 'O nome do colaborador precisa ter no mínimo 5 caracteres!',
            'setor_id' => 'O setor é obrigatório!',
        ];
    }
}
