<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EstimationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Crée une nouvelle instance du mail avec les données de la demande d'estimation.
     *
     * @param array $data Données du formulaire d'estimation.
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
            subject: '🏡 Nouvelle demande d\'estimation - ' . $this->data['adresse_bien'] . ', ' . $this->data['ville'],
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
            view: 'emails.estimation',
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