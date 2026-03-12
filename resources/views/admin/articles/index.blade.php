@extends('admin.layouts.app')

@section('title', 'Articles')
@section('header', 'Articles')

@section('content')
    {{-- Filtres --}}
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        <form method="GET" action="{{ route('admin.articles.index') }}" class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-xs font-medium text-gray-500 mb-1">Rechercher</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Titre, contenu..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-blue focus:border-transparent">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Catégorie</label>
                <select name="category" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-blue focus:border-transparent">
                    <option value="">Toutes</option>
                    @foreach($categories as $name => $color)
                        <option value="{{ $name }}" {{ request('category') == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
                <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-blue focus:border-transparent">
                    <option value="">Tous</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Publiés</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Brouillons</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition text-sm">
                    Filtrer
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.articles.index') }}" class="border border-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-50 transition text-sm">
                        Effacer
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Liste --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">
                {{ $articles->total() }} article(s)
            </h3>
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
                Aucun article trouvé.
                <a href="{{ route('admin.articles.create') }}" class="text-brand-blue hover:underline">Créer un article</a>
            </div>
        @else
            <form id="bulk-form" method="POST" action="{{ route('admin.articles.bulk') }}">
                @csrf
                {{-- Barre d'actions en masse --}}
                <div id="bulk-bar" class="hidden px-6 py-3 bg-blue-50 border-b border-blue-200 flex items-center justify-between">
                    <span class="text-sm text-blue-700">
                        <strong id="selected-count">0</strong> article(s) sélectionné(s)
                    </span>
                    <div class="flex gap-2">
                        <button type="submit" name="action" value="publish"
                                class="bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-green-700 transition">
                            Publier
                        </button>
                        <button type="submit" name="action" value="unpublish"
                                class="bg-yellow-500 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-yellow-600 transition">
                            Dépublier
                        </button>
                        <button type="submit" name="action" value="delete"
                                onclick="return confirm('Supprimer les articles sélectionnés ?')"
                                class="bg-red-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-red-700 transition">
                            Supprimer
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">
                                    <input type="checkbox" id="select-all" class="h-4 w-4 text-brand-blue rounded">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SEO</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($articles as $article)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" name="ids[]" value="{{ $article->id }}" class="article-checkbox h-4 w-4 text-brand-blue rounded">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($article->title, 50) }}</div>
                                        <div class="text-xs text-gray-400">{{ $article->author }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-2 py-1 text-xs rounded {{ $article->category_color }} text-white">
                                            {{ $article->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($article->meta_title && $article->meta_description && $article->keywords)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Complet</span>
                                        @elseif($article->meta_title || $article->meta_description || $article->keywords)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Partiel</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Aucun</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($article->is_published)
                                            <span class="inline-block px-2 py-1 text-xs rounded bg-green-100 text-green-800">Publié</span>
                                        @else
                                            <span class="inline-block px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Brouillon</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $article->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('articles.show', $article) }}" target="_blank" class="text-gray-600 hover:text-gray-900">Voir</a>
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-brand-blue hover:underline">Modifier</a>
                                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet article ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="px-6 py-4 border-t border-gray-200">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.article-checkbox');
    const bulkBar = document.getElementById('bulk-bar');
    const selectedCount = document.getElementById('selected-count');

    function updateBulkBar() {
        const checked = document.querySelectorAll('.article-checkbox:checked');
        selectedCount.textContent = checked.length;
        bulkBar.classList.toggle('hidden', checked.length === 0);
    }

    selectAll?.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateBulkBar();
    });

    checkboxes.forEach(cb => cb.addEventListener('change', updateBulkBar));
</script>
@endpush
