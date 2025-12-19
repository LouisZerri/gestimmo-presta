{{-- Bannière Cookie --}}
<div id="cookie-banner"
    class="fixed bottom-0 left-0 right-0 z-[100] transform translate-y-full transition-transform duration-500">
    <div class="bg-white border-t border-gray-200 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                {{-- Texte --}}
                <div class="flex items-start gap-3 flex-grow">
                    <div
                        class="hidden sm:flex w-10 h-10 bg-brand-blue/10 rounded-full items-center justify-center flex-shrink-0">
                        <i class="fas fa-cookie-bite text-brand-blue"></i>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p class="font-medium text-gray-800 mb-1">🍪 Ce site utilise des cookies</p>
                        <p>
                            Nous utilisons des cookies pour améliorer votre expérience, analyser le trafic et
                            personnaliser les contenus.
                            <a href="{{ route('cookies') ?? '#' }}"
                                class="text-brand-blue hover:underline font-medium">En savoir plus</a>
                        </p>
                    </div>
                </div>

                {{-- Boutons --}}
                <div class="flex items-center gap-3 flex-shrink-0">
                    <button onclick="refuseCookies()"
                        class="px-4 py-2 text-sm font-bold text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition cursor-pointer">
                        Refuser
                    </button>
                    <button onclick="acceptCookies()"
                        class="px-6 py-2 bg-brand-blue text-white text-sm font-bold rounded-lg hover:bg-blue-800 transition shadow-md cursor-pointer">
                        Accepter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const consent = getCookie('cookie_consent');

        // Si déjà accepté, mettre à jour le consentement GTM
        if (consent === 'accepted') {
            updateConsent(true);
        } else if (!consent) {
            // Afficher la bannière après un court délai
            setTimeout(function() {
                document.getElementById('cookie-banner').classList.remove('translate-y-full');
            }, 1000);
        }
    });

    function acceptCookies() {
        setCookie('cookie_consent', 'accepted', 365);
        updateConsent(true);
        hideBanner();
    }

    function refuseCookies() {
        setCookie('cookie_consent', 'refused', 365);
        updateConsent(false);
        hideBanner();
    }

    function updateConsent(granted) {
        gtag('consent', 'update', {
            'analytics_storage': granted ? 'granted' : 'denied',
            'ad_storage': granted ? 'granted' : 'denied'
        });
    }

    function hideBanner() {
        const banner = document.getElementById('cookie-banner');
        banner.classList.add('translate-y-full');
        setTimeout(function() {
            banner.style.display = 'none';
        }, 500);
    }

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/;SameSite=Lax';
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
