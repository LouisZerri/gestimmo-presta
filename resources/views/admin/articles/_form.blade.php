<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main content -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $article->title ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Extrait *</label>
                <textarea
                    name="excerpt"
                    id="excerpt"
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('excerpt') border-red-500 @enderror"
                    required
                >{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
                <textarea
                    name="content"
                    id="content"
                    class="tinymce @error('content') border-red-500 @enderror"
                >{{ old('content', $article->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- SEO -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                SEO
            </h3>

            <div class="mb-4">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Titre SEO</label>
                <input
                    type="text"
                    name="meta_title"
                    id="meta_title"
                    value="{{ old('meta_title', $article->meta_title ?? '') }}"
                    maxlength="60"
                    placeholder="Max 60 caractères"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >
                <p class="mt-1 text-xs text-gray-400">Si vide, le titre de l'article sera utilisé.</p>
            </div>

            <div class="mb-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta description</label>
                <textarea
                    name="meta_description"
                    id="meta_description"
                    rows="2"
                    maxlength="155"
                    placeholder="Max 155 caractères"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >{{ old('meta_description', $article->meta_description ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-400">Si vide, l'extrait sera utilisé.</p>
            </div>

            <div>
                <label for="keywords" class="block text-sm font-medium text-gray-700 mb-2">Mots-clés</label>
                <input
                    type="text"
                    name="keywords"
                    id="keywords"
                    value="{{ old('keywords', $article->keywords ?? '') }}"
                    placeholder="mot-clé 1, mot-clé 2, ..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Publication -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Publication</h3>

            <div class="mb-4">
                <label class="flex items-center">
                    <input
                        type="checkbox"
                        name="is_published"
                        value="1"
                        {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}
                        class="h-4 w-4 text-brand-blue focus:ring-brand-blue border-gray-300 rounded"
                    >
                    <span class="ml-2 text-sm text-gray-700">Publier l'article</span>
                </label>
            </div>

            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Date de publication</label>
                <input
                    type="datetime-local"
                    name="published_at"
                    id="published_at"
                    value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >
            </div>
        </div>

        <!-- Category -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Catégorie</h3>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                <select
                    name="category"
                    id="category"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('category') border-red-500 @enderror"
                    required
                >
                    <option value="">Sélectionner une catégorie</option>
                    @foreach($categories as $name => $color)
                        <option value="{{ $name }}" {{ old('category', $article->category ?? '') == $name ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Author -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Auteur</h3>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'auteur *</label>
                <input
                    type="text"
                    name="author"
                    id="author"
                    value="{{ old('author', $article->author ?? Auth::user()->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent @error('author') border-red-500 @enderror"
                    required
                >
                @error('author')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author_role" class="block text-sm font-medium text-gray-700 mb-2">Rôle de l'auteur</label>
                <input
                    type="text"
                    name="author_role"
                    id="author_role"
                    value="{{ old('author_role', $article->author_role ?? '') }}"
                    placeholder="Ex: Conseiller immobilier"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >
            </div>
        </div>

        <!-- Image -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Image à la une</h3>

            @if(isset($article) && $article->image)
                <div class="mb-4">
                    <img src="{{ $article->image }}" alt="Image actuelle" class="w-full h-32 object-cover rounded-lg" id="current-image">
                </div>
            @else
                <div class="mb-4 hidden" id="ai-image-preview-wrapper">
                    <img src="" alt="Image générée" class="w-full h-32 object-cover rounded-lg" id="ai-image-preview">
                </div>
            @endif

            <div class="space-y-3">
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ isset($article) && $article->image ? 'Changer l\'image' : 'Ajouter une image' }}
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-brand-blue file:text-white hover:file:bg-opacity-90"
                    >
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-gray-200 pt-3">
                    <input type="hidden" name="ai_image" id="ai_image_input" value="">
                    <button
                        type="button"
                        id="generate-ai-image-btn"
                        onclick="generateAiImage()"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm font-medium"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Générer avec IA
                    </button>
                    <p class="mt-1 text-xs text-gray-400 text-center">Génère une image via DALL-E basée sur le titre</p>
                    <div id="ai-image-loading" class="hidden mt-2 text-center">
                        <div class="inline-flex items-center gap-2 text-sm text-purple-600">
                            <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Génération en cours...
                        </div>
                    </div>
                    <div id="ai-image-error" class="hidden mt-2 text-sm text-red-600 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce',
        plugins: 'anchor autolink charmap codesample image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | removeformat',
        height: 500,
        promotion: false,
        branding: false,
        images_upload_handler: function(blobInfo, progress) {
            return new Promise(function(resolve, reject) {
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = true;
                xhr.open('POST', '{{ route("admin.upload.image") }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

                xhr.upload.onprogress = function(e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                        return;
                    }
                    var json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location !== 'string') {
                        reject({ message: 'Invalid JSON: ' + xhr.responseText, remove: true });
                        return;
                    }
                    resolve(json.location);
                };

                xhr.onerror = function() {
                    reject({ message: 'Upload failed', remove: true });
                };

                var formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            });
        },
        automatic_uploads: true,
        images_reuse_filename: true,
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 16px; line-height: 1.6; }'
    });

    function generateAiImage() {
        const title = document.getElementById('title').value;
        if (!title) {
            alert('Veuillez d\'abord saisir un titre pour l\'article.');
            return;
        }

        const btn = document.getElementById('generate-ai-image-btn');
        const loading = document.getElementById('ai-image-loading');
        const errorDiv = document.getElementById('ai-image-error');

        btn.disabled = true;
        btn.classList.add('opacity-50', 'cursor-not-allowed');
        loading.classList.remove('hidden');
        errorDiv.classList.add('hidden');

        fetch('{{ route("admin.articles.generate-image") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ title: title }),
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('ai_image_input').value = data.image_url;

                // Mettre à jour l'aperçu
                const currentImg = document.getElementById('current-image');
                const previewWrapper = document.getElementById('ai-image-preview-wrapper');
                const previewImg = document.getElementById('ai-image-preview');

                if (currentImg) {
                    currentImg.src = data.image_url;
                } else if (previewWrapper && previewImg) {
                    previewImg.src = data.image_url;
                    previewWrapper.classList.remove('hidden');
                }
            } else {
                errorDiv.textContent = data.error || 'Erreur lors de la génération.';
                errorDiv.classList.remove('hidden');
            }
        })
        .catch(() => {
            errorDiv.textContent = 'Erreur de connexion.';
            errorDiv.classList.remove('hidden');
        })
        .finally(() => {
            btn.disabled = false;
            btn.classList.remove('opacity-50', 'cursor-not-allowed');
            loading.classList.add('hidden');
        });
    }
</script>
@endpush
