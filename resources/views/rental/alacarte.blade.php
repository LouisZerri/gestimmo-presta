@extends('layouts.app')

@section('title', "Gestion à la Carte - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-gradient-to-r from-brand-blue to-brand-dark text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-list-check mr-2 sm:mr-3"></i>Gestion à la Carte
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Composez votre formule sur mesure.<br class="hidden sm:block">
        Choisissez uniquement les services dont vous avez besoin.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- SERVICES DISPONIBLES --}}
    <div class="text-center mb-8 sm:mb-12">
        <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">À la carte</span>
        <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Nos prestations individuelles</h2>
        <p class="text-gray-500 text-sm sm:text-base mt-2 max-w-2xl mx-auto">Sélectionnez les services qui correspondent à vos besoins. Chaque prestation est facturée indépendamment.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12 sm:mb-16 md:mb-20">
        @php
            $services = [
                [
                    'icon' => 'fa-search',
                    'title' => 'Recherche Locataire',
                    'desc' => 'Diffusion d\'annonces, organisation des visites, étude de solvabilité et sélection du meilleur candidat.',
                    'tag' => 'Mise en location',
                ],
                [
                    'icon' => 'fa-file-signature',
                    'title' => 'Rédaction du Bail',
                    'desc' => 'Rédaction complète du contrat de location et de ses annexes, conforme à la législation en vigueur.',
                    'tag' => 'Juridique',
                ],
                [
                    'icon' => 'fa-clipboard-check',
                    'title' => 'État des Lieux',
                    'desc' => 'État des lieux d\'entrée et/ou de sortie, réalisé par un expert avec rapport photos détaillé.',
                    'tag' => 'Entrée / Sortie',
                ],
                [
                    'icon' => 'fa-calculator',
                    'title' => 'Aide Déclaration Fiscale',
                    'desc' => 'Assistance pour la déclaration de vos revenus fonciers et optimisation fiscale.',
                    'tag' => 'Fiscalité',
                ],
                [
                    'icon' => 'fa-hammer',
                    'title' => 'Gestion des Travaux',
                    'desc' => 'Coordination et suivi des travaux d\'entretien ou de rénovation de votre bien.',
                    'tag' => 'Technique',
                ],
                [
                    'icon' => 'fa-shield-alt',
                    'title' => 'Assurance Loyers Impayés',
                    'desc' => 'Souscription et gestion de votre assurance GLI pour sécuriser vos revenus.',
                    'tag' => 'Protection',
                ],
                [
                    'icon' => 'fa-balance-scale',
                    'title' => 'Régularisation des Charges',
                    'desc' => 'Calcul et régularisation annuelle des charges locatives avec justificatifs.',
                    'tag' => 'Comptabilité',
                ],
                [
                    'icon' => 'fa-sync-alt',
                    'title' => 'Révision de Loyer',
                    'desc' => 'Calcul et application de la révision annuelle du loyer selon l\'indice IRL.',
                    'tag' => 'Annuel',
                ],
                [
                    'icon' => 'fa-gavel',
                    'title' => 'Gestion des Litiges',
                    'desc' => 'Accompagnement en cas de litige avec le locataire : impayés, dégradations, troubles.',
                    'tag' => 'Contentieux',
                ],
            ];
        @endphp

        @foreach($services as $service)
            <div class="bg-white rounded-xl shadow-card border border-gray-100 p-6 hover:shadow-floating transition group">
                <div class="flex items-start justify-between mb-3">
                    <div class="w-11 h-11 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-lg group-hover:bg-brand-blue group-hover:text-white transition">
                        <i class="fas {{ $service['icon'] }}"></i>
                    </div>
                    <span class="bg-gray-100 text-gray-500 text-[10px] font-bold px-2 py-1 rounded-full uppercase">{{ $service['tag'] }}</span>
                </div>
                <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $service['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service['desc'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('Gestion à la carte')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- COMMENT ÇA MARCHE --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800">Comment ça marche ?</h2>
        </div>
        <div class="grid sm:grid-cols-3 gap-6 sm:gap-8">
            @php
                $steps = [
                    ['num' => '1', 'title' => 'Choisissez', 'desc' => 'Sélectionnez les services dont vous avez besoin parmi notre catalogue.'],
                    ['num' => '2', 'title' => 'Recevez votre devis', 'desc' => 'Nous vous envoyons un devis personnalisé sous 24h avec le détail des tarifs.'],
                    ['num' => '3', 'title' => 'On s\'en occupe', 'desc' => 'Une fois validé, nos experts prennent en charge les prestations choisies.'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="text-center">
                    <div class="w-14 h-14 bg-brand-blue text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        {{ $step['num'] }}
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-2">{{ $step['title'] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-brand-blue rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 text-center text-white">
        <h2 class="font-heading font-bold text-2xl sm:text-3xl mb-3">Demandez votre devis sur mesure</h2>
        <p class="text-blue-100 text-sm sm:text-base max-w-xl mx-auto mb-6">
            Dites-nous les services qui vous intéressent, nous vous envoyons un devis détaillé sous 24h.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
            <a href="{{ route('manage') }}"
                class="inline-flex items-center gap-2 bg-white text-brand-blue font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-blue-50 transition shadow-md text-sm sm:text-base">
                <i class="fas fa-paper-plane"></i> Demander un devis gratuit
            </a>
            <a href="{{ route('rental') }}"
                class="inline-flex items-center gap-2 border-2 border-white text-white font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-white/10 transition text-sm sm:text-base">
                <i class="fas fa-arrow-left"></i> Comparer les offres
            </a>
        </div>
    </div>
</div>

@endsection
