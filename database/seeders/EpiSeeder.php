<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Epi::factory()->create(['nome' => 'Bota Tam. 44', 'quantidade_minima' => 100, 'certificado_aprovacao' => '31.999']);
        Epi::factory()->create(['nome' => 'Capacete de Segurança M', 'quantidade_minima' => 50, 'certificado_aprovacao' => '36.221']);
        Epi::factory()->create(['nome' => 'Capacete de Segurança G', 'quantidade_minima' => 150, 'certificado_aprovacao' => '21.900']);
    }
}
