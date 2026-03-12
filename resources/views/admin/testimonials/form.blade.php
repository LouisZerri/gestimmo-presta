@extends('admin.layouts.app')

@section('title', isset($testimonial) ? 'Modifier l\'avis' : 'Ajouter un avis')
@section('header', isset($testimonial) ? 'Modifier l\'avis' : 'Ajouter un avis')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.testimonials.index') }}" class="text-brand-blue hover:underline text-sm mb-6 inline-flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Retour aux avis
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6 mt-4">
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
              class="space-y-5">
            @csrf
            @if(isset($testimonial))
                @method('PUT')
            @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name ?? '') }}" required
                           class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Localisation *</label>
                    <input type="text" name="location" value="{{ old('location', $testimonial->location ?? '') }}" required
                           placeholder="Ex: Vendeur à Lyon (69)"
                           class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Avis *</label>
                <textarea name="content" rows="4" required
                          class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition resize-none"
                          id="content-field">{{ old('content', $testimonial->content ?? '') }}</textarea>

                @if(isset($testimonial) && $testimonial->original_content)
                    <div class="mt-2 p-3 bg-amber-50 rounded-lg border border-amber-200">
                        <p class="text-xs font-medium text-amber-700 mb-1">Texte original (avant reformulation IA) :</p>
                        <p class="text-sm text-amber-600 italic">{{ $testimonial->original_content }}</p>
                        <button type="button" onclick="restoreOriginal('{{ addslashes($testimonial->original_content) }}')"
                                class="mt-2 text-xs text-amber-700 hover:underline font-medium">
                            Restaurer l'original
                        </button>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Note *</label>
                    <select name="rating" class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ str_repeat('★', $i) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Page *</label>
                    <select name="page" class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition">
                        @foreach($pages as $key => $label)
                            <option value="{{ $key }}" {{ old('page', $testimonial->page ?? 'home') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ordre</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                           class="w-full p-3 border rounded-lg focus:border-brand-blue outline-none transition">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1" id="is_published"
                       {{ old('is_published', $testimonial->is_published ?? true) ? 'checked' : '' }}
                       class="w-4 h-4 text-brand-blue rounded">
                <label for="is_published" class="text-sm text-gray-700">Publié</label>
            </div>

            <div class="flex gap-3 pt-4 border-t">
                <button type="submit"
                        class="bg-brand-blue text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition font-medium">
                    {{ isset($testimonial) ? 'Mettre à jour' : 'Ajouter' }}
                </button>
                <a href="{{ route('admin.testimonials.index') }}"
                   class="px-6 py-3 border rounded-lg hover:bg-gray-50 transition text-gray-600">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function restoreOriginal(text) {
    if (confirm('Restaurer le texte original ?')) {
        document.getElementById('content-field').value = text;
    }
}
</script>
@endpush
