@extends('layouts.app')

@section('title', "Investir - GEST'IMMO")

@section('content')

    {{-- HERO --}}
    <div class="bg-brand-blue text-white py-20 text-center">
        <h1 class="font-heading font-bold text-4xl mb-4">Construisez votre patrimoine</h1>
        <p class="text-blue-100 text-lg max-w-2xl mx-auto">Un accompagnement de A à Z, quel que soit votre projet.</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        {{-- TYPES DE BIENS --}}
        <h2 class="text-center font-heading font-bold text-3xl text-gray-800 mb-12">Quel est votre projet ?</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-20">
            @php
                $types = [
                    ['name' => 'Appartement', 'icon' => 'fa-building'],
                    ['name' => 'Maison', 'icon' => 'fa-home'],
                    ['name' => 'Immeuble', 'icon' => 'fa-city'],
                    ['name' => 'Parking', 'icon' => 'fa-car'],
                    ['name' => 'Terrain', 'icon' => 'fa-tree'],
                ];
            @endphp

            @foreach ($types as $type)
                <button onclick="selectInvestType('{{ $type['name'] }}')"
                    class="bg-white p-6 rounded-xl shadow-card hover:shadow-hover border border-gray-100 text-center group transition transform hover:-translate-y-1">
                    <i class="fas {{ $type['icon'] }} text-3xl text-brand-blue mb-3 group-hover:scale-110 transition"></i>
                    <div class="font-bold text-gray-800">{{ $type['name'] }}</div>
                </button>
            @endforeach
        </div>

        {{-- ÉTUDE DE PROJET --}}
        <div class="bg-white py-10 mb-20">
            <div class="flex items-center gap-4 mb-12 border-b border-gray-100 pb-4">
                <div class="text-4xl text-brand-blue"><i class="fas fa-search-location"></i></div>
                <div>
                    <h2 class="font-heading font-bold text-2xl text-brand-blue uppercase">ÉTUDE DE PROJET</h2>
                    <p class="text-sm text-gray-500">Nous vous accompagnons lors de votre parcours de recherche de votre
                        investissement locatif</p>
                </div>
            </div>

            {{-- ÉTAPES 1-4 --}}
            <div class="relative grid md:grid-cols-4 gap-8 mb-24">
                <div
                    class="hidden md:block absolute top-10 left-0 w-full border-t-2 border-dashed border-brand-blue/30 -z-0">
                </div>

                @php
                    $etapes1 = [
                        [
                            'num' => 1,
                            'title' => 'RÉCEPTION DE VOTRE DEMANDE',
                            'desc' => 'Complétée via le formulaire de recherche',
                        ],
                        [
                            'num' => 2,
                            'title' => 'ENTRETIEN ADMINISTRATIF',
                            'desc' => 'Affectation à un conseiller disponible',
                        ],
                        [
                            'num' => 3,
                            'title' => 'MISE EN RELATION',
                            'desc' => 'Entretien avec le conseiller et signature du mandat',
                        ],
                        [
                            'num' => 4,
                            'title' => 'VISITE ET OFFRE',
                            'desc' => 'Visite des biens sélectionnés avec le conseiller : formulation de l\'offre',
                        ],
                    ];
                @endphp

                @foreach ($etapes1 as $etape)
                    <div class="text-center bg-white relative z-10 px-2">
                        <div
                            class="w-20 h-20 mx-auto bg-brand-blue text-white rounded-full flex items-center justify-center text-3xl font-bold mb-6 shadow-lg border-4 border-white">
                            {{ $etape['num'] }}
                        </div>
                        <h3 class="font-bold text-brand-blue uppercase mb-2 text-base">{{ $etape['title'] }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $etape['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- ACQUISITION --}}
            <div
                class="flex flex-col md:flex-row items-center justify-end gap-4 mb-12 text-right border-b border-gray-100 pb-4">
                <div class="md:order-1">
                    <h2 class="font-heading font-bold text-2xl text-brand-blue uppercase">ACQUISITION</h2>
                    <p class="text-sm text-gray-500">Nous sécurisons et planifions toutes les étapes de votre acquisition
                    </p>
                </div>
                <div class="text-4xl text-brand-blue md:order-2"><i class="fas fa-handshake"></i></div>
            </div>

            {{-- ÉTAPES 5-7 --}}
            <div class="relative grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div
                    class="hidden md:block absolute top-10 left-0 w-full border-t-2 border-dashed border-brand-blue/30 -z-0">
                </div>

                @php
                    $etapes2 = [
                        [
                            'num' => 5,
                            'title' => 'AVANT-CONTRAT',
                            'desc' => 'Signature de l\'avant-contrat chez le notaire ou auprès de l\'agence partenaire',
                        ],
                        [
                            'num' => 6,
                            'title' => 'RECHERCHE DU FINANCEMENT',
                            'desc' => 'Recherche de la meilleure stratégie pour financer votre projet',
                        ],
                        [
                            'num' => 7,
                            'title' => 'ACTE AUTHENTIQUE',
                            'desc' => 'Signature de l\'acte d\'achat chez le notaire',
                        ],
                    ];
                @endphp

                @foreach ($etapes2 as $etape)
                    <div class="text-center bg-white relative z-10 px-2">
                        <div
                            class="w-20 h-20 mx-auto bg-brand-blue text-white rounded-full flex items-center justify-center text-3xl font-bold mb-6 shadow-lg border-4 border-white">
                            {{ $etape['num'] }}
                        </div>
                        <h3 class="font-bold text-brand-blue uppercase mb-2 text-base">{{ $etape['title'] }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $etape['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- FORMULAIRE DE CONTACT --}}
        <div id="invest-contact" class="max-w-2xl mx-auto bg-white p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Démarrer mon projet</h3>
                <p class="text-gray-500">Remplissez ce formulaire pour être recontacté par un expert investissement.</p>
            </div>

            {{-- Message de succès --}}
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-fade-in-up">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-green-800">Demande envoyée avec succès !</h4>
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Message d'erreur global --}}
            @if (session('error'))
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

            {{-- Erreurs de validation --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-circle text-red-600"></i>
                        <h4 class="font-bold text-red-800">Veuillez corriger les erreurs suivantes :</h4>
                    </div>
                    <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-4" method="POST" action="{{ route('invest.submit') }}" id="invest-form">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom *"
                            class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('nom') border-red-500 bg-red-50 @enderror">
                        @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom *"
                            class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('prenom') border-red-500 bg-red-50 @enderror">
                        @error('prenom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *"
                        class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('email') border-red-500 bg-red-50 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone *"
                        class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('telephone') border-red-500 bg-red-50 @enderror">
                    @error('telephone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative">
                    <select id="invest-project-type" name="type_bien"
                        class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none text-gray-600 appearance-none cursor-pointer @error('type_bien') border-red-500 bg-red-50 @enderror">
                        <option value="">Type de bien recherché...</option>
                        <option value="Appartement" {{ old('type_bien') == 'Appartement' ? 'selected' : '' }}>Appartement
                        </option>
                        <option value="Maison" {{ old('type_bien') == 'Maison' ? 'selected' : '' }}>Maison</option>
                        <option value="Immeuble" {{ old('type_bien') == 'Immeuble' ? 'selected' : '' }}>Immeuble</option>
                        <option value="Parking" {{ old('type_bien') == 'Parking' ? 'selected' : '' }}>Parking</option>
                        <option value="Terrain" {{ old('type_bien') == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <div>
                    <textarea id="invest-message" name="message" rows="3" placeholder="Précisez votre projet (Ville, Budget...)"
                        class="w-full p-3 bg-gray-50 rounded-lg border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none resize-none @error('message') border-red-500 bg-red-50 @enderror">{{ old('message', $message ?? '') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <p class="text-xs text-gray-400">
                    <i class="fas fa-lock mr-1"></i>
                    Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}"
                        class="text-brand-blue hover:underline">politique de confidentialité</a>.
                </p>

                <button type="submit"
                    class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2 group"
                    id="submit-btn">
                    <span class="group-disabled:hidden">Envoyer ma demande</span>
                    <span class="hidden group-disabled:inline-flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                            </path>
                        </svg>
                        Envoi en cours...
                    </span>
                    <i class="fas fa-paper-plane group-disabled:hidden"></i>
                </button>
            </form>
        </div>

        {{-- LIENS RÉGIONS --}}
        <div class="mt-20 pt-10 border-t border-gray-200 text-center">
            <h3 class="font-heading font-bold text-xl text-gray-800 mb-6">Où investir avec GEST'IMMO ?</h3>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach ($regions as $region)
                    <a href="#" onclick="goToInvestForm('{{ $region }}')"
                        class="text-xs text-gray-500 hover:text-brand-blue hover:border-brand-blue transition bg-white px-4 py-2 rounded border border-gray-200">
                        Investir en {{ $region }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function selectInvestType(type) {
            const select = document.getElementById('invest-project-type');
            if (select) {
                select.value = type;
                const formElement = document.getElementById('invest-contact');
                if (formElement) formElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                select.classList.add('ring-2', 'ring-brand-accent', 'border-brand-accent');
                setTimeout(() => {
                    select.classList.remove('ring-2', 'ring-brand-accent', 'border-brand-accent');
                }, 1500);
            }
        }

        function goToInvestForm(region) {
            const form = document.getElementById('invest-contact');
            const messageBox = document.getElementById('invest-message');

            if (form) {
                form.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                form.classList.add('ring-4', 'ring-brand-accent');
                setTimeout(() => form.classList.remove('ring-4', 'ring-brand-accent'), 1500);

                if (messageBox) {
                    messageBox.value =
                        `Bonjour, je suis intéressé(e) par des opportunités d'investissement en région ${region}. Pouvez-vous me recontacter ?`;
                    messageBox.focus();
                }
            }
        }

        // Gestion du formulaire
        document.getElementById('invest-form')?.addEventListener('submit', function(e) {
            const btn = document.getElementById('submit-btn');
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
        });

        // Scroll vers le message de succès/erreur
        @if (session('success') || session('error') || $errors->any())
            document.getElementById('invest-contact')?.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        @endif

        @if (!empty($message))
            document.getElementById('invest-contact')?.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            const form = document.getElementById('invest-contact');
            if (form) {
                form.classList.add('ring-4', 'ring-brand-blue', 'ring-opacity-50');
                setTimeout(() => {
                    form.classList.remove('ring-4', 'ring-brand-blue', 'ring-opacity-50');
                }, 2000);
            }
        @endif
    </script>
@endpush
