@extends('admin.layouts.app')

@section('title', 'Générer un article avec l\'IA')
@section('header', 'Générer un article avec l\'IA')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Formulaire de génération -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Paramètres de génération</h3>

            <form id="ai-form">
                <div class="mb-4">
                    <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">
                        Sujet de l'article *
                    </label>
                    <textarea
                        name="topic"
                        id="topic"
                        rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                        placeholder="Ex: Les nouvelles tendances du marché immobilier en 2025, Comment bien préparer son bien pour la vente, Les avantages fiscaux de l'investissement locatif..."
                        required
                    ></textarea>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                        Catégorie *
                    </label>
                    <select
                        name="category"
                        id="category"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                        required
                    >
                        @foreach($categories as $name => $color)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tone" class="block text-sm font-medium text-gray-700 mb-2">
                        Ton de l'article *
                    </label>
                    <select
                        name="tone"
                        id="tone"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                        required
                    >
                        <option value="accessible">Accessible (grand public)</option>
                        <option value="professionnel">Professionnel (agents immobiliers)</option>
                        <option value="expert">Expert (termes techniques)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="include_trends"
                            id="include_trends"
                            value="1"
                            checked
                            class="h-4 w-4 text-brand-blue focus:ring-brand-blue border-gray-300 rounded"
                        >
                        <span class="ml-2 text-sm text-gray-700">
                            Inclure les tendances actuelles du marché
                        </span>
                    </label>
                    <p class="mt-1 text-xs text-gray-500">
                        L'IA inclura des informations sur les taux, prix et actualités récentes.
                    </p>
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="generate_image"
                            id="generate_image"
                            value="1"
                            checked
                            class="h-4 w-4 text-brand-blue focus:ring-brand-blue border-gray-300 rounded"
                        >
                        <span class="ml-2 text-sm text-gray-700">
                            Générer une image avec DALL-E
                        </span>
                    </label>
                    <p class="mt-1 text-xs text-gray-500">
                        L'IA créera une image professionnelle en rapport avec l'article.
                    </p>
                </div>

                <button
                    type="submit"
                    id="generate-btn"
                    class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 px-4 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all font-medium flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span id="btn-text">Générer l'article</span>
                </button>
            </form>
        </div>

        <!-- Prévisualisation -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Prévisualisation</h3>

            <div id="preview-placeholder" class="text-center py-12 text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
                <p>L'article généré apparaîtra ici</p>
            </div>

            <div id="preview-content" class="hidden">
                <!-- Image générée -->
                <div id="preview-image-container" class="mb-4 hidden">
                    <img id="preview-image" src="" alt="Image générée" class="w-full h-48 object-cover rounded-lg">
                </div>

                <div id="preview-image-error" class="mb-4 hidden p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-700" id="image-error-message"></p>
                </div>

                <div class="mb-4">
                    <span id="preview-category" class="inline-block px-3 py-1 text-xs rounded text-white mb-2"></span>
                    <h2 id="preview-title" class="text-xl font-bold text-gray-900"></h2>
                </div>

                <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 italic" id="preview-excerpt"></p>
                </div>

                <div id="preview-body" class="prose prose-sm max-w-none max-h-96 overflow-y-auto"></div>

                <div class="mt-6 pt-4 border-t border-gray-200 flex justify-end space-x-4">
                    <button
                        type="button"
                        id="regenerate-btn"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                    >
                        Regénérer
                    </button>
                    <button
                        type="button"
                        id="use-article-btn"
                        class="px-4 py-2 bg-brand-blue text-white rounded-lg hover:bg-opacity-90 transition-colors"
                    >
                        Utiliser cet article
                    </button>
                </div>
            </div>

            <div id="preview-loading" class="hidden text-center py-12">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-brand-blue"></div>
                <p class="mt-4 text-gray-600" id="loading-text">Génération en cours...</p>
                <p class="text-sm text-gray-400" id="loading-subtext">Cela peut prendre quelques secondes</p>
            </div>

            <div id="preview-error" class="hidden text-center py-12">
                <svg class="w-16 h-16 mx-auto mb-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-red-600" id="error-message"></p>
            </div>
        </div>
    </div>

    <!-- Formulaire caché pour soumettre l'article -->
    <form id="create-article-form" action="{{ route('admin.articles.store') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="title" id="form-title">
        <input type="hidden" name="excerpt" id="form-excerpt">
        <input type="hidden" name="content" id="form-content">
        <input type="hidden" name="category" id="form-category">
        <input type="hidden" name="ai_image" id="form-image">
        <input type="hidden" name="author" value="{{ Auth::user()->name }}">
        <input type="hidden" name="is_published" value="0">
    </form>
@endsection

@push('styles')
<style>
    .prose h2 { font-size: 1.25rem; font-weight: 600; margin-top: 1.5rem; margin-bottom: 0.75rem; }
    .prose h3 { font-size: 1.1rem; font-weight: 600; margin-top: 1.25rem; margin-bottom: 0.5rem; }
    .prose p { margin-bottom: 1rem; line-height: 1.7; }
    .prose ul, .prose ol { margin-bottom: 1rem; padding-left: 1.5rem; }
    .prose li { margin-bottom: 0.5rem; }
</style>
@endpush

@push('scripts')
<script>
    const form = document.getElementById('ai-form');
    const generateBtn = document.getElementById('generate-btn');
    const btnText = document.getElementById('btn-text');
    const previewPlaceholder = document.getElementById('preview-placeholder');
    const previewContent = document.getElementById('preview-content');
    const previewLoading = document.getElementById('preview-loading');
    const previewError = document.getElementById('preview-error');
    const loadingText = document.getElementById('loading-text');
    const loadingSubtext = document.getElementById('loading-subtext');

    let generatedData = null;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        await generateArticle();
    });

    document.getElementById('regenerate-btn').addEventListener('click', async function() {
        await generateArticle();
    });

    document.getElementById('use-article-btn').addEventListener('click', function() {
        if (generatedData) {
            document.getElementById('form-title').value = generatedData.title;
            document.getElementById('form-excerpt').value = generatedData.excerpt;
            document.getElementById('form-content').value = generatedData.content;
            document.getElementById('form-category').value = generatedData.category;
            document.getElementById('form-image').value = generatedData.image || '';
            document.getElementById('create-article-form').submit();
        }
    });

    async function generateArticle() {
        const generateImage = document.getElementById('generate_image').checked;

        // Show loading
        previewPlaceholder.classList.add('hidden');
        previewContent.classList.add('hidden');
        previewError.classList.add('hidden');
        previewLoading.classList.remove('hidden');

        if (generateImage) {
            loadingText.textContent = 'Génération du texte et de l\'image...';
            loadingSubtext.textContent = 'Cela peut prendre 30 secondes à 1 minute';
        } else {
            loadingText.textContent = 'Génération en cours...';
            loadingSubtext.textContent = 'Cela peut prendre quelques secondes';
        }

        generateBtn.disabled = true;
        btnText.textContent = 'Génération...';

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route("admin.articles.ai.generate") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    topic: formData.get('topic'),
                    category: formData.get('category'),
                    tone: formData.get('tone'),
                    include_trends: formData.get('include_trends') === '1',
                    generate_image: generateImage,
                }),
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Erreur lors de la génération');
            }

            generatedData = data;

            // Show preview
            document.getElementById('preview-category').textContent = data.category;
            document.getElementById('preview-category').className = `inline-block px-3 py-1 text-xs rounded text-white mb-2 ${data.category_color}`;
            document.getElementById('preview-title').textContent = data.title;
            document.getElementById('preview-excerpt').textContent = data.excerpt;
            document.getElementById('preview-body').innerHTML = data.content;

            // Handle image
            const imageContainer = document.getElementById('preview-image-container');
            const imageErrorContainer = document.getElementById('preview-image-error');

            if (data.image) {
                document.getElementById('preview-image').src = data.image;
                imageContainer.classList.remove('hidden');
                imageErrorContainer.classList.add('hidden');
            } else {
                imageContainer.classList.add('hidden');
                if (data.image_error) {
                    document.getElementById('image-error-message').textContent = data.image_error;
                    imageErrorContainer.classList.remove('hidden');
                } else {
                    imageErrorContainer.classList.add('hidden');
                }
            }

            previewLoading.classList.add('hidden');
            previewContent.classList.remove('hidden');

        } catch (error) {
            document.getElementById('error-message').textContent = error.message;
            previewLoading.classList.add('hidden');
            previewError.classList.remove('hidden');
        } finally {
            generateBtn.disabled = false;
            btnText.textContent = 'Générer l\'article';
        }
    }
</script>
@endpush
