<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinContactRequest;
use App\Mail\JoinContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
{
    /**
     * Affiche la page de candidature pour rejoindre l'équipe,
     * et préremplit le message si l'utilisateur vient du bouton "Devenir conseiller".
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Récupérer si on vient du bouton "Devenir conseiller"
        $fromButton = $request->query('source', '');
        $message = '';
        
        if ($fromButton === 'conseiller') {
            $message = "Bonjour, je souhaite devenir conseiller GEST'IMMO et rejoindre votre réseau. Je suis disponible pour un entretien.";
        }
        
        return view('join', compact('message'));
    }

    /**
     * Traite la soumission du formulaire de candidature :
     * - Valide les données du formulaire,
     * - Envoie un email avec les informations du candidat,
     * - Redirige avec un message de succès ou retourne un message d'erreur en cas d'échec.
     *
     * @param \App\Http\Requests\JoinContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(JoinContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('gestimmo.presta@gmail.com')->send(new JoinContactMail($data));

            return back()->with('success', 'Votre candidature a bien été envoyée ! Notre équipe recrutement vous recontactera dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre candidature. Veuillez réessayer.');
        }
    }
}