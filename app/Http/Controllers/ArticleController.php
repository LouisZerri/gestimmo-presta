<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Affiche la liste paginée des articles publiés.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::published()->paginate(9);
        
        return view('articles.index', compact('articles'));
    }

    /**
     * Affiche un article en s'assurant qu'il est publié, et propose des articles liés.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // Vérifier que l'article est publié
        if (!$article->is_published || $article->published_at > now()) {
            abort(404);
        }

        // Récupérer les articles liés
        $relatedArticles = $article->getRelatedArticles(2);
        
        // Si pas assez d'articles de la même catégorie, compléter avec d'autres
        if ($relatedArticles->count() < 2) {
            $additionalArticles = Article::published()
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->limit(2 - $relatedArticles->count())
                ->get();
            
            $relatedArticles = $relatedArticles->merge($additionalArticles);
        }

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}