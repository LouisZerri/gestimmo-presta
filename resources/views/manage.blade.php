@extends('layouts.app')

@section('title', "Gérer - GEST'IMMO")

@section('content')

    {{-- EN-TÊTE --}}
    <div class="bg-brand-light py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-brand-blue font-bold uppercase tracking-wider text-sm">Sérénité</span>
                <h1 class="font-heading font-bold text-4xl mt-2 mb-4">Gestion Immobilière & Syndic</h1>
                <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                    Que vous soyez bailleur ou copropriétaire, nous avons la solution pour valoriser et protéger votre
                    patrimoine.
                </p>
            </div>

            {{-- BLOC GESTION LOCATIVE --}}
            <div
                class="bg-white rounded-3xl shadow-xl overflow-hidden mb-16 border border-gray-100 flex flex-col md:flex-row">
                <div class="md:w-1/3 bg-brand-blue p-10 text-white flex flex-col justify-center relative overflow-hidden">
                    <div class="relative z-10">
                        <i class="fas fa-key text-5xl mb-6 text-brand-accent"></i>
                        <h2 class="font-heading font-bold text-3xl mb-2">Gestion Locative</h2>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Libérez-vous des contraintes. Nous gérons tout, de la recherche du locataire à l'encaissement
                            des loyers.
                        </p>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                </div>
                <div class="md:w-2/3 p-10 grid md:grid-cols-2 gap-8">
                    {{-- Missions à la Carte --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="w-2 h-8 bg-gray-400 rounded-full"></span>Missions à la Carte
                        </h3>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-center"><i class="fas fa-check text-gray-400 mr-3"></i> Recherche
                                Locataire & Solvabilité</li>
                            <li class="flex items-center"><i class="fas fa-check text-gray-400 mr-3"></i> Rédaction Bail &
                                Annexes</li>
                            <li class="flex items-center"><i class="fas fa-check text-gray-400 mr-3"></i> État des lieux
                                (Entrée/Sortie)</li>
                            <li class="flex items-center"><i class="fas fa-check text-gray-400 mr-3"></i> Aide déclaration
                                fiscale</li>
                        </ul>
                        <button onclick="openManageModal('tarifs_unitaires')"
                            class="w-full border border-gray-300 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-100 transition text-sm">
                            Voir les tarifs unitaires
                        </button>
                    </div>

                    {{-- Gestion Complète --}}
                    <div
                        class="bg-white p-6 rounded-xl border-2 border-brand-blue shadow-lg relative transform md:-translate-y-4">
                        <div
                            class="absolute top-0 right-0 bg-brand-accent text-white text-xs font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wider">
                            Recommandé</div>
                        <h3 class="font-bold text-gray-800 mb-2 flex items-center gap-2">
                            <span class="w-2 h-8 bg-brand-blue rounded-full"></span>Gestion Complète
                        </h3>
                        <div class="text-3xl font-bold text-brand-blue mb-4">5% <span
                                class="text-sm text-gray-400 font-normal">/ mois</span></div>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-center"><i class="fas fa-check-circle text-brand-blue mr-3"></i>
                                <strong>Tout inclus</strong> (Bail, EDL, Quittances...)
                            </li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-brand-blue mr-3"></i> Gestion
                                technique & travaux</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-brand-blue mr-3"></i> Révision
                                loyers & Régularisation</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-brand-blue mr-3"></i> Espace
                                client 24/7</li>
                        </ul>
                        <button onclick="openManageModal('gestion_complete')"
                            class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg hover:bg-blue-800 transition shadow-md text-sm">
                            Démarrer la gestion
                        </button>
                    </div>
                </div>
            </div>

            {{-- BLOC SYNDIC --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                <div class="md:w-1/3 bg-brand-dark p-10 text-white flex flex-col justify-center relative overflow-hidden">
                    <div class="relative z-10">
                        <i class="fas fa-building text-5xl mb-6 text-gray-400"></i>
                        <h2 class="font-heading font-bold text-3xl mb-2">Syndic</h2>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Pour les petites et moyennes copropriétés. Une gestion transparente et réactive, enfin.
                        </p>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white opacity-5 rounded-full"></div>
                </div>

                <div class="md:w-2/3 p-10 flex flex-col justify-center relative">
                    <span
                        class="absolute top-6 right-6 bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full">Flexible</span>
                    <div class="mb-8">
                        <h3 class="font-bold text-gray-800 text-xl mb-1">Le Syndic à la Carte</h3>
                        <p class="text-gray-500 text-sm">Idéal pour les syndics bénévoles qui veulent se décharger de
                            l'administratif et du juridique.</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-y-8 gap-x-6 mb-8">
                        @php
                            $services = [
                                [
                                    'icon' => 'fa-file-contract',
                                    'title' => 'Pré-État Daté',
                                    'desc' => 'Obligatoire pour la vente d\'un lot. Délivré sous 48h.',
                                ],
                                [
                                    'icon' => 'fa-calculator',
                                    'title' => 'Comptabilité',
                                    'desc' => 'Appels de fonds, tenue des comptes et bilan annuel.',
                                ],
                                [
                                    'icon' => 'fa-gavel',
                                    'title' => 'Juridique',
                                    'desc' => 'Veille légale, mise à jour règlement de copro, assistance AG.',
                                ],
                                [
                                    'icon' => 'fa-laptop-house',
                                    'title' => 'Extranet',
                                    'desc' => 'Accès documents 24/7 pour tous les copropriétaires.',
                                ],
                            ];
                        @endphp

                        @foreach ($services as $service)
                            <div class="flex gap-4">
                                <div
                                    class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0">
                                    <i class="fas {{ $service['icon'] }}"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">{{ $service['title'] }}</h4>
                                    <p class="text-xs text-gray-500 leading-tight mt-1">{{ $service['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-right">
                        <button onclick="openManageModal('devis_syndic')"
                            class="bg-brand-dark text-white font-bold px-6 py-3 rounded-lg hover:bg-gray-900 transition shadow-md text-sm">
                            Demander un devis personnalisé
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AVIS CLIENTS GESTION --}}
    <div class="bg-white py-16 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="font-heading font-bold text-3xl text-gray-800">Propriétaires heureux, patrimoine sécurisé</h2>
                <div class="flex items-center justify-center gap-2 mt-2">
                    <span class="text-yellow-400 text-lg">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </span>
                    <span class="text-gray-600 font-bold">4.9/5</span>
                    <span class="text-gray-400 text-sm">(Avis certifiés bailleurs)</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $avisGestion = [
                        [
                            'name' => 'Aurélie D.',
                            'location' => 'Expatriée à Londres',
                            'text' =>
                                'Je vis à l\'étranger et GEST\'IMMO gère mes 3 appartements à Paris. Zéro vacance locative en 2 ans et une communication parfaite.',
                        ],
                        [
                            'name' => 'Marc P.',
                            'location' => 'Président Conseil Syndical',
                            'text' =>
                                'L\'offre syndic à la carte nous a sauvé la vie ! Notre petite copro était mal gérée, maintenant tout est clair et carré pour pas cher.',
                        ],
                        [
                            'name' => 'Jean-François',
                            'location' => 'Investisseur Multi-propriétaire',
                            'text' =>
                                'Leur assurance loyers impayés (GLI) est vraiment compétitive. J\'ai eu un souci une fois, pris en charge immédiatement sans frais.',
                        ],
                    ];
                @endphp

                @foreach ($avisGestion as $avis)
                    <div class="bg-gray-50 p-8 rounded-xl border border-gray-100">
                        <div class="flex text-yellow-400 text-xs mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 text-sm italic mb-4">"{{ $avis['text'] }}"</p>
                        <div class="font-bold text-gray-800 text-sm">{{ $avis['name'] }}</div>
                        <div class="text-xs text-gray-400">{{ $avis['location'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- SECTION ACTUALITÉS GÉRER --}}
    @if ($articles->count() > 0)
        <div class="bg-white py-20 border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="text-brand-blue font-bold uppercase tracking-wider text-xs">Veille Juridique &
                        Conseils</span>
                    <h2 class="font-heading font-bold text-3xl text-gray-800 mt-2">Les dernières infos pour les
                        propriétaires</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <article
                            class="bg-white rounded-xl shadow-card hover:shadow-hover transition overflow-hidden border border-gray-100 group h-full flex flex-col">
                            <a href="{{ route('articles.show', $article) }}" class="block">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                                    <span
                                        class="absolute top-4 left-4 {{ $article->category_color }} text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                        {{ $article->category }}
                                    </span>
                                </div>
                            </a>
                            <div class="p-6 flex-grow flex flex-col">
                                <div class="text-xs text-gray-400 mb-2 flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i> {{ $article->formatted_date }}
                                </div>
                                <a href="{{ route('articles.show', $article) }}" class="block">
                                    <h3
                                        class="font-bold text-lg text-gray-800 mb-3 group-hover:text-brand-blue transition line-clamp-2">
                                        {{ $article->title }}
                                    </h3>
                                </a>
                                <p class="text-gray-500 text-sm line-clamp-3 mb-4">{{ $article->excerpt }}</p>
                                <div class="mt-auto pt-4 border-t border-gray-50">
                                    <a href="{{ route('articles.show', $article) }}"
                                        class="text-brand-blue text-xs font-bold hover:underline">
                                        Lire l'article <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('articles.index') }}"
                        class="inline-flex items-center gap-2 text-brand-blue font-bold hover:underline">
                        Voir tous les articles <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif

    {{-- MODALE GESTION --}}
    <div id="manage-modal"
        class="fixed inset-0 z-[70] hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative overflow-hidden max-h-[90vh] overflow-y-auto">
            <button onclick="closeManageModal()"
                class="absolute top-4 right-4 bg-gray-100 hover:bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center z-50 transition">
                <i class="fas fa-times"></i>
            </button>

            {{-- Header dynamique --}}
            <div id="modal-header" class="p-6 text-center">
                <div id="modal-icon"
                    class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl"></div>
                <h3 id="modal-title" class="font-heading font-bold text-2xl text-white"></h3>
                <p id="modal-subtitle" class="text-sm opacity-80"></p>
            </div>

            <div class="p-8">
                {{-- Message succès --}}
                <div id="modal-success" class="hidden text-center py-8">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-green-500 text-4xl"></i>
                    </div>
                    <h4 class="font-heading font-bold text-xl text-gray-800 mb-2">Demande envoyée !</h4>
                    <p class="text-gray-600 mb-6">Notre équipe vous recontactera dans les plus brefs délais.</p>
                    <button onclick="closeManageModal()"
                        class="bg-brand-blue text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                        Fermer
                    </button>
                </div>

                {{-- Formulaire --}}
                <form id="manage-form" class="space-y-4">
                    @csrf
                    <input type="hidden" name="type_demande" id="type_demande">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="nom" placeholder="Nom *" required
                                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">
                        </div>
                        <div>
                            <input type="text" name="prenom" placeholder="Prénom *" required
                                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">
                        </div>
                    </div>

                    <input type="email" name="email" placeholder="Email *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                    <input type="tel" name="telephone" placeholder="Téléphone *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                    {{-- Champs spécifiques gestion locative --}}
                    <div id="fields-gestion" class="space-y-4 hidden">
                        <input type="text" name="adresse_bien" placeholder="Adresse du bien"
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                        <div class="grid grid-cols-2 gap-4">
                            <select name="type_bien"
                                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer">
                                <option value="">Type de bien...</option>
                                <option value="Appartement">Appartement</option>
                                <option value="Maison">Maison</option>
                                <option value="Studio">Studio</option>
                                <option value="Immeuble">Immeuble</option>
                                <option value="Local commercial">Local commercial</option>
                            </select>
                            <input type="number" name="surface" placeholder="Surface (m²)"
                                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">
                        </div>

                        <div class="relative">
                            <input type="number" name="loyer_mensuel" placeholder="Loyer mensuel (€)"
                                class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition pr-12">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">€/mois</span>
                        </div>
                    </div>

                    {{-- Champs spécifiques syndic --}}
                    <div id="fields-syndic" class="space-y-4 hidden">
                        <input type="text" name="adresse_bien" placeholder="Adresse de la copropriété"
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                        <input type="number" name="nb_lots" placeholder="Nombre de lots"
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">
                    </div>

                    <textarea name="message" rows="3" placeholder="Précisez votre demande..."
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none"></textarea>

                    <p class="text-xs text-gray-400">
                        <i class="fas fa-lock mr-1"></i>
                        Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}"
                            class="text-brand-blue hover:underline">politique de confidentialité</a>.
                    </p>

                    <button type="submit" id="modal-submit-btn"
                        class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md flex items-center justify-center gap-2">
                        <span id="btn-text">Envoyer ma demande</span>
                        <span id="btn-loading" class="hidden items-center gap-2">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            Envoi en cours...
                        </span>
                        <i class="fas fa-paper-plane" id="btn-icon"></i>
                    </button>

                    {{-- Message d'erreur --}}
                    <div id="modal-error"
                        class="hidden p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span id="error-message"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const modalConfig = {
            tarifs_unitaires: {
                headerBg: 'bg-gray-500',
                iconBg: 'bg-white/20',
                icon: 'fa-list-ul',
                title: 'Tarifs Gestion à la Carte',
                subtitle: 'Recevez notre grille tarifaire détaillée',
                fields: 'gestion'
            },
            gestion_complete: {
                headerBg: 'bg-brand-blue',
                iconBg: 'bg-white/20',
                icon: 'fa-key',
                title: 'Gestion Locative Complète',
                subtitle: 'Démarrez la gestion de votre bien',
                fields: 'gestion'
            },
            devis_syndic: {
                headerBg: 'bg-brand-dark',
                iconBg: 'bg-white/10',
                icon: 'fa-building',
                title: 'Devis Syndic Personnalisé',
                subtitle: 'Une offre adaptée à votre copropriété',
                fields: 'syndic'
            }
        };

        function openManageModal(type) {
            const modal = document.getElementById('manage-modal');
            const config = modalConfig[type];

            if (!config) return;

            // Reset du formulaire
            document.getElementById('manage-form').reset();
            document.getElementById('manage-form').classList.remove('hidden');
            document.getElementById('modal-success').classList.add('hidden');
            document.getElementById('modal-error').classList.add('hidden');

            // Configuration du header
            const header = document.getElementById('modal-header');
            header.className = `${config.headerBg} p-6 text-center text-white`;

            document.getElementById('modal-icon').className =
                `w-16 h-16 ${config.iconBg} rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl`;
            document.getElementById('modal-icon').innerHTML = `<i class="fas ${config.icon}"></i>`;
            document.getElementById('modal-title').textContent = config.title;
            document.getElementById('modal-subtitle').textContent = config.subtitle;

            // Type de demande
            document.getElementById('type_demande').value = type;

            // Affichage des champs spécifiques
            document.getElementById('fields-gestion').classList.add('hidden');
            document.getElementById('fields-syndic').classList.add('hidden');

            if (config.fields === 'gestion') {
                document.getElementById('fields-gestion').classList.remove('hidden');
            } else if (config.fields === 'syndic') {
                document.getElementById('fields-syndic').classList.remove('hidden');
            }

            // Afficher la modale
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeManageModal() {
            const modal = document.getElementById('manage-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Fermeture au clic extérieur
        document.getElementById('manage-modal')?.addEventListener('click', function(e) {
            if (e.target === this) closeManageModal();
        });

        // Soumission du formulaire
        document.getElementById('manage-form')?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const btn = document.getElementById('modal-submit-btn');
            const btnText = document.getElementById('btn-text');
            const btnLoading = document.getElementById('btn-loading');
            const btnIcon = document.getElementById('btn-icon');
            const errorDiv = document.getElementById('modal-error');

            // Loading state
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnIcon.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            btnLoading.classList.add('inline-flex');
            errorDiv.classList.add('hidden');

            try {
                const formData = new FormData(this);

                const response = await fetch('{{ route('manage.submit') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Succès
                    document.getElementById('manage-form').classList.add('hidden');
                    document.getElementById('modal-success').classList.remove('hidden');
                } else {
                    // Erreur
                    document.getElementById('error-message').textContent = data.message ||
                        'Une erreur est survenue.';
                    errorDiv.classList.remove('hidden');
                }
            } catch (error) {
                document.getElementById('error-message').textContent =
                    'Une erreur est survenue. Veuillez réessayer.';
                errorDiv.classList.remove('hidden');
            } finally {
                // Reset button
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnIcon.classList.remove('hidden');
                btnLoading.classList.add('hidden');
                btnLoading.classList.remove('inline-flex');
            }
        });
    </script>
@endpush
