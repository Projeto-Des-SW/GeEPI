<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSolicitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemSolicitacao::factory()->create(['quantidade_solicitada' => 2, 'quantidade_aprovada' => 2, 'solicitacao_id' => 1,
                                            'user_id' => 2, 'epi_id' => 1, 'colaborador_id' => 1]);

        ItemSolicitacao::factory()->create(['quantidade_solicitada' => 5, 'quantidade_aprovada' => 5, 'solicitacao_id' => 1,
                                            'user_id' => 2, 'epi_id' => 2, 'colaborador_id' => 2]);

        ItemSolicitacao::factory()->create(['quantidade_solicitada' => 5, 'quantidade_aprovada' => 3, 'solicitacao_id' => 1,
                                            'user_id' => 2, 'epi_id' => 3, 'colaborador_id' => 3]);
    }
}
