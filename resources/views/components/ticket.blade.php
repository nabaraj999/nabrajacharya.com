<div id="support-widget">
    {{-- Floating Button --}}
    <button id="support-button"
        class="fixed bottom-6 right-6 w-14 h-14 rounded-full shadow-2xl flex items-center justify-center text-white z-[60] transition-all hover:scale-110"
        style="background: linear-gradient(135deg, #6366f1, #a855f7); box-shadow: 0 8px 32px rgba(99,102,241,0.45);"
        title="Support & Tickets">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
    </button>

    {{-- Modal Overlay --}}
    <div id="support-modal-overlay" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[70] hidden items-center justify-center p-4">
        {{-- Modal Content --}}
        <div id="support-modal-content" class="relative w-full max-w-md max-h-[90vh] overflow-hidden flex flex-col rounded-2xl border border-indigo-500/20 shadow-2xl animate-zoomIn"
             style="background: rgba(10,13,26,0.97); backdrop-filter: blur(20px);">

            {{-- Header --}}
            <div class="flex items-center justify-between p-5 border-b border-white/8">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center text-base"
                         style="background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.2)); border: 1px solid rgba(99,102,241,0.3);">
                        💬
                    </div>
                    <div>
                        <h3 class="text-white font-display font-bold text-sm">Support Center</h3>
                        <p class="text-slate-500 text-xs">Chat or raise a ticket</p>
                    </div>
                </div>
                <button id="close-support-modal"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Tabs --}}
            <div class="flex border-b border-white/8">
                <button id="chat-tab"
                    class="support-tab flex-1 py-3 px-4 text-center text-sm font-semibold transition-all border-b-2 border-indigo-500 text-indigo-400">
                    💬 Chat with AI
                </button>
                <button id="ticket-tab"
                    class="support-tab flex-1 py-3 px-4 text-center text-sm font-semibold transition-all border-b-2 border-transparent text-slate-500 hover:text-slate-300">
                    🎫 Raise Ticket
                </button>
            </div>

            {{-- Tab Content --}}
            <div class="flex-1 overflow-y-auto">

                {{-- Chat Tab --}}
                <div id="chat-content" class="p-4 flex flex-col h-full" style="min-height: 340px;">
                    {{-- Messages --}}
                    <div id="chat-messages" class="flex-1 space-y-3 mb-4 overflow-y-auto pr-1" style="max-height: 260px;">
                        <div class="flex items-start gap-2">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-sm flex-shrink-0"
                                 style="background: linear-gradient(135deg, #6366f1, #a855f7);">🤖</div>
                            <div class="rounded-xl p-3 max-w-xs text-sm text-slate-200"
                                 style="background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.2);">
                                Hi! I'm your AI assistant. Ask me about my services, skills, or how I can help your project. 👋
                            </div>
                        </div>
                    </div>

                    {{-- Input --}}
                    <div class="flex gap-2 mt-auto">
                        <textarea id="message-input"
                            class="flex-1 rounded-xl p-3 text-sm text-slate-200 placeholder-slate-600 resize-none transition-all outline-none"
                            style="background: rgba(22,27,39,0.9); border: 1px solid rgba(99,102,241,0.2);"
                            placeholder="Type your question…" rows="2"
                            onfocus="this.style.borderColor='rgba(99,102,241,0.5)'"
                            onblur="this.style.borderColor='rgba(99,102,241,0.2)'"></textarea>
                        <button id="send-message"
                            class="px-4 py-2 rounded-xl text-white text-sm font-semibold self-end transition-all hover:opacity-90"
                            style="background: linear-gradient(135deg, #6366f1, #a855f7);">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Ticket Tab --}}
                <div id="ticket-content" class="p-5 hidden">
                    <div class="mb-5 p-4 rounded-xl" style="background: rgba(99,102,241,0.08); border: 1px solid rgba(99,102,241,0.15);">
                        <p class="text-sm text-slate-300 font-medium mb-1">🎫 Create a Support Ticket</p>
                        <p class="text-xs text-slate-500">Fill in the form below and I'll get back to you within 24 hours.</p>
                    </div>

                    <form id="ticket-form" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5 uppercase tracking-wider">Full Name *</label>
                            <input type="text" name="name"
                                class="w-full rounded-xl p-3 text-sm text-slate-200 placeholder-slate-600 outline-none transition-all"
                                style="background: rgba(22,27,39,0.9); border: 1px solid rgba(99,102,241,0.2);"
                                placeholder="Your name" required
                                onfocus="this.style.borderColor='rgba(99,102,241,0.5)'"
                                onblur="this.style.borderColor='rgba(99,102,241,0.2)'">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5 uppercase tracking-wider">Email Address *</label>
                            <input type="email" name="email"
                                class="w-full rounded-xl p-3 text-sm text-slate-200 placeholder-slate-600 outline-none transition-all"
                                style="background: rgba(22,27,39,0.9); border: 1px solid rgba(99,102,241,0.2);"
                                placeholder="your@email.com" required
                                onfocus="this.style.borderColor='rgba(99,102,241,0.5)'"
                                onblur="this.style.borderColor='rgba(99,102,241,0.2)'">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5 uppercase tracking-wider">Phone</label>
                            <input type="tel" name="phone"
                                class="w-full rounded-xl p-3 text-sm text-slate-200 placeholder-slate-600 outline-none transition-all"
                                style="background: rgba(22,27,39,0.9); border: 1px solid rgba(99,102,241,0.2);"
                                placeholder="+977 000 000 000"
                                onfocus="this.style.borderColor='rgba(99,102,241,0.5)'"
                                onblur="this.style.borderColor='rgba(99,102,241,0.2)'">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5 uppercase tracking-wider">Describe your issue *</label>
                            <textarea name="issue" rows="4"
                                class="w-full rounded-xl p-3 text-sm text-slate-200 placeholder-slate-600 resize-none outline-none transition-all"
                                style="background: rgba(22,27,39,0.9); border: 1px solid rgba(99,102,241,0.2);"
                                placeholder="Describe the problem or project you need help with…" required
                                onfocus="this.style.borderColor='rgba(99,102,241,0.5)'"
                                onblur="this.style.borderColor='rgba(99,102,241,0.2)'"></textarea>
                        </div>

                        <button type="submit" id="ticket-submit-btn"
                            class="w-full py-3 rounded-xl text-white font-bold text-sm transition-all hover:opacity-90 flex items-center justify-center gap-2"
                            style="background: linear-gradient(135deg, #6366f1, #a855f7);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Submit Ticket
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const supportButton   = document.getElementById('support-button');
    const modalOverlay    = document.getElementById('support-modal-overlay');
    const closeBtn        = document.getElementById('close-support-modal');
    const chatTab         = document.getElementById('chat-tab');
    const ticketTab       = document.getElementById('ticket-tab');
    const chatContent     = document.getElementById('chat-content');
    const ticketContent   = document.getElementById('ticket-content');
    const messageInput    = document.getElementById('message-input');
    const sendMessageBtn  = document.getElementById('send-message');
    const ticketForm      = document.getElementById('ticket-form');
    const chatMessages    = document.getElementById('chat-messages');

    function openModal() {
        modalOverlay.classList.remove('hidden');
        modalOverlay.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modalOverlay.classList.add('hidden');
        modalOverlay.classList.remove('flex');
        document.body.style.overflow = '';
    }

    supportButton.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) closeModal();
    });

    function setActiveTab(activeTab, activeContent, inactiveTab, inactiveContent) {
        activeTab.classList.remove('border-transparent', 'text-slate-500');
        activeTab.classList.add('border-indigo-500', 'text-indigo-400');
        inactiveTab.classList.remove('border-indigo-500', 'text-indigo-400');
        inactiveTab.classList.add('border-transparent', 'text-slate-500');
        activeContent.classList.remove('hidden');
        inactiveContent.classList.add('hidden');
    }

    chatTab.addEventListener('click', () => setActiveTab(chatTab, chatContent, ticketTab, ticketContent));
    ticketTab.addEventListener('click', () => setActiveTab(ticketTab, ticketContent, chatTab, chatContent));

    function addMessage(text, sender) {
        const div = document.createElement('div');
        div.className = 'flex items-start gap-2' + (sender === 'user' ? ' justify-end' : '');

        if (sender === 'user') {
            div.innerHTML = `
                <div class="rounded-xl p-3 max-w-xs text-sm text-white" style="background:linear-gradient(135deg,#6366f1,#a855f7);">${text}</div>
                <div class="w-7 h-7 rounded-full bg-slate-700 flex items-center justify-center text-sm flex-shrink-0">👤</div>
            `;
        } else {
            div.innerHTML = `
                <div class="w-7 h-7 rounded-full flex items-center justify-center text-sm flex-shrink-0" style="background:linear-gradient(135deg,#6366f1,#a855f7);">🤖</div>
                <div class="rounded-xl p-3 max-w-xs text-sm text-slate-200" style="background:rgba(99,102,241,0.12);border:1px solid rgba(99,102,241,0.2);">${text}</div>
            `;
        }
        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getAIResponse(message) {
        const msg = message.toLowerCase();
        if (msg.includes('laravel') || msg.includes('php') || msg.includes('backend'))
            return "I specialize in Laravel development — from APIs to full web apps. Let's discuss your project! You can also raise a ticket using the 🎫 tab.";
        if (msg.includes('seo') || msg.includes('rank') || msg.includes('google') || msg.includes('traffic'))
            return "I'm an SEO expert helping businesses rank on Google. I offer technical SEO, on-page optimization, and content strategy. Want to discuss your SEO needs?";
        if (msg.includes('price') || msg.includes('cost') || msg.includes('quote') || msg.includes('rate'))
            return "Project pricing depends on scope and requirements. Please raise a ticket or contact me directly at the Contact page for a custom quote!";
        if (msg.includes('hire') || msg.includes('available') || msg.includes('freelance'))
            return "I'm available for freelance and consulting projects! Head to the Contact page or raise a support ticket with your requirements.";
        if (msg.includes('hello') || msg.includes('hi') || msg.includes('hey'))
            return "Hello! Great to hear from you. How can I help you today? I'm a Full Stack Developer & SEO Expert based in Nepal. 🇳🇵";
        return "Thanks for your message! For detailed inquiries, please use the 🎫 Raise Ticket tab or visit the Contact page. I'll get back to you within 24 hours.";
    }

    function handleSend() {
        const text = messageInput.value.trim();
        if (!text) return;
        addMessage(text, 'user');
        messageInput.value = '';

        const typingDiv = document.createElement('div');
        typingDiv.className = 'flex items-start gap-2';
        typingDiv.innerHTML = `
            <div class="w-7 h-7 rounded-full flex items-center justify-center text-sm" style="background:linear-gradient(135deg,#6366f1,#a855f7);">🤖</div>
            <div class="rounded-xl p-3 text-sm text-slate-400" style="background:rgba(99,102,241,0.08);border:1px solid rgba(99,102,241,0.15);">typing…</div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        setTimeout(() => {
            typingDiv.remove();
            addMessage(getAIResponse(text), 'ai');
        }, 800);
    }

    sendMessageBtn.addEventListener('click', handleSend);
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); handleSend(); }
    });

    ticketForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const btn = document.getElementById('ticket-submit-btn');
        btn.disabled = true;
        btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Submitting…';

        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const formData = new FormData(ticketForm);

        try {
            const res = await fetch('{{ route('tickets.store') }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfMeta ? csrfMeta.content : '', 'Accept': 'application/json' },
                body: formData,
            });

            if (!res.ok) {
                const err = await res.json().catch(() => ({}));
                throw new Error(err.message || `Server error ${res.status}`);
            }

            ticketForm.reset();
            showToast('✅ Ticket submitted! I\'ll reply within 24 hours.', 'success');
            setActiveTab(chatTab, chatContent, ticketTab, ticketContent);
            addMessage("Your ticket has been received! I'll get back to you within 24 hours. 🎉", 'ai');
        } catch (err) {
            showToast('❌ ' + err.message, 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg> Submit Ticket';
        }
    });

    function showToast(message, type) {
        const toast = document.createElement('div');
        const bg = type === 'success' ? 'rgba(16,185,129,0.9)' : 'rgba(239,68,68,0.9)';
        toast.style.cssText = `position:fixed;bottom:90px;right:24px;padding:12px 18px;border-radius:12px;background:${bg};color:white;font-size:.85rem;font-weight:600;z-index:100;box-shadow:0 8px 24px rgba(0,0,0,.3);backdrop-filter:blur(10px);transition:opacity .3s;max-width:280px;`;
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }, 4000);
    }
});
</script>
