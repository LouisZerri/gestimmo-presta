@extends('layouts.app')

@section('title', "Nourrice Locative - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-dark text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <span class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Espace Pro</span>
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4 mt-4">
        <i class="fas fa-house-user mr-2 sm:mr-3"></i>Nourrice Locative
    </h1>
    <p class="text-gray-300 text-base sm:text-lg max-w-2xl mx-auto">
        Un service d'hébergement administratif pour les professionnels de l'immobilier.<br class="hidden sm:block">
        Domiciliez vos mandats de gestion en toute conformité.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- EXPLICATION --}}
    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12 sm:mb-16 md:mb-20">
        <div>
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Le concept</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2 mb-4 sm:mb-6">Qu'est-ce que la nourrice locative ?</h2>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                La nourrice locative est un service qui permet aux professionnels de l'immobilier (conseillers indépendants, mandataires, agents commerciaux) de confier la gestion administrative de leurs mandats locatifs à une structure habilitée.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Concrètement, <strong class="text-brand-blue">GEST'IMMO</strong> assure le portage juridique et administratif de vos mandats de gestion locative. Vous conservez la relation client et le suivi commercial, nous prenons en charge la partie réglementaire.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                C'est la solution idéale pour les professionnels qui souhaitent proposer un service de gestion locative sans détenir eux-mêmes la carte G (carte professionnelle de gestion immobilière).
            </p>
        </div>
        <div class="bg-brand-light rounded-2xl p-6 sm:p-8">
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-800 mb-6">Ce que nous prenons en charge</h3>
            <ul class="space-y-4">
                @php
                    $prestations = [
                        ['icon' => 'fa-id-card', 'text' => 'Portage de la carte G (gestion immobilière)'],
                        ['icon' => 'fa-file-contract', 'text' => 'Rédaction et signature des mandats de gestion'],
                        ['icon' => 'fa-university', 'text' => 'Gestion du compte séquestre et des fonds'],
                        ['icon' => 'fa-receipt', 'text' => 'Émission des quittances et appels de loyers'],
                        ['icon' => 'fa-calculator', 'text' => 'Comptabilité locative et régularisation des charges'],
                        ['icon' => 'fa-shield-alt', 'text' => 'Garantie financière et assurance RC Pro'],
                    ];
                @endphp
                @foreach($prestations as $item)
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas {{ $item['icon'] }} text-white text-xs"></i>
                        </div>
                        <span class="text-gray-700 text-sm sm:text-base">{{ $item['text'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- AVANTAGES --}}
    <div class="mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-12">
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Pourquoi nous choisir</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Les avantages de notre nourrice locative</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @php
                $avantages = [
                    [
                        'icon' => 'fa-rocket',
                        'title' => 'Lancez-vous rapidement',
                        'desc' => 'Proposez la gestion locative à vos clients sans attendre l\'obtention de la carte G.',
                    ],
                    [
                        'icon' => 'fa-balance-scale',
                        'title' => 'Conformité totale',
                        'desc' => 'Exercez en toute légalité grâce à notre carte professionnelle et notre garantie financière.',
                    ],
                    [
                        'icon' => 'fa-hand-holding-usd',
                        'title' => 'Revenus complémentaires',
                        'desc' => 'Ajoutez la gestion locative à vos services et augmentez vos revenus récurrents.',
                    ],
                    [
                        'icon' => 'fa-cogs',
                        'title' => 'Back-office complet',
                        'desc' => 'Outils de gestion, comptabilité, reporting : tout est inclus dans notre plateforme.',
                    ],
                    [
                        'icon' => 'fa-users',
                        'title' => 'Accompagnement dédié',
                        'desc' => 'Formation initiale et support continu par notre équipe de gestionnaires expérimentés.',
                    ],
                    [
                        'icon' => 'fa-chart-line',
                        'title' => 'Évolutif',
                        'desc' => 'Notre solution s\'adapte à votre croissance, de 1 à 100+ lots sous gestion.',
                    ],
                ];
            @endphp
            @foreach($avantages as $av)
                <div class="bg-white rounded-xl shadow-card border border-gray-100 p-6 hover:shadow-floating transition">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-xl mb-4">
                        <i class="fas {{ $av['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $av['title'] }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">{{ $av['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('Nourrice locative')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- COMMENT ÇA MARCHE --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800">Comment ça fonctionne ?</h2>
        </div>
        <div class="grid sm:grid-cols-4 gap-6 sm:gap-8">
            @php
                $steps = [
                    ['num' => '1', 'title' => 'Contactez-nous', 'desc' => 'Présentez-nous votre activité et vos besoins.'],
                    ['num' => '2', 'title' => 'Convention', 'desc' => 'Nous signons une convention de partenariat.'],
                    ['num' => '3', 'title' => 'Formation', 'desc' => 'Nous vous formons à nos outils et process.'],
                    ['num' => '4', 'title' => 'C\'est parti !', 'desc' => 'Vous proposez la gestion locative à vos clients.'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="text-center">
                    <div class="w-14 h-14 bg-brand-blue text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-3">
                        {{ $step['num'] }}
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 text-sm sm:text-base mb-1">{{ $step['title'] }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-brand-dark rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 text-center text-white">
        <h2 class="font-heading font-bold text-2xl sm:text-3xl mb-3">Devenez partenaire nourrice locative</h2>
        <p class="text-gray-300 text-sm sm:text-base max-w-xl mx-auto mb-6">
            Contactez-nous pour en savoir plus sur notre offre de nourrice locative et recevoir notre documentation.
        </p>
        <a href="{{ route('contact') }}"
            class="inline-flex items-center gap-2 bg-white text-brand-dark font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-gray-100 transition shadow-md text-sm sm:text-base">
            <i class="fas fa-paper-plane"></i> Nous contacter
        </a>
    </div>
</div>

@endsection
