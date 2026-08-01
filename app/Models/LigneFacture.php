<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneFacture extends Model
{
    use HasFactory;

    protected $table = 'lignes_facture';

    protected $fillable = [
        'rituel_prescrit_id',
        'designation',
        'prix',
        'quantite',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'quantite' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saved(fn (LigneFacture $ligne) => $ligne->rituelPrescrit->recalculerMontantTotal());
        static::deleted(fn (LigneFacture $ligne) => $ligne->rituelPrescrit->recalculerMontantTotal());
    }

    public function rituelPrescrit(): BelongsTo
    {
        return $this->belongsTo(RituelPrescrit::class);
    }
}