<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SolicitacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return 
        [
            'status' => '',
            'observacao_fiscal' => '',
            'observacao_administrador' => '',
            'data_aprovacao' => '',
            'data_finazacao' => '',
            'user_id' => '',
        ];
    }
}
