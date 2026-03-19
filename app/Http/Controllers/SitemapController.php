<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $articles = Cache::remember('sitemap_articles', 3600, fn () => Article::published()->get());

        $staticPages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => route('sell'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => route('invest'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => route('invest.neuf'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('invest.viager'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('manage'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => route('rental'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('rental.complete'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('rental.technical'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('rental.alacarte'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('edl'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('insurance'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('advisors'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('join'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('faq'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('articles.index'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('pro.edl'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('pro.nourrice'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('fees'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => route('legal'), 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['url' => route('privacy'), 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $content = view('sitemap', compact('staticPages', 'articles'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
