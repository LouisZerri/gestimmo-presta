<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenAI;

class GenerateArticle extends Command
{
    protected $signature = 'articles:generate
                            {--category= : Catégorie spécifique (Marché, Conseil, Juridique, Fiscalité)}
                            {--publish : Publier directement l\'article}
                            {--with-image : Générer une image avec DALL-E}';

    protected $description = 'Génère automatiquement un article de blog optimisé SEO via GPT-4o';

    protected array $categories = [
        'Marché' => 'bg-brand-blue',
        'Conseil' => 'bg-green-500',
        'Juridique' => 'bg-purple-600',
        'Fiscalité' => 'bg-amber-500',
    ];

    protected array $topics = [
        'Marché' => [
            'Les tendances du marché immobilier en France',
            'Évolution des prix immobiliers par région',
            'Impact des taux d\'intérêt sur l\'immobilier',
            'Le marché locatif en France : état des lieux',
            'Immobilier neuf vs ancien : comparatif',
        ],
        'Conseil' => [
            'Comment bien préparer son bien pour la vente',
            'Les étapes clés d\'un investissement locatif réussi',
            'Guide du premier achat immobilier',
            'Comment choisir son gestionnaire locatif',
            'Optimiser la rentabilité de son bien locatif',
        ],
        'Juridique' => [
            'Les obligations du bailleur en 2026',
            'Diagnostic immobilier : ce qui change',
            'Les nouvelles normes énergétiques pour les locations',
            'Bail mobilité : tout ce qu\'il faut savoir',
            'Copropriété : droits et obligations du syndic',
        ],
        'Fiscalité' => [
            'Déficit foncier : comment réduire ses impôts',
            'LMNP : avantages fiscaux de la location meublée',
            'La fiscalité du viager décryptée',
            'Investissement Pinel : ce qui change en 2026',
            'Plus-value immobilière : calcul et exonérations',
        ],
    ];

    public function handle(): int
    {
        $apiKey = config('services.openai.api_key');

        if (empty($apiKey)) {
            $this->error('Clé API OpenAI non configurée. Ajoutez OPENAI_API_KEY dans .env');
            return self::FAILURE;
        }

        $category = $this->option('category');
        if ($category && !isset($this->categories[$category])) {
            $this->error("Catégorie invalide. Choix : " . implode(', ', array_keys($this->categories)));
            return self::FAILURE;
        }

        // Choisir une catégorie et un sujet aléatoire
        if (!$category) {
            $category = array_rand($this->categories);
        }

        $topic = $this->topics[$category][array_rand($this->topics[$category])];

        $this->info("Génération d'un article [{$category}] sur : {$topic}");

        try {
            $client = OpenAI::client($apiKey);

            $response = $client->chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "Tu es un expert en immobilier français spécialisé dans la rédaction d'articles pour GEST'IMMO, un réseau immobilier hybride.
Rédige des articles informatifs, optimisés SEO, avec un ton accessible et professionnel.
Inclus des informations récentes et pertinentes pour le marché immobilier français.
Structure l'article avec des sous-titres HTML (h2, h3) et des paragraphes.
N'utilise pas de markdown, uniquement du HTML."
                    ],
                    [
                        'role' => 'user',
                        'content' => "Rédige un article complet sur : \"{$topic}\"

Catégorie : {$category}

L'article doit contenir :
1. Un titre accrocheur
2. Un extrait/résumé de 2-3 phrases
3. Le contenu complet (800-1200 mots) avec :
   - Introduction engageante
   - 3-4 sections avec sous-titres (<h2> et <h3>)
   - Conseils pratiques
   - Conclusion avec appel à l'action vers GEST'IMMO
4. Un titre SEO optimisé (max 60 caractères)
5. Une meta description SEO (max 155 caractères)
6. 5-8 mots-clés pertinents séparés par des virgules

Retourne au format JSON : title, excerpt, content, meta_title, meta_description, keywords"
                    ],
                ],
                'temperature' => 0.7,
                'max_tokens' => 4000,
                'response_format' => ['type' => 'json_object'],
            ]);

            $data = json_decode($response->choices[0]->message->content, true);

            if (!$data || !isset($data['title']) || !isset($data['content'])) {
                $this->error('Réponse IA invalide.');
                return self::FAILURE;
            }

            $articleData = [
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'category' => $category,
                'category_color' => $this->categories[$category],
                'excerpt' => $data['excerpt'] ?? '',
                'content' => $data['content'],
                'meta_title' => $data['meta_title'] ?? '',
                'meta_description' => $data['meta_description'] ?? '',
                'keywords' => $data['keywords'] ?? '',
                'author' => "GEST'IMMO",
                'author_role' => 'Rédaction IA',
                'image' => '',
                'is_published' => $this->option('publish'),
                'published_at' => $this->option('publish') ? now() : null,
            ];

            // Générer image si demandé
            if ($this->option('with-image')) {
                $this->info('Génération de l\'image...');
                try {
                    $imgResponse = $client->images()->create([
                        'model' => 'dall-e-3',
                        'prompt' => "Professional real estate photography for article: {$topic}. Modern, clean, no text, warm lighting.",
                        'n' => 1,
                        'size' => '1792x1024',
                        'quality' => 'standard',
                    ]);

                    $ctx = stream_context_create(['http' => ['timeout' => 30]]);
                    $imageContent = file_get_contents($imgResponse->data[0]->url, false, $ctx);
                    if ($imageContent) {
                        $filename = 'articles/ai-' . uniqid() . '.png';
                        Storage::disk('public')->put($filename, $imageContent);
                        $articleData['image'] = '/storage/' . $filename;
                        $this->info('Image générée.');
                    }
                } catch (\Exception $e) {
                    $this->warn('Erreur image : ' . $e->getMessage());
                }
            }

            $article = Article::create($articleData);

            $status = $this->option('publish') ? 'publié' : 'en brouillon';
            $this->info("Article créé ({$status}) : {$article->title}");

            return self::SUCCESS;

        } catch (\Exception $e) {
            $this->error('Erreur : ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
