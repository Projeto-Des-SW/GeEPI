<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSolicitacao extends Model
{
    use HasFactory;

    public function epi()
    {
        return $this->belongsTo(Epi::class);
    }
}
