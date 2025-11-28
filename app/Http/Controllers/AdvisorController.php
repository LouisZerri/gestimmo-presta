<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvisorContactRequest;
use App\Mail\AdvisorContactMail;
use Illuminate\Support\Facades\Mail;

class AdvisorController extends Controller
{
    /**
     * Affiche la vue des conseillers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('advisors');
    }

    /**
     * Traite la soumission du formulaire de contact conseiller.
     *
     * @param  \App\Http\Requests\AdvisorContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(AdvisorContactRequest $request)
    {
        Mail::to('gestimmo.presta@gmail.com')->send(
            new AdvisorContactMail($request->validated())
        );

        return back()->with('success', 'Votre demande a bien été envoyée. Nous vous recontacterons rapidement.');
    }
}