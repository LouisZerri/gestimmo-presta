@extends('layouts.app')

@section('title', "GEST'IMMO | Accueil - Le Réseau Immobilier Global")

@section('content')

    {{-- HERO --}}
    <div class="relative h-[650px] flex items-center">
        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80"
            class="absolute inset-0 w-full h-full object-cover object-center" alt="Heureux propriétaires">
        <div class="absolute inset-0 hero-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10 w-full">
            <div class="max-w-3xl text-white">
                <h1 class="font-heading font-extrabold text-5xl md:text-6xl mb-6 leading-tight shadow-sm">
                    Réalisez votre projet immobilier<br>
                    <span class="text-brand-accent">en toute confiance.</span>
                </h1>
                <p class="text-xl mb-10 text-white font-medium max-w-xl drop-shadow-md">
                    Plus de 50 000 conseillers de proximité pour Vendre, Acheter, Louer et Gérer votre patrimoine.
                </p>
                <div
                    class="bg-white p-4 rounded-xl shadow-floating flex flex-col md:flex-row gap-3 max-w-2xl transform hover:scale-[1.01] transition duration-300">
                    <div class="flex-grow relative">
                        <i
                            class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-brand-blue text-lg"></i>
                        <input type="text" placeholder="Ville, Code postal ou Référence..."
                            class="w-full pl-12 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-brand-blue focus:outline-none text-gray-800 font-medium">
                    </div>
                    <div class="md:w-1/3">
                        <select
                            class="w-full h-full px-4 bg-gray-50 border border-gray-200 rounded-lg focus:border-brand-blue focus:outline-none text-gray-700 font-bold cursor-pointer">
                            <option>Acheter</option>
                            <option>Louer</option>
                            <option>Vendre</option>
                            <option>Investir</option>
                        </select>
                    </div>
                    <a href="{{ route('advisors') }}">
                        <button
                            class="bg-brand-blue hover:bg-blue-800 text-white font-bold px-8 py-3 rounded-lg transition shadow-lg uppercase tracking-wide text-sm">
                            Rechercher
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- LES 3 PILIERS --}}
    <div class="bg-gray-50 py-12 relative z-20">
        <div class="max-w-7xl mx-auto px-4 -mt-24">
            <div class="grid md:grid-cols-3 gap-6">
                {{-- Investissement --}}
                <a href="{{ route('invest') }}"
                    class="bg-white rounded-xl p-8 shadow-floating hover:-translate-y-2 transition cursor-pointer group border-t-4 border-brand-blue">
                    <div
                        class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-2xl mb-6 group-hover:bg-brand-blue group-hover:text-white transition">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-gray-800 mb-2">Investissement Locatif</h3>
                    <p class="text-gray-500 text-sm mb-4">Un parcours clé en main pour bâtir votre patrimoine.</p>
                    <span class="text-brand-blue font-bold text-sm group-hover:underline">Découvrir l'offre &rarr;</span>
                </a>

                {{-- Vendre --}}
                <a href="{{ route('sell') }}"
                    class="bg-white rounded-xl p-8 shadow-floating hover:-translate-y-2 transition cursor-pointer group border-t-4 border-brand-accent">
                    <div
                        class="w-14 h-14 bg-yellow-50 rounded-full flex items-center justify-center text-brand-accent text-2xl mb-6 group-hover:bg-brand-accent group-hover:text-white transition">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-gray-800 mb-2">Vendre mon bien</h3>
                    <p class="text-gray-500 text-sm mb-4">Estimation offerte et diffusion sur +50 portails.</p>
                    <span class="text-brand-accent font-bold text-sm group-hover:underline">Estimer maintenant &rarr;</span>
                </a>

                {{-- Gérer --}}
                <a href="{{ route('manage') }}"
                    class="bg-white rounded-xl p-8 shadow-floating hover:-translate-y-2 transition cursor-pointer group border-t-4 border-gray-800">
                    <div
                        class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center text-gray-800 text-2xl mb-6 group-hover:bg-gray-800 group-hover:text-white transition">
                        <i class="fas fa-key"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-gray-800 mb-2">Gestion & Syndic</h3>
                    <p class="text-gray-500 text-sm mb-4">Sérénité totale pour propriétaires et copropriétaires.</p>
                    <span class="text-gray-800 font-bold text-sm group-hover:underline">Voir les services &rarr;</span>
                </a>
            </div>
        </div>
    </div>

    {{-- BLOC ASSURANCES --}}
    <div class="bg-white py-16 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div
                class="flex flex-col md:flex-row items-center gap-12 bg-brand-light rounded-2xl p-10 border border-gray-200 shadow-sm">
                <div class="md:w-1/2">
                    <span class="text-brand-blue font-bold uppercase tracking-wider text-xs mb-2 block">
                        <i class="fas fa-shield-alt"></i> Pôle Protection
                    </span>
                    <h2 class="font-heading font-bold text-3xl text-gray-900 mb-4">Sécurisez vos loyers et vos biens</h2>
                    <p class="text-gray-600 mb-6">
                        Parce que l'immobilier n'est pas sans risque, GEST'IMMO a négocié pour vous les meilleurs contrats
                        du marché.
                        Protégez votre patrimoine contre les impayés et les sinistres avec nos offres exclusives.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <span
                            class="bg-white px-4 py-2 rounded-full text-sm font-bold text-gray-600 shadow-sm border border-gray-100 flex items-center">
                            <i class="fas fa-check text-brand-blue mr-2"></i>GLI (Loyers Impayés)
                        </span>
                        <span
                            class="bg-white px-4 py-2 rounded-full text-sm font-bold text-gray-600 shadow-sm border border-gray-100 flex items-center">
                            <i class="fas fa-check text-brand-blue mr-2"></i>PNO (Propriétaire)
                        </span>
                        <span
                            class="bg-white px-4 py-2 rounded-full text-sm font-bold text-gray-600 shadow-sm border border-gray-100 flex items-center">
                            <i class="fas fa-check text-brand-blue mr-2"></i>Multirisque
                        </span>
                    </div>
                    <a href="{{ route('insurance') }}"
                        class="bg-brand-blue text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 transition shadow-md inline-flex items-center gap-2">
                        <i class="fas fa-search"></i> Découvrir nos offres Assurances
                    </a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        class="w-full h-64 object-cover rounded-xl shadow-lg" alt="Assurance Immobilière">
                </div>
            </div>
        </div>
    </div>

    {{-- TROUVER MON CONSEILLER --}}
    <div class="bg-white py-20 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <span class="text-brand-blue font-bold uppercase tracking-wider text-xs">Proximité</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 mt-2 mb-6">Un conseiller GEST'IMMO près
                    de chez vous</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Nos mandataires sont des experts locaux indépendants. Ils connaissent votre quartier, les écoles et les
                    prix du marché sur le bout des doigts.
                </p>
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 shadow-sm">
                    <label class="block font-bold text-gray-700 mb-3">Trouver un expert local</label>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Code postal ou ville (ex: Bordeaux, 75001...)"
                            class="flex-grow p-4 rounded-lg border border-gray-300 focus:border-brand-blue outline-none">
                        <a href="{{ route('advisors') }}"
                            class="bg-brand-blue text-white px-6 rounded-lg font-bold hover:bg-blue-800 transition flex items-center justify-center">
                            <i class="fas fa-search text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="aspect-square bg-map-pattern rounded-full opacity-30 absolute inset-0 transform scale-110">
                </div>
                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="relative z-10 rounded-2xl shadow-2xl w-4/5 mx-auto transform rotate-1 hover:rotate-0 transition duration-500"
                    alt="Conseillère GEST'IMMO">
            </div>
        </div>
    </div>

    {{-- SECTION ACTUALITÉS --}}
    <div class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-brand-blue font-bold uppercase tracking-wider text-xs">Blog & Conseils</span>
                    <h2 class="font-heading font-bold text-3xl text-gray-800 mt-2">L'actualité de l'immobilier</h2>
                </div>
                <a href="{{ route('articles.index') }}"
                    class="hidden md:block text-brand-blue font-bold hover:underline text-sm">
                    Voir tous les articles &rarr;
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <article
                        class="bg-white rounded-xl shadow-card hover:shadow-hover transition overflow-hidden border border-gray-100 group cursor-pointer h-full flex flex-col">
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
                            <a href="{{ route('articles.show', $article) }}">
                                <h3 class="font-bold text-lg text-gray-800 mb-3 group-hover:text-brand-blue transition">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-4">
                                {{ $article->excerpt }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-gray-50">
                                <a href="{{ route('articles.show', $article) }}"
                                    class="text-brand-blue text-xs font-bold group-hover:underline">
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

    {{-- AVIS CLIENTS --}}
    <div class="bg-gray-50 py-16 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="font-heading font-bold text-3xl text-gray-800 mb-4">Ce que nos clients disent de nous</h2>
                <div class="inline-flex items-center bg-white px-6 py-2 rounded-full shadow-sm border border-gray-100">
                    <span class="text-yellow-400 mr-2 text-lg">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </span>
                    <span class="font-bold text-gray-700">4.9/5</span>
                    <span class="text-gray-400 text-sm ml-2">(sur 2 850 avis vérifiés)</span>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Avis 1 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <i class="fas fa-quote-right absolute top-6 right-6 text-gray-100 text-4xl"></i>
                    <div class="text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6 leading-relaxed">
                        "Une équipe réactive et très professionnelle. Mon appartement a été vendu en 2 semaines au prix
                        estimé. Je recommande vivement !"
                    </p>
                    <div class="font-bold text-gray-800">Sophie Martin</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Vendeuse à Bordeaux</div>
                </div>

                {{-- Avis 2 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <i class="fas fa-quote-right absolute top-6 right-6 text-gray-100 text-4xl"></i>
                    <div class="text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6 leading-relaxed">
                        "Excellent accompagnement pour mon premier investissement locatif. Les conseils fiscaux m'ont fait
                        économiser beaucoup d'argent."
                    </p>
                    <div class="font-bold text-gray-800">Thomas Durand</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Investisseur à Lyon</div>
                </div>

                {{-- Avis 3 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <i class="fas fa-quote-right absolute top-6 right-6 text-gray-100 text-4xl"></i>
                    <div class="text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6 leading-relaxed">
                        "Gestion locative au top. Plus aucun souci d'impayés grâce à leur assurance GLI. C'est une sérénité
                        totale pour nous."
                    </p>
                    <div class="font-bold text-gray-800">Julie & Marc</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Propriétaires à Paris</div>
                </div>
            </div>
        </div>
    </div>

    {{-- REJOINDRE LE RÉSEAU --}}
    <div class="bg-brand-blue py-20">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="md:w-2/3">
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-white mb-4">Rejoignez le réseau GEST'IMMO</h2>
                <p class="text-blue-100 text-lg mb-8 max-w-2xl">
                    Changez de vie et devenez votre propre patron. Profitez de la meilleure rémunération du marché (jusqu'à
                    85%) et de nos formations offertes.
                </p>
                <div class="flex flex-wrap gap-4">
                    <span
                        class="bg-blue-800/40 backdrop-blur-sm text-white px-5 py-2 rounded-full text-sm font-bold border border-white/20 flex items-center">
                        <i class="fas fa-check mr-2 text-brand-cyan"></i> Formation incluse
                    </span>
                    <span
                        class="bg-blue-800/40 backdrop-blur-sm text-white px-5 py-2 rounded-full text-sm font-bold border border-white/20 flex items-center">
                        <i class="fas fa-check mr-2 text-brand-cyan"></i> Outils offerts
                    </span>
                    <span
                        class="bg-blue-800/40 backdrop-blur-sm text-white px-5 py-2 rounded-full text-sm font-bold border border-white/20 flex items-center">
                        <i class="fas fa-check mr-2 text-brand-cyan"></i> Indépendance
                    </span>
                </div>
            </div>
            <div class="md:w-1/3 text-center md:text-right">
                <a href="{{ route("advisors") }}"
                    class="bg-white text-brand-blue font-bold px-8 py-4 rounded-full shadow-xl hover:bg-gray-100 transition transform hover:-translate-y-1 text-lg inline-block w-full md:w-auto">
                    Devenir conseiller
                </a>
            </div>
        </div>
    </div>

    {{-- LIENS RÉGIONS --}}
    <div class="bg-gray-50 py-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="font-heading font-bold text-xl text-gray-800 mb-6">Où investir avec GEST'IMMO ?</h3>
            <div class="flex flex-wrap justify-center gap-3">
                @php
                    $regions = [
                        'Nouvelle-Aquitaine',
                        'Île-de-France',
                        'Auvergne-Rhône-Alpes',
                        'Occitanie',
                        'PACA',
                        'Hauts-de-France',
                        'Grand Est',
                        'Pays de la Loire',
                        'Bretagne',
                        'Normandie',
                    ];
                @endphp
                @foreach ($regions as $region)
                    <a href="#"
                        class="text-xs text-gray-500 hover:text-brand-blue hover:border-brand-blue transition bg-white px-4 py-2 rounded border border-gray-200">
                        Investir en {{ $region }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
