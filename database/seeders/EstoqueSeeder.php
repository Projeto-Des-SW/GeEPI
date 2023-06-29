<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estoque::factory()->create(['quantidade' => 25, 'epi_id' => 1]);
        Estoque::factory()->create(['quantidade' => 25, 'epi_id' => 2]);
        Estoque::factory()->create(['quantidade' => 25, 'epi_id' => 3]);
    }
}
