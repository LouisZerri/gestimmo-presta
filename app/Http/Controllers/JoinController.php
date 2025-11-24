<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinContactRequest;
use App\Mail\JoinContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class JoinController extends Controller
{
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

    public function submit(JoinContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('contact@gestimmo-presta.fr')->send(new JoinContactMail($data));
            
            Log::info('Candidature conseiller reçue', [
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'ville' => $data['ville'],
                'situation' => $data['situation'],
            ]);

            return back()->with('success', 'Votre candidature a bien été envoyée ! Notre équipe recrutement vous recontactera dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            Log::error('Erreur envoi candidature conseiller', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre candidature. Veuillez réessayer.');
        }
    }
}