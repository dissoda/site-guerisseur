<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'service_id',
        'token',
        'description_besoin',
        'statut',
    ];

    protected static function booted(): void
    {
        static::creating(function (Dossier $dossier) {
            if (empty($dossier->token)) {
                $dossier->token = Str::random(48);
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function ritualsPrescrits(): HasMany
    {
        return $this->hasMany(RituelPrescrit::class);
    }

    public function notificationsEnvoyees(): HasMany
    {
        return $this->hasMany(NotificationEnvoyee::class);
    }

    public function scopeViaToken($query, string $token)
    {
        return $query->where('token', $token);
    }
}