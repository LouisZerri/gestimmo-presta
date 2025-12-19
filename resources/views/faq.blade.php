@extends('layouts.app')

@section('title', 'Centre d\'aide - FAQ | GEST\'IMMO')

@section('content')
<!-- Hero Recherche FAQ (Style Zendesk) -->
<div class="bg-brand-blue text-white py-20 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <h1 class="font-heading font-bold text-3xl md:text-5xl mb-6">Comment pouvons-nous vous aider ?</h1>
        <div class="relative max-w-2xl mx-auto">
            <i class="fas fa-search absolute left-6 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
            <input 
                type="text" 
                id="faq-search"
                placeholder="Recherchez une réponse (ex: mandat, honoraires, formation...)" 
                class="w-full pl-16 pr-6 py-5 rounded-full border-none outline-none text-gray-800 text-lg shadow-2xl transition focus:ring-4 focus:ring-blue-400/30"
            >
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <!-- Navigation par Catégories (Cartes) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        <!-- Carte Vendeur -->
        <div class="bg-white p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer" onclick="switchFaqTab('seller')">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue text-3xl mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300">
                <i class="fas fa-home"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-900 mb-4">Je vends un bien</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Comment estimer mon bien ?
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Différence mandat simple vs exclusif
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Les diagnostics obligatoires (DPE...)
                </li>
            </ul>
        </div>

        <!-- Carte Acheteur / Locataire -->
        <div class="bg-white p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer" onclick="switchFaqTab('buyer')">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue text-3xl mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300">
                <i class="fas fa-key"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-900 mb-4">J'achète ou je loue</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Faire une offre d'achat
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Frais de notaire et annexes
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Documents pour un dossier location
                </li>
            </ul>
        </div>

        <!-- Carte Réseau / Recrutement -->
        <div class="bg-white p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer" onclick="switchFaqTab('career')">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue text-3xl mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300">
                <i class="fas fa-users"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-900 mb-4">Je rejoins le réseau</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Quel statut juridique choisir ?
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Système de rémunération & MLM
                </li>
                <li class="hover:text-brand-blue flex items-center">
                    <i class="fas fa-chevron-right text-xs mr-2 text-gray-300"></i> Le parcours de formation GEST'IMMO
                </li>
            </ul>
        </div>
    </div>

    <!-- Articles en vedette & Support -->
    <div class="grid md:grid-cols-3 gap-12">
        <div class="md:col-span-2">
            <h2 class="font-heading font-bold text-2xl text-gray-800 mb-6">Réponses à vos questions</h2>
            
            <!-- Onglets FAQ -->
            <div class="flex space-x-4 mb-6 overflow-x-auto pb-2 border-b border-gray-100">
                <button onclick="switchFaqTab('seller')" id="faq-tab-seller" class="faq-tab-btn active px-4 py-2 text-brand-blue font-bold border-b-2 border-brand-blue transition whitespace-nowrap">
                    Je vends
                </button>
                <button onclick="switchFaqTab('buyer')" id="faq-tab-buyer" class="faq-tab-btn px-4 py-2 text-gray-500 font-bold border-b-2 border-transparent hover:text-brand-blue transition whitespace-nowrap">
                    J'achète / Je loue
                </button>
                <button onclick="switchFaqTab('career')" id="faq-tab-career" class="faq-tab-btn px-4 py-2 text-gray-500 font-bold border-b-2 border-transparent hover:text-brand-blue transition whitespace-nowrap">
                    Je rejoins le réseau
                </button>
            </div>

            <!-- CONTENU FAQ : VENDEUR -->
            <div id="faq-content-seller" class="space-y-4 faq-content">
                @foreach($faqs['seller'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-5 font-bold text-gray-700 group-hover:text-brand-blue">
                        <span>{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>

            <!-- CONTENU FAQ : ACHETEUR / LOCATAIRE -->
            <div id="faq-content-buyer" class="space-y-4 faq-content hidden">
                @foreach($faqs['buyer'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-5 font-bold text-gray-700 group-hover:text-brand-blue">
                        <span>{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>

            <!-- CONTENU FAQ : RECRUTEMENT -->
            <div id="faq-content-career" class="space-y-4 faq-content hidden">
                @foreach($faqs['career'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-5 font-bold text-gray-700 group-hover:text-brand-blue">
                        <span>{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>
        </div>

        <!-- Bloc Support (Reste à droite) -->
        <div class="md:col-span-1">
            <div class="bg-gray-900 rounded-2xl p-8 text-white h-full relative overflow-hidden flex flex-col justify-center">
                <div class="relative z-10">
                    <h3 class="font-heading font-bold text-2xl mb-4">Besoin d'aide supplémentaire ?</h3>
                    <p class="text-gray-300 mb-8 text-sm leading-relaxed">
                        Si vous ne trouvez pas la réponse à votre question, notre équipe support est disponible pour vous guider.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center mr-4 text-brand-cyan">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 uppercase">Par téléphone</div>
                                <div class="font-bold">06 13 25 05 96</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center mr-4 text-brand-cyan">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 uppercase">Par email</div>
                                <div class="font-bold">contact@gestimmo-presta.fr</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#contact" class="mt-8 bg-brand-blue text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-800 transition w-full shadow-lg border border-blue-700 block text-center">
                        Ouvrir un ticket
                    </a>
                </div>
                <!-- Deco -->
                <div class="absolute bottom-0 right-0 transform translate-x-1/3 translate-y-1/3 opacity-20">
                    <i class="fas fa-question-circle text-9xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Fonction pour changer d'onglet FAQ
    function switchFaqTab(tab) {
        // Masquer tous les contenus
        document.querySelectorAll('.faq-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Désactiver tous les boutons
        document.querySelectorAll('.faq-tab-btn').forEach(btn => {
            btn.classList.remove('active', 'text-brand-blue', 'border-brand-blue');
            btn.classList.add('text-gray-500', 'border-transparent');
        });
        
        // Afficher le contenu sélectionné
        document.getElementById('faq-content-' + tab).classList.remove('hidden');
        
        // Activer le bouton sélectionné
        const activeBtn = document.getElementById('faq-tab-' + tab);
        activeBtn.classList.add('active', 'text-brand-blue', 'border-brand-blue');
        activeBtn.classList.remove('text-gray-500', 'border-transparent');
    }

    // Fonction de recherche dans la FAQ
    document.getElementById('faq-search')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        
        document.querySelectorAll('.faq-content details').forEach(detail => {
            const question = detail.querySelector('summary span').textContent.toLowerCase();
            const answer = detail.querySelector('div').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                detail.style.display = '';
            } else {
                detail.style.display = 'none';
            }
        });
    });
</script>
@endpush
@endsection