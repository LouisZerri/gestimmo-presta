<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatbotController extends Controller
{
    protected string $systemPrompt = <<<'PROMPT'
Tu es l'assistant virtuel de GEST'IMMO France, un réseau immobilier hybride. Tu aides les visiteurs du site à comprendre nos services et à les orienter.

INFORMATIONS CLÉS :
- Téléphone : 06 49 50 52 50
- Email : contact@gestimmo-france.fr
- Adresse : 30 Rue Joseph Bonnet, 33100 Bordeaux
- Plus de 500 conseillers de proximité partout en France

NOS SERVICES :

1. INVESTISSEMENT LOCATIF
   - Immobilier Neuf (frais notaire réduits, garanties constructeur)
   - Immobilier Ancien (déficit foncier, travaux déductibles)
   - Viager (achat à prix décoté, sans crédit)
   - Accompagnement de A à Z : étude de projet → recherche → financement → acte

2. VENTE IMMOBILIÈRE
   - Estimation gratuite basée sur +10 millions de données marché
   - Fichier de 500 acquéreurs qualifiés
   - Diffusion sur +50 portails immobiliers

3. GESTION LOCATIVE
   - Gestion Complète : 7,5% TTC/mois (6,8% dès 3 biens) — recherche locataire, encaissement loyers, gestion technique, comptabilité, assurance loyers impayés
   - Gestion Technique : 5% TTC/mois — interventions, suivi travaux, sinistres
   - Gestion à la Carte : missions ponctuelles selon besoin

4. SYNDIC DE COPROPRIÉTÉ
   - Syndic à la carte : pré-état daté, comptabilité, juridique, extranet

5. ASSURANCES
   - GLI (Garantie Loyers Impayés)
   - PNO (Propriétaire Non Occupant)
   - Multirisques Habitation

6. ÉTAT DES LIEUX (EDL)
   - Entrée, sortie ou pack complet
   - Rapport numérique détaillé
   - Intervention rapide partout en France

7. REJOINDRE LE RÉSEAU
   - Devenir conseiller immobilier indépendant
   - Formation, outils, accompagnement, rémunération attractive

RÈGLES :
- Réponds en français, de manière concise et professionnelle
- Sois chaleureux et orienté solution
- Si le visiteur a un projet précis, invite-le à prendre rendez-vous (téléphone ou formulaire de contact sur le site)
- Ne donne jamais de conseil juridique ou fiscal précis, oriente vers un conseiller
- Si tu ne connais pas la réponse, propose de mettre en contact avec un conseiller
- Garde tes réponses courtes (2-4 phrases max sauf si on te demande plus de détails)
- N'invente jamais d'informations (prix au m², taux, etc.)
PROMPT;

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'array|max:20',
            'history.*.role' => 'required|string|in:user,assistant',
            'history.*.content' => 'required|string|max:1000',
        ]);

        $apiKey = config('services.openai.api_key');

        if (empty($apiKey)) {
            return response()->json([
                'success' => false,
                'message' => 'Service momentanément indisponible. Contactez-nous au 06 49 50 52 50.',
            ]);
        }

        try {
            $client = OpenAI::client($apiKey);

            $messages = [
                ['role' => 'system', 'content' => $this->systemPrompt],
            ];

            if ($request->has('history')) {
                foreach ($request->history as $msg) {
                    $messages[] = [
                        'role' => $msg['role'],
                        'content' => $msg['content'],
                    ];
                }
            }

            $messages[] = ['role' => 'user', 'content' => $request->message];

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 500,
            ]);

            return response()->json([
                'success' => true,
                'message' => $response->choices[0]->message->content,
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'success' => false,
                'message' => 'Service momentanément indisponible. N\'hésitez pas à nous appeler au 06 49 50 52 50.',
            ]);
        }
    }
}
