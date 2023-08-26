<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
        if(Auth::user()->tipo_usuario_id == 2)
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
            ];
        } else
        {
            return [
                'nome' => 'required|max:255|min:5',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->user())

                ],
                'contato' => 'required',
            ];
        }
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do epi é obrigatório',
            'nome.max' => 'O nome deve ter menos de 255 caracteres',
            'nome.min' => 'O nome deve ter mais de 5 caracteres',
        ];
    }
}
