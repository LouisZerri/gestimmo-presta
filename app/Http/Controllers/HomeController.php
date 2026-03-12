<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::published()->take(3)->get();
        $testimonials = Testimonial::published()->forPage('home')->get();

        $regions = [
            'Nouvelle-Aquitaine', 'Île-de-France', 'Auvergne-Rhône-Alpes',
            'Occitanie', 'PACA', 'Hauts-de-France', 'Grand Est',
            'Pays de la Loire', 'Bretagne', 'Normandie'
        ];

        return view('home', compact('articles', 'regions', 'testimonials'));
    }
}