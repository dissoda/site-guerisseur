<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RituelPrescrit extends Model
{
    use HasFactory;

    protected $table = 'rituels_prescrits';

    protected $fillable = [
        'dossier_id',
        'langue_origine',
        'origine',
        'notes_guerisseur',
        'coordonnees_paiement',
        'montant_total',
        'statut',
        'envoye_le',
    ];

    protected $casts = [
        'montant_total' => 'decimal:2',
        'envoye_le' => 'datetime',
    ];

    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossier::class);
    }

    public function lignesFacture(): HasMany
    {
        return $this->hasMany(LigneFacture::class);
    }

    public function paiement(): HasOne
    {
        return $this->hasOne(Paiement::class);
    }

    public function misesAJour(): HasMany
    {
        return $this->hasMany(MiseAJour::class);
    }

    public function recalculerMontantTotal(): void
    {
        $total = $this->lignesFacture()
            ->get()
            ->sum(fn (LigneFacture $ligne) => $ligne->prix * $ligne->quantite);

        $this->update(['montant_total' => $total]);
    }
}