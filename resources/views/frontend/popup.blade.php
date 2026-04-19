<div id="popupModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-md px-4">
    <div class="relative w-full max-w-md transform animate-zoomIn overflow-hidden rounded-2xl bg-white shadow-2xl">

        <!-- Close Button (Small & Clean) -->
        <button onclick="document.getElementById('popupModal').classList.add('hidden')"
                class="absolute top-3 right-3 z-50 flex h-9 w-9 items-center justify-center rounded-full bg-black/50 text-xl text-white transition-all hover:bg-red-600 hover:scale-110">
            ×
        </button>

        <!-- Clickable Image -->
        <a id="popupLink" href="#" target="_blank" class="block">
            <img id="popupImage" src="" alt="Offer" class="w-full h-auto object-cover">
        </a>

        <!-- Compact Content -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6 text-center">
            <h3 id="popupTitle" class="mb-3 text-lg font-bold text-white md:text-xl">
                Special Offer!
            </h3>
            <a id="popupButton" href="#" target="_blank"
            class="inline-block rounded-full bg-white px-8 py-3 text-sm font-bold text-purple-600 shadow-lg transition-all hover:scale-105 hover:bg-gray-100">
                Shop Now
            </a>
        </div>
    </div>
</div>

<style>
    @keyframes zoomIn {
        from { transform: scale(0.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    .animate-zoomIn { animation: zoomIn 0.5s ease-out forwards; }

    /* Mobile First – Super Responsive */
    @media (max-width: 480px) {
        #popupModal { padding: 1rem; }
        #popupTitle { font-size: 1.1rem !important; }
        #popupButton { padding: 0.75rem 2rem; font-size: 0.875rem; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('popupModal');
        const img = document.getElementById('popupImage');
        const link = document.getElementById('popupLink');
        const button = document.getElementById('popupButton');
        const title = document.getElementById('popupTitle');

        // SHOW EVERY TIME – NO LIMIT
        fetch('/api/popup')
            .then(r => r.json())
            .then(data => {
                if (!data?.image) return;

                img.src = data.image;
                title.textContent = data.title || 'Special Deal!';
                const url = data.url || '#';

                link.href = button.href = url;
                button.textContent = data.button_text || 'Claim Now';

                // Show popup
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });

        // Close on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.add('hidden');
        });
    });
</script>
