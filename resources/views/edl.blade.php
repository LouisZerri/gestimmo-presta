@extends('layouts.app')

@section('title', "État des Lieux - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-clipboard-check mr-2 sm:mr-3"></i>État des Lieux
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Un état des lieux rigoureux et conforme, réalisé par des professionnels certifiés.<br class="hidden sm:block">
        Protégez votre patrimoine dès l'entrée et la sortie du locataire.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- PRÉSENTATION DU SERVICE --}}
    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12 sm:mb-16 md:mb-20">
        <div>
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Notre service</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2 mb-4 sm:mb-6">Un état des lieux professionnel et impartial</h2>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                L'état des lieux est un document essentiel qui décrit précisément l'état d'un logement à l'entrée et à la sortie du locataire. Il constitue la pièce maîtresse en cas de litige sur les éventuelles dégradations.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Chez <strong class="text-brand-blue">GEST'IMMO</strong>, nos experts réalisent des états des lieux exhaustifs, conformes à la loi ALUR, avec un rapport détaillé accompagné de photos horodatées.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                Que vous soyez propriétaire bailleur, locataire ou agence immobilière, nous intervenons rapidement sur toute la France pour sécuriser vos biens.
            </p>
        </div>
        <div class="bg-brand-light rounded-2xl p-6 sm:p-8 flex flex-col justify-center">
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-800 mb-4 sm:mb-6">Ce que comprend notre prestation</h3>
            <ul class="space-y-3 sm:space-y-4">
                @php
                    $prestations = [
                        ['icon' => 'fa-camera', 'text' => 'Rapport photos HD horodatées de chaque pièce'],
                        ['icon' => 'fa-file-alt', 'text' => 'Document conforme à la loi ALUR et au décret de 2016'],
                        ['icon' => 'fa-balance-scale', 'text' => 'Comparatif entrée/sortie pour chiffrer les réparations'],
                        ['icon' => 'fa-clock', 'text' => 'Intervention sous 48h sur toute la France'],
                        ['icon' => 'fa-envelope', 'text' => 'Envoi dématérialisé du rapport sous 24h'],
                        ['icon' => 'fa-shield-alt', 'text' => 'Responsabilité civile professionnelle incluse'],
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
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Les avantages GEST'IMMO</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            @php
                $avantages = [
                    [
                        'icon' => 'fa-user-tie',
                        'title' => 'Experts certifiés',
                        'desc' => 'Nos intervenants sont formés et certifiés, garantissant un état des lieux irréprochable.',
                    ],
                    [
                        'icon' => 'fa-gavel',
                        'title' => 'Valeur juridique',
                        'desc' => 'Document conforme à la législation en vigueur, opposable en cas de litige.',
                    ],
                    [
                        'icon' => 'fa-bolt',
                        'title' => 'Rapidité',
                        'desc' => 'Intervention sous 48h et remise du rapport détaillé sous 24h.',
                    ],
                    [
                        'icon' => 'fa-euro-sign',
                        'title' => 'Tarifs compétitifs',
                        'desc' => 'Des prix transparents et accessibles, sans frais cachés ni surprise.',
                    ],
                ];
            @endphp
            @foreach($avantages as $av)
                <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition p-6 sm:p-8 text-center border border-gray-100">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-2xl mx-auto mb-4">
                        <i class="fas {{ $av['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $av['title'] }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">{{ $av['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- TYPES D'EDL --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-3">Nos prestations</h2>
            <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto">Nous intervenons pour tous types d'états des lieux.</p>
        </div>
        <div class="grid sm:grid-cols-3 gap-6">
            @php
                $types = [
                    [
                        'icon' => 'fa-sign-in-alt',
                        'title' => "État des lieux d'entrée",
                        'desc' => "Réalisé lors de la remise des clés au locataire. Description détaillée de l'état du logement, des équipements et des compteurs.",
                        'color' => 'border-brand-blue',
                    ],
                    [
                        'icon' => 'fa-sign-out-alt',
                        'title' => "État des lieux de sortie",
                        'desc' => "Effectué lors du départ du locataire. Comparaison avec l'état d'entrée pour identifier les éventuelles dégradations.",
                        'color' => 'border-brand-accent',
                    ],
                    [
                        'icon' => 'fa-exchange-alt',
                        'title' => 'Entrée + Sortie',
                        'desc' => "Pack complet pour sécuriser l'intégralité du bail. Tarif préférentiel et suivi de A à Z.",
                        'color' => 'border-green-500',
                    ],
                ];
            @endphp
            @foreach($types as $type)
                <div class="bg-white rounded-xl p-6 border-t-4 {{ $type['color'] }} shadow-card">
                    <div class="text-brand-blue text-3xl mb-4">
                        <i class="fas {{ $type['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-3">{{ $type['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $type['desc'] }}</p>
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

    {{-- FORMULAIRE DE DEMANDE --}}
    <div id="edl-form" class="max-w-2xl mx-auto bg-white p-5 sm:p-8 md:p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
        <div class="text-center mb-6 sm:mb-8">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-800">Demander un état des lieux</h3>
            <p class="text-gray-500 text-sm sm:text-base">Réponse sous 24h. Devis gratuit et sans engagement.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-fade-in-up">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-green-800">Demande envoyée avec succès !</h4>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-red-800">Une erreur est survenue</h4>
                    <p class="text-red-700 text-sm">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-circle text-red-600"></i>
                    <h4 class="font-bold text-red-800">Veuillez corriger les erreurs suivantes :</h4>
                </div>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-3 sm:space-y-4" method="POST" action="{{ route('edl.submit') }}" id="edl-form-element">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base @error('nom') border-red-500 @enderror">
                </div>
                <div>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base @error('prenom') border-red-500 @enderror">
                </div>
            </div>

            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('email') border-red-500 @enderror">

            <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('telephone') border-red-500 @enderror">

            <input type="text" name="adresse_bien" value="{{ old('adresse_bien') }}" placeholder="Adresse du bien *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('adresse_bien') border-red-500 @enderror">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <select name="type_bien" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer text-sm sm:text-base @error('type_bien') border-red-500 @enderror">
                    <option value="">Type de bien *</option>
                    <option value="Appartement" {{ old('type_bien') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="Maison" {{ old('type_bien') == 'Maison' ? 'selected' : '' }}>Maison</option>
                    <option value="Studio" {{ old('type_bien') == 'Studio' ? 'selected' : '' }}>Studio</option>
                    <option value="Local commercial" {{ old('type_bien') == 'Local commercial' ? 'selected' : '' }}>Local commercial</option>
                </select>
                <select name="type_edl" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer text-sm sm:text-base @error('type_edl') border-red-500 @enderror">
                    <option value="">Type d'état des lieux *</option>
                    <option value="Entrée" {{ old('type_edl') == 'Entrée' ? 'selected' : '' }}>État des lieux d'entrée</option>
                    <option value="Sortie" {{ old('type_edl') == 'Sortie' ? 'selected' : '' }}>État des lieux de sortie</option>
                    <option value="Entrée + Sortie" {{ old('type_edl') == 'Entrée + Sortie' ? 'selected' : '' }}>Entrée + Sortie</option>
                </select>
            </div>

            <input type="text" name="date_souhaitee" value="{{ old('date_souhaitee') }}" placeholder="Date souhaitée (ex: 15/04/2026)"
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

            <textarea name="message" rows="3" placeholder="Précisions complémentaires (surface, nombre de pièces, accès...)"
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none">{{ old('message') }}</textarea>

            <p class="text-xs text-gray-400">
                <i class="fas fa-lock mr-1"></i>
                Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
            </p>

            <button type="submit" id="edl-submit-btn"
                class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                <span id="edl-btn-text">Demander un devis gratuit</span>
                <span id="edl-btn-loading" class="hidden items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Envoi en cours...
                </span>
                <i class="fas fa-paper-plane" id="edl-btn-icon"></i>
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('edl-form-element')?.addEventListener('submit', function() {
        const btn = document.getElementById('edl-submit-btn');
        const btnText = document.getElementById('edl-btn-text');
        const btnLoading = document.getElementById('edl-btn-loading');
        const btnIcon = document.getElementById('edl-btn-icon');

        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('inline-flex');
    });

    @if(session('success') || session('error') || $errors->any())
        document.getElementById('edl-form')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    @endif
</script>
@endpush
