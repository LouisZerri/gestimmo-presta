{{-- MODALE "CONNAÎTRE NOS TARIFS" --}}
<div id="tarifs-modal"
    class="fixed inset-0 z-[70] hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative overflow-hidden max-h-[90vh] overflow-y-auto">
        <button onclick="closeTarifsModal()"
            class="absolute top-4 right-4 bg-gray-100 hover:bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center z-50 transition cursor-pointer">
            <i class="fas fa-times"></i>
        </button>

        {{-- Header --}}
        <div class="bg-brand-blue p-6 text-center text-white">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                <i class="fas fa-tag"></i>
            </div>
            <h3 class="font-heading font-bold text-2xl">Connaître nos tarifs</h3>
            <p class="text-blue-100 text-sm mt-1">Recevez notre grille tarifaire personnalisée</p>
        </div>

        <div class="p-6 sm:p-8">
            {{-- Message succès --}}
            <div id="tarifs-success" class="hidden text-center py-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-green-500 text-4xl"></i>
                </div>
                <h4 class="font-heading font-bold text-xl text-gray-800 mb-2">Demande envoyée !</h4>
                <p class="text-gray-600 mb-6">Vous recevrez nos tarifs par email dans les plus brefs délais.</p>
                <button onclick="closeTarifsModal()"
                    class="bg-brand-blue text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-800 transition cursor-pointer">
                    Fermer
                </button>
            </div>

            {{-- Formulaire --}}
            <form id="tarifs-form" class="space-y-4">
                @csrf
                <input type="hidden" name="service" id="tarifs-service" value="">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <input type="text" name="nom" placeholder="Nom *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base">
                    <input type="text" name="prenom" placeholder="Prénom *" required
                        class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition text-sm sm:text-base">
                </div>

                <input type="email" name="email" placeholder="Email *" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                <input type="tel" name="telephone" placeholder="Téléphone *" required
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition">

                <select name="type_service" id="tarifs-type-service"
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition appearance-none cursor-pointer">
                    <option value="">Type de service *</option>
                    <option value="Gestion locative complète">Gestion locative complète</option>
                    <option value="Gestion technique">Gestion technique</option>
                    <option value="Gestion à la carte">Gestion à la carte</option>
                    <option value="Syndic">Syndic</option>
                    <option value="État des lieux">État des lieux</option>
                    <option value="Assurance (GLI/PNO/MRI)">Assurance (GLI/PNO/MRI)</option>
                    <option value="Investissement neuf">Investissement neuf</option>
                    <option value="Viager">Viager</option>
                    <option value="Estimation / Vente">Estimation / Vente</option>
                    <option value="Nourrice locative">Nourrice locative</option>
                    <option value="Autre">Autre</option>
                </select>

                <textarea name="message" rows="3" placeholder="Précisez votre demande (optionnel)"
                    class="w-full p-3 bg-gray-50 rounded-lg border focus:border-brand-blue outline-none transition resize-none"></textarea>

                <p class="text-xs text-gray-400">
                    <i class="fas fa-lock mr-1"></i>
                    Vos données sont protégées. Consultez notre <a href="{{ route('privacy') }}" class="text-brand-blue hover:underline">politique de confidentialité</a>.
                </p>

                <button type="submit" id="tarifs-submit-btn"
                    class="w-full bg-brand-blue text-white font-bold py-4 rounded-lg hover:bg-blue-800 transition shadow-md flex items-center justify-center gap-2 cursor-pointer">
                    <span id="tarifs-btn-text">Recevoir les tarifs</span>
                    <span id="tarifs-btn-loading" class="hidden items-center gap-2">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        Envoi en cours...
                    </span>
                    <i class="fas fa-paper-plane" id="tarifs-btn-icon"></i>
                </button>

                <div id="tarifs-error" class="hidden p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span id="tarifs-error-message"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openTarifsModal(service) {
        const modal = document.getElementById('tarifs-modal');
        const form = document.getElementById('tarifs-form');
        const success = document.getElementById('tarifs-success');
        const error = document.getElementById('tarifs-error');
        const serviceSelect = document.getElementById('tarifs-type-service');

        // Reset
        form.reset();
        form.classList.remove('hidden');
        success.classList.add('hidden');
        error.classList.add('hidden');

        // Pré-sélectionner le service si fourni
        if (service && serviceSelect) {
            for (let option of serviceSelect.options) {
                if (option.value === service) {
                    option.selected = true;
                    break;
                }
            }
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeTarifsModal() {
        document.getElementById('tarifs-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Fermeture au clic extérieur
    document.getElementById('tarifs-modal')?.addEventListener('click', function(e) {
        if (e.target === this) closeTarifsModal();
    });

    // Soumission du formulaire
    document.getElementById('tarifs-form')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const btn = document.getElementById('tarifs-submit-btn');
        const btnText = document.getElementById('tarifs-btn-text');
        const btnLoading = document.getElementById('tarifs-btn-loading');
        const btnIcon = document.getElementById('tarifs-btn-icon');
        const errorDiv = document.getElementById('tarifs-error');

        btn.disabled = true;
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('inline-flex');
        errorDiv.classList.add('hidden');

        try {
            const formData = new FormData(this);

            const response = await fetch('{{ route("tarifs.submit") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                document.getElementById('tarifs-form').classList.add('hidden');
                document.getElementById('tarifs-success').classList.remove('hidden');
            } else {
                document.getElementById('tarifs-error-message').textContent = data.message || 'Une erreur est survenue.';
                errorDiv.classList.remove('hidden');
            }
        } catch (error) {
            document.getElementById('tarifs-error-message').textContent = 'Une erreur est survenue. Veuillez réessayer.';
            errorDiv.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btnText.classList.remove('hidden');
            btnIcon.classList.remove('hidden');
            btnLoading.classList.add('hidden');
            btnLoading.classList.remove('inline-flex');
        }
    });
</script>
