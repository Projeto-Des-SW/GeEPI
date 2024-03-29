<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSetorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255|min: 4|unique:setors,nome',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do setor é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 4 caracteres',
            'nome.max' => 'O nome deve ter menos de 255 caracteres',
            'nome.unique' => 'O nome do setor já existe'
        ];
    }
}
