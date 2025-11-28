<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageContactRequest;
use App\Mail\ManageContactMail;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class ManageController extends Controller
{
    /**
     * Affiche la page de gestion avec :
     * - Les 3 derniers articles publiés dans les catégories Juridique, Fiscalité, Copro
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer les articles des catégories pertinentes pour la gestion
        $articles = Article::published()
            ->whereIn('category', ['Juridique', 'Fiscalité', 'Copro'])
            ->take(3)
            ->get();
        
        return view('manage', compact('articles'));
    }

    /**
     * Traite la soumission du formulaire de contact gestion :
     * - Valide les données du formulaire,
     * - Envoie un email avec les informations,
     * - Retourne une réponse JSON de succès ou d'erreur.
     *
     * @param \App\Http\Requests\ManageContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(ManageContactRequest $request)
    {
        try {
            $data = $request->validated();
            
            Mail::to('gestimmo.presta@gmail.com')->send(new ManageContactMail($data));
            
            return response()->json([
                'success' => true,
                'message' => 'Votre demande a bien été envoyée ! Notre équipe vous recontactera dans les plus brefs délais.'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.'
            ], 500);
        }
    }
}