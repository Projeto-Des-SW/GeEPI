<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colaborador::factory()->create(['nome' => 'Douglas Filipe', 'setor_id' => 1]);
        Colaborador::factory()->create(['nome' => 'João Victor', 'setor_id' => 1]);
        Colaborador::factory()->create(['nome' => 'Luiz Gustavo', 'setor_id' => 1]);
    }
}
