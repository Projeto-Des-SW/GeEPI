<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = 'solicitacaos';
    protected $fillable = ['status', 'observacao_fiscal', 'observacao_admin', 'data_aprovacao', 'data_finalzacao', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
