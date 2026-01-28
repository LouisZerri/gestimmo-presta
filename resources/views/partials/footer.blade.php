<!-- FOOTER -->
<footer class="bg-white border-t border-gray-200 pt-10 sm:pt-12 md:pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4">

        <!-- NOUVELLE SECTION : LIENS PRINCIPAUX -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 sm:gap-10 md:gap-12 mb-10 sm:mb-12">
            <!-- Colonne Logo/Info -->
            <div class="col-span-2 sm:col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-4 sm:mb-6">
                    <img src="{{ asset('images/logo3d.png') }}" alt="Logo" class="w-16 h-16 sm:w-20 sm:h-20">
                    <div class="flex flex-col leading-none">
                        <span class="font-heading font-extrabold text-lg sm:text-xl text-brand-blue tracking-tight">GEST'<span class="text-red-800">IMMO</span></span>
                        <span class="text-[8px] sm:text-[9px] font-bold text-gray-400 uppercase tracking-widest">L'investissement en plus simple</span>
                    </div>
                </div>
                <p class="text-gray-500 text-xs sm:text-sm leading-relaxed mb-4 sm:mb-6">Le premier réseau immobilier hybride qui réunit transaction, investissement et gestion.</p>
                <div class="flex gap-3 sm:gap-4">
                    <a href="https://www.facebook.com/share/19je7E8Fiw/?mibextid=wwXIfr" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-brand-blue hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/gestimmo.fr?igsh=MWhkbzZmdGR0dmUwZw%3D%3D&utm_source=qr" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-brand-blue hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/gest-immo-presta/?viewAsMember=true" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-brand-blue hover:text-white transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Colonne À propos (AVEC LIEN FAQ ACTIF) -->
            <div>
                <h4 class="font-heading font-bold text-gray-900 text-base sm:text-lg mb-4 sm:mb-6">À propos de GEST'IMMO</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route("faq") }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Centre d'aide (FAQ)
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fees') }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium">
                            Barème d'honoraires
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("advisors") }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Nos conseillers
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Colonne Services -->
            <div>
                <h4 class="font-heading font-bold text-gray-900 text-base sm:text-lg mb-4 sm:mb-6">Nos Services</h4>
                <ul class="space-y-3">
                    <li>
                       <a href="{{ route("invest") }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Investissement Locatif
                       </a>
                    </li>
                    <li>
                        <a href="{{ route("sell") }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Vendre un bien
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("manage") }}" class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Gestion & Syndic
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("insurance") }}"class="text-gray-500 hover:text-brand-blue transition text-sm font-medium text-left">
                            Assurances Immo
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Colonne Rejoindre -->
            <div class="col-span-2 sm:col-span-1">
                <h4 class="font-heading font-bold text-gray-900 text-base sm:text-lg mb-4 sm:mb-6">Carrière</h4>
                <p class="text-gray-500 text-xs sm:text-sm mb-4">Changez de vie, rejoignez un réseau en pleine expansion.</p>
                <a href="{{ route("join") }}" class="bg-brand-blue text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-lg font-bold text-xs sm:text-sm hover:bg-blue-800 transition shadow-sm inline-block text-center">
                    Devenir conseiller
                </a>
            </div>
        </div>

        <!-- Mentions Légales -->
        <div class="border-t border-gray-100 pt-8 pb-4">
            <p class="text-[9px] md:text-[10px] text-gray-400 text-center leading-relaxed max-w-5xl mx-auto mb-6">
                Tous les conseillers GEST'IMMO sont des agents commerciaux indépendants de la SARL GEST'IMMO France immatriculés au RSAC, titulaires de la carte de démarchage immobilier pour le compte de la société GEST'IMMO France SARL. 
            </p>
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500 pt-4 border-t border-gray-50">
                <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 mb-4 md:mb-0 text-xs font-medium">
                    <a href="{{ route('legal') }}" class="hover:text-brand-blue transition">Mentions Légales</a>
                    <a href="{{ route('privacy') }}" class="hover:text-brand-blue transition">Politique de Confidentialité</a>
                    <a href="{{ route('cookies') }}" class="hover:text-brand-blue transition">Cookies</a>
                    <a href="#" class="hover:text-brand-blue transition">Médiation</a>
                </div>
                <div class="text-xs text-gray-400">&copy; {{ date('Y') }} GEST'IMMO. Tous droits réservés.</div>
            </div>
        </div>
    </div>
</footer>