<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'texte',
        'statut',
    ];

    public function scopePublies($query)
    {
        return $query->where('statut', 'publie');
    }
}