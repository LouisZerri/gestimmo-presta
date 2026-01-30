<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI;

class AIController extends Controller
{
    protected $categories = [
        'Marché' => 'bg-brand-blue',
        'Conseil' => 'bg-green-500',
        'Juridique' => 'bg-purple-600',
        'Réseau' => 'bg-brand-accent',
        'Fiscalité' => 'bg-amber-500',
        'Autre' => 'bg-gray-500',
    ];

    public function create()
    {
        $categories = $this->categories;
        return view('admin.articles.ai-generate', compact('categories'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:500',
            'category' => 'required|string',
            'tone' => 'required|in:professionnel,accessible,expert',
            'include_trends' => 'boolean',
            'generate_image' => 'boolean',
        ]);

        $apiKey = config('services.openai.api_key');

        if (empty($apiKey)) {
            return response()->json([
                'error' => 'Clé API OpenAI non configurée. Ajoutez OPENAI_API_KEY dans le fichier .env'
            ], 500);
        }

        try {
            $client = OpenAI::client($apiKey);

            $toneDescription = match($request->tone) {
                'professionnel' => 'professionnel et formel, adapté à des professionnels de l\'immobilier',
                'accessible' => 'accessible et pédagogique, adapté au grand public',
                'expert' => 'expert et technique, avec des termes spécialisés du secteur immobilier',
            };

            $systemPrompt = "Tu es un expert en immobilier français spécialisé dans la rédaction d'articles pour un réseau de mandataires immobiliers (GEST'IMMO).
Tu dois rédiger des articles informatifs, pertinents et à jour sur le marché immobilier français.
Le ton doit être {$toneDescription}.
Tu dois inclure des informations récentes et des tendances actuelles du marché immobilier en France (2024-2025).
L'article doit être structuré avec des sous-titres HTML (h2, h3) et des paragraphes.
N'utilise pas de markdown, uniquement du HTML pour le formatage.";

            $userPrompt = "Rédige un article complet sur le sujet suivant : \"{$request->topic}\"

Catégorie : {$request->category}

L'article doit contenir :
1. Un titre accrocheur (retourne-le séparément)
2. Un extrait/résumé de 2-3 phrases (retourne-le séparément)
3. Le contenu complet de l'article (800-1200 mots) avec :
   - Une introduction engageante
   - 3-4 sections avec sous-titres (utilise <h2> et <h3>)
   - Des conseils pratiques
   - Une conclusion avec appel à l'action

" . ($request->boolean('include_trends') ? "Inclus les dernières tendances et actualités du marché immobilier français (taux d'intérêt, prix, réglementations récentes, etc.)." : "") . "

Retourne ta réponse au format JSON avec les clés suivantes :
- title: le titre de l'article
- excerpt: l'extrait/résumé
- content: le contenu HTML complet";

            $response = $client->chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                'temperature' => 0.7,
                'max_tokens' => 4000,
                'response_format' => ['type' => 'json_object'],
            ]);

            $content = $response->choices[0]->message->content;
            $data = json_decode($content, true);

            if (!$data || !isset($data['title']) || !isset($data['content'])) {
                return response()->json([
                    'error' => 'Réponse IA invalide. Veuillez réessayer.'
                ], 500);
            }

            $result = [
                'success' => true,
                'title' => $data['title'],
                'excerpt' => $data['excerpt'] ?? '',
                'content' => $data['content'],
                'category' => $request->category,
                'category_color' => $this->categories[$request->category] ?? 'bg-gray-500',
                'image' => '',
            ];

            // Générer une image si demandé
            if ($request->boolean('generate_image')) {
                try {
                    $imageUrl = $this->generateImage($client, $data['title'], $request->topic);
                    if ($imageUrl) {
                        $result['image'] = $imageUrl;
                    }
                } catch (\Exception $e) {
                    $result['image_error'] = 'Erreur génération image : ' . $e->getMessage();
                }
            }

            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la génération : ' . $e->getMessage()
            ], 500);
        }
    }

    protected function generateImage($client, string $title, string $topic): ?string
    {
        $prompt = "Professional real estate photography style image for a French real estate article.
Topic: {$topic}
Style: Modern, clean, professional.
Show: Beautiful French property, architecture, or real estate concept.
No text, no watermarks, no people's faces.
Warm and inviting atmosphere, natural lighting.";

        $response = $client->images()->create([
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1792x1024',
            'quality' => 'standard',
        ]);

        $imageUrl = $response->data[0]->url;

        // Télécharger et sauvegarder l'image localement
        $imageContent = file_get_contents($imageUrl);
        if ($imageContent) {
            $filename = 'articles/ai-' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $imageContent);
            return '/storage/' . $filename;
        }

        return null;
    }
}
