<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProgrammerPemula - Jasa Website & Aplikasi</title>
    
    {{-- 
      BAGIAN PENTING YANG DIUBAH: 
      Memuat semua CSS dan JS utama melalui Vite. 
      Ini menggantikan <link rel="stylesheet" ...> yang lama.
      Pastikan Anda sudah membuat file resources/css/app.css dan meng-import
      file style-global.css dan style-popup.css di dalamnya.
    --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Ini tetap dipertahankan untuk CSS yang spesifik per halaman --}}
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

    @include('partials.popup-iklan')
    
    <a href="https://wa.me/6281292690095?text=Halo%2C%20saya%20ingin%20bertanya.%0A%0ANama%3A%20%0AMau%20Joki%20Apa%3A%20%0ARequest%20Lain%3A%20" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat di WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
    </a>

    {{-- 
      JavaScript inline di sini tidak masalah. 
      Namun, praktik terbaiknya adalah memindahkan semua logika ini ke dalam file 
      resources/js/app.js dan hanya memanggil fungsi inisialisasi dari sini.
    --}}
    <script>
    console.log('🚀 App script started');
    
    // Variabel global
    const bodyElement = document.body;
    
    // PRELOADER
    const preloader = document.getElementById('preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('preloader-hidden');
            setTimeout(() => {
                preloader.style.display = 'none';
                
                // Tampilkan iklan popup setelah preloader
                const iklanPopup = document.getElementById('iklanPopup');
                if (iklanPopup) {
                    iklanPopup.classList.add('active');
                    bodyElement.classList.add('body-no-scroll');
                }
            }, 750);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        console.log('📱 DOM loaded');
        
        // NAVBAR HAMBURGER
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

        // CAROUSEL
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
                // Create indicators
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

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalItems - 1;
                        updateCarousel();
                        resetAutoPlay();
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                        updateCarousel();
                        resetAutoPlay();
                    });
                }
            }
        }
        
        // POPUP CONTROLS
        const popupOverlay = document.getElementById('popupForm');
        const openPopupBtn = document.getElementById('btnPesanJasa');
        const closePopupBtn = document.getElementById('closePopupBtn');
        const successPopup = document.getElementById('successPopup');
        const closeSuccessPopupBtn = document.getElementById('closeSuccessPopupBtn');
        
        console.log('🎯 Popup elements found:', {
            popupOverlay: !!popupOverlay,
            openPopupBtn: !!openPopupBtn,
            closePopupBtn: !!closePopupBtn,
            successPopup: !!successPopup
        });
        
        function openPopup() {
            if(popupOverlay) {
                popupOverlay.classList.add('active');
                bodyElement.classList.add('body-no-scroll');
                console.log('✅ Popup opened');
            }
        }

        function closePopup() {
            if(popupOverlay) {
                popupOverlay.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll');
                console.log('❌ Popup closed');
            }
        }

        // Event listeners untuk popup
        if (openPopupBtn) {
            openPopupBtn.addEventListener('click', openPopup);
        }
        
        if (closePopupBtn) {
            closePopupBtn.addEventListener('click', closePopup);
        }
        
        if (popupOverlay) {
            popupOverlay.addEventListener('click', (event) => {
                if (event.target === popupOverlay) {
                    closePopup();
                }
            });
        }

        // Success popup controls
        if (closeSuccessPopupBtn && successPopup) {
            closeSuccessPopupBtn.addEventListener('click', function() {
                successPopup.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll');
                console.log('✅ Success popup closed');
            });
            
            successPopup.addEventListener('click', function(event) {
                if (event.target === successPopup) {
                    successPopup.classList.remove('active');
                    bodyElement.classList.remove('body-no-scroll');
                }
            });
        }

        // IKLAN POPUP CONTROLS
        const iklanPopup = document.getElementById('iklanPopup');
        const closeIklanPopupBtn = document.getElementById('closeIklanPopupBtn');
        
        if(iklanPopup && closeIklanPopupBtn) {
            closeIklanPopupBtn.addEventListener('click', function() {
                iklanPopup.classList.remove('active');
                bodyElement.classList.remove('body-no-scroll');
            });
            
            iklanPopup.addEventListener('click', function(event) {
                if (event.target === iklanPopup) {
                    iklanPopup.classList.remove('active');
                    bodyElement.classList.remove('body-no-scroll');
                }
            });
        }
        
        console.log('✅ All scripts loaded successfully!');
    });
    </script>
    
    {{-- Ini tetap dipertahankan untuk script yang spesifik per halaman --}}
    @stack('scripts')

</body>
</html>