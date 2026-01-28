@extends('layouts.app')

@section('title', "Vendre - GEST'IMMO")

@section('content')

    {{-- HERO HEADER BLEU --}}
    <div class="bg-brand-blue text-white pt-12 sm:pt-16 md:pt-20 pb-16 sm:pb-20 md:pb-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl mb-4 sm:mb-6">
                Découvrez la valeur réelle de votre bien<br class="hidden sm:block">auprès des investisseurs
            </h1>
            <p class="text-blue-100 text-base sm:text-lg mb-6 sm:mb-8 md:mb-10 font-medium">
                Comparez votre bien à +10 millions de données de marché et accédez à notre fichier de 500 acquéreurs
                qualifiés.
            </p>

            {{-- Formulaire Estimation --}}
            <form action="{{ route('estimation') }}" method="GET"
                class="bg-white p-2 rounded-2xl sm:rounded-full shadow-2xl max-w-2xl mx-auto flex flex-col sm:flex-row items-center transform hover:scale-[1.01] transition duration-300 gap-2 sm:gap-0">
                <div class="flex-grow w-full sm:w-auto relative">
                    <i
                        class="fas fa-map-marker-alt absolute left-4 sm:left-5 top-1/2 transform -translate-y-1/2 text-brand-blue text-lg sm:text-xl"></i>
                    <input type="text" name="adresse" placeholder="Saisissez l'adresse du bien à estimer..."
                        class="w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-4 rounded-xl sm:rounded-full text-gray-800 outline-none font-medium text-base sm:text-lg placeholder-gray-400">
                </div>
                <button type="submit"
                    class="w-full sm:w-auto bg-brand-accent hover:bg-yellow-500 text-brand-dark font-bold py-3 px-6 sm:px-8 rounded-xl sm:rounded-full shadow-md transition transform hover:-translate-y-0.5 uppercase tracking-wide text-xs sm:text-sm m-0 sm:m-1 cursor-pointer">
                    Estimer maintenant
                </button>
            </form>
            <p class="text-blue-200 text-xs mt-4"><i class="fas fa-lock mr-1"></i> Estimation gratuite, immédiate et
                confidentielle.</p>
        </div>
    </div>

    {{-- BARRE DE RÉASSURANCE --}}
    <div class="bg-white py-8 sm:py-10 md:py-12 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 text-center">
                @php
                    $reassurances = [
                        [
                            'icon' => 'fa-bullseye',
                            'title' => 'Fiabilité de l\'Estimation',
                            'desc' =>
                                'Nous ne nous basons pas que sur le prix au m². Nous intégrons le potentiel locatif et le rendement pour valoriser votre bien au maximum.',
                        ],
                        [
                            'icon' => 'fa-bolt',
                            'title' => 'Vente Éclair',
                            'desc' =>
                                'Nos investisseurs cherchent activement. Pas de tourisme immobilier, uniquement des visites qualifiées avec financement validé.',
                        ],
                        [
                            'icon' => 'fa-shield-alt',
                            'title' => 'Sécurité Totale',
                            'desc' =>
                                'De la signature du mandat à l\'acte authentique, nos experts juridiques sécurisent chaque étape de la transaction.',
                        ],
                    ];
                @endphp

                @foreach ($reassurances as $item)
                    <div class="flex flex-col items-center group">
                        <div
                            class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-xl sm:text-2xl mb-3 sm:mb-4 group-hover:bg-brand-blue group-hover:text-white transition duration-300 shadow-sm">
                            <i class="fas {{ $item['icon'] }}"></i>
                        </div>
                        <h3 class="font-heading font-bold text-gray-800 mb-2 text-sm sm:text-base">{{ $item['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-gray-500 px-2 sm:px-4">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- BLOC RECHERCHE CONSEILLER --}}
    <div class="bg-white py-10 sm:py-12 md:py-16 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-8 md:gap-12">
            <div class="md:w-1/2 text-center md:text-left">
                <span class="text-brand-blue font-bold uppercase tracking-wider text-xs">Expertise Locale</span>
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-900 mt-2 mb-3 sm:mb-4">Vendez mieux avec un expert de votre
                    quartier</h2>
                <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">
                    Une estimation en ligne est un bon début, mais elle ne remplace pas l'œil d'un expert.
                    Nos conseillers connaissent chaque rue, chaque école et les futurs projets d'urbanisme pour valoriser
                    les atouts uniques de votre bien auprès des acheteurs.
                </p>
                <div class="bg-gray-50 p-5 sm:p-6 md:p-8 rounded-2xl border border-gray-200 shadow-sm">
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Trouver un conseiller pour vendre</label>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="text" placeholder="Code postal ou ville (ex: Lyon...)"
                            class="flex-grow p-3 sm:p-4 rounded-lg border border-gray-300 focus:border-brand-blue outline-none bg-white text-sm sm:text-base">
                        <a href="{{ route('advisors') }}"
                            class="bg-brand-blue text-white px-6 py-3 sm:py-0 rounded-lg font-bold hover:bg-blue-800 transition flex items-center justify-center">
                            <i class="fas fa-search text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="absolute inset-0 bg-brand-blue rounded-2xl transform rotate-3 opacity-10"></div>
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="relative z-10 rounded-2xl shadow-xl w-full object-cover h-80"
                    alt="Rencontre Conseiller Immobilier">
            </div>
        </div>
    </div>

    {{-- AVIS CLIENTS --}}
    <div class="bg-brand-light py-10 sm:py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800">Ils ont vendu avec GEST'IMMO</h2>
                <div class="flex items-center justify-center gap-2 mt-2">
                    <span class="text-yellow-400 text-xl">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </span>
                    <span class="text-gray-600 font-bold">4.8/5</span>
                    <span class="text-gray-400 text-sm">(Plus de 2500 avis certifiés)</span>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                @php
                    $avis = [
                        [
                            'initials' => 'TL',
                            'color' => 'bg-brand-blue',
                            'name' => 'Thomas L.',
                            'location' => 'Vendeur à Lyon (69)',
                            'text' =>
                                'J\'avais besoin de vendre rapidement suite à une mutation. Mon conseiller a trouvé un investisseur en 48h qui a acheté sans condition de prêt. Efficacité redoutable.',
                        ],
                        [
                            'initials' => 'MB',
                            'color' => 'bg-brand-accent',
                            'name' => 'Marie B.',
                            'location' => 'Vendeuse à Nantes (44)',
                            'text' =>
                                'Un accompagnement humain avant tout. Dans le cadre d\'une succession compliquée, GEST\'IMMO a su gérer les relations avec les notaires et rassurer toute la famille.',
                        ],
                        [
                            'initials' => 'JD',
                            'color' => 'bg-gray-800',
                            'name' => 'Jean D.',
                            'location' => 'Vendeur à Bordeaux (33)',
                            'text' =>
                                'Estimation au juste prix. Pas de promesses en l\'air, mais un vrai dossier d\'étude de marché. Résultat : vendu au prix en moins de 3 semaines.',
                        ],
                    ];
                @endphp

                @foreach ($avis as $a)
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                        <i class="fas fa-quote-right absolute top-6 right-6 text-gray-100 text-4xl"></i>
                        <div class="flex items-center gap-1 text-yellow-400 mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic mb-6 leading-relaxed">"{{ $a['text'] }}"</p>
                        <div class="flex items-center gap-3 border-t border-gray-50 pt-4">
                            <div
                                class="w-10 h-10 {{ $a['color'] }} text-white rounded-full flex items-center justify-center font-bold">
                                {{ $a['initials'] }}</div>
                            <div>
                                <div class="font-bold text-gray-800 text-sm">{{ $a['name'] }}</div>
                                <div class="text-xs text-gray-400">{{ $a['location'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DERNIÈRES TRANSACTIONS --}}
    <div class="py-10 sm:py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800">Nos dernières transactions</h2>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                @php
                    $transactions = [
                        [
                            'image' => 'photo-1687689961021-7b4690dffab6?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Maison 120m² - Bordeaux',
                            'delai' => 'En 12 jours',
                            'info' => 'Au prix',
                        ],
                        [
                            'image' => 'photo-1571288174197-c81247980d90?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'T2 Investisseur - Lyon',
                            'delai' => 'En 48h',
                            'info' => 'Sans visite',
                        ],
                        [
                            'image' =>
                                'photo-1546694004-ad3863947f3f?q=80&w=1121&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'title' => 'Immeuble de rapport - Lille',
                            'delai' => 'Offre ferme',
                            'info' => 'Rentabilité 8%',
                        ],
                    ];
                @endphp

                @foreach ($transactions as $t)
                    <div class="relative rounded-xl overflow-hidden shadow-lg group cursor-pointer">
                        <div
                            class="absolute top-0 left-0 bg-brand-blue text-white font-bold px-4 py-1 rounded-br-lg z-10 text-sm uppercase tracking-wider shadow-md">
                            <i class="fas fa-check mr-1"></i> Vendu
                        </div>
                        <img src="https://images.unsplash.com/{{ $t['image'] }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            class="w-full h-64 object-cover filter brightness-95 group-hover:scale-105 transition duration-700">
                        <div class="absolute bottom-0 w-full bg-white p-4 border-t border-gray-100">
                            <div class="font-bold text-gray-800 text-lg">{{ $t['title'] }}</div>
                            <div class="text-sm text-gray-500 flex justify-between mt-1">
                                <span><i class="fas fa-clock mr-1"></i> {{ $t['delai'] }}</span>
                                <span class="text-brand-blue font-bold">{{ $t['info'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- RÉASSURANCE FINALE --}}
    <div class="bg-brand-light py-8 sm:py-10 md:py-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-6 sm:mb-8">Choisissez le N°1 de la transaction
                d'investissement</h2>
            <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-6">
                <div
                    class="bg-white px-6 py-3 rounded-lg shadow-sm border border-gray-200 text-sm font-bold text-gray-600 flex items-center gap-3">
                    <i class="fas fa-users text-brand-blue text-xl"></i> 500 Investisseurs
                </div>
                <div
                    class="bg-white px-6 py-3 rounded-lg shadow-sm border border-gray-200 text-sm font-bold text-gray-600 flex items-center gap-3">
                    <i class="fas fa-map-marked-alt text-brand-blue text-xl"></i> Expertise Locale
                </div>
                <div
                    class="bg-white px-6 py-3 rounded-lg shadow-sm border border-gray-200 text-sm font-bold text-gray-600 flex items-center gap-3">
                    <i class="fas fa-hand-holding-usd text-brand-blue text-xl"></i> Estimation Offerte
                </div>
            </div>
        </div>
    </div>

@endsection
