<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestContactRequest;
use App\Mail\InvestContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class InvestController extends Controller
{
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

    public function submit(InvestContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            // Envoyer l'email
            Mail::to('gestimmo.presta@gmail.com')->send(new InvestContactMail($data));
            
            // Log pour traçabilité
            Log::info('Demande investissement reçue', [
                'nom' => $data['nom'],
                'email' => $data['email'],
                'type_bien' => $data['type_bien'] ?? 'Non précisé',
            ]);

            return back()->with('success', 'Votre demande a bien été envoyée ! Notre équipe vous recontactera dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            Log::error('Erreur envoi formulaire investissement', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.');
        }
    }
}