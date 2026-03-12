@extends('layouts.app')

@section('title', "État des lieux professionnel - GEST'IMMO")
@section('meta_description', 'Externalisez vos états des lieux avec GEST\'IMMO : service dédié aux agences, administrateurs de biens et gestionnaires. Tarifs dégressifs, intervention 48h.')
@section('keywords', 'état des lieux professionnel, EDL externalisé, prestataire état des lieux, agence immobilière, tarif EDL')

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <span class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Espace Pro</span>
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4 mt-4">
        <i class="fas fa-clipboard-check mr-2 sm:mr-3"></i>État des Lieux Professionnel
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Un service dédié aux professionnels de l'immobilier.<br class="hidden sm:block">
        Externalisez vos états des lieux et gagnez en productivité.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- POUR QUI --}}
    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12 sm:mb-16 md:mb-20">
        <div>
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Pour les professionnels</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2 mb-4 sm:mb-6">Externalisez vos états des lieux</h2>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Vous êtes une agence immobilière, un administrateur de biens ou un gestionnaire de patrimoine ? GEST'IMMO vous propose un service d'état des lieux professionnel, rapide et fiable.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Nos experts interviennent en votre nom, avec vos standards de qualité, pour réaliser des états des lieux conformes et détaillés. Vous libérez du temps pour vos équipes tout en garantissant un service irréprochable à vos clients.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                Nous couvrons l'ensemble du territoire national avec un réseau d'intervenants qualifiés et formés à nos méthodes.
            </p>
        </div>
        <div class="space-y-4">
            @php
                $cibles = [
                    ['icon' => 'fa-building', 'title' => 'Agences immobilières', 'desc' => 'Déléguez vos EDL pour vous concentrer sur la transaction et la relation client.'],
                    ['icon' => 'fa-city', 'title' => 'Administrateurs de biens', 'desc' => 'Gérez un volume important d\'EDL sans surcharger vos équipes.'],
                    ['icon' => 'fa-briefcase', 'title' => 'Gestionnaires de patrimoine', 'desc' => 'Un interlocuteur unique pour tous les EDL de votre portefeuille.'],
                    ['icon' => 'fa-home', 'title' => 'Propriétaires multi-lots', 'desc' => 'Tarifs dégressifs pour les propriétaires gérant plusieurs biens.'],
                ];
            @endphp
            @foreach($cibles as $cible)
                <div class="bg-white rounded-xl shadow-card border border-gray-100 p-5 flex gap-4 hover:shadow-floating transition">
                    <div class="w-11 h-11 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0">
                        <i class="fas {{ $cible['icon'] }}"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm">{{ $cible['title'] }}</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">{{ $cible['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- AVANTAGES PRO --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-3">Les avantages pour les professionnels</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            @php
                $avantages = [
                    ['icon' => 'fa-tags', 'title' => 'Tarifs dégressifs', 'desc' => 'Plus vous confiez d\'EDL, plus le tarif unitaire baisse.'],
                    ['icon' => 'fa-bolt', 'title' => 'Réactivité 48h', 'desc' => 'Intervention garantie sous 48h partout en France.'],
                    ['icon' => 'fa-file-pdf', 'title' => 'Rapport personnalisé', 'desc' => 'Rapport aux couleurs de votre agence si souhaité.'],
                    ['icon' => 'fa-headset', 'title' => 'Interlocuteur dédié', 'desc' => 'Un référent unique pour gérer tous vos dossiers.'],
                ];
            @endphp
            @foreach($avantages as $av)
                <div>
                    <div class="w-14 h-14 bg-brand-blue rounded-full flex items-center justify-center text-white text-xl mx-auto mb-3">
                        <i class="fas {{ $av['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 mb-1">{{ $av['title'] }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">{{ $av['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('État des lieux')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- CTA --}}
    <div class="bg-brand-blue rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 text-center text-white">
        <h2 class="font-heading font-bold text-2xl sm:text-3xl mb-3">Demandez votre tarif professionnel</h2>
        <p class="text-blue-100 text-sm sm:text-base max-w-xl mx-auto mb-6">
            Contactez-nous pour recevoir une offre adaptée à votre volume d'activité.
        </p>
        <a href="{{ route('contact') }}"
            class="inline-flex items-center gap-2 bg-white text-brand-blue font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-blue-50 transition shadow-md text-sm sm:text-base">
            <i class="fas fa-paper-plane"></i> Nous contacter
        </a>
    </div>
</div>

@endsection
