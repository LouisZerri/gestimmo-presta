@extends('layouts.app')

@section('title', "Nos Conseillers - GEST'IMMO")

@section('content')

    {{-- BARRE DE RECHERCHE STICKY --}}
    <div class="bg-white shadow-sm border-b border-gray-200 sticky top-16 sm:top-20 z-30">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:py-6">
            <div class="relative max-w-3xl mx-auto">
                <i class="fas fa-search absolute left-4 sm:left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-base sm:text-lg"></i>
                <input id="advisor-search-input" type="text" placeholder="Ville, code postal..."
                    class="w-full pl-11 sm:pl-14 pr-24 sm:pr-28 py-3 sm:py-4 rounded-full border border-gray-300 focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none text-base sm:text-lg shadow-sm transition">
                <button
                    class="absolute right-1.5 sm:right-2 top-1.5 sm:top-2 bottom-1.5 sm:bottom-2 bg-brand-blue text-white px-4 sm:px-6 rounded-full font-bold hover:bg-blue-800 transition cursor-pointer text-sm sm:text-base">
                    Chercher
                </button>
            </div>
        </div>
    </div>

    {{-- CONTENU PRINCIPAL --}}
    <div class="max-w-7xl mx-auto px-4 py-6 sm:py-8 md:py-10">
        <div class="mb-6 sm:mb-8 flex items-baseline gap-3">
            <h1 id="advisor-count" class="text-xl sm:text-2xl font-heading font-bold text-gray-800">Recherche d'expert local</h1>
        </div>

        {{-- MESSAGE MISE À JOUR --}}
        <div id="advisors-grid" class="w-full">
            <div class="w-full py-8 sm:py-12 flex flex-col items-center justify-center text-center px-2 sm:px-4">
                <div class="bg-blue-50 border border-blue-100 rounded-2xl sm:rounded-3xl p-5 sm:p-8 max-w-2xl shadow-sm">
                    <div
                        class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 shadow-sm text-brand-blue text-2xl sm:text-3xl">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3 class="font-heading font-bold text-xl sm:text-2xl text-gray-800 mb-2 sm:mb-3">
                        Mise à jour des conseillers en cours
                    </h3>
                    <p class="text-gray-600 mb-6 sm:mb-8 text-base sm:text-lg leading-relaxed">
                        L'affichage de la carte est momentanément indisponible le temps de l'actualisation de nos
                        données.<br>
                        <strong>Rassurez-vous, nos experts sont bien actifs sur votre secteur !</strong><br>
                        Complétez le formulaire pour être mis en relation immédiatement.
                    </p>
                    <button onclick="openContactModal()"
                        class="bg-brand-blue text-white font-bold py-3 sm:py-4 px-6 sm:px-10 rounded-full hover:bg-blue-800 transition shadow-lg transform hover:-translate-y-1 flex items-center justify-center mx-auto gap-2 sm:gap-3 cursor-pointer text-sm sm:text-base">
                        <span>Être recontacté</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="mt-8 text-sm text-gray-400">
                    <i class="fas fa-info-circle mr-1"></i> Service opérationnel 24h/24 via le formulaire.
                </div>
            </div>
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
                <div
                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <h3 class="font-heading font-bold text-2xl text-white">Parlez-nous de votre projet</h3>
                <p class="text-blue-100 text-sm">Nos experts locaux vous recontactent sous 24h.</p>
            </div>
            <div class="p-5 sm:p-8">
                <form class="space-y-3 sm:space-y-4" method="POST" action="{{ route('advisors.submit') }}">
                    @csrf
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <input type="text" name="nom" placeholder="Nom"
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base">
                        <input type="text" name="prenom" placeholder="Prénom"
                            class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base">
                    </div>
                    <input type="tel" name="telephone" placeholder="Téléphone"
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base">
                    <input type="email" name="email" placeholder="Email"
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base">
                    <input type="text" name="localisation" placeholder="Code postal / Ville du bien"
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base">
                    <textarea name="message" rows="3" placeholder="Précisez votre demande..."
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none text-sm sm:text-base"></textarea>
                    <button type="submit"
                        class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg hover:bg-blue-800 transition shadow-md cursor-pointer text-sm sm:text-base">
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
    </script>
@endpush