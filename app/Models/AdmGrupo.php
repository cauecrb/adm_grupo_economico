<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmGrupo extends Model
{
    use HasFactory;

    protected $table = 'gruposEconomicos';

    protected $fillable = [
        'nome',
    ];
}
