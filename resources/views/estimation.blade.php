@extends('layouts.app')

@section('title', "Estimer mon bien - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-8 sm:py-10 md:py-12 text-center px-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">
            <i class="fas fa-calculator mr-2"></i>Estimation gratuite de votre bien
        </h1>
        <p class="text-blue-100 text-base sm:text-lg">
            Remplissez ce formulaire et recevez une estimation personnalisée sous 24h.
        </p>
    </div>
</div>

{{-- Barre de progression - Non sticky sur mobile --}}
<div class="bg-white border-b border-gray-200 sm:sticky sm:top-20 z-30">
    <div class="max-w-4xl mx-auto px-4 py-3 sm:py-4">
        <div class="flex items-center justify-between text-sm">
            <div class="flex items-center gap-1.5 sm:gap-2 text-brand-blue font-bold" data-step="1">
                <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-brand-blue text-white flex items-center justify-center text-xs sm:text-sm">1</span>
                <span class="hidden sm:inline">Le bien</span>
            </div>
            <div class="h-0.5 flex-grow mx-2 sm:mx-4 bg-gray-200">
                <div class="h-full bg-brand-blue transition-all duration-500" style="width: 0%" id="progress-bar"></div>
            </div>
            <div class="flex items-center gap-1.5 sm:gap-2 text-gray-400" data-step="2">
                <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-xs sm:text-sm">2</span>
                <span class="hidden sm:inline">Caractéristiques</span>
            </div>
            <div class="h-0.5 flex-grow mx-2 sm:mx-4 bg-gray-200"></div>
            <div class="flex items-center gap-1.5 sm:gap-2 text-gray-400" data-step="3">
                <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-xs sm:text-sm">3</span>
                <span class="hidden sm:inline">Vos coordonnées</span>
            </div>
        </div>
    </div>
</div>

<div class="bg-brand-light py-8 sm:py-10 md:py-12">
    <div class="max-w-3xl mx-auto px-4">

        {{-- Message d'erreur global --}}
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

        <form method="POST" action="{{ route('estimation.submit') }}" id="estimation-form" class="space-y-8">
            @csrf

            {{-- ÉTAPE 1 : Le bien --}}
            <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-6 md:p-8 border border-gray-100" id="step-1">
                <div class="flex items-center gap-3 mb-5 sm:mb-6">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">1</div>
                    <h2 class="font-heading font-bold text-lg sm:text-xl text-gray-800">Localisation et type de bien</h2>
                </div>

                {{-- Adresse --}}
                <div class="mb-5 sm:mb-6">
                    <label class="block font-bold text-gray-700 mb-2 text-sm sm:text-base">Adresse du bien *</label>
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" 
                               name="adresse_bien" 
                               value="{{ old('adresse_bien', $adresse) }}"
                               placeholder="Numéro et nom de rue" 
                               class="w-full pl-12 p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('adresse_bien') border-red-500 @enderror">
                    </div>
                    @error('adresse_bien')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-3 sm:gap-4 mb-5 sm:mb-6">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2 text-sm sm:text-base">Code postal *</label>
                        <input type="text"
                               name="code_postal"
                               value="{{ old('code_postal') }}"
                               placeholder="Ex: 75001"
                               maxlength="5"
                               class="w-full p-3 sm:p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none text-sm sm:text-base @error('code_postal') border-red-500 @enderror">
                        @error('code_postal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2 text-sm sm:text-base">Ville *</label>
                        <input type="text"
                               name="ville"
                               value="{{ old('ville') }}"
                               placeholder="Ex: Paris"
                               class="w-full p-3 sm:p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none text-sm sm:text-base @error('ville') border-red-500 @enderror">
                        @error('ville')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Type de bien --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Type de bien *</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3">
                        @php
                            $typesBien = [
                                'appartement' => ['icon' => 'fa-building', 'label' => 'Appartement'],
                                'maison' => ['icon' => 'fa-home', 'label' => 'Maison'],
                                'immeuble' => ['icon' => 'fa-city', 'label' => 'Immeuble'],
                                'terrain' => ['icon' => 'fa-tree', 'label' => 'Terrain'],
                                'local_commercial' => ['icon' => 'fa-store', 'label' => 'Local commercial'],
                                'parking' => ['icon' => 'fa-car', 'label' => 'Parking / Box'],
                            ];
                        @endphp
                        @foreach($typesBien as $value => $type)
                            <label class="cursor-pointer">
                                <input type="radio" name="type_bien" value="{{ $value }}" class="peer sr-only" {{ old('type_bien') == $value ? 'checked' : '' }}>
                                <div class="p-3 sm:p-4 rounded-xl border-2 border-gray-200 text-center transition peer-checked:border-brand-blue peer-checked:bg-blue-50 hover:border-gray-300">
                                    <i class="fas {{ $type['icon'] }} text-xl sm:text-2xl mb-1.5 sm:mb-2 text-gray-500 peer-checked:text-brand-blue"></i>
                                    <div class="font-bold text-xs sm:text-sm text-gray-700">{{ $type['label'] }}</div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('type_bien')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- ÉTAPE 2 : Caractéristiques --}}
            <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-6 md:p-8 border border-gray-100" id="step-2">
                <div class="flex items-center gap-3 mb-5 sm:mb-6">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">2</div>
                    <h2 class="font-heading font-bold text-lg sm:text-xl text-gray-800">Caractéristiques du bien</h2>
                </div>

                <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-5 sm:mb-6">
                    {{-- Surface --}}
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Surface habitable *</label>
                        <div class="relative">
                            <input type="number" 
                                   name="surface" 
                                   value="{{ old('surface') }}"
                                   placeholder="Ex: 75" 
                                   min="1"
                                   class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none pr-12 @error('surface') border-red-500 @enderror">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold">m²</span>
                        </div>
                        @error('surface')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nombre de pièces --}}
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nombre de pièces *</label>
                        <select name="nb_pieces" class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none appearance-none cursor-pointer @error('nb_pieces') border-red-500 @enderror">
                            <option value="">Sélectionner...</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ old('nb_pieces') == $i ? 'selected' : '' }}>{{ $i }} pièce{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                            <option value="11" {{ old('nb_pieces') == 11 ? 'selected' : '' }}>Plus de 10 pièces</option>
                        </select>
                        @error('nb_pieces')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Chambres --}}
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nombre de chambres</label>
                        <select name="nb_chambres" class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none appearance-none cursor-pointer">
                            <option value="">Sélectionner...</option>
                            @for($i = 0; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ old('nb_chambres') == $i ? 'selected' : '' }}>{{ $i }} chambre{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>

                    {{-- Étage (appartement) --}}
                    <div id="field-etage">
                        <label class="block font-bold text-gray-700 mb-2">Étage</label>
                        <select name="etage" class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none appearance-none cursor-pointer">
                            <option value="">Sélectionner...</option>
                            <option value="0" {{ old('etage') === '0' ? 'selected' : '' }}>Rez-de-chaussée</option>
                            @for($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ old('etage') == $i ? 'selected' : '' }}>{{ $i }}{{ $i == 1 ? 'er' : 'ème' }} étage</option>
                            @endfor
                        </select>
                    </div>

                    {{-- Année construction --}}
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Année de construction</label>
                        <input type="number" 
                               name="annee_construction" 
                               value="{{ old('annee_construction') }}"
                               placeholder="Ex: 1990" 
                               min="1800" 
                               max="{{ date('Y') }}"
                               class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none">
                    </div>

                    {{-- État général --}}
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">État général *</label>
                        <select name="etat_general" class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none appearance-none cursor-pointer @error('etat_general') border-red-500 @enderror">
                            <option value="">Sélectionner...</option>
                            <option value="neuf" {{ old('etat_general') == 'neuf' ? 'selected' : '' }}>Neuf</option>
                            <option value="tres_bon" {{ old('etat_general') == 'tres_bon' ? 'selected' : '' }}>Très bon état</option>
                            <option value="bon" {{ old('etat_general') == 'bon' ? 'selected' : '' }}>Bon état</option>
                            <option value="a_rafraichir" {{ old('etat_general') == 'a_rafraichir' ? 'selected' : '' }}>À rafraîchir</option>
                            <option value="a_renover" {{ old('etat_general') == 'a_renover' ? 'selected' : '' }}>À rénover</option>
                        </select>
                        @error('etat_general')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- DPE --}}
                <div class="mb-5 sm:mb-6">
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Diagnostic de Performance Énergétique (DPE)</label>
                    <div class="flex flex-wrap gap-1.5 sm:gap-2">
                        @php
                            $dpeClasses = [
                                'A' => 'bg-green-500',
                                'B' => 'bg-lime-500',
                                'C' => 'bg-yellow-400',
                                'D' => 'bg-yellow-500',
                                'E' => 'bg-orange-400',
                                'F' => 'bg-orange-500',
                                'G' => 'bg-red-500',
                            ];
                        @endphp
                        @foreach($dpeClasses as $letter => $color)
                            <label class="cursor-pointer">
                                <input type="radio" name="dpe" value="{{ $letter }}" class="peer sr-only" {{ old('dpe') == $letter ? 'checked' : '' }}>
                                <div class="w-10 h-10 sm:w-12 sm:h-12 {{ $color }} rounded-lg flex items-center justify-center text-white font-bold text-base sm:text-lg transition opacity-50 peer-checked:opacity-100 peer-checked:ring-4 peer-checked:ring-offset-2 peer-checked:ring-gray-400 hover:opacity-75">
                                    {{ $letter }}
                                </div>
                            </label>
                        @endforeach
                        <label class="cursor-pointer">
                            <input type="radio" name="dpe" value="vierge" class="peer sr-only" {{ old('dpe') == 'vierge' ? 'checked' : '' }}>
                            <div class="h-10 sm:h-12 px-3 sm:px-4 bg-gray-200 rounded-lg flex items-center justify-center text-gray-600 font-bold text-xs sm:text-sm transition peer-checked:bg-gray-400 peer-checked:text-white hover:bg-gray-300">
                                Vierge
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="dpe" value="non_communique" class="peer sr-only" {{ old('dpe', 'non_communique') == 'non_communique' ? 'checked' : '' }}>
                            <div class="h-10 sm:h-12 px-3 sm:px-4 bg-gray-200 rounded-lg flex items-center justify-center text-gray-600 font-bold text-xs sm:text-sm transition peer-checked:bg-gray-400 peer-checked:text-white hover:bg-gray-300">
                                Je ne sais pas
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Équipements --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Équipements</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3">
                        @php
                            $equipements = [
                                'cave' => ['icon' => 'fa-box', 'label' => 'Cave'],
                                'parking' => ['icon' => 'fa-car', 'label' => 'Parking / Garage'],
                                'balcon_terrasse' => ['icon' => 'fa-sun', 'label' => 'Balcon / Terrasse'],
                                'jardin' => ['icon' => 'fa-seedling', 'label' => 'Jardin'],
                                'ascenseur' => ['icon' => 'fa-elevator', 'label' => 'Ascenseur'],
                                'gardien' => ['icon' => 'fa-user-shield', 'label' => 'Gardien'],
                            ];
                        @endphp
                        @foreach($equipements as $name => $equip)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="{{ $name }}" value="1" class="peer sr-only" {{ old($name) ? 'checked' : '' }}>
                                <div class="p-2.5 sm:p-3 rounded-xl border-2 border-gray-200 flex items-center gap-2 sm:gap-3 transition peer-checked:border-brand-blue peer-checked:bg-blue-50 hover:border-gray-300">
                                    <i class="fas {{ $equip['icon'] }} text-gray-400 peer-checked:text-brand-blue text-sm sm:text-base"></i>
                                    <span class="text-xs sm:text-sm font-medium text-gray-700">{{ $equip['label'] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ÉTAPE 3 : Coordonnées --}}
            <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-6 md:p-8 border border-gray-100" id="step-3">
                <div class="flex items-center gap-3 mb-5 sm:mb-6">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base">3</div>
                    <h2 class="font-heading font-bold text-lg sm:text-xl text-gray-800">Votre situation et coordonnées</h2>
                </div>

                {{-- Situation --}}
                <div class="mb-5 sm:mb-6">
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Vous êtes *</label>
                    <div class="grid grid-cols-2 gap-2 sm:gap-3">
                        @php
                            $situations = [
                                'proprietaire_occupant' => 'Propriétaire occupant',
                                'proprietaire_bailleur' => 'Propriétaire bailleur',
                                'heritier' => 'Héritier / Succession',
                                'autre' => 'Autre',
                            ];
                        @endphp
                        @foreach($situations as $value => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="situation" value="{{ $value }}" class="peer sr-only" {{ old('situation') == $value ? 'checked' : '' }}>
                                <div class="p-3 sm:p-4 rounded-xl border-2 border-gray-200 text-center transition peer-checked:border-brand-blue peer-checked:bg-blue-50 hover:border-gray-300">
                                    <span class="font-bold text-gray-700 text-xs sm:text-sm">{{ $label }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('situation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Projet de vente --}}
                <div class="mb-5 sm:mb-6">
                    <label class="block font-bold text-gray-700 mb-3 text-sm sm:text-base">Votre projet de vente *</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2 sm:gap-3">
                        @php
                            $projets = [
                                'moins_3_mois' => '< 3 mois',
                                '3_6_mois' => '3-6 mois',
                                '6_12_mois' => '6-12 mois',
                                'plus_12_mois' => '> 12 mois',
                                'simple_estimation' => 'Simple estimation',
                            ];
                        @endphp
                        @foreach($projets as $value => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="projet_vente" value="{{ $value }}" class="peer sr-only" {{ old('projet_vente') == $value ? 'checked' : '' }}>
                                <div class="p-2.5 sm:p-3 rounded-xl border-2 border-gray-200 text-center transition peer-checked:border-brand-accent peer-checked:bg-yellow-50 hover:border-gray-300">
                                    <span class="font-bold text-xs sm:text-sm text-gray-700">{{ $label }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('projet_vente')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Coordonnées --}}
                <div class="grid sm:grid-cols-2 gap-3 sm:gap-4 mb-5 sm:mb-6">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Nom *</label>
                        <input type="text" 
                               name="nom" 
                               value="{{ old('nom') }}"
                               placeholder="Votre nom" 
                               class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('nom') border-red-500 @enderror">
                        @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Prénom *</label>
                        <input type="text" 
                               name="prenom" 
                               value="{{ old('prenom') }}"
                               placeholder="Votre prénom" 
                               class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('prenom') border-red-500 @enderror">
                        @error('prenom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Email *</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               placeholder="votre@email.fr" 
                               class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Téléphone *</label>
                        <input type="tel" 
                               name="telephone" 
                               value="{{ old('telephone') }}"
                               placeholder="06 XX XX XX XX" 
                               class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none @error('telephone') border-red-500 @enderror">
                        @error('telephone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Commentaires --}}
                <div class="mb-6">
                    <label class="block font-bold text-gray-700 mb-2">Commentaires (optionnel)</label>
                    <textarea name="commentaires" 
                              rows="4" 
                              placeholder="Informations complémentaires sur votre bien (travaux réalisés, points forts, etc.)"
                              class="w-full p-4 bg-gray-50 rounded-xl border transition focus:border-brand-blue focus:ring-2 focus:ring-blue-100 outline-none resize-none">{{ old('commentaires') }}</textarea>
                </div>

                {{-- RGPD --}}
                <p class="text-xs text-gray-400 mb-6">
                    <i class="fas fa-lock mr-1"></i> 
                    En soumettant ce formulaire, vous acceptez que vos données soient traitées conformément à notre 
                    <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
                </p>

                {{-- Bouton submit --}}
                <button type="submit" 
                        class="w-full bg-brand-accent text-brand-dark font-bold py-4 px-8 rounded-xl hover:bg-yellow-400 transition shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-3 text-lg cursor-pointer"
                        id="submit-btn">
                    <span id="btn-text">Recevoir mon estimation gratuite</span>
                    <span id="btn-loading" class="hidden items-center gap-2">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        Envoi en cours...
                    </span>
                    <i class="fas fa-paper-plane" id="btn-icon"></i>
                </button>
            </div>
        </form>

        {{-- Réassurance --}}
        <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>100% gratuit</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Sans engagement</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Réponse sous 24h</span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Gestion du formulaire - loading state
    document.getElementById('estimation-form')?.addEventListener('submit', function(e) {
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

    // Scroll vers les erreurs si présentes
    @if($errors->any() || session('error'))
        window.scrollTo({ top: 0, behavior: 'smooth' });
    @endif
</script>
@endpush