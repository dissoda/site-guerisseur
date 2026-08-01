<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MiseAJour extends Model
{
    use HasFactory;

    protected $table = 'mises_a_jour';

    protected $fillable = [
        'rituel_prescrit_id',
        'message',
        'images',
        'videos',
        'envoyee_le',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'envoyee_le' => 'datetime',
    ];

    public function rituelPrescrit(): BelongsTo
    {
        return $this->belongsTo(RituelPrescrit::class);
    }
}