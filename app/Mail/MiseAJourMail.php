<?php

namespace App\Mail;

use App\Models\MiseAJour;
use App\Services\Traducteur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MiseAJourMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public MiseAJour $miseAJour)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('emails.mise_a_jour.sujet'),
        );
    }

    public function content(): Content
    {
        $rituelPrescrit = $this->miseAJour->rituelPrescrit;
        $client = $rituelPrescrit->dossier->client;

        $langueSource = $rituelPrescrit->langue_origine;
        $langueClient = $client->langue ?? 'fr';

        $texteMessage = $langueSource === $langueClient
            ? $this->miseAJour->message
            : app(Traducteur::class)->traduire($this->miseAJour->message ?? '', $langueSource, $langueClient);

        return new Content(
            view: 'emails.mise-a-jour',
            with: [
                'client' => $client,
                'dossier' => $rituelPrescrit->dossier,
                'texteMessage' => $texteMessage,
                'images' => $this->miseAJour->images ?? [],
            ],
        );
    }
}