<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InsuranceContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Crée une nouvelle instance du mail avec les données du formulaire assurance.
     *
     * @param array $data Données du formulaire de contact assurance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit l'enveloppe du mail : objet et reply-to.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        $produits = implode(', ', $this->data['produits']);
        
        return new Envelope(
            subject: '🛡️ Demande assurance (' . $produits . ') - ' . $this->data['prenom'] . ' ' . $this->data['nom'],
            replyTo: $this->data['email'],
        );
    }

    /**
     * Définit le contenu du mail (la vue à utiliser pour l'email).
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.insurance-contact',
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