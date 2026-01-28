@extends('layouts.app')

@section('title', $article->title . " - GEST'IMMO")

@section('content')

{{-- Barre de navigation interne --}}
<div class="bg-white border-b border-gray-200 sticky top-16 sm:top-20 z-20 shadow-sm">
    <div class="max-w-4xl mx-auto px-4 py-3 sm:py-4 flex justify-between items-center">
        <a href="{{ url()->previous() }}" class="text-brand-blue font-bold hover:bg-blue-50 px-3 sm:px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm sm:text-base">
            <i class="fas fa-arrow-left"></i> <span class="hidden sm:inline">Retour</span>
        </a>
        <div class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-wider">Lecture en cours</div>
    </div>
</div>

{{-- Contenu Article --}}
<article class="max-w-3xl mx-auto px-4 py-6 sm:py-8 md:py-10">
    {{-- Méta --}}
    <div class="mb-4 sm:mb-6 animate-fade-in-up flex flex-wrap items-center gap-2 sm:gap-3">
        <span class="{{ $article->category_color }} text-white text-[10px] sm:text-xs font-bold px-2 sm:px-3 py-1 rounded-full uppercase tracking-wide shadow-sm">
            {{ $article->category }}
        </span>
        <span class="text-gray-500 text-xs sm:text-sm font-medium">
            <i class="far fa-calendar-alt mr-1"></i> {{ $article->formatted_date }}
        </span>
    </div>

    {{-- Titre --}}
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-gray-900 mb-6 sm:mb-8 leading-tight">
        {{ $article->title }}
    </h1>

    {{-- Image --}}
    <img src="{{ $article->image }}"
         alt="{{ $article->title }}"
         class="w-full h-[200px] sm:h-[300px] md:h-[400px] object-cover rounded-xl shadow-lg mb-8 sm:mb-12">

    {{-- Contenu Riche --}}
    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
        {!! $article->content !!}
    </div>

    {{-- Auteur & Partage --}}
    <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center font-bold text-gray-600">
                {{ substr($article->author, 0, 1) }}{{ substr(explode(' ', $article->author)[1] ?? '', 0, 1) }}
            </div>
            <div class="text-sm">
                <span class="block font-bold text-gray-900">{{ $article->author }}</span>
                <span class="text-gray-500">{{ $article->author_role }}</span>
            </div>
        </div>
        <div class="flex gap-4 text-xl text-gray-400">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
               target="_blank" 
               class="hover:text-brand-blue transition">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($article->title) }}" 
               target="_blank" 
               class="hover:text-brand-blue transition">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" 
               target="_blank" 
               class="hover:text-brand-blue transition">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div>

    {{-- Articles Recommandés --}}
    @if($relatedArticles->count() > 0)
        <div class="mt-10 sm:mt-12 md:mt-16 bg-brand-light p-5 sm:p-6 md:p-8 rounded-2xl border border-gray-100">
            <h3 class="font-heading font-bold text-lg sm:text-xl text-gray-900 mb-4 sm:mb-6">Cela pourrait vous intéresser...</h3>
            <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                @foreach($relatedArticles as $related)
                    <a href="{{ route('articles.show', $related) }}" class="flex gap-3 sm:gap-4 group hover:bg-gray-50 p-2 rounded-lg transition">
                        <img src="{{ $related->image }}"
                             alt="{{ $related->title }}"
                             class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-lg flex-shrink-0">
                        <div class="min-w-0">
                            <div class="text-[9px] sm:text-[10px] font-bold text-brand-blue uppercase mb-1">{{ $related->category }}</div>
                            <h4 class="font-bold text-gray-800 text-xs sm:text-sm leading-tight group-hover:text-brand-blue transition line-clamp-3">
                                {{ $related->title }}
                            </h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</article>

@endsection