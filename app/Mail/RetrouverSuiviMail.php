<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RetrouverSuiviMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Client $client)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('emails.retrouver_suivi.sujet'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.retrouver-suivi',
            with: [
                'client' => $this->client,
                'dossiers' => $this->client->dossiers()->latest()->get(),
            ],
        );
    }
}