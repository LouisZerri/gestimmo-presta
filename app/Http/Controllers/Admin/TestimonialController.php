<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use OpenAI;

class TestimonialController extends Controller
{
    protected array $pages = [
        'home' => 'Accueil',
        'sell' => 'Vendre',
        'manage' => 'Gestion',
    ];

    public function index()
    {
        $testimonials = Testimonial::orderBy('page')->orderBy('sort_order')->get();
        $pages = $this->pages;
        return view('admin.testimonials.index', compact('testimonials', 'pages'));
    }

    public function create()
    {
        $pages = $this->pages;
        return view('admin.testimonials.form', compact('pages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content' => 'required|string|max:2000',
            'rating' => 'required|integer|min:1|max:5',
            'page' => 'required|string|in:' . implode(',', array_keys($this->pages)),
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Avis ajouté avec succès.');
    }

    public function edit(Testimonial $testimonial)
    {
        $pages = $this->pages;
        return view('admin.testimonials.form', compact('testimonial', 'pages'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content' => 'required|string|max:2000',
            'rating' => 'required|integer|min:1|max:5',
            'page' => 'required|string|in:' . implode(',', array_keys($this->pages)),
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Avis mis à jour avec succès.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Avis supprimé.');
    }

    public function reformulate(Request $request, Testimonial $testimonial)
    {
        $apiKey = config('services.openai.api_key');

        if (empty($apiKey)) {
            return response()->json([
                'error' => 'Clé API OpenAI non configurée.'
            ], 500);
        }

        try {
            $client = OpenAI::client($apiKey);

            $response = $client->chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "Tu es un rédacteur professionnel spécialisé dans l'immobilier. Tu dois reformuler des avis clients pour les rendre plus lisibles, crédibles et professionnels. Règles :
- Corrige les fautes d'orthographe et de grammaire
- Améliore le style et la fluidité
- Conserve le sens original et l'authenticité du témoignage
- Garde un ton naturel et sincère (pas trop marketing)
- Conserve la même longueur approximative
- Ne change pas les faits mentionnés (noms, lieux, chiffres)
- Retourne UNIQUEMENT le texte reformulé, sans guillemets ni explications"
                    ],
                    [
                        'role' => 'user',
                        'content' => "Reformule cet avis client :\n\n" . $testimonial->content
                    ],
                ],
                'temperature' => 0.6,
                'max_tokens' => 500,
            ]);

            $reformulated = trim($response->choices[0]->message->content);

            // Sauvegarder l'original si pas déjà fait
            if (empty($testimonial->original_content)) {
                $testimonial->original_content = $testimonial->content;
            }
            $testimonial->content = $reformulated;
            $testimonial->save();

            return response()->json([
                'success' => true,
                'content' => $reformulated,
                'original_content' => $testimonial->original_content,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur IA : ' . $e->getMessage()
            ], 500);
        }
    }
}
