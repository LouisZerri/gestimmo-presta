@extends('layouts.app')

@section('title', "Investir dans le Neuf - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-building mr-2 sm:mr-3"></i>Investir dans l'Immobilier Neuf
    </h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Profitez des avantages fiscaux et des garanties du neuf pour bâtir votre patrimoine.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- AVANTAGES --}}
    <div class="text-center mb-8 sm:mb-12">
        <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Les atouts du neuf</span>
        <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Pourquoi investir dans le neuf ?</h2>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-12 sm:mb-16 md:mb-20">
        @php
            $avantages = [
                [
                    'icon' => 'fa-percent',
                    'title' => 'Frais de notaire réduits',
                    'desc' => 'Seulement 2 à 3% de frais de notaire contre 7 à 8% dans l\'ancien. Une économie substantielle dès l\'achat.',
                    'color' => 'bg-green-50 text-green-600',
                ],
                [
                    'icon' => 'fa-leaf',
                    'title' => 'Normes énergétiques',
                    'desc' => 'Conformité RE2020, excellente isolation thermique et phonique. DPE A ou B garanti.',
                    'color' => 'bg-emerald-50 text-emerald-600',
                ],
                [
                    'icon' => 'fa-shield-alt',
                    'title' => 'Garanties constructeur',
                    'desc' => 'Garantie décennale, biennale et parfait achèvement. Zéro travaux pendant 10 ans minimum.',
                    'color' => 'bg-blue-50 text-brand-blue',
                ],
                [
                    'icon' => 'fa-piggy-bank',
                    'title' => 'Avantages fiscaux',
                    'desc' => 'Dispositifs Pinel, LMNP, statut LMP... Réduisez vos impôts tout en constituant votre patrimoine.',
                    'color' => 'bg-amber-50 text-amber-600',
                ],
            ];
        @endphp
        @foreach($avantages as $av)
            <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border border-gray-100 p-6 sm:p-8 text-center">
                <div class="w-14 h-14 sm:w-16 sm:h-16 {{ $av['color'] }} rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
                    <i class="fas {{ $av['icon'] }}"></i>
                </div>
                <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $av['title'] }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm">{{ $av['desc'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- TYPES DE RÉSIDENCES --}}
    <div class="bg-brand-light rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mb-3">Nos programmes d'investissement</h2>
            <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto">Nous vous accompagnons sur tous les types de résidences gérées.</p>
        </div>
        <div class="grid sm:grid-cols-3 gap-6">
            @php
                $residences = [
                    [
                        'icon' => 'fa-umbrella-beach',
                        'title' => 'Résidence de tourisme',
                        'desc' => 'Investissez dans une résidence de tourisme et bénéficiez de revenus locatifs garantis par un bail commercial. Récupération de la TVA possible.',
                        'color' => 'border-brand-blue',
                    ],
                    [
                        'icon' => 'fa-graduation-cap',
                        'title' => 'Résidence étudiante',
                        'desc' => 'Un marché en tension permanente. Forte demande locative, loyers sécurisés et gestion simplifiée par un exploitant.',
                        'color' => 'border-brand-accent',
                    ],
                    [
                        'icon' => 'fa-heart',
                        'title' => 'Résidence senior',
                        'desc' => 'Un secteur en pleine croissance. Revenus stables, bail commercial longue durée et un marché porté par la démographie.',
                        'color' => 'border-green-500',
                    ],
                ];
            @endphp
            @foreach($residences as $res)
                <div class="bg-white rounded-xl p-6 border-t-4 {{ $res['color'] }} shadow-card">
                    <div class="text-brand-blue text-3xl mb-4">
                        <i class="fas {{ $res['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-3">{{ $res['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $res['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOUTON TARIFS --}}
    <div class="text-center mb-12 sm:mb-16 md:mb-20">
        <button onclick="openTarifsModal('Investissement neuf')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- FORMULAIRE --}}
    <div id="invest-neuf-form" class="max-w-2xl mx-auto bg-white p-5 sm:p-8 md:p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
        <div class="text-center mb-6 sm:mb-8">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-800">Votre projet d'investissement neuf</h3>
            <p class="text-gray-500 text-sm sm:text-base">Dites-nous ce que vous recherchez, un expert vous rappelle sous 24h.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-fade-in-up">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-green-800">Demande envoyée !</h4>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
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

        <form class="space-y-3 sm:space-y-4" method="POST" action="{{ route('invest.neuf.submit') }}" id="neuf-form">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom *" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base">
                <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom *" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base">
            </div>

            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

            <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

            <input type="text" name="ville_souhaitee" value="{{ old('ville_souhaitee') }}" placeholder="Ville souhaitée *" required
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <select name="budget" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer text-sm sm:text-base">
                    <option value="">Budget *</option>
                    <option value="< 100 000€" {{ old('budget') == '< 100 000€' ? 'selected' : '' }}>Moins de 100 000 €</option>
                    <option value="100 000€ - 200 000€" {{ old('budget') == '100 000€ - 200 000€' ? 'selected' : '' }}>100 000 € - 200 000 €</option>
                    <option value="200 000€ - 300 000€" {{ old('budget') == '200 000€ - 300 000€' ? 'selected' : '' }}>200 000 € - 300 000 €</option>
                    <option value="300 000€ - 500 000€" {{ old('budget') == '300 000€ - 500 000€' ? 'selected' : '' }}>300 000 € - 500 000 €</option>
                    <option value="> 500 000€" {{ old('budget') == '> 500 000€' ? 'selected' : '' }}>Plus de 500 000 €</option>
                </select>
                <select name="type_investissement" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer text-sm sm:text-base">
                    <option value="">Type d'investissement *</option>
                    <option value="Défiscalisation" {{ old('type_investissement') == 'Défiscalisation' ? 'selected' : '' }}>Défiscalisation</option>
                    <option value="Rendement locatif" {{ old('type_investissement') == 'Rendement locatif' ? 'selected' : '' }}>Rendement locatif</option>
                    <option value="Résidence principale" {{ old('type_investissement') == 'Résidence principale' ? 'selected' : '' }}>Résidence principale</option>
                    <option value="Résidence secondaire" {{ old('type_investissement') == 'Résidence secondaire' ? 'selected' : '' }}>Résidence secondaire</option>
                </select>
            </div>

            {{-- Cases à cocher résidences --}}
            <div class="bg-blue-50 p-3 sm:p-4 rounded-lg border border-blue-100">
                <label class="block font-bold text-gray-700 mb-2 sm:mb-3 text-xs sm:text-sm">Type de résidence qui vous intéresse :</label>
                <div class="flex flex-wrap gap-2 sm:gap-4">
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" name="residences[]" value="Résidence de tourisme"
                            class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                            {{ in_array('Résidence de tourisme', old('residences', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">Tourisme</span>
                    </label>
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" name="residences[]" value="Résidence étudiante"
                            class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                            {{ in_array('Résidence étudiante', old('residences', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">Étudiante</span>
                    </label>
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" name="residences[]" value="Résidence senior"
                            class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                            {{ in_array('Résidence senior', old('residences', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">Senior</span>
                    </label>
                </div>
            </div>

            <textarea name="message" rows="3" placeholder="Précisions sur votre projet (optionnel)"
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none">{{ old('message') }}</textarea>

            <p class="text-xs text-gray-400">
                <i class="fas fa-lock mr-1"></i>
                Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
            </p>

            <button type="submit" id="neuf-submit-btn"
                class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                <span id="neuf-btn-text">Être rappelé par un expert</span>
                <span id="neuf-btn-loading" class="hidden items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Envoi en cours...
                </span>
                <i class="fas fa-paper-plane" id="neuf-btn-icon"></i>
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('neuf-form')?.addEventListener('submit', function() {
        const btn = document.getElementById('neuf-submit-btn');
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        document.getElementById('neuf-btn-text').classList.add('hidden');
        document.getElementById('neuf-btn-icon').classList.add('hidden');
        document.getElementById('neuf-btn-loading').classList.remove('hidden');
        document.getElementById('neuf-btn-loading').classList.add('inline-flex');
    });

    @if(session('success') || $errors->any())
        document.getElementById('invest-neuf-form')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    @endif
</script>
@endpush
