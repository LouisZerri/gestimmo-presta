@extends('layouts.app')

@section('title', "Demande envoyée - GEST'IMMO")

@section('content')

<div class="min-h-[70vh] flex items-center justify-center bg-brand-light py-20">
    <div class="max-w-xl mx-auto px-4 text-center">
        
        {{-- Animation succès --}}
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce">
            <i class="fas fa-check text-green-500 text-5xl"></i>
        </div>

        <h1 class="font-heading font-bold text-3xl md:text-4xl text-gray-900 mb-4">
            Votre demande a bien été envoyée !
        </h1>
        
        <p class="text-gray-600 text-lg mb-8">
            Merci pour votre confiance. Un conseiller GEST'IMMO vous recontactera 
            <strong class="text-brand-blue">sous 24 heures</strong> pour vous communiquer une estimation personnalisée de votre bien.
        </p>

        {{-- Prochaines étapes --}}
        <div class="bg-white rounded-2xl shadow-sm p-8 mb-8 text-left">
            <h2 class="font-heading font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-list-ol text-brand-blue"></i> Prochaines étapes
            </h2>
            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">1</div>
                    <div>
                        <div class="font-bold text-gray-800">Analyse de votre dossier</div>
                        <p class="text-sm text-gray-500">Notre équipe étudie les informations de votre bien.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">2</div>
                    <div>
                        <div class="font-bold text-gray-800">Prise de contact</div>
                        <p class="text-sm text-gray-500">Un conseiller local vous appelle pour affiner l'estimation.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">3</div>
                    <div>
                        <div class="font-bold text-gray-800">Estimation détaillée</div>
                        <p class="text-sm text-gray-500">Vous recevez une estimation précise basée sur le marché local.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Boutons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 bg-brand-blue text-white font-bold px-8 py-4 rounded-xl hover:bg-blue-800 transition shadow-md">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
            <a href="{{ route('sell') }}" class="inline-flex items-center justify-center gap-2 border-2 border-brand-blue text-brand-blue font-bold px-8 py-4 rounded-xl hover:bg-blue-50 transition">
                <i class="fas fa-info-circle"></i> En savoir plus
            </a>
        </div>

        {{-- Contact --}}
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-500 text-sm mb-3">Une question urgente ?</p>
            <a href="tel:0613250596" class="inline-flex items-center gap-2 text-brand-blue font-bold text-lg hover:underline">
                <i class="fas fa-phone"></i> 06 13 25 05 96
            </a>
        </div>
    </div>
</div>

@endsection