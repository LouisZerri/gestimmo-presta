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
            <button class="bg-white text-brand-blue font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition shadow-lg transform hover:-translate-y-1">
                Je veux changer de métier
            </button>
            <button class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white/10 transition shadow-lg transform hover:-translate-y-1">
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
<div class="bg-white py-20">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Déposer ma candidature</h3>
                <p class="text-gray-500">Recevez toutes les informations pour démarrer votre nouvelle carrière.</p>
            </div>
            <form class="space-y-4" method="POST" action="#">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="nom" placeholder="Nom" class="p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                    <input type="text" name="prenom" placeholder="Prénom" class="p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                </div>
                <input type="email" name="email" placeholder="Email" class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                <input type="tel" name="telephone" placeholder="Téléphone" class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                <input type="text" name="ville" placeholder="Ville de résidence" class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                
                <div class="relative">
                    <select name="situation" class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-gray-600 appearance-none cursor-pointer">
                        <option value="">Votre situation actuelle...</option>
                        <option value="salarie">Salarié(e) en poste</option>
                        <option value="recherche">En recherche d'emploi</option>
                        <option value="independant">Indépendant / Freelance</option>
                        <option value="immobilier">Déjà dans l'immobilier</option>
                        <option value="autre">Autre</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
                
                <textarea name="motivation" rows="3" placeholder="Parlez-nous de votre motivation..." class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none"></textarea>
                
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="rgpd" id="rgpd" class="mt-1 h-4 w-4 text-brand-blue rounded border-gray-300 focus:ring-brand-blue">
                    <label for="rgpd" class="text-xs text-gray-500">
                        J'accepte de recevoir des informations de la part de GEST'IMMO et reconnais avoir pris connaissance de la 
                        <a href="#" class="text-brand-blue hover:underline">politique de confidentialité</a>.
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5">
                    Envoyer ma candidature
                </button>
            </form>
        </div>
    </div>
</div>

@endsection