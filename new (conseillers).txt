@extends('layouts.app')

@section('title', "Nos Conseillers - GEST'IMMO")

@section('content')

    {{-- BARRE DE RECHERCHE STICKY --}}
    <div class="bg-white shadow-sm border-b border-gray-200 sticky top-20 z-30">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <form id="search-form" action="{{ route('advisors') }}" method="GET" class="relative max-w-3xl mx-auto">
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
                <input id="advisor-search-input" type="text" name="search" 
                    value="{{ request('search') }}"
                    placeholder="Ville, code postal, nom du conseiller..."
                    class="w-full pl-14 pr-32 py-4 rounded-full border border-gray-300 focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none text-lg shadow-sm transition">
                <button type="submit"
                    class="absolute right-2 top-2 bottom-2 bg-brand-blue text-white px-6 rounded-full font-bold hover:bg-blue-800 transition cursor-pointer">
                    Chercher
                </button>
            </form>
        </div>
    </div>

    {{-- CONTENU PRINCIPAL --}}
    <div class="max-w-7xl mx-auto px-4 py-10">
        
        {{-- En-tête avec compteur --}}
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-baseline gap-3">
                <h1 class="text-2xl font-heading font-bold text-gray-800">
                    <span id="advisor-count">{{ $advisors->total() }}</span> conseiller{{ $advisors->total() > 1 ? 's' : '' }}
                    @if(request('search'))
                        <span class="text-gray-500 font-normal text-lg">pour "{{ request('search') }}"</span>
                    @endif
                </h1>
            </div>
            <button onclick="openContactModal()"
                class="bg-brand-accent text-white font-bold py-3 px-6 rounded-full hover:bg-yellow-600 transition shadow-md flex items-center gap-2 cursor-pointer">
                <i class="fas fa-paper-plane"></i>
                Être recontacté
            </button>
        </div>

        {{-- Filtres actifs --}}
        @if(request('search'))
            <div class="mb-6 flex items-center gap-2">
                <span class="text-sm text-gray-500">Filtre actif :</span>
                <a href="{{ route('advisors') }}" 
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-brand-blue text-white text-sm rounded-full hover:bg-blue-800 transition">
                    {{ request('search') }}
                    <i class="fas fa-times"></i>
                </a>
            </div>
        @endif

        {{-- Grille des conseillers --}}
        <div id="advisors-grid">
            @include('partials.advisors-grid', ['advisors' => $advisors])
        </div>

        {{-- Pagination --}}
        <div id="pagination-container" class="mt-10">
            {{ $advisors->links() }}
        </div>

    </div>

    {{-- MODALE CONTACT --}}
    <div id="contact-modal"
        class="fixed inset-0 z-[70] hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative overflow-hidden">
            <button onclick="closeContactModal()"
                class="absolute top-4 right-4 bg-gray-100 hover:bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center z-50 transition cursor-pointer">
                <i class="fas fa-times"></i>
            </button>
            <div class="bg-brand-blue p-6 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <h3 class="font-heading font-bold text-2xl text-white">Parlez-nous de votre projet</h3>
                <p class="text-blue-100 text-sm">Nos experts locaux vous recontactent sous 24h.</p>
            </div>
            <div class="p-8">
                <form class="space-y-4" method="POST" action="{{ route('advisors.submit') }}">
                    @csrf
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="nom" placeholder="Nom" required
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                        <input type="text" name="prenom" placeholder="Prénom" required
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                    </div>
                    <input type="tel" name="telephone" placeholder="Téléphone" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                    <input type="text" name="localisation" placeholder="Code postal / Ville du bien"
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none">
                    <textarea name="message" rows="3" placeholder="Précisez votre demande..."
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none"></textarea>
                    <button type="submit"
                        class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg hover:bg-blue-800 transition shadow-md cursor-pointer">
                        Envoyer ma demande
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function openContactModal() {
            const modal = document.getElementById('contact-modal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeContactModal() {
            const modal = document.getElementById('contact-modal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Fermeture au clic extérieur
        document.getElementById('contact-modal')?.addEventListener('click', function(e) {
            if (e.target === this) closeContactModal();
        });

        // Ouvrir la modale si succès
        @if(session('success'))
            openContactModal();
        @endif
    </script>
@endpush