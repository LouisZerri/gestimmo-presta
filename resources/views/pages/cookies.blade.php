@extends('layouts.app')

@section('title', "Politique de Cookies - GEST'IMMO")

@section('content')

<div class="bg-brand-light py-16">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="font-heading font-bold text-4xl text-gray-900 mb-8">Politique de Cookies</h1>
        
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12">
            <div class="prose prose-lg max-w-none">
                
                <h3>Qu'est-ce qu'un cookie ?</h3>
                <p>
                    Un cookie est un petit fichier texte déposé sur votre terminal (ordinateur, tablette, smartphone) 
                    lors de votre visite sur notre site. Il permet de stocker des informations relatives à votre navigation 
                    et de vous reconnaître lors de vos prochaines visites.
                </p>

                <h3>Les cookies que nous utilisons</h3>
                
                <h4>Cookies essentiels</h4>
                <p>
                    Ces cookies sont indispensables au fonctionnement du site. Ils vous permettent d'utiliser les 
                    principales fonctionnalités (session, authentification, sécurité). Sans ces cookies, vous ne 
                    pourriez pas utiliser normalement le site.
                </p>
                <ul>
                    <li><strong>XSRF-TOKEN</strong> : Protection contre les attaques CSRF</li>
                    <li><strong>laravel_session</strong> : Gestion de votre session</li>
                    <li><strong>cookie_consent</strong> : Mémorisation de votre choix concernant les cookies</li>
                </ul>

                <h4>Cookies analytiques</h4>
                <p>
                    Ces cookies nous permettent de mesurer l'audience de notre site et d'analyser la façon dont 
                    vous l'utilisez. Ces informations nous aident à améliorer nos services.
                </p>
                <ul>
                    <li><strong>Google Analytics</strong> : Analyse du trafic et du comportement des visiteurs</li>
                </ul>

                <h4>Cookies marketing</h4>
                <p>
                    Ces cookies sont utilisés pour vous proposer des publicités pertinentes et limiter le nombre 
                    de fois où vous voyez une publicité.
                </p>

                <h3>Gérer vos préférences</h3>
                <p>
                    Vous pouvez à tout moment modifier vos préférences en matière de cookies. Pour cela, vous pouvez :
                </p>
                <ul>
                    <li>Utiliser les paramètres de votre navigateur pour bloquer ou supprimer les cookies</li>
                    <li>Cliquer sur le bouton ci-dessous pour réinitialiser vos préférences</li>
                </ul>

                <div class="mt-8 p-6 bg-gray-50 rounded-xl border border-gray-200">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Vos préférences actuelles</h4>
                    <p class="text-sm text-gray-600 mb-4" id="cookie-status">
                        Chargement...
                    </p>
                    <button onclick="resetCookieConsent()" class="bg-brand-blue text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                        Réinitialiser mes préférences
                    </button>
                </div>

                <h3>Contact</h3>
                <p>
                    Pour toute question concernant notre politique de cookies, vous pouvez nous contacter à l'adresse : 
                    <a href="mailto:gestimmo.presta@gmail.com" class="text-brand-blue hover:underline">gestimmo.presta@gmail.com</a>
                </p>

                <p class="text-sm text-gray-400 mt-8">
                    Dernière mise à jour : {{ date('d/m/Y') }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateCookieStatus();
    });

    function updateCookieStatus() {
        const status = document.getElementById('cookie-status');
        const consent = getCookie('cookie_consent');
        
        if (consent === 'accepted') {
            status.innerHTML = '<span class="inline-flex items-center gap-2 text-green-600"><i class="fas fa-check-circle"></i> Vous avez accepté les cookies.</span>';
        } else if (consent === 'refused') {
            status.innerHTML = '<span class="inline-flex items-center gap-2 text-red-600"><i class="fas fa-times-circle"></i> Vous avez refusé les cookies.</span>';
        } else {
            status.innerHTML = '<span class="inline-flex items-center gap-2 text-gray-600"><i class="fas fa-question-circle"></i> Vous n\'avez pas encore fait de choix.</span>';
        }
    }

    function resetCookieConsent() {
        document.cookie = 'cookie_consent=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
        alert('Vos préférences ont été réinitialisées. La bannière apparaîtra lors de votre prochaine visite.');
        updateCookieStatus();
        location.reload();
    }

    function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (let cookie of cookies) {
            cookie = cookie.trim();
            if (cookie.startsWith(name + '=')) {
                return cookie.substring(name.length + 1);
            }
        }
        return null;
    }
</script>
@endpush