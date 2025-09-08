<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProgrammerPemula - Jasa Website & Aplikasi</title>
    
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

    @include('partials.popup-form')

    @include('partials.popup-iklan') {{-- BARU: Menambahkan pop-up iklan --}}
    
    <a href="https://wa.me/6281292690095?text=Halo%2C%20saya%20ingin%20bertanya.%0A%0ANama%3A%20%0AMau%20Joki%20Apa%3A%20%0ARequest%20Lain%3A%20" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat di WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
    </a>

    <script>
    // --- SCRIPT UTAMA UNTUK MENGELOLA SEMUA FUNGSI ---
    // Deklarasikan variabel yang digunakan di beberapa tempat di luar scope event listener
    const bodyElement = document.body;
    
    // --- SCRIPT UNTUK PRELOADER ---
    const preloader = document.getElementById('preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('preloader-hidden');
            // Hapus elemen dari DOM setelah transisi selesai agar tidak mengganggu
            setTimeout(() => {
                preloader.style.display = 'none';
                
                // BARU: Tampilkan pop-up iklan setelah preloader hilang
                const iklanPopup = document.getElementById('iklanPopup');
                if (iklanPopup) {
                    iklanPopup.classList.add('active');
                    bodyElement.classList.add('body-no-scroll');
                }
            }, 750); // Sesuaikan dengan durasi transisi di CSS
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        
        // --- SCRIPT UNTUK NAVBAR HAMBURGER ---
        const navbar = document.querySelector('.navbar');
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navLinks = document.querySelectorAll('.nav-link');

        if (navbarToggler) {
            navbarToggler.addEventListener('click', () => {
                navbar.classList.toggle('active');
            });
        }
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbar.classList.contains('active')) {
                    navbar.classList.remove('active');
                }
            });
        });

        // --- SCRIPT UNTUK CAROUSEL BAWAAN ---
        const carousel = document.querySelector('.carousel');
        if (carousel) {
            const inner = carousel.querySelector('.carousel-inner');
            const items = carousel.querySelectorAll('.carousel-item');
            const prevBtn = carousel.querySelector('.carousel-control.prev');
            const nextBtn = carousel.querySelector('.carousel-control.next');
            const indicatorsContainer = carousel.querySelector('.carousel-indicators');
            
            let currentIndex = 0;
            const totalItems = items.length;

            if (totalItems > 1) { 
                for (let i = 0; i < totalItems; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('indicator-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => {
                        goToSlide(i);
                        resetAutoPlay();
                    });
                    indicatorsContainer.appendChild(dot);
                }

                const indicators = indicatorsContainer.querySelectorAll('.indicator-dot');

                function updateCarousel() {
                    inner.style.transform = `translateX(-${currentIndex * 100}%)`;
                    indicators.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }

                function goToSlide(index) {
                    currentIndex = index;
                    updateCarousel();
                }
                
                let autoPlayInterval = setInterval(() => {
                    currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                    updateCarousel();
                }, 5000); 

                function resetAutoPlay() {
                    clearInterval(autoPlayInterval);
                    autoPlayInterval = setInterval(() => {
                        currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                        updateCarousel();
                    }, 5000);
                }

                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalItems - 1;
                    updateCarousel();
                    resetAutoPlay();
                });

                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                    updateCarousel();
                    resetAutoPlay();
                });
            }
        }
        
        // --- SCRIPT UNTUK POPUP FORM & POPUP SUKSES ---
        const popupOverlay = document.getElementById('popupForm');
        const openPopupBtn = document.getElementById('btnPesanJasa');
        const closePopupBtn = document.getElementById('closePopupBtn');
        
        function openPopup() {
            if(popupOverlay) {
                popupOverlay.classList.add('active');
                bodyElement.classList.add('body-no-scroll');
            }
        }

        function closePopup() {
            if(popupOverlay) {
                popupOverlay.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll');
            }
        }

        if (popupOverlay && openPopupBtn && closePopupBtn) {
            openPopupBtn.addEventListener('click', openPopup);
            closePopupBtn.addEventListener('click', closePopup);
            popupOverlay.addEventListener('click', (event) => {
                if (event.target === popupOverlay) {
                    closePopup();
                }
            });
        }

        // --- SCRIPT UNTUK CUSTOM FILE INPUT ---
        const fileInput = document.getElementById('file_upload');
        const fileNameDisplay = document.getElementById('file-name-display');

        if (fileInput && fileNameDisplay) {
            fileInput.addEventListener('change', function(event) {
                const files = event.target.files;
                if (files.length > 0) {
                    fileNameDisplay.textContent = files[0].name;
                } else {
                    fileNameDisplay.textContent = 'Belum ada file dipilih.';
                }
            });
        }
        
        // --- SCRIPT UNTUK MENGIRIM FORM KE WHATSAPP & POPUP SUKSES ---
        const orderForm = document.getElementById('whatsappOrderForm');
        const successPopup = document.getElementById('successPopup');
        const closeSuccessPopupBtn = document.getElementById('closeSuccessPopupBtn');

        if(orderForm && successPopup) {
            orderForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form melakukan submit standar

                // 1. Ambil semua data dari form
                const nama = document.getElementById('nama').value;
                const noHp = document.getElementById('whatsapp').value;
                const detail = document.getElementById('detail').value;
                const designLink = document.getElementById('design_link').value;
                const fileUpload = document.getElementById('file_upload').files;

                // 2. Format pesan untuk WhatsApp
                let pesanWhatsApp = `Halo, saya ingin memesan jasa.\n\n`;
                pesanWhatsApp += `*Nama Lengkap:* ${nama}\n`;
                pesanWhatsApp += `*No. WhatsApp:* ${noHp}\n`;
                pesanWhatsApp += `*Detail Project:*\n${detail}\n\n`;
                
                // Tambahkan link desain jika diisi
                if (designLink) {
                    pesanWhatsApp += `*Link Desain:* ${designLink}\n`;
                }

                // Beri catatan jika ada file yang diunggah
                if (fileUpload.length > 0) {
                    pesanWhatsApp += `*File Terlampir:* ${fileUpload[0].name} (Akan dikirim manual via chat WhatsApp).\n`;
                }
                
                // 3. Buat URL WhatsApp
                const nomorWhatsApp = '6281292690095'; // Ganti 08 menjadi 62
                const urlWhatsApp = `https://wa.me/${nomorWhatsApp}?text=${encodeURIComponent(pesanWhatsApp)}`;

                // 4. Buka WhatsApp di tab baru
                window.open(urlWhatsApp, '_blank');
                
                // 5. Tutup form pemesanan dan tampilkan popup sukses
                closePopup();
                successPopup.classList.add('active');
                bodyElement.classList.add('body-no-scroll'); // Tetap kunci scroll

                // Reset form setelah berhasil
                orderForm.reset();
                fileNameDisplay.textContent = 'Belum ada file dipilih.';
            });
        }

        if(closeSuccessPopupBtn && successPopup) {
            // Event listener untuk menutup popup sukses
            closeSuccessPopupBtn.addEventListener('click', function() {
                successPopup.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll'); // Buka kembali scroll
            });
        }

        // BARU: SCRIPT UNTUK POPUP IKLAN
        const iklanPopup = document.getElementById('iklanPopup');
        const closeIklanPopupBtn = document.getElementById('closeIklanPopupBtn');
        if(iklanPopup && closeIklanPopupBtn) {
            closeIklanPopupBtn.addEventListener('click', function() {
                iklanPopup.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll');
            });
        }
    });
    </script>
    
    @stack('scripts')

</body>
</html>