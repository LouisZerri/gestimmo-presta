@extends('layouts.app')

@section('title', "Actualités - GEST'IMMO")

@section('content')

{{-- HERO --}}
<div class="bg-brand-blue text-white py-10 sm:py-12 md:py-16 text-center px-4">
    <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl mb-3 sm:mb-4">Actualités & Conseils</h1>
    <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
        Toute l'actualité immobilière, les conseils d'experts et les tendances du marché.
    </p>
</div>

<div class="max-w-7xl mx-auto px-4 py-10 sm:py-12 md:py-16">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
        @forelse($articles as $article)
            <article class="bg-white rounded-xl shadow-card hover:shadow-hover transition overflow-hidden border border-gray-100 group cursor-pointer h-full flex flex-col">
                <a href="{{ route('articles.show', $article) }}" class="block">
                    <div class="relative h-44 sm:h-52 md:h-56 overflow-hidden">
                        <img src="{{ $article->image }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 {{ $article->category_color }} text-white text-[9px] sm:text-[10px] font-bold px-2 sm:px-3 py-1 rounded-full uppercase tracking-wide">
                            {{ $article->category }}
                        </span>
                    </div>
                </a>
                <div class="p-4 sm:p-5 md:p-6 flex-grow flex flex-col">
                    <div class="text-[10px] sm:text-xs text-gray-400 mb-2 flex items-center gap-2">
                        <i class="far fa-calendar-alt"></i> {{ $article->formatted_date }}
                    </div>
                    <a href="{{ route('articles.show', $article) }}">
                        <h3 class="font-bold text-base sm:text-lg text-gray-800 mb-2 sm:mb-3 group-hover:text-brand-blue transition">
                            {{ $article->title }}
                        </h3>
                    </a>
                    <p class="text-gray-500 text-xs sm:text-sm line-clamp-3 mb-3 sm:mb-4">
                        {{ $article->excerpt }}
                    </p>
                    <div class="mt-auto pt-3 sm:pt-4 border-t border-gray-50">
                        <a href="{{ route('articles.show', $article) }}" class="text-brand-blue text-xs font-bold group-hover:underline">
                            Lire l'article
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Aucun article pour le moment.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($articles->hasPages())
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    @endif
</div>

@endsection