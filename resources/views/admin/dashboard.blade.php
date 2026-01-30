@extends('admin.layouts.app')

@section('title', 'Tableau de bord')
@section('header', 'Tableau de bord')

@section('content')
    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total articles</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['total'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Publiés</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['published'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Brouillons</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['drafts'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent articles -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Articles récents</h3>
            <a href="{{ route('admin.articles.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors text-sm">
                Nouvel article
            </a>
        </div>

        @if($recentArticles->isEmpty())
            <div class="p-6 text-center text-gray-500">
                Aucun article pour le moment.
            </div>
        @else
            <div class="divide-y divide-gray-200">
                @foreach($recentArticles as $article)
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-gray-800">{{ $article->title }}</h4>
                            <p class="text-sm text-gray-500">
                                <span class="inline-block px-2 py-1 text-xs rounded {{ $article->category_color }} text-white mr-2">
                                    {{ $article->category }}
                                </span>
                                {{ $article->created_at->format('d/m/Y') }}
                                @if(!$article->is_published)
                                    <span class="text-yellow-600 ml-2">(Brouillon)</span>
                                @endif
                            </p>
                        </div>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-brand-blue hover:underline text-sm">
                            Modifier
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
