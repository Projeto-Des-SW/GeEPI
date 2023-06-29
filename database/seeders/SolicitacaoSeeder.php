<?php

namespace Database\Seeders;

use App\Models\Solicitacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Solicitacao::factory()->create(['status' => 'Em análise', 'observacao_fiscal' => 'OBS Fiscal', 'observacao_administrador' => 'OBS Admin',
                                        'data_aprovacao' => '28-06-2023', 'data_finalizacao' => '29-06-2023', 'user_id' => 2]);
    }
}
