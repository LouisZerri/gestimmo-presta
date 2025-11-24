<footer class="bg-white border-t border-gray-200 pt-10 pb-8">
    <div class="max-w-7xl mx-auto px-4 mb-8 border-b border-gray-100 pb-8">
        <p class="text-[10px] text-gray-400 text-center leading-relaxed">
            GEST'IMMO - SARL au capital de 1 000 € - Siège social : 35 rue Aliénor d'Aquitaine, 19360 Malemort - 
            SIRET 990 877 417 00016 - RCS Brive B 990 877 417 - TVA FR42 990 877 417
        </p>
    </div>
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <div class="flex gap-6 mb-4 md:mb-0">
            <a href="{{ route('legal') }}" class="hover:text-brand-blue transition">Mentions Légales</a>
            <a href="{{ route('privacy') }}" class="hover:text-brand-blue transition">Politique de Confidentialité</a>
            <a href="{{ route('cookies') }}" class="hover:text-brand-blue transition">Cookies</a>
            <a href="#" class="hover:text-brand-blue transition">Barème Honoraires</a>
        </div>
        <div>&copy; {{ date('Y') }} GEST'IMMO. Tous droits réservés.</div>
    </div>
</footer>