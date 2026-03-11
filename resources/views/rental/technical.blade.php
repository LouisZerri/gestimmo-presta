@extends('layouts.app')

@section('title', "Gestion Technique - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-dark text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-wrench mr-2 sm:mr-3"></i>Gestion Technique
    </h1>
    <p class="text-gray-300 text-base sm:text-lg max-w-2xl mx-auto">
        Déléguez la partie technique et concentrez-vous sur l'essentiel.<br class="hidden sm:block">
        Idéal pour les propriétaires qui gèrent eux-mêmes l'administratif.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- TARIFICATION --}}
    <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16 md:mb-20">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 sm:p-8 md:p-10">
            <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full uppercase">Essentiel</span>
            <div class="mt-4 mb-2">
                <span class="text-4xl sm:text-5xl font-bold text-brand-blue">5%</span>
                <span class="text-gray-400 text-sm"> HT du loyer / mois</span>
            </div>
            <p class="text-sm text-gray-500">Uniquement la gestion technique de votre bien</p>
        </div>
    </div>

    {{-- CE QUI EST INCLUS / EXCLUS --}}
    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12 sm:mb-16 md:mb-20">
        {{-- Inclus --}}
        <div>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-green-600"></i>
                </span>
                Ce qui est inclus
            </h2>
            <div class="space-y-4">
                @php
                    $inclus = [
                        [
                            'title' => 'Gestion des problèmes techniques',
                            'desc' => 'Prise en charge de tous les incidents techniques : plomberie, électricité, chauffage, serrurerie...',
                        ],
                        [
                            'title' => 'Suivi des travaux',
                            'desc' => 'Coordination complète des chantiers, du diagnostic à la réception des travaux.',
                        ],
                        [
                            'title' => 'Relation avec les prestataires',
                            'desc' => 'Sélection, négociation et suivi des artisans et entreprises de maintenance.',
                        ],
                        [
                            'title' => 'Urgences 7j/7',
                            'desc' => 'Ligne dédiée pour les urgences techniques (dégât des eaux, panne de chauffage...).',
                        ],
                        [
                            'title' => 'Reporting technique',
                            'desc' => 'Compte-rendu régulier sur l\'état technique du bien et les interventions réalisées.',
                        ],
                    ];
                @endphp
                @foreach($inclus as $item)
                    <div class="bg-white rounded-xl shadow-card border border-gray-100 p-5 hover:shadow-floating transition">
                        <h3 class="font-bold text-gray-800 mb-1">{{ $item['title'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Non inclus --}}
        <div>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-6 flex items-center gap-3">
                <span class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-red-500"></i>
                </span>
                Ce qui n'est pas inclus
            </h2>
            <div class="space-y-4">
                @php
                    $exclus = [
                        [
                            'title' => 'Gestion financière',
                            'desc' => 'L\'encaissement des loyers, les quittances et la comptabilité restent à votre charge.',
                        ],
                        [
                            'title' => 'Gestion comptable',
                            'desc' => 'Le suivi comptable, les régularisations de charges et les déclarations fiscales ne sont pas inclus.',
                        ],
                        [
                            'title' => 'Recherche de locataire',
                            'desc' => 'La mise en location, les visites et la sélection des locataires sont à votre initiative.',
                        ],
                        [
                            'title' => 'Gestion administrative du bail',
                            'desc' => 'La rédaction du bail, les avenants et les congés restent de votre ressort.',
                        ],
                    ];
                @endphp
                @foreach($exclus as $item)
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-5">
                        <h3 class="font-bold text-gray-600 mb-1">{{ $item['title'] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 bg-blue-50 rounded-xl p-5 border border-blue-100">
                <p class="text-sm text-brand-blue">
                    <i class="fas fa-lightbulb mr-2"></i>
                    <strong>Besoin de plus ?</strong> Passez à la <a href="{{ route('rental.complete') }}" class="underline font-bold">Gestion Complète</a> pour une prise en charge totale.
                </p>
            </div>
        </div>
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('Gestion technique')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- CTA --}}
    <div class="bg-brand-dark rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 text-center text-white">
        <h2 class="font-heading font-bold text-2xl sm:text-3xl mb-3">Intéressé par la Gestion Technique ?</h2>
        <p class="text-gray-300 text-sm sm:text-base max-w-xl mx-auto mb-6">
            Contactez-nous pour obtenir un devis personnalisé. Sans engagement.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
            <a href="{{ route('manage') }}"
                class="inline-flex items-center gap-2 bg-white text-brand-dark font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-gray-100 transition shadow-md text-sm sm:text-base">
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
