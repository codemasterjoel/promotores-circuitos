<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotores extends Model
{
    protected $fillable = [
        'cedula',
        'nombre_completo',
        'telefono',
        'circuito_id',
    ];
}
