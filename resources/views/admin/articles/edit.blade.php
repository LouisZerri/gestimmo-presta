@extends('admin.layouts.app')

@section('title', 'Modifier l\'article')
@section('header', 'Modifier l\'article')

@section('content')
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.articles._form')

        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-brand-blue text-white rounded-lg hover:bg-opacity-90 transition-colors">
                Mettre à jour
            </button>
        </div>
    </form>

    <div class="mt-6 pt-6 border-t border-gray-200">
        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                Supprimer cet article
            </button>
        </form>
    </div>
@endsection
