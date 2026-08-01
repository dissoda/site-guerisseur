<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'rituel_prescrit_id',
        'statut',
        'preuve_recue_le',
        'valide_le',
        'notes',
    ];

    protected $casts = [
        'preuve_recue_le' => 'datetime',
        'valide_le' => 'datetime',
    ];

    public function rituelPrescrit(): BelongsTo
    {
        return $this->belongsTo(RituelPrescrit::class);
    }
}