<?php

namespace App\Mail;

use App\Models\RituelPrescrit;
use App\Services\Traducteur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropositionRituelMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public RituelPrescrit $rituelPrescrit)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('emails.proposition_rituel.sujet'),
        );
    }

    public function content(): Content
    {
        $traducteur = app(Traducteur::class);
        $langueSource = $this->rituelPrescrit->langue_origine;
        $langueClient = $this->rituelPrescrit->dossier->client->langue ?? 'fr';

        // On traduit à la volée le texte libre, uniquement si la langue du
        // client diffère de celle dans laquelle le guérisseur a écrit.
        $description = $langueSource === $langueClient
            ? $this->rituelPrescrit->notes_guerisseur
            : $traducteur->traduire($this->rituelPrescrit->notes_guerisseur ?? '', $langueSource, $langueClient);

        $coordonneesPaiement = $langueSource === $langueClient
            ? $this->rituelPrescrit->coordonnees_paiement
            : $traducteur->traduire($this->rituelPrescrit->coordonnees_paiement ?? '', $langueSource, $langueClient);

        $ingredients = $this->rituelPrescrit->lignesFacture->map(function ($ligne) use ($traducteur, $langueSource, $langueClient) {
            return [
                'designation' => $langueSource === $langueClient
                    ? $ligne->designation
                    : $traducteur->traduire($ligne->designation, $langueSource, $langueClient),
                'prix' => $ligne->prix,
                'quantite' => $ligne->quantite,
            ];
        });

        return new Content(
            view: 'emails.proposition-rituel',
            with: [
                'client' => $this->rituelPrescrit->dossier->client,
                'dossier' => $this->rituelPrescrit->dossier,
                'rituelPrescrit' => $this->rituelPrescrit,
                'description' => $description,
                'coordonneesPaiement' => $coordonneesPaiement,
                'ingredients' => $ingredients,
            ],
        );
    }
}