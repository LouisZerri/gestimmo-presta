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

    // Génération automatique du slug
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

    // Scope pour les articles publiés
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now())
                     ->orderBy('published_at', 'desc');
    }

    // Récupérer les articles liés (même catégorie, sauf l'actuel)
    public function getRelatedArticles($limit = 2)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where('category', $this->category)
            ->limit($limit)
            ->get();
    }

    // Route model binding par slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Formater la date
    public function getFormattedDateAttribute()
    {
        return $this->published_at->translatedFormat('d F Y');
    }
}