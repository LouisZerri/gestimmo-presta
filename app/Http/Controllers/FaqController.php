<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = [
            'seller' => [
                [
                    'question' => 'Comment estimer mon bien au juste prix ?',
                    'answer' => 'L\'estimation en ligne est une première approche, mais elle reste approximative. Pour un prix de vente fiable, nos conseillers réalisent une <strong>Étude Comparative de Marché (ECM)</strong> offerte. Ils analysent les biens vendus récemment dans votre quartier, l\'état de votre bien, ses atouts (vue, calme) et la concurrence actuelle.'
                ],
                [
                    'question' => 'Quelle différence entre mandat simple et exclusif ?',
                    'answer' => 'Avec un mandat simple, vous pouvez vendre par vous-même ou via d\'autres agences, mais votre bien risque d\'être "grillé" (affiché à des prix différents). Le <strong>mandat exclusif GEST\'IMMO</strong> garantit une diffusion premium, des services offerts (photos pro, visite virtuelle) et un interlocuteur unique. Résultat : un délai de vente moyen de 45 jours contre 85 jours en simple.'
                ],
                [
                    'question' => 'Quels sont les diagnostics obligatoires ?',
                    'answer' => 'Avant toute mise en vente, vous devez fournir le <strong>DPE (Diagnostic de Performance Énergétique)</strong>. Ensuite, selon l\'âge et la localisation du bien, s\'ajoutent : Amiante, Plomb, Électricité, Gaz, Termites et l\'ERP (État des Risques et Pollutions). Nos conseillers vous orientent vers des diagnostiqueurs certifiés partenaires.'
                ],
                [
                    'question' => 'Quand dois-je payer les frais d\'agence ?',
                    'answer' => 'Le règlement des honoraires s\'effectue <strong>uniquement au succès</strong>, lors de la signature de l\'acte authentique chez le notaire. Vous n\'avez strictement rien à avancer : l\'estimation, la mise en valeur, la diffusion des annonces et les visites sont entièrement prises en charge par votre conseiller GEST\'IMMO jusqu\'à la vente.'
                ]
            ],
            'buyer' => [
                [
                    'question' => 'Comment faire une offre d\'achat ?',
                    'answer' => 'Une offre d\'achat doit être écrite et contenir : le prix proposé, la durée de validité de l\'offre (souvent 5 à 10 jours) et vos conditions de financement (apport, prêt). Votre conseiller GEST\'IMMO rédige l\'offre pour vous afin de garantir sa validité juridique et la présente au vendeur.'
                ],
                [
                    'question' => 'À combien s\'élèvent les frais de notaire ?',
                    'answer' => 'Appelés "frais d\'acquisition", ils s\'ajoutent au prix de vente. Comptez environ <strong>7 à 8% dans l\'ancien</strong> et <strong>2 à 3% dans le neuf</strong>. Ils comprennent les taxes de l\'État (la majeure partie), les débours et la rémunération du notaire.'
                ],
                [
                    'question' => 'Quels documents pour un dossier de location ?',
                    'answer' => 'Pour un dossier complet et prioritaire, préparez : <ul class="list-disc pl-5 mt-2 space-y-1"><li>Pièce d\'identité recto/verso.</li><li>3 derniers bulletins de salaire ou bilans.</li><li>Contrat de travail ou attestation employeur.</li><li>Dernier avis d\'imposition.</li><li>3 dernières quittances de loyer ou taxe foncière.</li></ul>'
                ],
                [
                    'question' => 'Puis-je louer sans être en CDI ?',
                    'answer' => '<strong>Oui, c\'est possible.</strong> Chez GEST\'IMMO, nous étudions tous les profils (indépendants, intérimaires, CDD). Si vos revenus sont suffisants (3x le montant du loyer) ou si vous disposez de garanties solides comme un garant physique ou la <strong>Garantie Visale</strong> (Action Logement), votre dossier a toutes ses chances.'
                ]
            ],
            'career' => [
                [
                    'question' => 'Quel statut juridique choisir ?',
                    'answer' => 'La majorité de nos conseillers débutent sous le régime de la <strong>Micro-Entreprise (Auto-entrepreneur)</strong>. C\'est le plus simple : pas de TVA à gérer en dessous d\'un certain seuil, charges sociales proportionnelles au chiffre d\'affaires et création en quelques clics. Vous êtes Agent Commercial Indépendant.'
                ],
                [
                    'question' => 'Système de rémunération & MLM',
                    'answer' => 'Vous percevez de <strong>60% à 85%</strong> des honoraires d\'agence sur vos ventes personnelles. En plus, grâce au MLM (Marketing de Réseau), vous augmentez votre pourcentage de rémunération sur votre chiffre d\'affaires.'
                ],
                [
                    'question' => 'Le parcours de formation GEST\'IMMO',
                    'answer' => 'Nous proposons un parcours complet (loi Alur) comprenant : une intégration en présentiel ou visio, une plateforme E-learning 24/7 (juridique, commercial, technique) et un coaching terrain par votre parrain pour vos premiers mandats.'
                ],
                [
                    'question' => 'Quels outils digitaux fournissez-vous ?',
                    'answer' => 'Vous bénéficiez d\'une suite complète : <ul class="list-disc pl-5 mt-2 space-y-1"><li>Logiciel de transaction tout-en-un.</li><li>Site web personnel dédié pour capter des leads.</li><li>Application mobile pour gérer votre activité partout.</li></ul>'
                ]
            ]
        ];

        return view('faq', compact('faqs'));
    }
}