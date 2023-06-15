<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TipoUsuario::factory()->create(['tipo' => 'Administrador']);
        TipoUsuario::factory()->create(['tipo' => 'Fiscal']);
    }
}
