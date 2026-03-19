{{-- Chatbot Widget --}}
<div id="chatbot-widget" class="fixed bottom-6 right-6 z-[60]">
    {{-- Bouton flottant --}}
    <button
        id="chatbot-toggle"
        onclick="toggleChatbot()"
        class="w-14 h-14 bg-brand-blue hover:bg-blue-800 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 cursor-pointer"
        title="Discuter avec un conseiller"
    >
        <i class="fas fa-robot text-xl"></i>
    </button>

    {{-- Badge notification --}}
    <span id="chatbot-badge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center animate-bounce">1</span>

    {{-- Fenetre de chat --}}
    <div id="chatbot-window" class="hidden absolute bottom-20 right-0 w-[360px] max-w-[calc(100vw-2rem)] bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col" style="height: 500px;">
        {{-- Header --}}
        <div class="bg-brand-blue text-white px-5 py-4 flex items-center gap-3 flex-shrink-0">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-robot text-lg"></i>
            </div>
            <div class="flex-1">
                <div class="font-bold text-sm">Conseiller GEST'IMMO</div>
                <div class="flex items-center gap-1.5 text-xs text-green-300">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span> En ligne
                </div>
            </div>
            <button onclick="toggleChatbot()" class="text-white/70 hover:text-white transition cursor-pointer">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Messages --}}
        <div id="chatbot-messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50">
            {{-- Message de bienvenue --}}
            <div class="flex gap-2">
                <div class="w-7 h-7 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2.5 shadow-sm max-w-[80%]">
                    <p class="text-sm text-gray-700">Bonjour ! Je suis votre assistant GEST'IMMO. Comment puis-je vous aider ? Investissement, vente, gestion locative... je suis l&agrave; pour r&eacute;pondre &agrave; vos questions.</p>
                </div>
            </div>
        </div>

        {{-- Input --}}
        <div class="border-t border-gray-200 p-3 bg-white flex-shrink-0">
            <form onsubmit="sendChatMessage(event)" class="flex gap-2">
                <input
                    type="text"
                    id="chatbot-input"
                    placeholder="Posez votre question..."
                    class="flex-1 px-4 py-2.5 border border-gray-200 rounded-full text-sm focus:outline-none focus:border-brand-blue focus:ring-1 focus:ring-brand-blue"
                    autocomplete="off"
                    maxlength="1000"
                >
                <button
                    type="submit"
                    id="chatbot-send"
                    class="w-10 h-10 bg-brand-blue text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition flex-shrink-0"
                >
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    let chatHistory = [];
    let chatbotOpen = false;

    function toggleChatbot() {
        const win = document.getElementById('chatbot-window');
        const badge = document.getElementById('chatbot-badge');

        chatbotOpen = !chatbotOpen;
        win.classList.toggle('hidden');

        if (badge) badge.remove();

        if (chatbotOpen) {
            document.getElementById('chatbot-input').focus();
            scrollChat();
        }
    }

    function scrollChat() {
        const container = document.getElementById('chatbot-messages');
        container.scrollTop = container.scrollHeight;
    }

    function addMessage(role, text) {
        const container = document.getElementById('chatbot-messages');

        if (role === 'user') {
            container.innerHTML += `
                <div class="flex justify-end">
                    <div class="bg-brand-blue text-white rounded-2xl rounded-tr-sm px-4 py-2.5 max-w-[80%]">
                        <p class="text-sm">${escapeHtml(text)}</p>
                    </div>
                </div>`;
        } else {
            container.innerHTML += `
                <div class="flex gap-2">
                    <div class="w-7 h-7 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-white text-xs"></i>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2.5 shadow-sm max-w-[80%]">
                        <p class="text-sm text-gray-700">${text}</p>
                    </div>
                </div>`;
        }

        scrollChat();
    }

    function addTypingIndicator() {
        const container = document.getElementById('chatbot-messages');
        container.innerHTML += `
            <div class="flex gap-2" id="typing-indicator">
                <div class="w-7 h-7 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-3 shadow-sm">
                    <div class="flex gap-1">
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0ms"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:150ms"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:300ms"></span>
                    </div>
                </div>
            </div>`;
        scrollChat();
    }

    function removeTypingIndicator() {
        const el = document.getElementById('typing-indicator');
        if (el) el.remove();
    }

    function sendChatMessage(e) {
        e.preventDefault();

        const input = document.getElementById('chatbot-input');
        const sendBtn = document.getElementById('chatbot-send');
        const message = input.value.trim();

        if (!message) return;

        addMessage('user', message);
        input.value = '';
        input.disabled = true;
        sendBtn.disabled = true;

        addTypingIndicator();

        fetch('{{ route("chatbot") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({
                message: message,
                history: chatHistory.slice(-10),
            }),
        })
        .then(res => res.json())
        .then(data => {
            removeTypingIndicator();

            const reply = data.message || 'Désolé, une erreur est survenue.';
            addMessage('assistant', reply);

            chatHistory.push({ role: 'user', content: message });
            chatHistory.push({ role: 'assistant', content: reply });
        })
        .catch(() => {
            removeTypingIndicator();
            addMessage('assistant', 'Connexion perdue. Réessayez ou appelez-nous au <strong>06 49 50 52 50</strong>.');
        })
        .finally(() => {
            input.disabled = false;
            sendBtn.disabled = false;
            input.focus();
        });
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
</script>
