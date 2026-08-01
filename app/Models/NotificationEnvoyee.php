<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationEnvoyee extends Model
{
    protected $table = 'notifications_envoyees';

    public $timestamps = false;

    protected $fillable = [
        'dossier_id',
        'type',
        'langue',
        'envoyee_le',
    ];

    protected $casts = [
        'envoyee_le' => 'datetime',
    ];

    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossier::class);
    }
}