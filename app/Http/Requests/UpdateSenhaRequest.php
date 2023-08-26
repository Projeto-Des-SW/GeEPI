<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateSenhaRequest extends FormRequest
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
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password' => 'A senha atual é obrigatória',
            'password.required' => 'A nova senha precisa ser inserida',
            'password.min' => 'A nova senha deve possuir no mínimo 8 caracteres',
            'password.confirmed' => 'Nova senha e sua confirmação não são iguais',
        ];
    }
}
