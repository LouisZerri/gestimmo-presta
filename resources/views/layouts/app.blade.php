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
    <meta name="description" content="@yield('meta_description', 'GEST\'IMMO France - Le premier réseau immobilier hybride : transaction, investissement locatif, gestion locative, syndic, assurances et état des lieux.')">
    @hasSection('keywords')
        <meta name="keywords" content="@yield('keywords')">
    @endif
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', 'GEST\'IMMO | Le Réseau Immobilier Global')">
    <meta property="og:description" content="@yield('meta_description', 'GEST\'IMMO France - Le premier réseau immobilier hybride : transaction, investissement locatif, gestion locative, syndic, assurances et état des lieux.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/logo3d.png'))">
    <meta property="og:site_name" content="GEST'IMMO France">
    <meta property="og:locale" content="fr_FR">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'GEST\'IMMO | Le Réseau Immobilier Global')">
    <meta name="twitter:description" content="@yield('meta_description', 'GEST\'IMMO France - Le premier réseau immobilier hybride.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo3d.png'))">

    @stack('meta')

    {{-- Schema.org Organization --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "RealEstateAgent",
        "name": "GEST'IMMO France",
        "url": "https://www.gestimmo-france.fr",
        "logo": "{{ asset('images/logo3d.png') }}",
        "description": "Réseau immobilier hybride : transaction, investissement, gestion locative, syndic, assurances.",
        "telephone": "+33428290028",
        "email": "contact@gestimmo-france.fr",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "FR"
        },
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61583293786788",
            "https://www.instagram.com/gestimmo_france/",
            "https://www.linkedin.com/company/gest-immo-presta/"
        ],
        "areaServed": {
            "@type": "Country",
            "name": "France"
        },
        "priceRange": "$$"
    }
    </script>
    @stack('schema')

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
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
    <main class="pt-16 sm:pt-20 flex-grow">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- SCRIPTS --}}
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu) menu.classList.toggle('hidden');
        }

        function toggleMobileSubmenu(id) {
            const submenu = document.getElementById(id);
            const icon = document.getElementById(id + '-icon');
            if (submenu) {
                submenu.classList.toggle('hidden');
                if (icon) icon.classList.toggle('rotate-180');
            }
        }
    </script>

    @stack('scripts')

    {{-- Modale Tarifs --}}
    @include('partials.tarifs-modal')

    {{-- Cookie Banner --}}
    @include('partials.cookie-banner')
</body>

</html>
