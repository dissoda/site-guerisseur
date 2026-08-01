<?php

namespace App\Mail;

use App\Models\Paiement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaiementConfirmeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Paiement $paiement)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('emails.paiement_confirme.sujet'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.paiement-confirme',
            with: [
                'client' => $this->paiement->rituelPrescrit->dossier->client,
                'rituelPrescrit' => $this->paiement->rituelPrescrit,
            ],
        );
    }
}