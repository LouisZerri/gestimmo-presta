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

    /**
     * Crée une nouvelle instance du mail avec les données du formulaire de candidature conseiller.
     *
     * @param array $data Données du formulaire de contact conseiller.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit l'enveloppe du mail, y compris l'objet basé sur la situation et le reply-to.
     *
     * @return Envelope
     */
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

    /**
     * Définit le contenu du mail (la vue à utiliser).
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.join-contact',
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