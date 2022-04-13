<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertif extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename', 'univ_id'
    ];

    public function univ()
    {
        return $this->belongsTo(User::class, 'univ_id', 'id');
    }
}
