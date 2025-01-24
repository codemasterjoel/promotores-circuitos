<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotores extends Model
{
    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'direccion',
        'genero',
        'fecha',
        'edad',
        'profesion',
        'circuito_id',
        'mision_id',
    ];
}
