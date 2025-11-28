<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_color',
        'image',
        'excerpt',
        'content',
        'author',
        'author_role',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Boot method du modèle Article.
     * Assigne un slug à partir du titre si absent, et définit published_at à la création si non fourni.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
            if (empty($article->published_at)) {
                $article->published_at = now();
            }
        });
    }

    /**
     * Scope pour récupérer uniquement les articles publiés, ordonnés par date de publication décroissante.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now())
                     ->orderBy('published_at', 'desc');
    }

    /**
     * Récupère les articles liés appartenant à la même catégorie, exclus l'article courant.
     *
     * @param int $limit Nombre d'articles à retourner
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRelatedArticles($limit = 2)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where('category', $this->category)
            ->limit($limit)
            ->get();
    }

    /**
     * Indique à Laravel d'utiliser le champ 'slug' comme identifiant dans les routes.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Retourne la date de publication formatée en français ('d F Y').
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at->translatedFormat('d F Y');
    }
}