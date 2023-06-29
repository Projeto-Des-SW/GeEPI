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
        Schema::create('item_solicitacaos', function (Blueprint $table) 
        {
            $table->id();
            $table->integer('quantidade_solicitada');
            $table->integer('quantidade_aprovada');
            $table->foreignId('solicitacao_id')->constrained('solicitacaos');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('epi_id')->constrained('epis');
            $table->foreignId('colaborador_id')->constrained('colaboradores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_solicitacaos');
    }
};
