<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradors';

    protected $fillable = ['nome', 'setor_id'];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}
