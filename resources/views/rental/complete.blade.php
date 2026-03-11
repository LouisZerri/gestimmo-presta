@extends('layouts.app')

@section('title', "Gestion Locative Complète - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-key mr-2 sm:mr-3"></i>Gestion Locative Complète
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        On s'occupe de tout. Vous profitez de vos revenus locatifs en toute sérénité.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- TARIFICATION --}}
    <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16 md:mb-20">
        <div class="bg-white rounded-2xl shadow-xl border-2 border-brand-blue p-6 sm:p-8 md:p-10">
            <span class="bg-brand-accent text-white text-xs font-bold px-3 py-1 rounded-full uppercase">Recommandé</span>
            <div class="mt-4 mb-2">
                <span class="text-4xl sm:text-5xl font-bold text-brand-blue">7,5%</span>
                <span class="text-gray-400 text-sm"> HT du loyer / mois</span>
            </div>
            <p class="text-sm text-gray-500 mb-4">Pour les biens comprenant moins de 3 lots</p>
            <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-bold text-sm px-4 py-2 rounded-full">
                <i class="fas fa-tag"></i> 6,8% HT à partir de 3 lots
            </div>
        </div>
    </div>

    {{-- SERVICES INCLUS --}}
    <div class="mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-12">
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Tout inclus</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Ce que nous gérons pour vous</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @php
                $services = [
                    [
                        'icon' => 'fa-file-contract',
                        'title' => 'Gestion Administrative',
                        'items' => [
                            'Rédaction et renouvellement du bail',
                            'Régularisation des charges',
                            'Révision annuelle du loyer',
                            'Gestion des sinistres et assurances',
                        ],
                    ],
                    [
                        'icon' => 'fa-users',
                        'title' => 'Gestion Locative',
                        'items' => [
                            'Recherche et sélection du locataire',
                            'Étude de solvabilité approfondie',
                            'État des lieux entrée / sortie',
                            'Gestion du dépôt de garantie',
                        ],
                    ],
                    [
                        'icon' => 'fa-user-check',
                        'title' => 'Suivi des Locataires',
                        'items' => [
                            'Interlocuteur unique pour le locataire',
                            'Gestion des demandes et réclamations',
                            'Relances et gestion des impayés',
                            'Accompagnement départ du locataire',
                        ],
                    ],
                    [
                        'icon' => 'fa-hammer',
                        'title' => 'Gestion des Travaux',
                        'items' => [
                            'Diagnostic et chiffrage des travaux',
                            'Sélection des artisans qualifiés',
                            'Suivi de chantier et réception',
                            'Gestion des garanties et SAV',
                        ],
                    ],
                    [
                        'icon' => 'fa-coins',
                        'title' => 'Gestion des Loyers',
                        'items' => [
                            'Appel et encaissement des loyers',
                            'Envoi des quittances',
                            'Virement mensuel au propriétaire',
                            'Compte-rendu de gestion détaillé',
                        ],
                    ],
                    [
                        'icon' => 'fa-laptop',
                        'title' => 'Espace Client 24/7',
                        'items' => [
                            'Tableau de bord en temps réel',
                            'Documents accessibles en ligne',
                            'Alertes et notifications',
                            'Reporting financier annuel',
                        ],
                    ],
                ];
            @endphp

            @foreach($services as $service)
                <div class="bg-white rounded-xl shadow-card border border-gray-100 p-6 hover:shadow-floating transition">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-xl mb-4">
                        <i class="fas {{ $service['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-3">{{ $service['title'] }}</h3>
                    <ul class="space-y-2">
                        @foreach($service['items'] as $item)
                            <li class="flex items-start text-sm text-gray-600">
                                <i class="fas fa-check-circle text-brand-blue mt-1 mr-2 text-xs"></i>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('Gestion locative complète')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- CTA --}}
    <div class="bg-brand-blue rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 text-center text-white">
        <h2 class="font-heading font-bold text-2xl sm:text-3xl mb-3">Prêt à nous confier votre bien ?</h2>
        <p class="text-blue-100 text-sm sm:text-base max-w-xl mx-auto mb-6">
            Obtenez une estimation personnalisée de nos honoraires de gestion. Réponse sous 24h.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
            <a href="{{ route('manage') }}"
                class="inline-flex items-center gap-2 bg-white text-brand-blue font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-blue-50 transition shadow-md text-sm sm:text-base">
                <i class="fas fa-paper-plane"></i> Demander un devis
            </a>
            <a href="{{ route('rental') }}"
                class="inline-flex items-center gap-2 border-2 border-white text-white font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-white/10 transition text-sm sm:text-base">
                <i class="fas fa-arrow-left"></i> Comparer les offres
            </a>
        </div>
    </div>
</div>

@endsection
