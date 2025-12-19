@if ($advisors->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($advisors as $advisor)
            <a href="{{ $advisor->url }}" target="_blank"
                class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-floating hover:-translate-y-1 transition duration-300 group flex flex-col overflow-hidden">

                {{-- Photo --}}
                <div class="relative w-full h-56 flex-shrink-0">
                    <div class="absolute inset-0 overflow-hidden bg-gray-100">
                        @if ($advisor->photo)
                            <img src="{{ $advisor->photo_url }}" alt="{{ $advisor->prenom }} {{ $advisor->nom }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                style="object-position: center 10%;">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                <i class="fas fa-user text-6xl text-gray-300"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Badge disponibilité --}}
                    @if ($advisor->disponible)
                        <span
                            class="absolute top-3 right-3 bg-green-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide flex items-center gap-1 z-10">
                            <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                            Disponible
                        </span>
                    @endif
                </div>

                {{-- Infos --}}
                <div class="p-5 flex-grow flex flex-col">
                    <h3 class="font-heading font-bold text-lg text-gray-800 group-hover:text-brand-blue transition">
                        {{ $advisor->prenom }} {{ $advisor->nom }}
                    </h3>

                    @if ($advisor->titre)
                        <p class="text-brand-blue font-medium text-sm mb-2">{{ $advisor->titre }}</p>
                    @endif

                    @if ($advisor->secteur)
                        <p class="text-gray-500 text-sm flex items-center gap-2 mb-3">
                            <i class="fas fa-map-marker-alt text-brand-accent"></i>
                            {{ $advisor->secteur }}
                        </p>
                    @endif

                    @if ($advisor->accroche)
                        <p class="text-gray-400 text-xs line-clamp-2 mb-4">{{ $advisor->accroche }}</p>
                    @endif

                    {{-- Langues --}}
                    @if ($advisor->langues)
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <i class="fas fa-globe"></i>
                            <span>{{ $advisor->langues }}</span>
                        </div>
                    @endif

                    {{-- Bouton --}}
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <span
                            class="text-brand-blue text-sm font-bold group-hover:underline flex items-center justify-between">
                            Voir le profil
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@else
    {{-- Message si aucun conseiller --}}
    <div class="w-full py-12 flex flex-col items-center justify-center text-center px-4">
        <div class="bg-gray-50 border border-gray-200 rounded-3xl p-8 max-w-2xl">
            <div
                class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm text-gray-400 text-3xl">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl text-gray-800 mb-3">
                Aucun conseiller trouvé
            </h3>
            <p class="text-gray-600 mb-6">
                Aucun conseiller ne correspond à votre recherche.<br>
                Essayez avec d'autres critères ou contactez-nous directement.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('advisors') }}"
                    class="px-6 py-3 border-2 border-gray-200 text-gray-700 font-bold rounded-full hover:border-brand-blue hover:text-brand-blue transition">
                    <i class="fas fa-redo mr-2"></i>Voir tous les conseillers
                </a>
                <button onclick="openContactModal()"
                    class="px-6 py-3 bg-brand-blue text-white font-bold rounded-full hover:bg-blue-800 transition shadow-md cursor-pointer">
                    <i class="fas fa-paper-plane mr-2"></i>Être recontacté
                </button>
            </div>
        </div>
    </div>
@endif
