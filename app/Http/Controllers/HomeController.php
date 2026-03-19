<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Cache::remember('home_articles', 3600, fn () => Article::published()->take(3)->get());
        $testimonials = Cache::remember('home_testimonials', 3600, fn () => Testimonial::published()->forPage('home')->get());

        $regions = [
            'Nouvelle-Aquitaine', 'Île-de-France', 'Auvergne-Rhône-Alpes',
            'Occitanie', 'PACA', 'Hauts-de-France', 'Grand Est',
            'Pays de la Loire', 'Bretagne', 'Normandie'
        ];

        return view('home', compact('articles', 'regions', 'testimonials'));
    }
}