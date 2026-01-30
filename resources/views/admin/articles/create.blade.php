@extends('admin.layouts.app')

@section('title', 'Nouvel article')
@section('header', 'Nouvel article')

@section('content')
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.articles._form')

        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-brand-blue text-white rounded-lg hover:bg-opacity-90 transition-colors">
                Créer l'article
            </button>
        </div>
    </form>
@endsection
