<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvisorContactRequest;
use App\Mail\AdvisorContactMail;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdvisorController extends Controller
{
    /**
     * Affiche la vue des conseillers.
     */
    public function index(Request $request)
    {
        $query = Agent::where('actif', true);

        // Recherche par ville, code postal ou nom
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('secteur', 'like', "%{$search}%")
                    ->orWhere('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%")
                    ->orWhere('titre', 'like', "%{$search}%");
            });
        }

        $advisors = $query->orderBy('disponible', 'desc')
            ->orderBy('nom', 'asc')
            ->paginate(12)
            ->withQueryString();

        return view('advisors', compact('advisors'));
    }

    /**
     * Traite la soumission du formulaire de contact conseiller.
     */
    public function submit(AdvisorContactRequest $request)
    {
        Mail::to('gestimmo.presta@gmail.com')->send(
            new AdvisorContactMail($request->validated())
        );

        return back()->with('success', 'Votre demande a bien été envoyée. Nous vous recontacterons rapidement.');
    }
}