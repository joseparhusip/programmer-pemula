// --- SCRIPT UTAMA UNTUK MENGELOLA SEMUA FUNGSI ---

// Menunggu hingga seluruh konten halaman (HTML) selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    
    // === DEKLARASI VARIABEL GLOBAL ===
    const bodyElement = document.body;
    const navbar = document.querySelector('.navbar');

    // === FUNGSI-FUNGSI GLOBAL UNTUK POPUP ===
    function closeAllPopups() {
        document.querySelectorAll('.popup-overlay.active').forEach(popup => {
            popup.classList.remove('active');
        });
        bodyElement.classList.remove('body-no-scroll');
    }

    function openPopupById(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            closeAllPopups(); // Tutup popup lain yang mungkin terbuka
            popup.classList.add('active');
            bodyElement.classList.add('body-no-scroll');
            // Tutup navbar mobile jika sedang terbuka saat popup muncul
            if (navbar && navbar.classList.contains('active')) {
                navbar.classList.remove('active');
            }
        }
    }
    
    // --- 1. SCRIPT UNTUK PRELOADER & POPUP IKLAN SETELAH LOAD ---
    const preloader = document.getElementById('preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('preloader-hidden');
            setTimeout(() => {
                preloader.style.display = 'none';
                // Tampilkan pop-up iklan setelah preloader hilang
                openPopupById('iklanPopup');
            }, 750); // Sesuaikan dengan durasi transisi di CSS
        });
    }

    // --- 2. SCRIPT UNTUK NAVBAR HAMBURGER ---
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navLinks = document.querySelectorAll('.nav-link');

    if (navbarToggler && navbar) {
        navbarToggler.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });
    }
    
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navbar && navbar.classList.contains('active')) {
                navbar.classList.remove('active');
            }
        });
    });

    // --- 3. SCRIPT UNTUK CAROUSEL BAWAAN ---
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
    
    // --- 4. SCRIPT UNTUK SEMUA POPUP (FORM, SUKSES, IKLAN) ---
    // Event listener untuk tombol-tombol yang membuka popup form pemesanan
    const openFormButtons = document.querySelectorAll('#btnPesanJasa, #btnPesanJasaMobile, .open-popup-btn');
    openFormButtons.forEach(btn => {
        btn.addEventListener('click', () => openPopupById('popupForm'));
    });
    
    // Event listener untuk semua tombol close 'x' pada popup
    document.querySelectorAll('.popup-close').forEach(btn => {
        btn.addEventListener('click', closeAllPopups);
    });

    // Event listener untuk tombol 'Tutup' pada popup sukses
    const closeSuccessBtn = document.getElementById('closeSuccessPopupBtn');
    if(closeSuccessBtn) {
        closeSuccessBtn.addEventListener('click', closeAllPopups);
    }

    // Menutup popup jika mengklik area overlay di luarnya
    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', (event) => {
            if (event.target === overlay) {
                closeAllPopups();
            }
        });
    });

    // --- 5. SCRIPT UNTUK CUSTOM FILE INPUT ---
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
    
    // --- 6. SCRIPT UNTUK MENGIRIM FORM KE WHATSAPP ---
    const orderForm = document.getElementById('whatsappOrderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form melakukan submit standar

            // Nomor WhatsApp tujuan Anda
            const nomorWhatsApp = '6281292690095';

            // Ambil semua data dari form
            const nama = document.getElementById('nama').value;
            const noHp = document.getElementById('whatsapp').value;
            const detail = document.getElementById('detail').value;
            const designLink = document.getElementById('design_link').value;
            const fileUpload = document.getElementById('file_upload').files;

            // Format pesan untuk WhatsApp
            let pesanWhatsApp = `Halo, saya ingin memesan jasa.\n\n`;
            pesanWhatsApp += `*Nama Lengkap:* ${nama}\n`;
            pesanWhatsApp += `*No. WhatsApp:* ${noHp}\n`;
            pesanWhatsApp += `*Detail Project:*\n${detail}\n\n`;
            
            if (designLink) {
                pesanWhatsApp += `*Link Desain:* ${designLink}\n`;
            }

            if (fileUpload.length > 0) {
                pesanWhatsApp += `*File Terlampir:* ${fileUpload[0].name} (Akan dikirim manual via chat WhatsApp).\n`;
            }
            
            // Buat URL WhatsApp
            const urlWhatsApp = `https://wa.me/${nomorWhatsApp}?text=${encodeURIComponent(pesanWhatsApp)}`;

            // Buka WhatsApp di tab baru
            window.open(urlWhatsApp, '_blank');
            
            // Tutup form pemesanan dan tampilkan popup sukses
            openPopupById('successPopup');

            // Form tidak di-reset agar data tidak hilang jika pengguna ingin melihat kembali
            // Jika ingin di-reset, hapus komentar pada baris di bawah ini:
            // orderForm.reset();
            // if(fileNameDisplay) {
            //     fileNameDisplay.textContent = 'Belum ada file dipilih.';
            // }
        });
    }

    // --- 7. SCRIPT UNTUK LIGHTBOX PORTOFOLIO ---
    // (Script ini bersifat spesifik untuk halaman home, jadi pastikan elemennya ada)
    const portfolioCards = document.querySelectorAll('.portfolio-card');
    const lightboxModal = document.getElementById('lightbox-modal');
    if (lightboxModal && portfolioCards.length > 0) {
        const lightboxImage = lightboxModal.querySelector('.lightbox-content');
        const lightboxClose = lightboxModal.querySelector('.lightbox-close');
        
        portfolioCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                const imageUrl = this.getAttribute('href');
                lightboxImage.setAttribute('src', imageUrl);
                lightboxModal.classList.add('active');
            });
        });

        function closeLightbox() {
            lightboxModal.classList.remove('active');
            setTimeout(() => { lightboxImage.setAttribute('src', ''); }, 300);
        }

        lightboxClose.addEventListener('click', closeLightbox);
        lightboxModal.addEventListener('click', function(e) { 
            if (e.target === this) closeLightbox(); 
        });
        document.addEventListener('keydown', function(e) { 
            if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
                closeLightbox();
            }
        });
    }
});