@extends('layouts.app')

@section('title', "Viager - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-dark text-white py-12 sm:py-16 md:py-20 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
        <i class="fas fa-handshake mr-2 sm:mr-3"></i>Investir en Viager
    </h1>
    <p class="text-gray-300 text-base sm:text-lg max-w-2xl mx-auto">
        Une solution d'investissement humaine et patrimoniale.<br class="hidden sm:block">
        Achetez un bien à prix réduit tout en accompagnant un senior.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">

    {{-- EXPLICATION --}}
    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12 sm:mb-16 md:mb-20">
        <div>
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Le principe</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2 mb-4 sm:mb-6">Qu'est-ce que le viager ?</h2>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Le viager est un mode d'acquisition immobilière dans lequel l'acheteur (le <strong class="text-brand-blue">débirentier</strong>) verse un capital initial appelé <strong class="text-brand-blue">bouquet</strong>, puis une rente mensuelle ou trimestrielle au vendeur (le <strong class="text-brand-blue">crédirentier</strong>) jusqu'à son décès.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                Le prix de vente est décoté en fonction de l'âge du vendeur et de la valeur du bien. C'est un contrat gagnant-gagnant : le vendeur perçoit un revenu complémentaire, l'acheteur acquiert un bien en dessous du prix du marché.
            </p>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                Il existe deux formes principales : le <strong>viager occupé</strong> (le vendeur reste dans le bien) et le <strong>viager libre</strong> (l'acheteur peut occuper ou louer le bien immédiatement).
            </p>
        </div>
        <div class="bg-brand-light rounded-2xl p-6 sm:p-8">
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-800 mb-6">Comment ça fonctionne ?</h3>
            <div class="space-y-5">
                @php
                    $etapes = [
                        ['num' => '1', 'title' => 'Évaluation du bien', 'desc' => 'Le bien est estimé à sa valeur de marché par un expert.'],
                        ['num' => '2', 'title' => 'Calcul de la décote', 'desc' => 'Selon l\'âge du vendeur, un coefficient de décote est appliqué (tables de mortalité INSEE).'],
                        ['num' => '3', 'title' => 'Définition du bouquet', 'desc' => 'Le capital initial versé au vendeur le jour de la vente (généralement 20 à 30% de la valeur décotée).'],
                        ['num' => '4', 'title' => 'Calcul de la rente', 'desc' => 'Le solde est converti en rente viagère versée mensuellement au vendeur.'],
                        ['num' => '5', 'title' => 'Acte notarié', 'desc' => 'La vente est formalisée chez le notaire avec toutes les garanties juridiques.'],
                    ];
                @endphp
                @foreach($etapes as $etape)
                    <div class="flex gap-4">
                        <div class="w-8 h-8 bg-brand-blue text-white rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                            {{ $etape['num'] }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">{{ $etape['title'] }}</h4>
                            <p class="text-gray-500 text-xs sm:text-sm">{{ $etape['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- AVANTAGES --}}
    <div class="mb-12 sm:mb-16 md:mb-20">
        <div class="text-center mb-8 sm:mb-12">
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs sm:text-sm">Pourquoi le viager</span>
            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-gray-800 mt-2">Les avantages du viager</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @php
                $avantages = [
                    ['icon' => 'fa-tag', 'title' => 'Prix décoté', 'desc' => 'Acquérez un bien 30 à 50% en dessous de sa valeur marché selon l\'âge du vendeur.'],
                    ['icon' => 'fa-university', 'title' => 'Sans crédit bancaire', 'desc' => 'Pas besoin d\'emprunt : le bouquet + la rente remplacent le financement classique.'],
                    ['icon' => 'fa-chart-line', 'title' => 'Plus-value potentielle', 'desc' => 'La valeur du bien continue de progresser pendant toute la durée du viager.'],
                    ['icon' => 'fa-hand-holding-heart', 'title' => 'Dimension humaine', 'desc' => 'Vous permettez à un senior de vivre dignement grâce à un complément de revenu.'],
                    ['icon' => 'fa-file-invoice-dollar', 'title' => 'Fiscalité avantageuse', 'desc' => 'Pas d\'impôt sur la plus-value à la revente après 22 ans de détention.'],
                    ['icon' => 'fa-home', 'title' => 'Diversification', 'desc' => 'Un excellent moyen de diversifier votre patrimoine immobilier à moindre coût.'],
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
        <button onclick="openTarifsModal('Viager')"
            class="inline-flex items-center gap-2 bg-brand-accent text-brand-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-400 transition shadow-md transform hover:-translate-y-0.5 cursor-pointer text-sm sm:text-base">
            <i class="fas fa-tag"></i> Connaître nos tarifs
        </button>
    </div>

    {{-- FORMULAIRE --}}
    <div id="viager-form-section" class="max-w-2xl mx-auto bg-white p-5 sm:p-8 md:p-10 rounded-2xl shadow-xl border-t-4 border-brand-dark">
        <div class="text-center mb-6 sm:mb-8">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-800">Votre projet viager</h3>
            <p class="text-gray-500 text-sm sm:text-base">Que vous soyez acheteur ou vendeur, nous vous accompagnons.</p>
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
                    <h4 class="font-bold text-red-800">Veuillez corriger les erreurs :</h4>
                </div>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-3 sm:space-y-4" method="POST" action="{{ route('invest.viager.submit') }}" id="viager-form">
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

            {{-- Tranche d'âge --}}
            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg border">
                <label class="block font-bold text-gray-700 mb-2 sm:mb-3 text-xs sm:text-sm">Votre tranche d'âge :</label>
                <div class="flex flex-wrap gap-2 sm:gap-3">
                    @php
                        $ages = ['Moins de 40 ans', '40-50 ans', '50-60 ans', '60-70 ans', '70 ans et +'];
                    @endphp
                    @foreach($ages as $age)
                        <label class="cursor-pointer">
                            <input type="radio" name="tranche_age" value="{{ $age }}" class="peer sr-only" {{ old('tranche_age') == $age ? 'checked' : '' }}>
                            <div class="px-3 py-2 rounded-lg border-2 border-gray-200 text-xs sm:text-sm font-medium text-gray-600 transition peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue hover:border-gray-300">
                                {{ $age }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Type de bien --}}
            <select name="type_bien"
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer text-sm sm:text-base">
                <option value="">Type de bien recherché...</option>
                <option value="Appartement" {{ old('type_bien') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                <option value="Maison" {{ old('type_bien') == 'Maison' ? 'selected' : '' }}>Maison</option>
                <option value="Immeuble" {{ old('type_bien') == 'Immeuble' ? 'selected' : '' }}>Immeuble</option>
                <option value="Indifférent" {{ old('type_bien') == 'Indifférent' ? 'selected' : '' }}>Indifférent</option>
            </select>

            {{-- Objectif --}}
            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg border">
                <label class="block font-bold text-gray-700 mb-2 sm:mb-3 text-xs sm:text-sm">Votre objectif :</label>
                <div class="flex flex-wrap gap-2 sm:gap-3">
                    @php
                        $objectifs = [
                            'Investissement patrimonial' => 'fa-chart-pie',
                            'Complément de revenu' => 'fa-coins',
                            'Achat locatif' => 'fa-key',
                        ];
                    @endphp
                    @foreach($objectifs as $label => $icon)
                        <label class="cursor-pointer">
                            <input type="checkbox" name="objectifs[]" value="{{ $label }}" class="peer sr-only"
                                {{ in_array($label, old('objectifs', [])) ? 'checked' : '' }}>
                            <div class="flex items-center gap-2 px-3 py-2 rounded-lg border-2 border-gray-200 text-xs sm:text-sm font-medium text-gray-600 transition peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue hover:border-gray-300">
                                <i class="fas {{ $icon }}"></i> {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <textarea name="message" rows="3" placeholder="Précisions sur votre projet (optionnel)"
                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none">{{ old('message') }}</textarea>

            <p class="text-xs text-gray-400">
                <i class="fas fa-lock mr-1"></i>
                Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
            </p>

            <button type="submit" id="viager-submit-btn"
                class="w-full bg-brand-dark text-white font-bold py-4 rounded-lg hover:bg-gray-900 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                <span id="viager-btn-text">Envoyer ma demande</span>
                <span id="viager-btn-loading" class="hidden items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Envoi en cours...
                </span>
                <i class="fas fa-paper-plane" id="viager-btn-icon"></i>
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('viager-form')?.addEventListener('submit', function() {
        const btn = document.getElementById('viager-submit-btn');
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        document.getElementById('viager-btn-text').classList.add('hidden');
        document.getElementById('viager-btn-icon').classList.add('hidden');
        document.getElementById('viager-btn-loading').classList.remove('hidden');
        document.getElementById('viager-btn-loading').classList.add('inline-flex');
    });

    @if(session('success') || $errors->any())
        document.getElementById('viager-form-section')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    @endif
</script>
@endpush
