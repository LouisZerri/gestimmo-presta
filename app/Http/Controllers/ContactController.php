<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\ContactTicket;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Affiche la page de contact.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Traite la soumission du formulaire de contact :
     * - Génère un numéro de ticket
     * - Gère et stocke les pièces jointes
     * - Envoie le mail de ticket avec les informations
     * - Gère le succès ou l'échec avec messages appropriés
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();

        try {
            // Génération d'un numéro de ticket
            $ticketNumber = 'TK-' . strtoupper(substr(md5(time() . $validated['email']), 0, 8));

            // Gestion des pièces jointes
            $attachmentPaths = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    // Stocker le fichier dans storage/app/contact-attachments
                    $path = $file->store('contact-attachments', 'public');
                    $attachmentPaths[] = [
                        'path' => $path,
                        'original_name' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                    ];
                }
            }

            // Envoi de l'email avec les pièces jointes
            Mail::to('gestimmo.presta@gmail.com')->send(
                new ContactTicket($validated, $ticketNumber, $attachmentPaths)
            );

            // Redirection avec message de succès
            return redirect()->route('contact')
                ->with('success', "Votre ticket #{$ticketNumber} a bien été créé. Vous recevrez une confirmation par email sous 24h ouvrées.");

        } catch (\Exception $e) {
            // En cas d'erreur, supprimer les fichiers uploadés
            if (!empty($attachmentPaths)) {
                foreach ($attachmentPaths as $attachment) {
                    Storage::disk('public')->delete($attachment['path']);
                }
            }

            // Redirection avec message d'erreur
            return redirect()->route('contact')
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.')
                ->withInput();
        }
    }
}