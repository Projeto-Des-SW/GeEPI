<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoEpi extends Model
{
    use HasFactory;

    protected $table = 'movimento_epis';

    protected $fillable = ['tipo', 'quantidade', 'descricao', 'epi_id'];
}
