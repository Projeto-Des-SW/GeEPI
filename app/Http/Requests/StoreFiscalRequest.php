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
            'nome' => 'required|max:255|min:5',
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
            'password' => 'required|min: 8|regex:/^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)/',
            'setor_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do epi é obrigatório',
            'nome.max' => 'O nome deve ter menos de 255 caracteres',
            'nome.min' => 'O nome deve ter mais de 5 caracteres',
            'email.unique' => 'Email já cadastrado no sistema!',
            'email.email' => 'Email inválido!',
            'cpf.unique' => 'CPF já cadastrado no sistema!',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula e um número.',

        ];
    }
}
