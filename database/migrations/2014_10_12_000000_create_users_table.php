<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) 
        {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf')->unique()->nullable();
            $table->string('contato');
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('tipo_usuario_id')->constrained('tipo_usuarios');
            $table->foreignId('setor_id')->constrained('setores')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
