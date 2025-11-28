<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimationRequest;
use App\Mail\EstimationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EstimationController extends Controller
{
    /**
     * Affiche la page d'estimation avec l'adresse éventuellement pré-remplie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Récupérer l'adresse pré-remplie depuis la page Vendre
        $adresse = $request->query('adresse', '');
        
        return view('estimation', compact('adresse'));
    }

    /**
     * Traite la soumission du formulaire d'estimation :
     * - Valide les données reçues,
     * - Envoie un email avec les informations,
     * - Redirige vers la page de succès ou retourne un message d'erreur en cas d'échec.
     *
     * @param  \App\Http\Requests\EstimationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(EstimationRequest $request)
    {
        try {
            $data = $request->validated();
            
            // Envoyer l'email
            Mail::to('gestimmo.presta@gmail.com')->send(new EstimationMail($data));

            return redirect()->route('estimation.success');
            
        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.');
        }
    }
}