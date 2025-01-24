<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

use App\Models\Parroquia;
use App\Models\Mision;
use App\Models\Nivel;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    public function mision()
    {
        return $this->belongsTo(Mision::class);
    }
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
}
