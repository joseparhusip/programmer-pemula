<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProgrammerPemula - Jasa Website & Aplikasi</title>

    {{-- [OPTIMASI] Memindahkan Google Fonts dari CSS ke sini untuk loading non-blocking yang lebih cepat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- CATATAN PRODUKSI: Pastikan semua file CSS ini sudah di-minify (diperkecil) --}}
    <link rel="stylesheet" href="{{ asset('css/style-global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-popup.css') }}">
    
    @stack('styles')
</head>
<body>

    <div id="preloader">
        <div class="spinner"></div>
    </div>
    
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Memanggil semua partials popup --}}
    @include('partials.popup-form')
    @include('partials.popup-iklan')
    
    {{-- Menghapus Tombol WhatsApp lama agar tidak duplikat --}}
    
    {{-- ======================= START: FLOATING ACTION BUTTON ======================= --}}
    <div class="floating-action-button">
        <div class="fab-main-button" id="fabMainButton" aria-label="Open social links">
            <svg class="icon-plus" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </div>
        <div class="fab-options">
            <a href="https://wa.me/6281292690095?text=Halo%2C%20saya%20tertarik%20dengan%20jasa%20Anda." target="_blank" class="fab-option fab-whatsapp" aria-label="Chat on WhatsApp">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg>
            </a>
            {{-- PERUBAHAN DI SINI: Ikon SVG Instagram diganti dengan yang benar --}}
            <a href="https://www.instagram.com/joseparhusip_/" target="_blank" class="fab-option fab-instagram" aria-label="Follow on Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163m0-1.646C8.74 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.74 0 12s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.74 24 12 24s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98C23.986 15.667 24 15.26 24 12s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98C15.667.014 15.26 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/>
                </svg>
            </a>
            <button class="fab-option fab-share" id="fabShareButton" aria-label="Share this page">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg>
            </button>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fabMainButton = document.getElementById('fabMainButton');
            const fabOptions = document.querySelector('.fab-options');
            const fabShareButton = document.getElementById('fabShareButton');
            
            // Toggle menu on main button click
            fabMainButton.addEventListener('click', function(event) {
                event.stopPropagation();
                this.parentElement.classList.toggle('active');
            });
    
            // Close menu when clicking anywhere else
            document.addEventListener('click', function(event) {
                const fab = document.querySelector('.floating-action-button');
                if (fab.classList.contains('active') && !fab.contains(event.target)) {
                    fab.classList.remove('active');
                }
            });
    
            // Share button functionality
            fabShareButton.addEventListener('click', function() {
                if (navigator.share) {
                    navigator.share({
                        title: document.title,
                        text: 'Check out this website!',
                        url: window.location.href,
                    })
                    .then(() => console.log('Successful share'))
                    .catch((error) => console.log('Error sharing', error));
                } else {
                    // Fallback for browsers that do not support navigator.share
                    alert('Sharing is not supported on this browser. You can manually copy the link: ' + window.location.href);
                }
            });
        });
    </script>
    {{-- ======================== END: FLOATING ACTION BUTTON ======================== --}}

    {{-- CATATAN PRODUKSI: Pastikan file JS ini sudah di-minify dan digabung (jika ada lebih dari satu) --}}
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')

</body>
</html>