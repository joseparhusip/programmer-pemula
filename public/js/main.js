// --- SCRIPT UTAMA UNTUK MENGELOLA SEMUA FUNGSI ---
// File ini sudah dioptimalkan untuk produksi. Pastikan untuk mem-minify file ini sebelum diunggah ke hosting.

document.addEventListener('DOMContentLoaded', function() {
    
    // === DEKLARASI VARIABEL GLOBAL & KONFIGURASI ===
    const bodyElement = document.body;
    const navbar = document.querySelector('.navbar');
    // [OPTIMASI] Gunakan const untuk nomor WA agar mudah diubah di satu tempat.
    const NOMOR_WHATSAPP_TUJUAN = '6281292690095'; 

    // === FUNGSI-FUNGSI UTAMA UNTUK MODAL & POPUP ===
    /**
     * Menutup semua popup atau modal yang sedang aktif.
     */
    function closeAllPopups() {
        document.querySelectorAll('.popup-overlay.active').forEach(popup => {
            popup.classList.remove('active');
        });
        bodyElement.classList.remove('body-no-scroll');
    }

    /**
     * Membuka popup berdasarkan ID yang diberikan.
     * @param {string} popupId - ID dari elemen popup yang ingin dibuka.
     */
    function openPopupById(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            closeAllPopups(); // Tutup popup lain yang mungkin terbuka
            popup.classList.add('active');
            bodyElement.classList.add('body-no-scroll');
            // Otomatis tutup navbar mobile jika sedang terbuka
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
            
            // Tampilkan popup iklan setelah 1.5 detik (memberi waktu pengguna melihat halaman)
            const iklanPopupTimeout = setTimeout(() => {
                openPopupById('iklanPopup');
            }, 1500);

            // Hapus elemen preloader dari DOM setelah transisi selesai untuk membersihkan memori
            preloader.addEventListener('transitionend', () => {
                // [OPTIMASI] Menggunakan requestAnimationFrame memastikan DOM manipulation terjadi pada waktu yang paling efisien.
                requestAnimationFrame(() => {
                    if (preloader.parentNode) {
                        preloader.parentNode.removeChild(preloader);
                    }
                });
            }, { once: true }); // Opsi 'once' membuat event listener otomatis terhapus setelah dijalankan
        });
    }

    // --- 2. SCRIPT UNTUK NAVBAR HAMBURGER (MENU MOBILE) ---
    const navbarToggler = document.querySelector('.navbar-toggler');
    if (navbarToggler && navbar) {
        navbarToggler.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });

        // Menutup menu mobile jika salah satu link di dalamnya diklik
        const navLinks = navbar.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbar.classList.contains('active')) {
                    navbar.classList.remove('active');
                }
            });
        });
    }

    // --- 3. SCRIPT UNTUK CAROUSEL ---
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        const inner = carousel.querySelector('.carousel-inner');
        const items = carousel.querySelectorAll('.carousel-item');
        const prevBtn = carousel.querySelector('.carousel-control.prev');
        const nextBtn = carousel.querySelector('.carousel-control.next');
        const indicatorsContainer = carousel.querySelector('.carousel-indicators');
        
        const totalItems = items.length;
        if (totalItems > 1) { 
            let currentIndex = 0;
            let autoPlayInterval;

            // Inisialisasi indicator dots
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

            const updateCarousel = () => {
                inner.style.transform = `translateX(-${currentIndex * 100}%)`;
                indicators.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            };

            const goToSlide = (index) => {
                currentIndex = index;
                updateCarousel();
            };
            
            const startAutoPlay = () => {
                autoPlayInterval = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalItems;
                    updateCarousel();
                }, 5000);
            };

            const resetAutoPlay = () => {
                clearInterval(autoPlayInterval);
                startAutoPlay();
            };

            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                updateCarousel();
                resetAutoPlay();
            });

            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
                resetAutoPlay();
            });
            
            startAutoPlay(); // Mulai autoplay saat halaman dimuat
        }
    }
    
    // --- 4. EVENT LISTENERS UNTUK SEMUA POPUP (FORM, SUKSES, IKLAN) ---
    document.querySelectorAll('#btnPesanJasa, #btnPesanJasaMobile').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            openPopupById('popupForm');
        });
    });
    
    document.querySelectorAll('.popup-close').forEach(btn => {
        btn.addEventListener('click', closeAllPopups);
    });

    const closeSuccessBtn = document.getElementById('closeSuccessPopupBtn');
    if(closeSuccessBtn) {
        closeSuccessBtn.addEventListener('click', closeAllPopups);
    }

    document.querySelectorAll('.popup-overlay').forEach(overlay => {
        overlay.addEventListener('click', (event) => {
            if (event.target === overlay) {
                closeAllPopups();
            }
        });
    });

    // Menutup semua popup dengan tombol 'Escape'
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeAllPopups();
        }
    });

    // --- 5. SCRIPT UNTUK CUSTOM FILE INPUT ---
    const fileInput = document.getElementById('file_upload');
    if (fileInput) {
        const fileNameDisplay = document.getElementById('file-name-display');
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && fileNameDisplay) {
                fileNameDisplay.textContent = file.name;
            } else if (fileNameDisplay) {
                fileNameDisplay.textContent = 'Belum ada file dipilih.';
            }
        });
    }
    
    // --- 6. SCRIPT UNTUK FORM SUBMISSION KE WHATSAPP ---
    const orderForm = document.getElementById('whatsappOrderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const nama = document.getElementById('nama').value;
            const noHp = document.getElementById('whatsapp').value;
            const detail = document.getElementById('detail').value;
            const designLink = document.getElementById('design_link').value;
            const fileUpload = document.getElementById('file_upload').files[0];

            let pesanWhatsApp = `Halo, saya ingin memesan jasa.\n\n*Nama Lengkap:*\n${nama}\n\n*No. WhatsApp:*\n${noHp}\n\n*Detail Project:*\n${detail}\n`;
            
            if (designLink) {
                pesanWhatsApp += `\n*Link Desain:*\n${designLink}\n`;
            }
            if (fileUpload) {
                pesanWhatsApp += `\n*File Terlampir:*\n${fileUpload.name} (Akan dikirim manual via chat WhatsApp).\n`;
            }
            
            const urlWhatsApp = `https://wa.me/${NOMOR_WHATSAPP_TUJUAN}?text=${encodeURIComponent(pesanWhatsApp)}`;
            window.open(urlWhatsApp, '_blank');
            
            openPopupById('successPopup');

            // Form tidak di-reset agar data tidak hilang jika pengguna ingin melihat kembali.
        });
    }

    // --- 7. SCRIPT UNTUK LIGHTBOX PORTOFOLIO (sudah efisien) ---
    const portfolioCards = document.querySelectorAll('.portfolio-card');
    const lightboxModal = document.getElementById('lightbox-modal');
    if (lightboxModal && portfolioCards.length > 0) {
        const lightboxImage = lightboxModal.querySelector('.lightbox-content');
        const lightboxClose = lightboxModal.querySelector('.lightbox-close');
        
        const openLightbox = (imageUrl) => {
            lightboxImage.setAttribute('src', imageUrl);
            lightboxModal.classList.add('active');
            bodyElement.classList.add('body-no-scroll');
        };

        const closeLightbox = () => {
            lightboxModal.classList.remove('active');
            bodyElement.classList.remove('body-no-scroll');
            setTimeout(() => lightboxImage.setAttribute('src', ''), 300);
        };

        portfolioCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                openLightbox(this.getAttribute('href'));
            });
        });

        lightboxClose.addEventListener('click', closeLightbox);
        lightboxModal.addEventListener('click', (e) => { 
            if (e.target === lightboxModal) closeLightbox(); 
        });
        // Event listener 'Escape' sudah ditangani oleh fungsi global di bagian #4
    }
    
    // --- 8. SCRIPT UNTUK MODAL IFRAME SOSIAL MEDIA (sudah efisien) ---
    const iframeModal = document.getElementById('iframe-modal');
    if (iframeModal) {
        const socialIframe = document.getElementById('social-iframe');
        const iframeSpinner = iframeModal.querySelector('.iframe-spinner');
        const openTriggers = document.querySelectorAll('.social-iframe-trigger');
        const closeButton = iframeModal.querySelector('.iframe-modal-close');

        const openIframeModal = (url) => {
            if (iframeSpinner) iframeSpinner.style.display = 'block';
            socialIframe.style.visibility = 'hidden';
            socialIframe.src = url;
            iframeModal.classList.add('active');
            bodyElement.classList.add('body-no-scroll');
        };

        const closeIframeModal = () => {
            iframeModal.classList.remove('active');
            bodyElement.classList.remove('body-no-scroll');
            setTimeout(() => socialIframe.src = 'about:blank', 300);
        };

        socialIframe.onload = () => {
            if (iframeSpinner) iframeSpinner.style.display = 'none';
            socialIframe.style.visibility = 'visible';
        };

        openTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.dataset.url;
                if (url) openIframeModal(url);
            });
        });

        if (closeButton) closeButton.addEventListener('click', closeIframeModal);
        
        iframeModal.addEventListener('click', (event) => {
            if (event.target === iframeModal) closeIframeModal();
        });
        // Event listener 'Escape' sudah ditangani oleh fungsi global di bagian #4
    }
});