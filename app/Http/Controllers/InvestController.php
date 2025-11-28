<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestContactRequest;
use App\Mail\InvestContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvestController extends Controller
{
    /**
     * Affiche la page d'investissement avec la liste des régions
     * et éventuellement un message pré-rempli si une région est passée en paramètre.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $regions = [
            'Nouvelle-Aquitaine', 'Île-de-France', 'Auvergne-Rhône-Alpes',
            'Occitanie', 'PACA', 'Hauts-de-France', 'Grand Est',
            'Pays de la Loire', 'Bretagne', 'Normandie'
        ];
        
        // Récupérer la région pré-remplie depuis la query string
        $region = $request->query('region', '');
        $message = '';
        
        if ($region) {
            $message = "Bonjour, je suis intéressé(e) par des opportunités d'investissement en région {$region}. Pouvez-vous me recontacter ?";
        }
        
        return view('invest', compact('regions', 'message'));
    }

    /**
     * Traite la soumission du formulaire de contact investissement :
     * - Valide les données reçues,
     * - Envoie un email avec les informations,
     * - Redirige avec un message de succès ou retourne un message d'erreur en cas d'échec.
     *
     * @param \App\Http\Requests\InvestContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(InvestContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            // Envoyer l'email
            Mail::to('gestimmo.presta@gmail.com')->send(new InvestContactMail($data));
            
            return back()->with('success', 'Votre demande a bien été envoyée ! Notre équipe vous recontactera dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.');
        }
    }
}