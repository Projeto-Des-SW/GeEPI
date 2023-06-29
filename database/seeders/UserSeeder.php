<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory()->create(['nome'=> 'Administrador', 'email' => 'admin@admin.teste', 'contato' => '87996638997',
            'password'=> Hash::make('admin123'), 'tipo_usuario_id' => 1]);

        User::factory()->create(['nome'=> 'Fiscal', 'email' => 'fiscal@fiscal.teste', 'cpf' => '123.456.789-00',
            'contato' => '87996638998', 'password'=> Hash::make('fiscal123'), 'tipo_usuario_id' => 2, 'setor_id' => 1]);

    }
}
