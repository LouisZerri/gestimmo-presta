@extends('layouts.app')

@section('title', "Gestion Locative - Comparer les offres - GEST'IMMO")
@section('meta_description', 'Comparez nos offres de gestion locative : complète à 7,5%, technique à 5% ou à la carte. GEST\'IMMO gère votre bien en toute sérénité.')
@section('keywords', 'gestion locative, gestion complète, gestion technique, gestion à la carte, mandat de gestion, loyer')

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-key mr-2 sm:mr-3"></i>Gestion Locative
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Confiez-nous la gestion de vos biens en toute sérénité.<br class="hidden sm:block">
        3 formules adaptées à vos besoins et à votre budget.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- 3 OFFRES --}}
    <div class="grid md:grid-cols-3 gap-6 sm:gap-8 mb-12 sm:mb-16 md:mb-20">

        {{-- Gestion Technique --}}
        <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border border-gray-100 p-6 sm:p-8 flex flex-col">
            <div class="mb-4">
                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full uppercase">Essentiel</span>
            </div>
            <h3 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-2">Gestion Technique</h3>
            <div class="text-3xl sm:text-4xl font-bold text-brand-blue mb-1">5%<span class="text-sm text-gray-400 font-normal"> HT / loyer</span></div>
            <p class="text-gray-500 text-sm mb-6">La solution pour les propriétaires autonomes qui veulent déléguer la partie technique.</p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8 flex-grow">
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Gestion des problèmes techniques</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Suivi des travaux</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Relation avec les prestataires</li>
                <li class="flex items-start text-gray-400"><i class="fas fa-times mt-1 mr-3"></i> Pas de gestion financière</li>
                <li class="flex items-start text-gray-400"><i class="fas fa-times mt-1 mr-3"></i> Pas de gestion comptable</li>
            </ul>
            <a href="{{ route('rental.technical') }}"
                class="w-full border-2 border-brand-blue text-brand-blue font-bold py-3 rounded-lg hover:bg-blue-50 transition text-center text-sm">
                En savoir plus
            </a>
        </div>

        {{-- Gestion Complète (recommandé) --}}
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-floating transition border-2 border-brand-blue p-6 sm:p-8 flex flex-col relative md:-translate-y-4">
            <div class="absolute top-0 right-0 bg-brand-accent text-white text-[10px] sm:text-xs font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wider">
                Recommandé
            </div>
            <div class="mb-4">
                <span class="bg-blue-100 text-brand-blue text-xs font-bold px-3 py-1 rounded-full uppercase">Sérénité</span>
            </div>
            <h3 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-2">Gestion Complète</h3>
            <div class="mb-1">
                <span class="text-3xl sm:text-4xl font-bold text-brand-blue">7,5%</span><span class="text-sm text-gray-400 font-normal"> HT / loyer</span>
                <div class="text-xs text-gray-500 mt-1">
                    <i class="fas fa-tag text-brand-accent mr-1"></i> <strong>6,8%</strong> à partir de 3 lots
                </div>
            </div>
            <p class="text-gray-500 text-sm mb-6 mt-2">On s'occupe de tout. Vous profitez de vos revenus, sans aucun souci.</p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8 flex-grow">
                <li class="flex items-start"><i class="fas fa-check-circle text-brand-blue mt-1 mr-3"></i> <strong>Gestion administrative</strong></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-brand-blue mt-1 mr-3"></i> <strong>Gestion locative</strong></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-brand-blue mt-1 mr-3"></i> Suivi des locataires</li>
                <li class="flex items-start"><i class="fas fa-check-circle text-brand-blue mt-1 mr-3"></i> Gestion des travaux</li>
                <li class="flex items-start"><i class="fas fa-check-circle text-brand-blue mt-1 mr-3"></i> Gestion des loyers</li>
            </ul>
            <a href="{{ route('rental.complete') }}"
                class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg hover:bg-blue-800 transition text-center shadow-md text-sm">
                En savoir plus
            </a>
        </div>

        {{-- Gestion à la Carte --}}
        <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border border-gray-100 p-6 sm:p-8 flex flex-col">
            <div class="mb-4">
                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full uppercase">Flexible</span>
            </div>
            <h3 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-2">Gestion à la Carte</h3>
            <div class="text-3xl sm:text-4xl font-bold text-brand-blue mb-1">Sur devis</div>
            <p class="text-gray-500 text-sm mb-6">Composez votre formule en choisissant uniquement les services dont vous avez besoin.</p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8 flex-grow">
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Recherche locataire & solvabilité</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Rédaction bail & annexes</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> État des lieux (entrée/sortie)</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Aide déclaration fiscale</li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-3"></i> Et bien plus encore...</li>
            </ul>
            <a href="{{ route('rental.alacarte') }}"
                class="w-full border-2 border-gray-300 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-50 transition text-center text-sm">
                En savoir plus
            </a>
        </div>
    </div>

    {{-- POURQUOI NOUS --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10">
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-3">Pourquoi confier votre gestion à GEST'IMMO ?</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center">
            @php
                $stats = [
                    ['value' => '0%', 'label' => 'de vacance locative'],
                    ['value' => '48h', 'label' => 'délai de relocation'],
                    ['value' => '100%', 'label' => 'digital & transparent'],
                    ['value' => '24/7', 'label' => 'espace propriétaire'],
                ];
            @endphp
            @foreach($stats as $stat)
                <div>
                    <div class="font-extrabold text-2xl sm:text-3xl md:text-4xl text-brand-blue mb-1 sm:mb-2">{{ $stat['value'] }}</div>
                    <div class="text-xs sm:text-sm font-bold text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
