@extends('layouts.app')

@section('title', "Nous Rejoindre - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="relative h-[550px] flex items-center justify-center text-center">
    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
         class="absolute inset-0 w-full h-full object-cover" 
         alt="Communauté GEST'IMMO">
    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue/80 to-brand-blue/90"></div>
    <div class="relative z-10 max-w-4xl px-4">
        <h1 class="font-heading font-bold text-5xl text-white mb-4">Rejoignez la plus grande communauté d'entrepreneurs.</h1>
        <p class="text-xl text-blue-100 mb-6">Je deviens entrepreneur GEST'IMMO</p>
    </div>
</div>

{{-- BANDEAU CTA --}}
<div class="bg-brand-blue py-16 mt-10">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-white font-heading font-bold text-2xl mb-8">
            Avec ou sans expérience dans l'immobilier, devenez indépendant avec GEST'IMMO
        </h2>
        <div class="flex flex-col md:flex-row justify-center gap-6">
            <button onclick="scrollToJoinForm('reconversion')" class="bg-white text-brand-blue font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition shadow-lg transform hover:-translate-y-1">
                Je veux changer de métier
            </button>
            <button onclick="scrollToJoinForm('agent_immobilier')" class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white/10 transition shadow-lg transform hover:-translate-y-1">
                Je travaille dans l'immobilier
            </button>
        </div>
    </div>
</div>

{{-- AVANTAGES --}}
<div class="max-w-7xl mx-auto px-4 py-20">
    <div class="mb-20">
        <h2 class="text-center font-heading font-bold text-3xl text-gray-800 mb-12">Être entrepreneur chez GEST'IMMO, c'est...</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $avantages = [
                    ['icon' => 'fa-chart-line', 'title' => '...avoir une rémunération exponentielle', 'desc' => "Jusqu'à 85% de commission sur vos ventes. Vous développez vos revenus grâce à votre performance."],
                    ['icon' => 'fa-hands-helping', 'title' => "...être accompagné à chaque étape", 'desc' => "Un parrain, un gestionnaire dédié et des équipes expertes pour vous guider du lancement à la réussite."],
                    ['icon' => 'fa-graduation-cap', 'title' => '...se former en continu', 'desc' => "Accès illimité à notre université en ligne et coaching terrain hebdomadaire. L'apprentissage ne s'arrête jamais."],
                    ['icon' => 'fa-laptop-code', 'title' => "...s'appuyer sur des outils faits pour vous", 'desc' => "Prospection, estimation, signature électronique... Tout est conçu pour vous simplifier la vie."],
                    ['icon' => 'fa-wallet', 'title' => '...entreprendre sans barrière financière', 'desc' => "Construisez votre activité sans mise de départ. Un modèle ouvert et accessible qui fait tomber les frontières."],
                    ['icon' => 'fa-users', 'title' => '...créer sa propre équipe', 'desc' => "Développez votre organisation, formez d'autres entrepreneurs et générez des revenus récurrents."],
                ];
            @endphp
            
            @foreach($avantages as $avantage)
                <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-brand-blue group hover:-translate-y-1 transition duration-300">
                    <div class="bg-brand-blue text-white w-12 h-12 rounded-lg flex items-center justify-center mb-6 text-xl font-bold">
                        <i class="fas {{ $avantage['icon'] }}"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-brand-blue mb-3">{{ $avantage['title'] }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ $avantage['desc'] }}</p>
                    <a href="#" class="text-brand-blue text-xs font-bold hover:underline">En savoir plus &rarr;</a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CTA WEBINAIRE --}}
    <div class="bg-gray-100 rounded-3xl p-12 text-center">
        <h2 class="text-3xl font-heading font-bold text-gray-800 mb-4">Prêt à changer de vie ?</h2>
        <p class="mb-8 text-gray-600">Assistez à notre prochaine présentation en ligne (Webinaire de 30 min) pour découvrir le modèle.</p>
        <button class="bg-brand-blue text-white font-bold px-8 py-4 rounded-full hover:bg-blue-800 transition shadow-xl">
            M'inscrire au webinaire
        </button>
    </div>
</div>

{{-- SECTION TÉMOIGNAGES --}}
<div class="bg-brand-light py-16 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-brand-blue font-bold uppercase tracking-wider text-xs">Témoignages</span>
            <h2 class="font-heading font-bold text-3xl text-gray-800 mt-2">Ils ont rejoint GEST'IMMO</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $temoignages = [
                    ['initials' => 'SL', 'color' => 'bg-brand-blue', 'name' => 'Sophie L.', 'role' => 'Ex-Comptable', 'since' => 'Conseillère depuis 2023', 'text' => "J'ai quitté mon CDI à 42 ans pour rejoindre GEST'IMMO. Meilleure décision de ma vie. En 18 mois, j'ai doublé mon ancien salaire en travaillant à mon rythme."],
                    ['initials' => 'MR', 'color' => 'bg-brand-accent', 'name' => 'Marc R.', 'role' => 'Ex-Commercial', 'since' => 'Conseiller depuis 2022', 'text' => "La formation initiale est top et le réseau d'entraide entre conseillers est incroyable. On n'est jamais seul, même quand on débute."],
                    ['initials' => 'JB', 'color' => 'bg-gray-800', 'name' => 'Julie B.', 'role' => 'Reconversion', 'since' => 'Manager depuis 2024', 'text' => "En 2 ans, j'ai constitué une équipe de 8 personnes. Les commissions de parrainage permettent de construire un vrai revenu passif sur le long terme."],
                ];
            @endphp
            
            @foreach($temoignages as $t)
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <i class="fas fa-quote-right absolute top-6 right-6 text-gray-100 text-4xl"></i>
                    <div class="flex items-center gap-1 text-yellow-400 mb-4">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6 leading-relaxed">"{{ $t['text'] }}"</p>
                    <div class="flex items-center gap-3 border-t border-gray-50 pt-4">
                        <div class="w-10 h-10 {{ $t['color'] }} text-white rounded-full flex items-center justify-center font-bold">{{ $t['initials'] }}</div>
                        <div>
                            <div class="font-bold text-gray-800 text-sm">{{ $t['name'] }}</div>
                            <div class="text-xs text-gray-400">{{ $t['role'] }} • {{ $t['since'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- FORMULAIRE CANDIDATURE --}}
<div class="bg-white py-20" id="join-form-section">
    <div class="max-w-2xl mx-auto px-4">
        <div id="join-contact" class="bg-white p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Déposer ma candidature</h3>
                <p class="text-gray-500">Recevez toutes les informations pour démarrer votre nouvelle carrière.</p>
            </div>

            {{-- Message de succès --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-fade-in-up">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-green-800">Candidature envoyée avec succès !</h4>
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Message d'erreur --}}
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

            {{-- Erreurs de validation --}}
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

            <form class="space-y-4" method="POST" action="{{ route('join.submit') }}" id="join-form">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom *" required
                               class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('nom') border-red-500 @enderror">
                        @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom *" required
                               class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('prenom') border-red-500 @enderror">
                        @error('prenom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required
                           class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone *" required
                           class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('telephone') border-red-500 @enderror">
                    @error('telephone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="ville" value="{{ old('ville') }}" placeholder="Ville de résidence *" required
                           class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('ville') border-red-500 @enderror">
                    @error('ville')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="relative">
                    <select name="situation" id="situation-select" required
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-gray-600 appearance-none cursor-pointer transition @error('situation') border-red-500 @enderror">
                        <option value="">Votre situation actuelle... *</option>
                        <option value="agent_immobilier" {{ old('situation') == 'agent_immobilier' ? 'selected' : '' }}>Agent immobilier expérimenté</option>
                        <option value="mandataire" {{ old('situation') == 'mandataire' ? 'selected' : '' }}>Mandataire en activité</option>
                        <option value="reconversion" {{ old('situation') == 'reconversion' ? 'selected' : '' }}>En reconversion professionnelle</option>
                        <option value="debutant" {{ old('situation') == 'debutant' ? 'selected' : '' }}>Débutant motivé</option>
                        <option value="autre" {{ old('situation') == 'autre' ? 'selected' : '' }}>Autre profil</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    @error('situation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <textarea name="message" id="join-message" rows="3" 
                              placeholder="Parlez-nous de votre motivation..."
                              class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none @error('message') border-red-500 @enderror">{{ old('message', $message ?? '') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <p class="text-xs text-gray-400">
                    <i class="fas fa-lock mr-1"></i> 
                    Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
                </p>
                
                <button type="submit" id="submit-btn"
                        class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <span id="btn-text">Envoyer ma candidature</span>
                    <span id="btn-loading" class="hidden items-center gap-2">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        Envoi en cours...
                    </span>
                    <i class="fas fa-paper-plane" id="btn-icon"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function scrollToJoinForm(situation) {
        const form = document.getElementById('join-contact');
        const situationSelect = document.getElementById('situation-select');
        const messageBox = document.getElementById('join-message');
        
        if (form) {
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
            form.classList.add('ring-4', 'ring-brand-blue');
            setTimeout(() => form.classList.remove('ring-4', 'ring-brand-blue'), 1500);
            
            // Pré-sélectionner la situation
            if (situationSelect && situation) {
                situationSelect.value = situation;
            }
            
            // Pré-remplir le message selon la situation
            if (messageBox && !messageBox.value) {
                const messages = {
                    'reconversion': "Bonjour, je souhaite me reconvertir dans l'immobilier et rejoindre GEST'IMMO. Je suis motivé(e) et prêt(e) à m'investir dans cette nouvelle aventure.",
                    'agent_immobilier': "Bonjour, je suis actuellement agent immobilier et je souhaite rejoindre le réseau GEST'IMMO pour bénéficier de meilleures conditions et d'un accompagnement de qualité.",
                    'mandataire': "Bonjour, je suis mandataire immobilier et je souhaite changer de réseau pour rejoindre GEST'IMMO.",
                    'debutant': "Bonjour, je souhaite débuter dans l'immobilier avec GEST'IMMO. Je suis motivé(e) et prêt(e) à apprendre.",
                };
                messageBox.value = messages[situation] || '';
                messageBox.focus();
            }
        }
    }

    // Gestion du formulaire - loading state
    document.getElementById('join-form')?.addEventListener('submit', function(e) {
        const btn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnLoading = document.getElementById('btn-loading');
        const btnIcon = document.getElementById('btn-icon');
        
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('inline-flex');
    });

    // Scroll vers le formulaire si erreurs, succès ou message pré-rempli
    @if(session('success') || session('error') || $errors->any() || !empty($message))
        document.getElementById('join-form-section')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        @if(!empty($message))
            const form = document.getElementById('join-contact');
            if (form) {
                form.classList.add('ring-4', 'ring-brand-blue', 'ring-opacity-50');
                setTimeout(() => {
                    form.classList.remove('ring-4', 'ring-brand-blue', 'ring-opacity-50');
                }, 2000);
            }
        @endif
    @endif
</script>
@endpush