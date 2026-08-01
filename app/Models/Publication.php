<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Publication extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'titre',
        'contenu',
        'langue_origine',
        'images',
        'videos',
        'statut',
        'publie_le',
    ];

    public array $translatable = [
        'titre',
        'contenu',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'publie_le' => 'datetime',
    ];

    public function scopePubliees($query)
    {
        return $query->where('statut', 'publie');
    }
}