<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => "Bilan 2025 et Perspectives 2026 : Le grand retour des acheteurs ?",
                'category' => "Marché",
                'category_color' => "bg-brand-blue",
                'image' => "https://images.unsplash.com/photo-1460472178825-e5240623afd5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                'excerpt' => "Le marché immobilier français entame une phase de résilience. Après deux années marquées par la hausse des taux, l'horizon s'éclaircit avec des taux autour de 3.20%.",
                'content' => '
                    <p>Après une période de turbulences inédite depuis la crise de 2008, le marché immobilier français semble enfin trouver son point d\'équilibre en cette fin d\'année 2025. L\'atterrissage des taux d\'intérêt et l\'ajustement des prix ont redonné de l\'oxygène aux acquéreurs, mais le paysage a profondément changé.</p>
                    
                    <h3>1. Les taux d\'intérêt : La nouvelle normalité</h3>
                    <p>Oubliez les taux à 1% des années 2020. La "nouvelle normalité" s\'est installée autour de <strong>3.20% sur 20 ans</strong>. Si ce niveau reste historiquement raisonnable, il a forcé les ménages à revoir leurs prétentions. Cependant, la bonne nouvelle vient de la réouverture des vannes du crédit : les banques, qui avaient fermé le robinet en 2023-2024, cherchent de nouveau à capter des clients, assouplissant légèrement les critères d\'apport personnel.</p>
                    
                    <h3>2. La fracture territoriale s\'accentue</h3>
                    <p>L\'analyse des données de notre réseau GEST\'IMMO montre une France à deux vitesses :</p>
                    <ul>
                        <li><strong>Les Métropoles (Paris, Lyon, Bordeaux) :</strong> Les prix s\'y sont stabilisés (-0.5% à +1% sur un an). La baisse attendue n\'a pas été aussi violente que prévu, soutenue par une pénurie structurelle de logements neufs.</li>
                        <li><strong>Les Villes Moyennes et le Littoral :</strong> Elles continuent de surperformer. La quête d\'espace et de qualité de vie, héritée de l\'après-Covid, s\'est transformée en tendance lourde. Des villes comme Angers, Le Mans ou Vannes affichent encore des hausses de +3% à +4%.</li>
                    </ul>
                    
                    <h3>3. La "Valeur Verte" : Le critère n°1 de négociation</h3>
                    <p>C\'est la révolution silencieuse de 2025. Le Diagnostic de Performance Énergétique (DPE) n\'est plus un simple document administratif, c\'est devenu le pivot de la négociation. L\'écart de prix se creuse de manière spectaculaire :</p>
                    <ul>
                        <li>Un bien classé A ou B se vend désormais <strong>10% à 15% plus cher</strong> que le prix moyen du marché.</li>
                        <li>Une passoire thermique (F ou G) subit une décote pouvant aller jusqu\'à <strong>20% ou 25%</strong> dans les zones rurales, où l\'offre est abondante.</li>
                    </ul>
                    
                    <h3>Perspectives 2026 : Faut-il acheter maintenant ?</h3>
                    <p>Notre conseil est clair : <strong>Oui</strong>. L\'attentisme n\'est plus une stratégie gagnante. Les taux ne baisseront plus significativement et la pénurie de logements neufs (avec une chute de 30% des mises en chantier en 2024-2025) va mécaniquement soutenir les prix de l\'ancien. Le "point bas" du cycle semble avoir été touché cet été. 2026 devrait marquer le début d\'un nouveau cycle haussier modéré, sain et durable.</p>
                ',
                'published_at' => '2025-10-22 10:00:00',
            ],
            [
                'title' => "MaPrimeRénov' 2026 : Ce qu'il faut savoir pour financer vos travaux",
                'category' => "Conseil",
                'category_color' => "bg-brand-accent",
                'image' => "https://images.unsplash.com/flagged/photo-1566838803980-56bfa5300e8c?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                'excerpt' => "Le projet de loi de finances 2026 confirme la volonté de l'État d'accélérer la rénovation énergétique. Fini le saupoudrage : place à l'efficacité globale.",
                'content' => '
                    <p>Le Projet de Loi de Finances (PLF) pour 2026 vient d\'être dévoilé, et il confirme une tendance lourde : l\'État met le paquet sur la rénovation énergétique, mais durcit les conditions d\'accès pour privilégier l\'efficacité réelle. Fini le "saupoudrage" d\'aides pour changer une fenêtre isolée ; place à la rénovation globale.</p>
                    
                    <h3>Le "Parcours Accompagné" devient incontournable</h3>
                    <p>C\'est la pierre angulaire du nouveau dispositif. Dès le 1er janvier 2026, pour tout chantier de rénovation dont le montant dépasse 10 000 €, le recours à <strong>"Mon Accompagnateur Rénov\'" (MAR)</strong> devient obligatoire. Ce tiers de confiance, agréé par l\'État, a pour mission de :</p>
                    <ul>
                        <li>Réaliser l\'audit énergétique initial.</li>
                        <li>Sécuriser le plan de financement (cumul des aides, prêts bancaires).</li>
                        <li>Vérifier la qualité des devis et la conformité des travaux à la fin du chantier.</li>
                    </ul>
                    <p><em>Notre conseil : Prenez rendez-vous avec un MAR dès maintenant, les délais d\'attente dépassent souvent les 3 mois dans certaines régions.</em></p>
                    
                    <h3>Des montants revalorisés pour la Rénovation Globale</h3>
                    <p>Pour inciter les ménages à réaliser des bouquets de travaux (isolation des murs + toiture + changement de chauffage), les plafonds d\'aide explosent :</p>
                    <ul>
                        <li><strong>Ménages aux revenus très modestes :</strong> Prise en charge jusqu\'à <strong>90%</strong> du montant HT des travaux (plafond de travaux porté à 70 000 € pour un gain de 4 classes DPE).</li>
                        <li><strong>Ménages aux revenus intermédiaires :</strong> Le taux de financement passe à <strong>50%</strong> (contre 35% auparavant), rendant enfin l\'opération rentable sur moins de 10 ans.</li>
                    </ul>
                    
                    <h3>Attention au calendrier pour les passoires thermiques</h3>
                    <p>Si vous êtes propriétaire d\'un logement classé G ou F, MaPrimeRénov\' n\'est plus une option, c\'est une nécessité de survie économique. À partir de juillet 2026, les aides pour les "mono-gestes" (ex: changement de chaudière seul) seront totalement supprimées pour ces logements. L\'État veut forcer la rénovation globale pour sortir du statut de passoire thermique.</p>
                ',
                'published_at' => '2025-10-15 10:00:00',
            ],
            [
                'title' => "GEST'IMMO : La référence absolue, de la Métropole aux DOM-TOM",
                'category' => "Réseau",
                'category_color' => "bg-gray-800",
                'image' => "https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                'excerpt' => "La convention nationale, qui s'est tenue le week-end dernier à Lyon, a marqué un tournant. Lancement de Gest'IA Predict et objectifs 2026.",
                'content' => '
                    <p>Plus qu\'un réseau, GEST\'IMMO est devenu une véritable institution. Avec une couverture désormais totale du territoire national, incluant une présence renforcée dans les <strong>Départements et Territoires d\'Outre-Mer (DOM-TOM)</strong>, nous nous imposons comme le partenaire de proximité par excellence, où que vous soyez.</p>
                    
                    <h3>Double Couronne : Investissement & Gestion</h3>
                    <p>Cette année marque la consécration de notre modèle hybride. Nous sommes fiers d\'avoir obtenu le titre de <strong>1er réseau de mandataires dans l\'investissement clé en main</strong>. Une reconnaissance qui salue notre capacité à accompagner les investisseurs de A à Z.</p>
                    <p>Mais notre expertise ne s\'arrête pas là. Grâce à la rigueur de nos process, GEST\'IMMO est également reconnu comme le <strong>leader national en états des lieux</strong>. Une fiabilité technique qui rassure propriétaires et locataires au moment clé de la location.</p>
                    
                    <h3>L\'Humain au cœur de la performance</h3>
                    <p>Chez GEST\'IMMO, nous ne croyons pas aux méthodes standardisées. Chaque conseiller possède une approche bien à lui, une personnalité et une expertise locale unique. C\'est cette singularité qui favorise l\'efficacité et la réussite de vos projets. Loin des algorithmes froids, c\'est la "touche" de votre conseiller qui fait la différence.</p>
                    
                    <h3>Un écosystème de 3000 partenaires</h3>
                    <p>Pour être le réseau le plus complet du marché, nous ne jouons pas en solo. Nous avons tissé une toile de <strong>plus de 3000 partenaires certifiés partout en France</strong> (courtiers, artisans, diagnostiqueurs, notaires...). Cette force de frappe collective nous permet de répondre à n\'importe quelle problématique immobilière avec une réactivité sans égale.</p>
                ',
                'published_at' => '2025-10-10 10:00:00',
            ],
            [
                'title' => "Interdiction à la location : le nouveau calendrier DPE",
                'category' => "Juridique",
                'category_color' => "bg-red-500",
                'image' => "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                'excerpt' => "Passoires thermiques : les échéances se resserrent. Propriétaires bailleurs, voici les dates clés pour rénover vos biens classés G et F.",
                'content' => '
                    <p>Depuis le 1er janvier 2025, le paysage locatif français a basculé dans une nouvelle ère. Conformément à la loi Climat et Résilience, les logements classés G au Diagnostic de Performance Énergétique (DPE) sont désormais juridiquement qualifiés de "non-décents". Cette mesure, redoutée par de nombreux propriétaires, est désormais une réalité tangible avec ses premières jurisprudences.</p>
                    
                    <h3>Concrètement, qu\'est-ce qui est interdit ?</h3>
                    <p>Il est formellement interdit de signer un <strong>nouveau bail</strong> ou de <strong>renouveler</strong> (tacitement ou non) un bail existant pour un logement classé G. Le bien est sorti du marché locatif légal. Attention aux fausses bonnes idées : louer en bail saisonnier (type Airbnb) dans les zones tendues est également dans le viseur des mairies, qui commencent à exiger un DPE valide même pour la courte durée.</p>
                    
                    <h3>Les premières décisions de justice tombent</h3>
                    <p>Les tribunaux commencent à rendre leurs premiers verdicts, et ils sont sévères pour les propriétaires négligents. Dans une décision récente à Lille, un locataire occupant un logement G a obtenu :</p>
                    <ul>
                        <li>La suspension du paiement du loyer jusqu\'à la réalisation des travaux.</li>
                        <li>Des dommages et intérêts pour "préjudice de jouissance" calculés rétroactivement.</li>
                    </ul>
                    <p>Le message des juges est clair : la performance énergétique est désormais une composante essentielle de l\'obligation de délivrance d\'un logement décent.</p>
                    
                    <h3>Cap sur 2028 : Le mur du F</h3>
                    <p>Si vous possédez un logement classé F, ne pensez pas être à l\'abri. L\'interdiction pour les logements F est programmée pour 2028. Compte tenu des délais actuels pour trouver des artisans (6 à 9 mois) et pour voter des travaux en copropriété (12 à 18 mois), <strong>c\'est aujourd\'hui qu\'il faut lancer les démarches</strong>. Attendre 2027, c\'est prendre le risque de se retrouver avec un "actif échoué" (stranded asset), invendable et inlouable, dont la valeur pourrait chuter de 30%.</p>
                ',
                'published_at' => '2025-10-18 10:00:00',
            ],
            [
                'title' => "Déclaration des revenus fonciers : les erreurs à éviter",
                'category' => "Fiscalité",
                'category_color' => "bg-brand-accent",
                'image' => "https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                'excerpt' => "Régime réel ou micro-foncier ? Déficit foncier reportable ? Nos experts comptables font le point pour optimiser votre imposition.",
                'content' => '
                    <p>Avec une inflation cumulée de 10% sur trois ans et une taxe foncière qui a bondi de +15% en moyenne nationale en 2025, la rentabilité brute des investissements locatifs s\'érode. Plus que jamais, la clé de la performance réside dans l\'optimisation fiscale. Beaucoup d\'investisseurs restent par défaut au régime Micro-Foncier, perdant ainsi des milliers d\'euros chaque année.</p>
                    
                    <h3>Le Micro-Foncier : Un piège de simplicité ?</h3>
                    <p>Ce régime est automatique si vos revenus locatifs nus sont inférieurs à 15 000 €/an. L\'administration applique un abattement forfaitaire de 30%. C\'est simple : vous êtes imposé sur 70% de vos loyers.</p>
                    <p><strong>Le problème :</strong> Dans la réalité, entre les intérêts d\'emprunt (qui ont augmenté), la taxe foncière, les charges de copropriété non récupérables, l\'assurance PNO et les petits entretiens, vos charges réelles dépassent souvent 40% ou 50% des loyers. En restant au Micro, vous payez donc de l\'impôt sur de l\'argent que vous n\'avez pas réellement gagné.</p>
                    
                    <h3>Le Régime Réel et la puissance du Déficit Foncier</h3>
                    <p>En optant pour le régime réel (option irrévocable pour 3 ans), vous déduisez vos charges pour leur montant exact. Si le total des charges dépasse les loyers, vous créez un <strong>Déficit Foncier</strong>.</p>
                    <p>Ce mécanisme est redoutable d\'efficacité :</p>
                    <ul>
                        <li>Le déficit est imputable sur vos autres revenus fonciers sans limitation.</li>
                        <li>S\'il reste du déficit, il est imputable sur votre revenu global (salaires, pensions) jusqu\'à <strong>10 700 € par an</strong>.</li>
                        <li>Le surplus est reportable pendant 10 ans.</li>
                    </ul>
                    <p><em>Exemple : Pour un contribuable à la tranche marginale de 30%, 10 000 € de déficit imputé génère une économie d\'impôt immédiate de 3 000 € + 1 720 € de prélèvements sociaux (CSG/CRDS), soit 4 720 € d\'économie nette !</em></p>
                ',
                'published_at' => '2025-10-12 10:00:00',
            ],
            [
                'title' => "Plan Pluriannuel de Travaux (PPT) : êtes-vous à jour ?",
                'category' => "Copro",
                'category_color' => "bg-gray-800",
                'image' => "https://images.unsplash.com/photo-1577412647305-991150c7d163?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
                'excerpt' => "Obligatoire pour les copropriétés de plus de 15 ans. Son objectif : anticiper les gros travaux pour éviter les appels de fonds imprévus.",
                'content' => '
                    <p>Longtemps perçu comme une contrainte administrative supplémentaire, le Plan Pluriannuel de Travaux (PPT) s\'impose désormais comme le carnet de santé indispensable des immeubles. Depuis le 1er janvier 2025, il est devenu obligatoire pour <strong>toutes les copropriétés de plus de 15 ans</strong>, quelle que soit leur taille (même les petites copros de 5 lots !).</p>
                    
                    <h3>Qu\'est-ce qu\'un "bon" PPT ?</h3>
                    <p>Un PPT n\'est pas un simple audit énergétique. C\'est une feuille de route financière et technique sur 10 ans. Un PPT de qualité doit :</p>
                    <ul>
                        <li>Prioriser les travaux de sécurité (toiture, structure) et de performance énergétique.</li>
                        <li>Chiffrer précisément les coûts (pas de simples estimations à la louche).</li>
                        <li>Proposer un échéancier réaliste compatible avec la solvabilité des copropriétaires.</li>
                    </ul>
                    
                    <h3>Le Fonds de Travaux : Votre épargne forcée mais salutaire</h3>
                    <p>Une fois le PPT voté, la loi impose d\'abonder un fonds de travaux. La cotisation annuelle ne peut être inférieure à :</p>
                    <ul>
                        <li>2,5 % du montant total des travaux prévus dans le plan.</li>
                        <li>Ou 5 % du budget prévisionnel de fonctionnement (si ce montant est plus élevé).</li>
                    </ul>
                    <p>Cet argent est rattaché au lot, pas au propriétaire. En cas de vente, les sommes versées restent acquises au syndicat des copropriétaires. C\'est un point de friction fréquent lors des ventes qu\'il faut savoir expliquer : l\'acheteur récupère un "pot commun" déjà financé pour les futurs travaux.</p>
                    
                    <h3>Impact sur la valeur de revente en 2026</h3>
                    <p>Les notaires sont formels : l\'absence de PPT voté ou un fonds de travaux vide est devenu un <strong>motif légitime de rupture de vente</strong> ou de négociation agressive. À l\'inverse, une copropriété "saine", avec un PPT clair et un financement en cours, rassure les banques et les acquéreurs. C\'est devenu un label de qualité aussi important que l\'emplacement.</p>
                    <p><em>Propriétaires, ne votez pas "contre" le PPT par réflexe d\'économie à court terme. Vous tireriez une balle dans le pied de la valeur de votre patrimoine.</em></p>
                ',
                'published_at' => '2025-10-05 10:00:00',
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
