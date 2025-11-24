<nav class="bg-white border-b border-gray-200 fixed w-full z-50 h-20 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-full flex justify-between items-center">
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/logo3d.png') }}" alt="Logo" class="w-20 h-20">
            <div class="flex flex-col leading-none">
                <span class="font-heading font-extrabold text-xl text-brand-blue tracking-tight">
                    GEST'<span class="text-gray-800">IMMO</span>
                </span>
                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Réseau National</span>
            </div>
        </a>

        {{-- DESKTOP MENU --}}
        <div class="hidden lg:flex items-center space-x-5">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('invest') }}"
                class="nav-link {{ request()->routeIs('invest') ? 'active' : '' }}">Investir</a>
            <a href="{{ route('sell') }}" class="nav-link {{ request()->routeIs('sell') ? 'active' : '' }}">Vendre</a>
            <a href="{{ route('manage') }}"
                class="nav-link {{ request()->routeIs('manage') ? 'active' : '' }}">Gérer</a>
            <a href="{{ route('insurance') }}"
                class="nav-link {{ request()->routeIs('insurance') ? 'active' : '' }}">Assurances</a>
            <a href="{{ route('advisors') }}"
                class="nav-link text-brand-blue {{ request()->routeIs('advisors') ? 'active' : '' }}">Nos
                Conseillers</a>
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
        class="lg:hidden hidden bg-white border-b border-gray-200 absolute w-full top-20 left-0 shadow-xl">
        <div class="flex flex-col p-4 space-y-3">
            <a href="{{ route('home') }}" class="text-left font-bold text-gray-700 py-2">ACCUEIL</a>
            <a href="{{ route('invest') }}" class="text-left font-bold text-gray-700 py-2">INVESTIR</a>
            <a href="{{ route('sell') }}" class="text-left font-bold text-gray-700 py-2">VENDRE</a>
            <a href="{{ route('manage') }}" class="text-left font-bold text-gray-700 py-2">GÉRER</a>
            <a href="{{ route('insurance') }}" class="text-left font-bold text-gray-700 py-2">ASSURANCES</a>
            <a href="{{ route('advisors') }}" class="text-left font-bold text-brand-blue py-2">NOS CONSEILLERS</a>
            <a href="{{ route('join') }}" class="text-left font-bold text-brand-blue py-2">NOUS REJOINDRE</a>
        </div>
    </div>
</nav>
