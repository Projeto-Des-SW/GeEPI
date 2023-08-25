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
            'nome' => 'required|max:255|min:5',
            'quantidade_minima' => 'required',
            'certificado_aprovacao' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do epi é obrigatório',
            'nome.max' => 'O nome do epi deve ter menos de 255 caracteres',
            'nome.min' => 'O nome do epi deve ter mais de 5 caracteres',
            'quantidade_minima.required' => 'A quantidade mínima é obrigatória',
            'certificado_aprovacao.required' => 'O certificado de aprovação é obrigatório',
            'certificado_aprovacao.numeric' => 'O certificado de aprovação deve conter apenas números',
        ];
    }
}
