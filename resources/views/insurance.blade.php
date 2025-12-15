@extends('layouts.app')

@section('title', "Assurances - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-20 text-center">
    <h1 class="font-heading font-bold text-4xl mb-4">
        <i class="fas fa-shield-alt mr-3"></i>Assurances Immobilières
    </h1>
    <p class="text-blue-100 text-lg max-w-2xl mx-auto">
        Garantie Loyers Impayés (GLI), Propriétaire Non Occupant (PNO), Multirisque Habitation (MRI).<br>
        La protection complète de votre patrimoine.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    
    {{-- CARTES ASSURANCES --}}
    <div class="grid md:grid-cols-3 gap-8 mb-20">
        
        {{-- Carte GLI --}}
        <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border-t-4 border-brand-blue p-8 flex flex-col">
            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-3xl mb-6">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl text-gray-800 mb-2">Garantie Loyers Impayés (GLI)</h3>
            <p class="text-gray-500 text-sm mb-6 min-h-[60px]">
                Assurez vos revenus locatifs contre les impayés, les dégradations et les frais de contentieux. La sérénité absolue pour le bailleur.
            </p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8">
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-2"></i> <span>Remboursement jusqu'à 96 000€</span></li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-2"></i> <span>Protection juridique incluse</span></li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-2"></i> <span>Pas de franchise</span></li>
                <li class="flex items-start"><i class="fas fa-check text-brand-blue mt-1 mr-2"></i> <span>Détériorations jusqu'à 10 000€</span></li>
            </ul>
            <button onclick="scrollToInsuranceForm('GLI')" class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg hover:bg-blue-800 transition mt-auto cursor-pointer">
                Obtenir un devis GLI
            </button>
        </div>

        {{-- Carte PNO --}}
        <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border-t-4 border-gray-800 p-8 relative overflow-hidden flex flex-col">
            <div class="absolute top-0 right-0 bg-brand-accent text-white text-xs font-bold px-3 py-1 rounded-bl-lg uppercase">Obligatoire</div>
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center text-gray-800 text-3xl mb-6">
                <i class="fas fa-house-user"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl text-gray-800 mb-2">Propriétaire Non Occupant (PNO)</h3>
            <p class="text-gray-500 text-sm mb-6 min-h-[60px]">
                L'assurance indispensable (et obligatoire en copro) pour couvrir le logement vacant ou compléter l'assurance du locataire.
            </p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8">
                <li class="flex items-start"><i class="fas fa-check text-gray-800 mt-1 mr-2"></i> <span>Responsabilité Civile bailleur</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-800 mt-1 mr-2"></i> <span>Dégâts des eaux & Incendie</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-800 mt-1 mr-2"></i> <span>Vol & Vandalisme</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-800 mt-1 mr-2"></i> <span>Tarif négocié GEST'IMMO</span></li>
            </ul>
            <button onclick="scrollToInsuranceForm('PNO')" class="w-full border-2 border-gray-800 text-gray-800 font-bold py-3 rounded-lg hover:bg-gray-50 transition mt-auto cursor-pointer">
                Obtenir un devis PNO
            </button>
        </div>

        {{-- Carte Multirisque --}}
        <div class="bg-white rounded-2xl shadow-card hover:shadow-floating transition border-t-4 border-gray-400 p-8 flex flex-col">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-500 text-3xl mb-6">
                <i class="fas fa-umbrella"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl text-gray-800 mb-2">Multirisque Habitation (MRI)</h3>
            <p class="text-gray-500 text-sm mb-6 min-h-[60px]">
                Pour votre résidence principale ou pour vos locataires. Une couverture optimale au meilleur prix.
            </p>
            <ul class="space-y-3 text-sm text-gray-600 mb-8">
                <li class="flex items-start"><i class="fas fa-check text-gray-500 mt-1 mr-2"></i> <span>Rééquipement à neuf</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-500 mt-1 mr-2"></i> <span>Assistance 24h/24 et 7j/7</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-500 mt-1 mr-2"></i> <span>Protection objets de valeur</span></li>
                <li class="flex items-start"><i class="fas fa-check text-gray-500 mt-1 mr-2"></i> <span>Garantie villégiature incluse</span></li>
            </ul>
            <button onclick="scrollToInsuranceForm('MRI')" class="w-full border-2 border-gray-400 text-gray-600 font-bold py-3 rounded-lg hover:bg-gray-50 transition mt-auto cursor-pointer">
                Obtenir un devis MRI
            </button>
        </div>
    </div>

    {{-- ARGUMENTAIRE --}}
    <div class="bg-brand-light rounded-3xl p-10 mb-20">
        <div class="text-center max-w-3xl mx-auto mb-10">
            <h2 class="font-heading font-bold text-3xl text-gray-800 mb-4">Pourquoi passer par GEST'IMMO Assurances ?</h2>
            <p class="text-gray-600">
                En tant que réseau national, nous négocions des tarifs de groupe inaccessibles aux particuliers. 
                Vous bénéficiez des garanties des plus grands assureurs (AXA, Allianz, Generali) à prix coûtant.
            </p>
        </div>
        <div class="grid md:grid-cols-4 gap-6 text-center">
            @php
                $stats = [
                    ['value' => '-30%', 'label' => "d'économie en moyenne"],
                    ['value' => '48h', 'label' => 'pour obtenir votre attestation'],
                    ['value' => '100%', 'label' => 'Digital & Zéro papier'],
                    ['value' => '24/7', 'label' => 'Service Sinistre dédié'],
                ];
            @endphp
            
            @foreach($stats as $stat)
                <div>
                    <div class="font-extrabold text-4xl text-brand-blue mb-2">{{ $stat['value'] }}</div>
                    <div class="text-sm font-bold text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- FORMULAIRE DE CONTACT --}}
    <div id="insurance-contact" class="max-w-2xl mx-auto bg-white p-10 rounded-2xl shadow-xl border-t-4 border-brand-blue">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800">Demander un devis gratuit</h3>
            <p class="text-gray-500">Sans engagement. Réponse sous 24h ouvrées.</p>
        </div>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-fade-in-up">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-green-800">Demande envoyée avec succès !</h4>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- Message d'erreur --}}
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-red-800">Une erreur est survenue</h4>
                    <p class="text-red-700 text-sm">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- Erreurs de validation --}}
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-circle text-red-600"></i>
                    <h4 class="font-bold text-red-800">Veuillez corriger les erreurs suivantes :</h4>
                </div>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-4" method="POST" action="{{ route('insurance.submit') }}" id="insurance-form">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom *" required
                           class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('nom') border-red-500 @enderror">
                    @error('nom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Prénom *" required
                           class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('prenom') border-red-500 @enderror">
                    @error('prenom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required
                       class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone *" required
                       class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition @error('telephone') border-red-500 @enderror">
                @error('telephone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <label class="block font-bold text-gray-700 mb-3 text-sm">Produit(s) souhaité(s) * :</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" id="check-gli" name="produits[]" value="GLI" 
                               class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                               {{ in_array('GLI', old('produits', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">GLI (Loyers Impayés)</span>
                    </label>
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" id="check-pno" name="produits[]" value="PNO" 
                               class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                               {{ in_array('PNO', old('produits', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">PNO (Propriétaire)</span>
                    </label>
                    <label class="flex items-center cursor-pointer hover:bg-blue-100 p-2 rounded transition">
                        <input type="checkbox" id="check-mri" name="produits[]" value="MRI" 
                               class="form-checkbox h-5 w-5 text-brand-blue rounded focus:ring-blue-500 border-gray-300"
                               {{ in_array('MRI', old('produits', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 font-medium text-sm">Multirisque</span>
                    </label>
                </div>
                @error('produits')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <textarea id="insurance-message" name="message" rows="3" 
                          placeholder="Précisions (Surface du bien, loyer mensuel, ville...)" 
                          class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-xs text-gray-400">
                <i class="fas fa-lock mr-1"></i> 
                Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
            </p>

            <button type="submit" id="submit-btn"
                    class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                <span id="btn-text">Recevoir mon devis personnalisé</span>
                <span id="btn-loading" class="hidden items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Envoi en cours...
                </span>
                <i class="fas fa-paper-plane" id="btn-icon"></i>
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function scrollToInsuranceForm(product) {
        const form = document.getElementById('insurance-contact');
        const messageBox = document.getElementById('insurance-message');
        const checkbox = document.getElementById(`check-${product.toLowerCase()}`);
        
        if (form) {
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
            form.classList.add('ring-4', 'ring-brand-blue');
            setTimeout(() => form.classList.remove('ring-4', 'ring-brand-blue'), 1500);
            
            if (checkbox) checkbox.checked = true;
            
            if (messageBox) {
                messageBox.value = `Bonjour, je souhaite obtenir un devis pour l'assurance ${product}. Voici quelques détails sur mon bien :`;
                messageBox.focus();
            }
        }
    }

    // Gestion du formulaire - loading state
    document.getElementById('insurance-form')?.addEventListener('submit', function(e) {
        const btn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnLoading = document.getElementById('btn-loading');
        const btnIcon = document.getElementById('btn-icon');
        
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('inline-flex');
    });

    // Scroll vers le formulaire si erreurs ou succès
    @if(session('success') || session('error') || $errors->any())
        document.getElementById('insurance-contact')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    @endif
</script>
@endpush