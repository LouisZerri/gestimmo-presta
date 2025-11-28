<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdvisorContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Crée une nouvelle instance du mail avec les données du formulaire de contact.
     *
     * @param array $data Données du formulaire de contact.
     */
    public function __construct(public array $data)
    {
    }

    /**
     * Définit l'objet du mail (envelope).
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande de contact - Conseillers',
        );
    }

    /**
     * Définit le contenu du mail (vue à utiliser).
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.advisor-contact',
        );
    }
}