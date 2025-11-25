@extends('layouts.app')

@section('title', 'Contactez-nous | GEST\'IMMO')

@section('content')
<div class="min-h-screen bg-gray-50 py-16">
    <!-- Header Page Contact -->
    <div class="text-center mb-16 px-4">
        <span class="text-brand-blue font-bold uppercase tracking-widest text-xs">Contact</span>
        <h1 class="font-heading font-extrabold text-3xl md:text-5xl text-gray-900 mt-2">Contactez-nous</h1>
        <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Choisissez le motif de votre demande pour être dirigé vers le bon interlocuteur.</p>
    </div>

    @if(session('success'))
    <div class="max-w-6xl mx-auto px-4 mb-8">
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 flex items-start gap-4 animate-fade-in-up">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-green-800 text-lg mb-1">Demande envoyée avec succès !</h4>
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-6xl mx-auto px-4 mb-8">
        <div class="bg-red-50 border border-red-200 rounded-xl p-6 flex items-start gap-4">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-red-800 text-lg mb-1">Une erreur est survenue</h4>
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- HUB DE CHOIX (Style iadfrance.fr) -->
    <div id="contact-hub" class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-8">
        
        <!-- Carte 1 : Projet Immo -->
        <div class="bg-white rounded-2xl shadow-card hover:shadow-hover transition duration-300 p-8 flex flex-col items-center text-center group border-t-4 border-brand-blue">
            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue text-3xl mb-6 group-hover:bg-brand-blue group-hover:text-white transition">
                <i class="fas fa-home"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-800 mb-3">J'ai un projet immobilier</h3>
            <p class="text-gray-500 text-sm mb-8 leading-relaxed">Vous souhaitez vendre, acheter, louer ou faire gérer un bien ? Trouvez un conseiller près de chez vous.</p>
            <a href="{{ route('advisors') }}" class="mt-auto bg-white border-2 border-brand-blue text-brand-blue px-6 py-3 rounded-full font-bold hover:bg-brand-blue hover:text-white transition w-full">
                Trouver un conseiller
            </a>
        </div>

        <!-- Carte 2 : Recrutement -->
        <div class="bg-white rounded-2xl shadow-card hover:shadow-hover transition duration-300 p-8 flex flex-col items-center text-center group border-t-4 border-brand-accent">
            <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center text-brand-accent text-3xl mb-6 group-hover:bg-brand-accent group-hover:text-white transition">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-800 mb-3">Je souhaite rejoindre GEST'IMMO</h3>
            <p class="text-gray-500 text-sm mb-8 leading-relaxed">Vous envisagez une reconversion ou souhaitez booster votre carrière dans l'immobilier ?</p>
            <a href="{{ route('join') }}" class="mt-auto bg-white border-2 border-brand-accent text-brand-accent px-6 py-3 rounded-full font-bold hover:bg-brand-accent hover:text-white transition w-full">
                En savoir plus
            </a>
        </div>

        <!-- Carte 3 : Support / Autre (Ouvre le ticket form) -->
        <div class="bg-white rounded-2xl shadow-card hover:shadow-hover transition duration-300 p-8 flex flex-col items-center text-center group border-t-4 border-gray-800">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-gray-800 text-3xl mb-6 group-hover:bg-gray-800 group-hover:text-white transition">
                <i class="fas fa-headset"></i>
            </div>
            <h3 class="font-heading font-bold text-xl text-gray-800 mb-3">Support & Autres demandes</h3>
            <p class="text-gray-500 text-sm mb-8 leading-relaxed">Une question administrative, un problème technique ou un partenariat ? Envoyez-nous une demande.</p>
            <button onclick="showContactForm()" class="mt-auto bg-white border-2 border-gray-800 text-gray-800 px-6 py-3 rounded-full font-bold hover:bg-gray-800 hover:text-white transition w-full">
                Envoyer une demande
            </button>
        </div>
    </div>

    <!-- FORMULAIRE TICKET (Style Zendesk) - Caché par défaut -->
    <div id="contact-ticket-form" class="hidden max-w-3xl mx-auto px-4 mt-8" style="{{ $errors->any() ? 'display: block;' : '' }}">
        <button onclick="hideContactForm()" class="mb-6 flex items-center text-gray-500 hover:text-brand-blue font-bold text-sm transition">
            <i class="fas fa-arrow-left mr-2"></i> Retour aux choix
        </button>
        
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
                <h2 class="font-heading font-bold text-xl text-gray-800">Envoyer une demande</h2>
                <p class="text-sm text-gray-500 mt-1">Notre équipe support vous répond sous 24h ouvrées.</p>
            </div>

            @if($errors->any())
                <div class="mx-8 mt-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-circle text-red-600"></i>
                        <h4 class="font-bold text-red-800">Veuillez corriger les erreurs suivantes :</h4>
                    </div>
                    <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6" id="contact-form">
                @csrf
                
                <!-- Type de demande (Select Zendesk style) -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Choisissez votre type de demande <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="type" required class="block w-full pl-4 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-brand-blue focus:border-brand-blue sm:text-sm rounded-lg border bg-white appearance-none cursor-pointer @error('type') border-red-500 @enderror">
                            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Sélectionnez un motif...</option>
                            <option value="Question sur mon Espace Client" {{ old('type') == 'Question sur mon Espace Client' ? 'selected' : '' }}>Question sur mon Espace Client</option>
                            <option value="Problème technique (Site/App)" {{ old('type') == 'Problème technique (Site/App)' ? 'selected' : '' }}>Problème technique (Site/App)</option>
                            <option value="Réclamation qualité" {{ old('type') == 'Réclamation qualité' ? 'selected' : '' }}>Réclamation qualité</option>
                            <option value="Demande Presse / Partenariat" {{ old('type') == 'Demande Presse / Partenariat' ? 'selected' : '' }}>Demande Presse / Partenariat</option>
                            <option value="Données personnelles (RGPD)" {{ old('type') == 'Données personnelles (RGPD)' ? 'selected' : '' }}>Données personnelles (RGPD)</option>
                            <option value="Autre question" {{ old('type') == 'Autre question' ? 'selected' : '' }}>Autre question</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Votre adresse email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-brand-blue focus:border-brand-blue @error('email') border-red-500 @enderror" placeholder="exemple@email.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sujet -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Sujet <span class="text-red-500">*</span></label>
                    <input type="text" name="subject" value="{{ old('subject') }}" required class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-brand-blue focus:border-brand-blue @error('subject') border-red-500 @enderror" placeholder="Objet de votre demande">
                    @error('subject')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <p class="text-xs text-gray-400 mb-2">Veuillez saisir les détails de votre demande. Un membre de notre équipe d'assistance répondra dans les plus brefs délais.</p>
                    <textarea name="description" rows="6" required class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-brand-blue focus:border-brand-blue resize-none @error('description') border-red-500 @enderror" placeholder="Décrivez votre demande en détail...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pièces jointes -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pièces jointes (optionnel)</label>
                    <p class="text-xs text-gray-400 mb-2">Maximum 3 fichiers, 10 MB chacun. Formats acceptés : JPG, PNG, PDF, DOC, DOCX</p>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition cursor-pointer" id="file-drop-zone">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-brand-blue hover:text-blue-500 focus-within:outline-none">
                                    <span>Télécharger un fichier</span>
                                    <input id="file-upload" name="attachments[]" type="file" class="sr-only" multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" onchange="handleFiles(this.files)">
                                </label>
                                <p class="pl-1">ou glisser-déposer</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, PDF, DOC, DOCX jusqu'à 10MB</p>
                        </div>
                    </div>
                    
                    <!-- Liste des fichiers sélectionnés -->
                    <div id="file-list" class="mt-3 space-y-2"></div>
                    
                    @error('attachments.*')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <p class="text-xs text-gray-400">
                    <i class="fas fa-lock mr-1"></i> 
                    Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
                </p>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit" id="submit-btn" class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span id="btn-text">Envoyer</span>
                        <span id="btn-loading" class="hidden items-center gap-2">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            Envoi en cours...
                        </span>
                        <i class="fas fa-paper-plane" id="btn-icon"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function showContactForm() {
        document.getElementById('contact-hub').style.display = 'none';
        document.getElementById('contact-ticket-form').style.display = 'block';
        document.getElementById('contact-ticket-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function hideContactForm() {
        document.getElementById('contact-ticket-form').style.display = 'none';
        document.getElementById('contact-hub').style.display = 'grid';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Gestion des fichiers
    let selectedFiles = [];
    const maxFiles = 3;
    const maxSize = 10 * 1024 * 1024; // 10 MB

    function handleFiles(files) {
        const fileArray = Array.from(files);
        
        // Vérifier le nombre de fichiers
        if (selectedFiles.length + fileArray.length > maxFiles) {
            alert(`Vous ne pouvez télécharger que ${maxFiles} fichiers maximum.`);
            return;
        }

        fileArray.forEach(file => {
            // Vérifier la taille
            if (file.size > maxSize) {
                alert(`Le fichier "${file.name}" dépasse 10 MB.`);
                return;
            }

            // Vérifier le type
            const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            if (!allowedTypes.includes(file.type)) {
                alert(`Le fichier "${file.name}" n'est pas au bon format.`);
                return;
            }

            selectedFiles.push(file);
        });

        updateFileList();
    }

    function updateFileList() {
        const fileList = document.getElementById('file-list');
        fileList.innerHTML = '';

        if (selectedFiles.length === 0) {
            return;
        }

        selectedFiles.forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200';
            
            const icon = getFileIcon(file.type);
            
            fileItem.innerHTML = `
                <div class="flex items-center gap-3 flex-1">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-xl">
                        ${icon}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-sm text-gray-800 truncate">${file.name}</div>
                        <div class="text-xs text-gray-500">${formatFileSize(file.size)}</div>
                    </div>
                </div>
                <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700 ml-2">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            fileList.appendChild(fileItem);
        });
    }

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        updateFileList();
        
        // Réinitialiser l'input file
        const fileInput = document.getElementById('file-upload');
        fileInput.value = '';
    }

    function getFileIcon(type) {
        if (type.includes('image')) return '🖼️';
        if (type.includes('pdf')) return '📄';
        if (type.includes('word')) return '📝';
        return '📎';
    }

    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    // Drag & Drop
    const dropZone = document.getElementById('file-drop-zone');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-brand-blue', 'bg-blue-50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-brand-blue', 'bg-blue-50');
        }, false);
    });

    dropZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }, false);

    // Gestion du formulaire - loading state
    document.getElementById('contact-form')?.addEventListener('submit', function(e) {
        const btn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnLoading = document.getElementById('btn-loading');
        const btnIcon = document.getElementById('btn-icon');
        
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('inline-flex');

        // Ajouter les fichiers au formulaire
        const fileInput = document.getElementById('file-upload');
        const dataTransfer = new DataTransfer();
        
        selectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        
        fileInput.files = dataTransfer.files;
    });

    // Si erreurs de validation, afficher le formulaire automatiquement
    @if($errors->any())
        showContactForm();
    @endif

    // Si succès, scroll vers le haut après 3 secondes
    @if(session('success'))
        setTimeout(function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }, 3000);
    @endif
</script>
@endpush