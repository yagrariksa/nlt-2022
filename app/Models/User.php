<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'ketua',
        'email',
        'univ',
        'password',
        'akronim'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'user_id', 'id');
    }

    public function jumlahPeserta()
    {
        return sizeof($this->peserta);
    }

    public function kantong()
    {
        return $this->hasMany(Kantong::class, 'user_id', 'id');
    }

    public function sertif()
    {
        return $this->hasMany(Sertif::class, 'univ_id', 'id');
    }
}
