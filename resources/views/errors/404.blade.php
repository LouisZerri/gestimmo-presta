@extends('layouts.app')

@section('title', "GEST'IMMO | Page non trouvée")

@section('content')

    <div class="min-h-[70vh] flex items-center justify-center py-20">
        <div class="max-w-2xl w-full text-center px-4">
            
            <!-- Illustration 404 -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-28 h-28 bg-gray-100 rounded-full mb-6">
                    <i class="fas fa-map-marker-alt text-5xl text-brand-blue opacity-40"></i>
                </div>
                <div class="text-8xl font-extrabold text-gray-200 leading-none font-heading">404</div>
            </div>

            <!-- Message -->
            <h1 class="font-heading font-bold text-2xl md:text-3xl text-gray-800 mb-4">
                Cette page semble introuvable...
            </h1>
            <p class="text-gray-500 mb-10 max-w-md mx-auto">
                La page que vous recherchez n'existe plus ou a été déplacée. 
            </p>

            <!-- Boutons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="javascript:history.back()" 
                    class="px-6 py-3 border-2 border-gray-200 text-gray-700 font-bold rounded-lg hover:border-brand-blue hover:text-brand-blue transition">
                    <i class="fas fa-arrow-left mr-2"></i>Page précédente
                </a>
                <a href="{{ route('home') }}" 
                    class="px-6 py-3 bg-brand-blue text-white font-bold rounded-lg hover:bg-blue-800 transition shadow-lg">
                    <i class="fas fa-home mr-2"></i>Retour à l'accueil
                </a>
            </div>

        </div>
    </div>

@endsection