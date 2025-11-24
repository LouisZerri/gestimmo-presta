<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestContactRequest;
use App\Mail\InvestContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class InvestController extends Controller
{
    public function index()
    {
        $regions = [
            'Nouvelle-Aquitaine', 'Île-de-France', 'Auvergne-Rhône-Alpes',
            'Occitanie', 'PACA', 'Hauts-de-France', 'Grand Est',
            'Pays de la Loire', 'Bretagne', 'Normandie'
        ];
        
        return view('invest', compact('regions'));
    }

    public function submit(InvestContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            // Envoyer l'email
            Mail::to('contact@gestimmo-presta.fr')->send(new InvestContactMail($data));
            
            return back()->with('success', 'Votre demande a bien été envoyée ! Notre équipe vous recontactera dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer ou nous contacter directement par téléphone.');
        }
    }
}