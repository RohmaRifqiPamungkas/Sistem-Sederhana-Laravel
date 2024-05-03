<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeriBuku extends Model
{
    // use HasFactory;
    protected $table = 'seri_buku';
    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class, 'id_seri_buku', 'id');
    }
}