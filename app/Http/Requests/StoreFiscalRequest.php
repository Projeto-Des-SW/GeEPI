<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFiscalRequest extends FormRequest
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
            'nome' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user())

            ],
            'cpf' =>  [
                'required',
                Rule::unique('users', 'cpf')->ignore($this->user())

            ],
            'contato' => 'required',
            'password' => 'required|min: 8',
            'setor_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do epi é obrigatório',
            'email.unique' => 'Email já cadastrado no sistema!',
            'email.email' => 'Email inválido!',
            'cpf.unique' => 'CPF já cadastrado no sistema!',
        ];
    }
}
