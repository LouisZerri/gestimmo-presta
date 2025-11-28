<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceContactRequest;
use App\Mail\InsuranceContactMail;
use Illuminate\Support\Facades\Mail;


class InsuranceController extends Controller
{
    /**
     * Affiche la page de demande de devis d'assurance.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('insurance');
    }

    /**
     * Traite la soumission du formulaire de contact d'assurance :
     * - Valide les données reçues,
     * - Envoie un email avec les informations,
     * - Redirige avec message de succès ou retourne un message d'erreur en cas d'échec.
     *
     * @param  \App\Http\Requests\InsuranceContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(InsuranceContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('gestimmo.presta@gmail.com')->send(new InsuranceContactMail($data));

            return back()->with('success', 'Votre demande de devis a bien été envoyée ! Vous recevrez une proposition sous 48h.');
            
        } catch (\Exception $e) {
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.');
        }
    }
}