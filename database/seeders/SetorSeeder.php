<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setor::factory()->create(['nome' => 'Mirim']);
        Setor::factory()->create(['nome' => 'CPO']);
        Setor::factory()->create(['nome' => 'Vale do Una']);
    }
}
