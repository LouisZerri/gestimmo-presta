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

    /**
     * Crée une nouvelle instance du mail avec les données du formulaire de gestion.
     *
     * @param array $data Données du formulaire de contact gestion.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit l'enveloppe du mail, y compris l'objet basé sur le type de demande et le reply-to.
     *
     * @return Envelope
     */
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

    /**
     * Définit le contenu du mail (vue à utiliser).
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.manage-contact',
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