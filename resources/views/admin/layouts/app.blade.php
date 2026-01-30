<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administration') - Gestimmo France</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#1e3a5f',
                            accent: '#e63946',
                        }
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-brand-blue text-white flex-shrink-0">
            <div class="p-6">
                <h1 class="text-xl font-bold">GEST'IMMO</h1>
                <p class="text-sm text-gray-300">Administration</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 border-r-4 border-brand-accent' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Tableau de bord
                </a>

                <a href="{{ route('admin.articles.index') }}"
                   class="flex items-center px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.articles.index') || request()->routeIs('admin.articles.create') || request()->routeIs('admin.articles.edit') ? 'bg-white/10 border-r-4 border-brand-accent' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Articles
                </a>

                <a href="{{ route('admin.articles.ai.create') }}"
                   class="flex items-center px-6 py-3 hover:bg-white/10 transition-colors {{ request()->routeIs('admin.articles.ai.*') ? 'bg-white/10 border-r-4 border-brand-accent' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Générer avec IA
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-6 border-t border-white/10">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-300">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="text-sm text-gray-300 hover:text-white transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-x-hidden">
            <!-- Top bar -->
            <header class="bg-white shadow-sm">
                <div class="px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
                </div>
            </header>

            <!-- Page content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
