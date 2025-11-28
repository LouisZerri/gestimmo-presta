<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil avec :
     * - Les 3 derniers articles publiés
     * - La liste des régions principales (pour la recherche ou la navigation)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::published()->take(3)->get();
        
        $regions = [
            'Nouvelle-Aquitaine', 'Île-de-France', 'Auvergne-Rhône-Alpes',
            'Occitanie', 'PACA', 'Hauts-de-France', 'Grand Est',
            'Pays de la Loire', 'Bretagne', 'Normandie'
        ];
        
        return view('home', compact('articles', 'regions'));
    }
}