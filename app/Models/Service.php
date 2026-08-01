<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'slug',
        'langue_origine',
        'nom',
        'description',
        'actif',
    ];

    public array $translatable = [
        'nom',
        'description',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    public function dossiers(): HasMany
    {
        return $this->hasMany(Dossier::class);
    }
}