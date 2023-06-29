<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TipoUsuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TipoUsuarioSeeder::class,
            SetorSeeder::class,
            ColaboradorSeeder::class,
            UserSeeder::class,
            EpiSeeder::class,
            SolicitacaoSeeder::class,
            EstoqueSeeder::class,
            ItemSolicitacaoSeeder::class,
        ]);
    }
}
