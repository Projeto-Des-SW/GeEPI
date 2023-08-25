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
        Schema::create('movimento_epis', function (Blueprint $table)
        {
            $table->id();
            $table->string('tipo');
            $table->integer('quantidade');
            $table->string('descricao');
            $table->foreignId('epi_id')->constrained('epis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimento_epis');
    }
};
