<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ContactTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $ticketNumber;
    public $attachmentPaths;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $ticketNumber, $attachmentPaths = [])
    {
        $this->data = $data;
        $this->ticketNumber = $ticketNumber;
        $this->attachmentPaths = $attachmentPaths;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau ticket support - ' . $this->ticketNumber,
            replyTo: [$this->data['email']],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-ticket',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->attachmentPaths as $attachmentData) {
            $attachments[] = Attachment::fromStorage('public/' . $attachmentData['path'])
                ->as($attachmentData['original_name'])
                ->withMime($attachmentData['mime']);
        }

        return $attachments;
    }
}