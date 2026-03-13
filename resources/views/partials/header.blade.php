<nav class="bg-white border-b border-gray-200 fixed w-full z-50 h-16 sm:h-20 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-full flex justify-between items-center">
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center gap-1 sm:gap-2">
            <img src="{{ asset('images/logo3d.png') }}" alt="Logo" class="w-14 h-14 sm:w-20 sm:h-20">
            <div class="flex flex-col leading-none">
                <span class="font-heading font-extrabold text-lg sm:text-xl text-brand-blue tracking-tight">
                    GEST'<span class="text-red-800">IMMO</span>
                </span>
                <span class="text-[8px] sm:text-[9px] font-bold text-gray-400 uppercase tracking-widest hidden xs:block">L'investissement en plus simple</span>
            </div>
        </a>

        {{-- DESKTOP MENU --}}
        <div class="hidden lg:flex items-center space-x-5">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>

            {{-- INVESTIR (dropdown) --}}
            <div class="relative group">
                <button class="nav-link flex items-center gap-1 {{ request()->routeIs('invest*') ? 'active' : '' }}">
                    Investir <i class="fas fa-chevron-down text-[8px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <div class="bg-white rounded-xl shadow-floating border border-gray-100 py-2 min-w-[200px]">
                        <a href="{{ route('invest.neuf') }}" class="dropdown-link">
                            <i class="fas fa-building text-brand-blue w-5"></i> Immobilier Neuf
                        </a>
                        <a href="{{ route('invest') }}" class="dropdown-link">
                            <i class="fas fa-home text-brand-blue w-5"></i> Immobilier Ancien
                        </a>
                        <a href="{{ route('invest.viager') }}" class="dropdown-link">
                            <i class="fas fa-handshake text-brand-blue w-5"></i> Viager
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('sell') }}" class="nav-link {{ request()->routeIs('sell') ? 'active' : '' }}">Vendre</a>

            <a href="{{ route('insurance') }}" class="nav-link {{ request()->routeIs('insurance') ? 'active' : '' }}">Assurances</a>

            <a href="{{ route('edl') }}" class="nav-link {{ request()->routeIs('edl') ? 'active' : '' }}">EDL</a>

            {{-- GESTION (dropdown) --}}
            <div class="relative group">
                <button class="nav-link flex items-center gap-1 {{ request()->routeIs('manage*') || request()->routeIs('rental*') ? 'active' : '' }}">
                    Gestion <i class="fas fa-chevron-down text-[8px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <div class="bg-white rounded-xl shadow-floating border border-gray-100 py-2 min-w-[220px]">
                        <span class="dropdown-label">Gestion Locative</span>
                        <a href="{{ route('rental.complete') }}" class="dropdown-link">
                            <i class="fas fa-key text-brand-blue w-5"></i> Gestion Complète
                        </a>
                        <a href="{{ route('rental.technical') }}" class="dropdown-link">
                            <i class="fas fa-wrench text-brand-blue w-5"></i> Gestion Technique
                        </a>
                        <a href="{{ route('rental.alacarte') }}" class="dropdown-link">
                            <i class="fas fa-list-check text-brand-blue w-5"></i> Gestion à la Carte
                        </a>
                        <div class="border-t border-gray-100 my-2"></div>
                        <span class="dropdown-label">Syndic</span>
                        <a href="{{ route('manage') }}" class="dropdown-link">
                            <i class="fas fa-building text-brand-blue w-5"></i> Syndic de copropriété
                        </a>
                    </div>
                </div>
            </div>

            {{-- PRO (dropdown) --}}
            <div class="relative group">
                <button class="nav-link flex items-center gap-1 {{ request()->routeIs('pro.*') ? 'active' : '' }}">
                    Pro <i class="fas fa-chevron-down text-[8px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute top-full right-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <div class="bg-white rounded-xl shadow-floating border border-gray-100 py-2 min-w-[210px]">
                        <a href="{{ route('pro.edl') }}" class="dropdown-link">
                            <i class="fas fa-clipboard-check text-brand-blue w-5"></i> État des Lieux
                        </a>
                        <a href="{{ route('pro.nourrice') }}" class="dropdown-link">
                            <i class="fas fa-house-user text-brand-blue w-5"></i> Nourrice Locative
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('advisors') }}" class="nav-link text-brand-blue {{ request()->routeIs('advisors') ? 'active' : '' }}">Nos Conseillers</a>

            <a href="{{ route('join') }}"
                class="bg-brand-blue hover:bg-blue-700 text-white px-4 py-2 rounded-full font-bold text-xs transition shadow-md flex items-center gap-2 transform hover:-translate-y-0.5">
                <i class="fas fa-user-plus"></i> Nous Rejoindre
            </a>
        </div>

        {{-- MOBILE TOGGLE --}}
        <button class="lg:hidden text-gray-700 text-2xl" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobile-menu"
        class="lg:hidden hidden bg-white border-b border-gray-200 absolute w-full top-16 sm:top-20 left-0 shadow-xl max-h-[calc(100vh-4rem)] sm:max-h-[calc(100vh-5rem)] overflow-y-auto">
        <div class="flex flex-col p-4 space-y-1">
            <a href="{{ route('home') }}" class="mobile-link">Accueil</a>

            {{-- Investir --}}
            <button onclick="toggleMobileSubmenu('mobile-invest')" class="mobile-link flex justify-between items-center w-full">
                <span>Investir</span>
                <i class="fas fa-chevron-down text-xs transition-transform" id="mobile-invest-icon"></i>
            </button>
            <div id="mobile-invest" class="hidden pl-4 space-y-1 border-l-2 border-brand-blue ml-3">
                <a href="{{ route('invest.neuf') }}" class="mobile-sublink">Immobilier Neuf</a>
                <a href="{{ route('invest') }}" class="mobile-sublink">Immobilier Ancien</a>
                <a href="{{ route('invest.viager') }}" class="mobile-sublink">Viager</a>
            </div>

            <a href="{{ route('sell') }}" class="mobile-link">Vendre</a>

            <a href="{{ route('insurance') }}" class="mobile-link">Assurances</a>
            <a href="{{ route('edl') }}" class="mobile-link">État des Lieux</a>

            {{-- Gestion --}}
            <button onclick="toggleMobileSubmenu('mobile-gestion')" class="mobile-link flex justify-between items-center w-full">
                <span>Gestion</span>
                <i class="fas fa-chevron-down text-xs transition-transform" id="mobile-gestion-icon"></i>
            </button>
            <div id="mobile-gestion" class="hidden pl-4 space-y-1 border-l-2 border-brand-blue ml-3">
                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-bold py-1 block">Gestion Locative</span>
                <a href="{{ route('rental.complete') }}" class="mobile-sublink">Gestion Complète</a>
                <a href="{{ route('rental.technical') }}" class="mobile-sublink">Gestion Technique</a>
                <a href="{{ route('rental.alacarte') }}" class="mobile-sublink">Gestion à la Carte</a>
                <div class="border-t border-gray-200 my-1"></div>
                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-bold py-1 block">Syndic</span>
                <a href="{{ route('manage') }}" class="mobile-sublink">Syndic de copropriété</a>
            </div>

            {{-- PRO --}}
            <button onclick="toggleMobileSubmenu('mobile-pro')" class="mobile-link flex justify-between items-center w-full">
                <span>Pro</span>
                <i class="fas fa-chevron-down text-xs transition-transform" id="mobile-pro-icon"></i>
            </button>
            <div id="mobile-pro" class="hidden pl-4 space-y-1 border-l-2 border-brand-blue ml-3">
                <a href="{{ route('pro.edl') }}" class="mobile-sublink">État des Lieux</a>
                <a href="{{ route('pro.nourrice') }}" class="mobile-sublink">Nourrice Locative</a>
            </div>

            <a href="{{ route('advisors') }}" class="mobile-link text-brand-blue">Nos Conseillers</a>
            <a href="{{ route('join') }}" class="mobile-link text-brand-blue">Nous Rejoindre</a>
        </div>
    </div>
</nav>
