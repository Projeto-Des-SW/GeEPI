<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemSolicitacaoFactory extends Factory
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
            'quantidade_solicitada' => '',
            'quantidade_aprovada' => '',
            'solicitacao_id' => '',
            'user_id' => '',
            'epi_id' => '',
            'colaborador_id' => '',
        ];
    }
}
