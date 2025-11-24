<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JoinContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $situationLabels = [
            'agent_immobilier' => 'Agent immobilier',
            'mandataire' => 'Mandataire',
            'reconversion' => 'En reconversion',
            'debutant' => 'Débutant',
            'autre' => 'Autre',
        ];
        
        $situation = $situationLabels[$this->data['situation']] ?? $this->data['situation'];
        
        return new Envelope(
            subject: '👔 Candidature conseiller (' . $situation . ') - ' . $this->data['prenom'] . ' ' . $this->data['nom'],
            replyTo: $this->data['email'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.join-contact',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}