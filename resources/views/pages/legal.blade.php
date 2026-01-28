@extends('layouts.app')

@section('title', "Mentions Légales - GEST'IMMO")

@section('content')

<div class="bg-brand-light py-10 sm:py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl text-gray-900 mb-6 sm:mb-8">Mentions Légales</h1>

        <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-8 md:p-12">
            <div class="prose prose-sm sm:prose-base md:prose-lg max-w-none break-words">
                
                {{-- 1. Éditeur du site --}}
                <h3>1. Éditeur du site</h3>
                <p>Le site <a href="https://www.gestimmo-france.fr" class="text-brand-blue hover:underline">www.gestimmo-france.fr</a> est édité par :</p>
                
                <div class="bg-gray-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <div class="font-heading font-bold text-lg sm:text-xl text-brand-blue mb-3 sm:mb-4">GEST'IMMO</div>
                    <ul class="space-y-2 text-gray-600 text-sm sm:text-base">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-building text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span><strong>Forme juridique :</strong> SARL</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-euro-sign text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span><strong>Capital social :</strong> 1 000 €</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span class="break-words"><strong>Siège social :</strong> 35 rue Aliénor d'Aquitaine, 19360 Malemort</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-id-card text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span><strong>SIRET :</strong> 990 877 417 00016</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-file-alt text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span><strong>RCS :</strong> Brive B 990 877 417</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-globe-europe text-gray-400 mt-1 w-4 flex-shrink-0"></i>
                            <span class="break-words"><strong>TVA :</strong> FR42 990 877 417</span>
                        </li>
                    </ul>
                </div>

                {{-- Carte professionnelle et garanties --}}
                <div class="bg-brand-blue/5 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose border border-brand-blue/10">
                    <div class="flex flex-col sm:flex-row items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-id-badge text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 text-sm sm:text-base">Carte professionnelle</div>
                            <p class="text-xs sm:text-sm text-gray-600 mt-1">
                                Transactions sur immeubles et fonds de commerce / Gestion Immobilière / Syndic de copropriété
                            </p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-certificate text-brand-blue mt-1 w-4 flex-shrink-0"></i>
                            <span class="break-all"><strong>N° CPI :</strong> CPI 1901 2025 000 000 011</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-landmark text-brand-blue mt-1 w-4 flex-shrink-0"></i>
                            <span><strong>Délivrée par :</strong> CCI de la Corrèze</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-green-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose border border-green-100">
                    <div class="flex flex-col sm:flex-row items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 text-sm sm:text-base">Garanties financières et assurances</div>
                        </div>
                    </div>
                    <ul class="space-y-4 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-500 mt-1 w-4 flex-shrink-0"></i>
                            <div>
                                <strong>Garantie financière :</strong> 120 000 €<br>
                                <span class="text-xs sm:text-sm text-gray-500">GALIAN SMABTP – 89 rue La Boétie, 75008 Paris</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-500 mt-1 w-4 flex-shrink-0"></i>
                            <div>
                                <strong>RCP :</strong><br>
                                <span class="text-xs sm:text-sm text-gray-500">GALIAN SMABTP – 89 rue La Boétie, 75008 Paris</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <p><strong>Contact :</strong></p>
                <div class="bg-brand-blue/5 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose border border-brand-blue/10">
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center gap-3">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-brand-blue text-sm sm:text-base"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Adresse postale</div>
                                <div class="font-medium text-sm sm:text-base break-words">35 Rue Aliénor d'Aquitaine, 19360 Malemort</div>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-brand-blue text-sm sm:text-base"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Téléphone</div>
                                <a href="tel:0613250596" class="font-medium text-brand-blue hover:underline text-sm sm:text-base">06 13 25 05 96</a>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-at text-brand-blue text-sm sm:text-base"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="text-xs text-gray-400 uppercase tracking-wide">E-mail</div>
                                <a href="mailto:contact@gestimmo-presta.fr" class="font-medium text-brand-blue hover:underline text-sm sm:text-base break-words">contact@gestimmo-presta.fr</a>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- 2. Responsable de la publication --}}
                <h3>2. Responsable de la publication</h3>
                <p>Le directeur de la publication est <strong>Byron DE ALMEIDA</strong>.</p>

                {{-- 3. Hébergeur --}}
                <h3>3. Hébergeur</h3>
                <p>Le site est hébergé par :</p>
                <div class="bg-gray-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <div class="font-bold text-gray-800 mb-2">IONOS SE</div>
                    <ul class="text-gray-600 space-y-1 text-sm">
                        <li>Elgendorfer Str. 57</li>
                        <li>56410 Montabaur</li>
                        <li>Allemagne</li>
                        <li class="pt-2">
                            <i class="fas fa-phone text-gray-400 mr-2"></i>
                            <a href="tel:097080891" class="text-brand-blue hover:underline">09 70 808 91</a>
                        </li>
                    </ul>
                </div>

                {{-- 4. Propriété intellectuelle --}}
                <h3>4. Propriété intellectuelle</h3>
                <p>
                    Le contenu du site <a href="https://www.gestimmo-france.fr" class="text-brand-blue hover:underline">www.gestimmo-france.fr</a> 
                    (textes, images, graphismes, logo, vidéos, icônes, sons, logiciels, etc.) est protégé par le droit d'auteur et la propriété intellectuelle.
                </p>
                <p>
                    Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, 
                    quel que soit le moyen ou procédé utilisé, est <strong>interdite sans autorisation écrite préalable</strong> de GEST'IMMO.
                </p>

                {{-- 5. Responsabilité --}}
                <h3>5. Responsabilité</h3>
                <p>
                    GEST'IMMO s'efforce de fournir sur le site <a href="https://www.gestimmo-france.fr" class="text-brand-blue hover:underline">www.gestimmo-france.fr</a> 
                    des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable des omissions, inexactitudes ou carences dans la mise à jour.
                </p>
                <p>
                    Le site peut contenir des liens hypertextes vers d'autres sites. GEST'IMMO n'exerce aucun contrôle sur ces sites 
                    et décline toute responsabilité quant à leurs contenus.
                </p>

                {{-- 6. Protection des données personnelles --}}
                <h3>6. Protection des données personnelles (RGPD)</h3>
                <p>GEST'IMMO collecte et traite des données personnelles pour les finalités suivantes :</p>
                <ul>
                    <li>Gestion des demandes via le formulaire de contact</li>
                    <li>Suivi des relations clients</li>
                    <li>Envoi éventuel de newsletters ou offres commerciales (si applicable)</li>
                </ul>
                
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <div class="flex flex-col sm:flex-row items-start gap-3">
                        <div class="w-10 h-10 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 mb-2 text-sm sm:text-base">Vos droits RGPD</div>
                            <p class="text-xs sm:text-sm text-gray-600 mb-3">
                                Conformément au RGPD et à la loi Informatique et Libertés, vous disposez des droits suivants :
                            </p>
                            <div class="flex flex-wrap gap-1.5 sm:gap-2">
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Accès</span>
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Rectification</span>
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Suppression</span>
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Limitation</span>
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Opposition</span>
                                <span class="bg-white px-2 sm:px-3 py-1 rounded-full text-xs font-bold text-brand-blue border border-brand-blue/20">Portabilité</span>
                            </div>
                        </div>
                    </div>
                </div>

                <p>
                    <strong>Durée de conservation :</strong> les données sont conservées pour une durée maximale de <strong>10 ans</strong> après le dernier contact.
                </p>
                <p>
                    Pour exercer vos droits, contactez-nous à : 
                    <a href="mailto:contact@gestimmo-presta.fr" class="text-brand-blue hover:underline">contact@gestimmo-presta.fr</a>
                </p>

                {{-- 7. Cookies --}}
                <h3>7. Cookies</h3>
                <p>Le site <a href="https://www.gestimmo-france.fr" class="text-brand-blue hover:underline">www.gestimmo-france.fr</a> utilise des cookies pour :</p>
                <ul>
                    <li>Assurer son bon fonctionnement</li>
                    <li>Mesurer l'audience et analyser la fréquentation</li>
                    <li>Améliorer l'expérience utilisateur</li>
                </ul>
                <p>
                    Vous pouvez paramétrer vos préférences via la bannière cookies affichée lors de votre première visite 
                    ou consulter notre <a href="{{ route('cookies') }}" class="text-brand-blue hover:underline">politique de cookies</a>.
                </p>

                {{-- 8. Médiation --}}
                <h3>8. Médiation de la consommation</h3>
                <p>
                    Conformément aux articles L.616-1 et R.616-1 du Code de la consommation, en cas de litige, 
                    le consommateur peut recourir gratuitement à un médiateur de la consommation en vue de la résolution amiable du différend.
                </p>

                {{-- Date de mise à jour --}}
                <div class="mt-12 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-400">
                        <i class="far fa-calendar-alt mr-2"></i>Dernière mise à jour : {{ date('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Bouton retour --}}
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-brand-blue font-bold hover:underline">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
    </div>
</div>

@endsection