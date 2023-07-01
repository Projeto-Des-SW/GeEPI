<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Epi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'epis';
    protected $dates = ['deleted_at'];

    protected $fillable = ['nome', 'quantidade_minima', 'certificado_aprovacao'];
}
