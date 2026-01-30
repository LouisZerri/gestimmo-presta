@extends('admin.layouts.app')

@section('title', 'Articles')
@section('header', 'Articles')

@section('content')
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Liste des articles</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.articles.ai.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Générer avec IA
                </a>
                <a href="{{ route('admin.articles.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors text-sm">
                    Nouvel article
                </a>
            </div>
        </div>

        @if($articles->isEmpty())
            <div class="p-6 text-center text-gray-500">
                Aucun article pour le moment.
                <a href="{{ route('admin.articles.create') }}" class="text-brand-blue hover:underline">Créer le premier article</a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($articles as $article)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($article->title, 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2 py-1 text-xs rounded {{ $article->category_color }} text-white">
                                        {{ $article->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $article->author }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($article->is_published)
                                        <span class="inline-block px-2 py-1 text-xs rounded bg-green-100 text-green-800">
                                            Publié
                                        </span>
                                    @else
                                        <span class="inline-block px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">
                                            Brouillon
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $article->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('articles.show', $article) }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                        Voir
                                    </a>
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-brand-blue hover:underline">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection
