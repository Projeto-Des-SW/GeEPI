<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEpiRequest extends FormRequest
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
            'quantidade_minima' => 'required',
            'certificado_aprovacao' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do epi é obrigatório',
            'quantidade_minima.required' => 'A quantidade mínima é obrigatória',
            'certificado_aprovacao.required' => 'O certificado de aprovação é obrigatório',
        ];
    }
}
