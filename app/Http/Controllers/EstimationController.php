<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimationRequest;
use App\Mail\EstimationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EstimationController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer l'adresse pré-remplie depuis la page Vendre
        $adresse = $request->query('adresse', '');
        
        return view('estimation', compact('adresse'));
    }

    public function submit(EstimationRequest $request)
    {
        try {
            $data = $request->validated();
            
            // Envoyer l'email
            Mail::to('gestimmo.presta@gmail.com')->send(new EstimationMail($data));
            
            // Log pour traçabilité
            Log::info('Demande estimation reçue', [
                'nom' => $data['nom'],
                'email' => $data['email'],
                'adresse_bien' => $data['adresse_bien'],
                'type_bien' => $data['type_bien'],
            ]);

            return redirect()->route('estimation.success');
            
        } catch (\Exception $e) {
            Log::error('Erreur envoi formulaire estimation', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.');
        }
    }
}