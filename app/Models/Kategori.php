<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'kat_id', 'nama', 'parent_id'
    ];

    public function parent()
    {
        if ($this->parent_id) {
            return Kategori::find($this->parent_id);
        }
        return null;
    }

    public function child()
    {
        return Kategori::where('parent_id', $this->id)->get();
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'kat_id');
    }
}
