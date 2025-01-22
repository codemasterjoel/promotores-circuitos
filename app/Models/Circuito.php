<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
