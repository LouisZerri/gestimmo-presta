<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            // Page Accueil
            [
                'name' => 'Sophie Martin',
                'location' => 'Vendeuse à Bordeaux',
                'content' => 'Une équipe réactive et très professionnelle. Mon appartement a été vendu en 2 semaines au prix estimé. Je recommande vivement !',
                'rating' => 5,
                'page' => 'home',
                'sort_order' => 1,
            ],
            [
                'name' => 'Thomas Durand',
                'location' => 'Investisseur à Lyon',
                'content' => 'Excellent accompagnement pour mon premier investissement locatif. Les conseils fiscaux m\'ont fait économiser beaucoup d\'argent.',
                'rating' => 5,
                'page' => 'home',
                'sort_order' => 2,
            ],
            [
                'name' => 'Julie & Marc',
                'location' => 'Propriétaires à Paris',
                'content' => 'Gestion locative au top. Plus aucun souci d\'impayés grâce à leur assurance GLI. C\'est une sérénité totale pour nous.',
                'rating' => 5,
                'page' => 'home',
                'sort_order' => 3,
            ],

            // Page Vendre
            [
                'name' => 'Thomas L.',
                'location' => 'Vendeur à Lyon (69)',
                'content' => 'J\'avais besoin de vendre rapidement suite à une mutation. Mon conseiller a trouvé un investisseur en 48h qui a acheté sans condition de prêt. Efficacité redoutable.',
                'rating' => 5,
                'page' => 'sell',
                'sort_order' => 1,
            ],
            [
                'name' => 'Marie B.',
                'location' => 'Vendeuse à Nantes (44)',
                'content' => 'Un accompagnement humain avant tout. Dans le cadre d\'une succession compliquée, GEST\'IMMO a su gérer les relations avec les notaires et rassurer toute la famille.',
                'rating' => 5,
                'page' => 'sell',
                'sort_order' => 2,
            ],
            [
                'name' => 'Jean D.',
                'location' => 'Vendeur à Bordeaux (33)',
                'content' => 'Estimation au juste prix. Pas de promesses en l\'air, mais un vrai dossier d\'étude de marché. Résultat : vendu au prix en moins de 3 semaines.',
                'rating' => 5,
                'page' => 'sell',
                'sort_order' => 3,
            ],

            // Page Gestion
            [
                'name' => 'Aurélie D.',
                'location' => 'Expatriée à Londres',
                'content' => 'Je vis à l\'étranger et GEST\'IMMO gère mes 3 appartements à Paris. Zéro vacance locative en 2 ans et une communication parfaite.',
                'rating' => 5,
                'page' => 'manage',
                'sort_order' => 1,
            ],
            [
                'name' => 'Marc P.',
                'location' => 'Président Conseil Syndical',
                'content' => 'L\'offre syndic à la carte nous a sauvé la vie ! Notre petite copro était mal gérée, maintenant tout est clair et carré pour pas cher.',
                'rating' => 5,
                'page' => 'manage',
                'sort_order' => 2,
            ],
            [
                'name' => 'Jean-François',
                'location' => 'Investisseur Multi-propriétaire',
                'content' => 'Leur assurance loyers impayés (GLI) est vraiment compétitive. J\'ai eu un souci une fois, pris en charge immédiatement sans frais.',
                'rating' => 5,
                'page' => 'manage',
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::firstOrCreate(
                ['name' => $data['name'], 'page' => $data['page']],
                $data
            );
        }
    }
}
