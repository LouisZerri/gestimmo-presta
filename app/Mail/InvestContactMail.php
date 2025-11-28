<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvestContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Crée une nouvelle instance du mail avec les données de la demande d'investissement.
     *
     * @param array $data Données du formulaire d'investissement.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit l'enveloppe du mail, y compris l'objet et le reply-to.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🏠 Nouvelle demande d\'investissement - ' . $this->data['prenom'] . ' ' . $this->data['nom'],
            replyTo: $this->data['email'],
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
            view: 'emails.invest-contact',
        );
    }

    /**
     * Retourne les pièces jointes éventuelles (aucune ici).
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}