<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceContactRequest;
use App\Mail\InsuranceContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class InsuranceController extends Controller
{
    public function index()
    {
        return view('insurance');
    }

    public function submit(InsuranceContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('gestimmo.presta@gmail.com')->send(new InsuranceContactMail($data));
            
            Log::info('Demande assurance reçue', [
                'nom' => $data['nom'],
                'email' => $data['email'],
                'produits' => $data['produits'],
            ]);

            return back()->with('success', 'Votre demande de devis a bien été envoyée ! Vous recevrez une proposition sous 48h.');
            
        } catch (\Exception $e) {
            Log::error('Erreur envoi formulaire assurance', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.');
        }
    }
}