<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ManageContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $subjects = [
            'tarifs_unitaires' => '📋 Demande tarifs gestion à la carte',
            'gestion_complete' => '🔑 Demande gestion locative complète',
            'devis_syndic' => '🏢 Demande devis syndic',
        ];

        $subject = $subjects[$this->data['type_demande']] ?? '📩 Nouvelle demande gestion';

        return new Envelope(
            subject: $subject . ' - ' . $this->data['prenom'] . ' ' . $this->data['nom'],
            replyTo: $this->data['email'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.manage-contact',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}