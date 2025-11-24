<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
     <!-- Google Tag Manager -->
    <script>
        // Configuration du consentement par défaut
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('consent', 'default', {
            'analytics_storage': 'denied',
            'ad_storage': 'denied'
        });

        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5G4RCKJ5');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "GEST'IMMO | Le Réseau Immobilier Global")</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Montserrat', 'sans-serif'],
                        body: ['Open Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            blue: '#0054a6',
                            dark: '#1f2937',
                            light: '#f8fafc',
                            accent: '#eab308',
                            cyan: '#00c3ff',
                        }
                    },
                    boxShadow: {
                        'card': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                        'hover': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                        'floating': '0 10px 40px -10px rgba(0,0,0,0.15)',
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #ffffff; color: #333; }
        .nav-link { position: relative; font-weight: 600; color: #4b5563; transition: color 0.2s; padding-bottom: 4px; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em; }
        .nav-link:hover, .nav-link.active { color: #0054a6; }
        .nav-link.active::after { content: ''; position: absolute; width: 100%; height: 3px; bottom: 0; left: 0; background-color: #0054a6; }
        .hero-overlay { background: linear-gradient(to right, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.1) 100%); }
        .bg-map-pattern { background-image: radial-gradient(#cbd5e1 2px, transparent 2px); background-size: 20px 20px; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out forwards; }
        .prose h3 { font-family: 'Montserrat', sans-serif; font-weight: 700; color: #1f2937; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem; }
        .prose p { margin-bottom: 1.25rem; line-height: 1.8; color: #4b5563; }
        .prose strong { color: #0054a6; font-weight: 700; }
        .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose li { margin-bottom: 0.5rem; }
    </style>
    
    @stack('styles')
</head>
<body class="font-body antialiased flex flex-col min-h-screen">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5G4RCKJ5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    {{-- HEADER NAVIGATION --}}
    @include('partials.header')

    {{-- MAIN CONTENT --}}
    <main class="pt-20 flex-grow">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- SCRIPTS --}}
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if(menu) menu.classList.toggle('hidden');
        }
    </script>
    
    @stack('scripts')

    {{-- Cookie Banner --}}
    @include('partials.cookie-banner')
</body>
</html>