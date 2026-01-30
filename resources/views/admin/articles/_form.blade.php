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
                    <img src="{{ $article->image }}" alt="Image actuelle" class="w-full h-32 object-cover rounded-lg">
                </div>
            @endif

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
</script>
@endpush
