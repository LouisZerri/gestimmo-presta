@extends('layouts.app')

@section('title', 'Centre d\'aide - FAQ | GEST\'IMMO')

@section('content')
<!-- Hero Recherche FAQ (Style Zendesk) -->
<div class="bg-brand-blue text-white py-12 sm:py-16 md:py-20 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl mb-4 sm:mb-6">Comment pouvons-nous vous aider ?</h1>
        <div class="relative max-w-2xl mx-auto">
            <i class="fas fa-search absolute left-4 sm:left-6 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg sm:text-xl z-10"></i>
            <input
                type="text"
                id="faq-search"
                placeholder="Recherchez une réponse..."
                class="w-full pl-12 sm:pl-16 pr-4 sm:pr-6 py-4 sm:py-5 rounded-full border-none outline-none text-gray-800 text-base sm:text-lg shadow-2xl transition focus:ring-4 focus:ring-blue-400/30 bg-white"
            >
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">
    <!-- Navigation par Catégories (Cartes) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 sm:gap-6 md:gap-8 mb-12 sm:mb-16 md:mb-20">
        <!-- Carte Vendeur -->
        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer text-center sm:text-left" onclick="switchFaqTab('seller')">
            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 rounded-xl sm:rounded-2xl flex items-center justify-center text-brand-blue text-2xl sm:text-3xl mb-4 sm:mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300 mx-auto sm:mx-0">
                <i class="fas fa-home"></i>
            </div>
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-900 mb-3 sm:mb-4">Je vends un bien</h3>
            <ul class="space-y-2 sm:space-y-3 text-xs sm:text-sm text-gray-600">
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
        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer text-center sm:text-left" onclick="switchFaqTab('buyer')">
            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 rounded-xl sm:rounded-2xl flex items-center justify-center text-brand-blue text-2xl sm:text-3xl mb-4 sm:mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300 mx-auto sm:mx-0">
                <i class="fas fa-key"></i>
            </div>
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-900 mb-3 sm:mb-4">J'achète ou je loue</h3>
            <ul class="space-y-2 sm:space-y-3 text-xs sm:text-sm text-gray-600">
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
        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-2xl shadow-card hover:shadow-hover border border-gray-100 transition group cursor-pointer sm:col-span-2 md:col-span-1 text-center sm:text-left" onclick="switchFaqTab('career')">
            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 rounded-xl sm:rounded-2xl flex items-center justify-center text-brand-blue text-2xl sm:text-3xl mb-4 sm:mb-6 group-hover:bg-brand-blue group-hover:text-white transition duration-300 mx-auto sm:mx-0">
                <i class="fas fa-users"></i>
            </div>
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-900 mb-3 sm:mb-4">Je rejoins le réseau</h3>
            <ul class="space-y-2 sm:space-y-3 text-xs sm:text-sm text-gray-600">
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
    <div class="grid md:grid-cols-3 gap-6 md:gap-12">
        <div class="md:col-span-2 order-2 md:order-1 min-w-0">
            <h2 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-4 sm:mb-6">Réponses à vos questions</h2>

            <!-- Onglets FAQ -->
            <div class="flex mb-4 sm:mb-6 overflow-x-auto pb-2 border-b border-gray-100 -mx-4 px-4 sm:mx-0 sm:px-0 gap-1 sm:gap-2">
                <button onclick="switchFaqTab('seller')" id="faq-tab-seller" class="faq-tab-btn active px-3 sm:px-4 py-2 text-brand-blue font-bold border-b-2 border-brand-blue transition whitespace-nowrap text-sm sm:text-base">
                    Je vends
                </button>
                <button onclick="switchFaqTab('buyer')" id="faq-tab-buyer" class="faq-tab-btn px-3 sm:px-4 py-2 text-gray-500 font-bold border-b-2 border-transparent hover:text-brand-blue transition whitespace-nowrap text-sm sm:text-base">
                    J'achète / Je loue
                </button>
                <button onclick="switchFaqTab('career')" id="faq-tab-career" class="faq-tab-btn px-3 sm:px-4 py-2 text-gray-500 font-bold border-b-2 border-transparent hover:text-brand-blue transition whitespace-nowrap text-sm sm:text-base">
                    Je rejoins le réseau
                </button>
            </div>

            <!-- CONTENU FAQ : VENDEUR -->
            <div id="faq-content-seller" class="space-y-3 sm:space-y-4 faq-content">
                @foreach($faqs['seller'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-4 sm:p-5 font-bold text-gray-700 group-hover:text-brand-blue text-sm sm:text-base gap-3">
                        <span class="text-left">{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180 flex-shrink-0">
                            <i class="fas fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <div class="px-4 sm:px-5 pb-4 sm:pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white break-words">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>

            <!-- CONTENU FAQ : ACHETEUR / LOCATAIRE -->
            <div id="faq-content-buyer" class="space-y-3 sm:space-y-4 faq-content hidden">
                @foreach($faqs['buyer'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-4 sm:p-5 font-bold text-gray-700 group-hover:text-brand-blue text-sm sm:text-base gap-3">
                        <span class="text-left">{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180 flex-shrink-0">
                            <i class="fas fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <div class="px-4 sm:px-5 pb-4 sm:pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white break-words">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>

            <!-- CONTENU FAQ : RECRUTEMENT -->
            <div id="faq-content-career" class="space-y-3 sm:space-y-4 faq-content hidden">
                @foreach($faqs['career'] as $faq)
                <details class="group bg-gray-50 rounded-xl border border-gray-200 overflow-hidden transition duration-300">
                    <summary class="flex justify-between items-center cursor-pointer p-4 sm:p-5 font-bold text-gray-700 group-hover:text-brand-blue text-sm sm:text-base gap-3">
                        <span class="text-left">{{ $faq['question'] }}</span>
                        <span class="transition group-open:rotate-180 flex-shrink-0">
                            <i class="fas fa-chevron-down text-sm"></i>
                        </span>
                    </summary>
                    <div class="px-4 sm:px-5 pb-4 sm:pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4 bg-white break-words">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>
        </div>

        <!-- Bloc Support (Reste à droite) -->
        <div class="md:col-span-1 order-1 md:order-2 min-w-0">
            <div class="bg-gray-900 rounded-2xl p-5 sm:p-6 md:p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="font-heading font-bold text-lg sm:text-xl md:text-2xl mb-3 sm:mb-4 text-center md:text-left">Besoin d'aide ?</h3>
                    <p class="text-gray-300 mb-5 sm:mb-6 text-xs sm:text-sm leading-relaxed text-center md:text-left">
                        Notre équipe support est disponible pour vous guider.
                    </p>

                    <div class="space-y-3">
                        <a href="tel:0613250596" class="flex items-center hover:opacity-80 transition">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-800 flex items-center justify-center mr-3 text-brand-cyan flex-shrink-0">
                                <i class="fas fa-phone-alt text-sm"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 uppercase">Téléphone</div>
                                <div class="font-bold text-sm">06 13 25 05 96</div>
                            </div>
                        </a>
                        <a href="mailto:contact@gestimmo-presta.fr" class="flex items-center hover:opacity-80 transition">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-800 flex items-center justify-center mr-3 text-brand-cyan flex-shrink-0">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 uppercase">Email</div>
                                <div class="font-bold text-xs sm:text-sm">contact@gestimmo-presta.fr</div>
                            </div>
                        </a>
                    </div>

                    <a href="{{ route('home') }}#contact" class="mt-5 sm:mt-6 bg-brand-blue text-white px-5 py-2.5 sm:py-3 rounded-lg font-bold hover:bg-blue-800 transition w-full shadow-lg border border-blue-700 block text-center text-sm">
                        Ouvrir un ticket
                    </a>
                </div>
                <!-- Deco -->
                <div class="absolute bottom-0 right-0 transform translate-x-1/3 translate-y-1/3 opacity-10 hidden md:block">
                    <i class="fas fa-question-circle text-8xl"></i>
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