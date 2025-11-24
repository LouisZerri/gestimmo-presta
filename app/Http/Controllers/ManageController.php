<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageContactRequest;
use App\Mail\ManageContactMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ManageController extends Controller
{
    public function index()
    {
        // Récupérer les articles des catégories pertinentes pour la gestion
        $articles = Article::published()
            ->whereIn('category', ['Juridique', 'Fiscalité', 'Copro'])
            ->take(3)
            ->get();
        
        return view('manage', compact('articles'));
    }

    public function submit(ManageContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('contact@gestimmo-presta.fr')->send(new ManageContactMail($data));
            
            Log::info('Demande gestion reçue', [
                'nom' => $data['nom'],
                'email' => $data['email'],
                'type_demande' => $data['type_demande'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Votre demande a bien été envoyée ! Notre équipe vous recontactera dans les plus brefs délais.'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur envoi formulaire gestion', [
                'error' => $e->getMessage(),
                'data' => $request->except(['_token']),
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.'
            ], 500);
        }
    }
}