<?php

namespace App\Observers;

use App\Mail\PaiementConfirmeMail;
use App\Models\NotificationEnvoyee;
use App\Models\Paiement;
use Illuminate\Support\Facades\Mail;

class PaiementObserver
{
    /**
     * Se déclenche à la création d'un nouveau paiement.
     */
    public function created(Paiement $paiement): void
    {
        if ($paiement->statut === 'valide') {
            $this->confirmerPaiement($paiement);
        }
    }

    /**
     * Se déclenche à chaque modification d'un paiement existant.
     */
    public function updated(Paiement $paiement): void
    {
        if ($paiement->wasChanged('statut') && $paiement->statut === 'valide') {
            $this->confirmerPaiement($paiement);
        }
    }

    /**
     * Logique commune : met à jour le rituel, envoie l'email, trace la notification.
     */
    protected function confirmerPaiement(Paiement $paiement): void
    {
        $rituelPrescrit = $paiement->rituelPrescrit;
        $dossier = $rituelPrescrit->dossier;
        $client = $dossier->client;
        $langue = $client->langue ?? 'fr';

        $rituelPrescrit->update(['statut' => 'rituel_en_cours']);

        Mail::to($client->email)
            ->locale($langue)
            ->send(new PaiementConfirmeMail($paiement));

        NotificationEnvoyee::create([
            'dossier_id' => $dossier->id,
            'type' => 'confirmation_paiement',
            'langue' => $langue,
            'envoyee_le' => now(),
        ]);
    }
}