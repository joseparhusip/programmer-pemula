@extends('layouts.app')

{{-- Menambahkan stylesheet khusus untuk halaman home --}}
@push('styles')
    {{-- CATATAN PRODUKSI: Pastikan file CSS ini sudah di-minify untuk ukuran yang lebih kecil dan loading lebih cepat. --}}
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
@endpush

@section('content')
{{-- ======================================================================= --}}
{{-- BAGIAN BERANDA (CAROUSEL)                                               --}}
{{-- ======================================================================= --}}
<section id="beranda" class="carousel-container">
    <div class="carousel">
        <div class="carousel-inner">
            {{-- Gambar pertama dimuat secara 'eager' (langsung) karena ini yang pertama kali dilihat pengguna --}}
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/img-home-1.png') }}" alt="Jasa Pembuatan Website Profesional" loading="eager" width="1920" height="1080">
                <div class="carousel-caption">
                    <h1 class="carousel-title"><b>Jasa Pembuatan Website Profesional</b></h1>
                    <p class="carousel-subtitle">Membangun website impian Anda dengan teknologi Laravel terkini. Cepat, aman, dan modern.</p>
                    <a href="#kontak" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem;">Hubungi Kami</a>
                </div>
            </div>
            {{-- Gambar kedua dan seterusnya dimuat secara 'lazy' untuk mempercepat loading awal --}}
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img-home-2.png') }}" alt="Jasa Pembuatan Aplikasi Mobile" loading="lazy" width="1920" height="1080">
                <div class="carousel-caption">
                    <h1 class="carousel-title"><b>Pengembangan Aplikasi Mobile Flutter</b></h1>
                    <p class="carousel-subtitle">Solusi aplikasi cross-platform untuk Android & iOS. Desain menawan, performa handal.</p>
                    <a href="#portofolio" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem;">Lihat Portofolio</a>
                </div>
            </div>
        </div>
        <button class="carousel-control prev" aria-label="Previous Slide">&lt;</button>
        <button class="carousel-control next" aria-label="Next Slide">&gt;</button>
        <div class="carousel-indicators"></div>
    </div>
</section>

<div class="container">
    {{-- ======================================================================= --}}
    {{-- BAGIAN LAYANAN UNGGULAN                                               --}}
    {{-- ======================================================================= --}}
    <section id="layanan" class="services">
        <h2 class="section-title"><b>Layanan Unggulan Kami</b></h2>
        <p class="section-subtitle">Fokus kami adalah memberikan hasil terbaik menggunakan teknologi modern yang paling diminati saat ini.</p>
        <div class="services-grid">
            <div class="service-card">
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Jasa Website Laravel" class="service-card-image" loading="lazy" width="512" height="180">
                <h3 class="service-card-title">Jasa Website Laravel</h3>
                <p class="service-card-description">Mengerjakan landing page, sistem informasi, e-commerce, dan website custom lainnya dengan framework Laravel.</p>
            </div>
            <div class="service-card">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Jasa Aplikasi Flutter" class="service-card-image" loading="lazy" width="512" height="180">
                <h3 class="service-card-title">Jasa Aplikasi Flutter</h3>
                <p class="service-card-description">Membangun aplikasi mobile cross-platform untuk Android & iOS dengan Flutter. Desain UI/UX menarik dan performa cepat.</p>
            </div>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN MENGAPA MEMILIH KAMI                                             --}}
    {{-- ======================================================================= --}}
    <section class="why-us">
        <h2 class="section-title"><b>Mengapa Memilih Kami?</b></h2>
        <p class="section-subtitle">Kami berkomitmen untuk memberikan solusi digital terbaik yang sesuai dengan kebutuhan dan anggaran Anda.</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-technology.png') }}" alt="Teknologi Terkini" loading="lazy" width="60" height="60"></div>
                <h3 class="feature-card-title">Teknologi Terkini</h3>
                <p class="feature-card-description">Menggunakan stack teknologi modern seperti Laravel dan Flutter untuk hasil yang optimal, aman, dan skalabel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-price.png') }}" alt="Harga Terjangkau" loading="lazy" width="60" height="60"></div>
                <h3 class="feature-card-title">Harga Terjangkau</h3>
                <p class="feature-card-description">Kami menawarkan kualitas pengerjaan premium dengan harga yang kompetitif dan transparan tanpa biaya tersembunyi.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-times.png') }}" alt="Proses Cepat dan Efisien" loading="lazy" width="60" height="60"></div>
                <h3 class="feature-card-title">Proses Cepat & Efisien</h3>
                <p class="feature-card-description">Dengan alur kerja yang terstruktur dan komunikasi yang efektif, kami pastikan proyek Anda selesai tepat waktu.</p>
            </div>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN KAMI SIAP MEMBANTU                                              --}}
    {{-- ======================================================================= --}}
    <section class="detailed-services">
        <h2 class="section-title"><b>Kami Siap Membantu</b></h2>
        <p class="section-subtitle">Apapun kebutuhan digital Anda, kami memiliki solusi yang tepat, cepat, dan terjangkau.</p>
        <div class="detailed-services-grid">
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-website-perusahaan.png') }}" alt="Icon Website Perusahaan & Bisnis" loading="lazy" width="64" height="64">
                </div>
                <div>
                    <h3 class="detailed-service-title">Website Perusahaan & Bisnis</h3>
                    <p class="detailed-service-description">Membangun company profile, landing page, dan website profesional untuk meningkatkan citra dan jangkauan bisnis Anda.</p>
                </div>
            </div>
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-e-commerce.png') }}" alt="Icon Solusi Toko Online" loading="lazy" width="64" height="64">
                </div>
                <div>
                    <h3 class="detailed-service-title">Solusi Toko Online</h3>
                    <p class="detailed-service-description">Membuat platform e-commerce yang fungsional, aman, dan mudah dikelola untuk mendorong pertumbuhan penjualan Anda.</p>
                </div>
            </div>
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-web-custom.png') }}" alt="Icon Aplikasi Web Custom" loading="lazy" width="64" height="64">
                </div>
                <div>
                    <h3 class="detailed-service-title">Aplikasi Web Custom</h3>
                    <p class="detailed-service-description">Mengembangkan sistem informasi, aplikasi manajemen, atau solusi web lainnya yang dirancang khusus untuk kebutuhan unik Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN PORTOFOLIO                                                     --}}
    {{-- ======================================================================= --}}
    <section id="portofolio" class="portfolio">
        <h2 class="section-title"><b>Portofolio Terbaru Kami</b></h2>
        <p class="section-subtitle">Berikut beberapa proyek yang telah berhasil kami kerjakan untuk klien dari berbagai kalangan.</p>
        <div class="portfolio-grid">
            <a href="{{ asset('assets/img/img-portfolio/img-website-dashboard.png') }}" class="portfolio-card">
                <span class="portfolio-category">Website</span>
                <img src="{{ asset('assets/img/img-portfolio/img-website-dashboard.png') }}" alt="Portfolio Website Dashboard Admin" class="portfolio-image" loading="lazy" width="600" height="400">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Dashboard Admin Penjualan</h3><p class="portfolio-tech">Laravel & Chart.js</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
            <a href="{{ asset('assets/img/img-portfolio/img-website-ecommerce-stylo.png') }}" class="portfolio-card">
                <span class="portfolio-category">Website</span>
                <img src="{{ asset('assets/img/img-portfolio/img-website-ecommerce-stylo.png') }}" alt="Portfolio Website E-commerce Stylo" class="portfolio-image" loading="lazy" width="600" height="400">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Website E-Commerce Stylo</h3><p class="portfolio-tech">Laravel & Midtrans</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
            <a href="{{ asset('assets/img/img-portfolio/img-flutter-trivo.png') }}" class="portfolio-card">
                <span class="portfolio-category">Mobile App</span>
                <img src="{{ asset('assets/img/img-portfolio/img-flutter-trivo.png') }}" alt="Portfolio Mobile App Trivo" class="portfolio-image" loading="lazy" width="600" height="400">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Aplikasi Booking Travel 'Trivo'</h3><p class="portfolio-tech">Flutter & Firebase</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN KONTAK                                                         --}}
    {{-- ======================================================================= --}}
    <section id="kontak" class="contact">
        <h2 class="section-title"><b>Hubungi Kami</b></h2>
        <p class="section-subtitle">Punya ide atau pertanyaan? Jangan ragu untuk mengirimkan pesan kepada kami. Kami siap membantu mewujudkan proyek digital Anda.</p>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <p>Anda dapat menghubungi kami melalui detail di bawah ini atau mengisi formulir di samping. Kami akan segera merespons Anda.</p>
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <a href="mailto:joseparhusip7@gmail.com">joseparhusip7@gmail.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div>
                        <h4>WhatsApp</h4>
                        {{-- Menambahkan rel="noopener noreferrer" untuk keamanan saat membuka tab baru --}}
                        <a href="https://wa.me/6281292690095" target="_blank" rel="noopener noreferrer">+62 812-9269-0095</a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                {{-- Form action dikosongkan karena akan di-handle JavaScript --}}
                <form id="main-contact-form" action="" method="POST"> 
                    <div class="form-group">
                        <label for="name">Nama Anda</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Anda</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email aktif" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" name="subject" placeholder="Contoh: Penawaran Pembuatan Website" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan Anda</label>
                        <textarea id="message" name="message" rows="6" placeholder="Jelaskan kebutuhan atau pertanyaan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN GAME ULAR (MOBILE FRIENDLY)                                    --}}
    {{-- ======================================================================= --}}
    <section id="games" class="games">
        <h2 class="section-title"><b>Mainkan Game Ular Klasik</b></h2>
        <p class="section-subtitle">Gunakan tombol panah di keyboard (desktop) atau tombol kontrol di layar (mobile).</p>
        <div class="game-wrapper">
            <div class="game-header">
                <div class="game-score">SKOR: <span id="score-value">0</span></div>
            </div>
            <div class="canvas-container">
                <canvas id="snake-canvas" width="400" height="400"></canvas>
                <div id="game-overlay">
                    <div id="game-over-text">GAME OVER</div>
                    <button id="start-game-button">Mulai Game</button>
                </div>
            </div>
            {{-- Tombol kontrol ini hanya akan muncul di perangkat mobile --}}
            <div class="mobile-controls">
                <button id="btn-up" class="control-btn" aria-label="Tombol Atas">▲</button>
                <div class="controls-middle">
                    <button id="btn-left" class="control-btn" aria-label="Tombol Kiri">◀</button>
                    <button id="btn-right" class="control-btn" aria-label="Tombol Kanan">▶</button>
                </div>
                <button id="btn-down" class="control-btn" aria-label="Tombol Bawah">▼</button>
            </div>
        </div>
    </section>

    {{-- ======================================================================= --}}
    {{-- BAGIAN TEKNOLOGI                                                      --}}
    {{-- ======================================================================= --}}
    <section class="tech-stack">
        <h2 class="section-title"><b>Teknologi Andalan Kami</b></h2>
        <div class="tech-scroller">
            <div class="tech-scroller-inner">
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Laravel" class="logo-unggulan" loading="lazy" width="213" height="80">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Flutter" class="logo-unggulan" loading="lazy" width="213" height="80">
                <img src="{{ asset('assets/img/img-dart.png') }}" alt="Dart" class="logo-unggulan" loading="lazy" width="213" height="80">
                <img src="{{ asset('assets/img/img-bootstraps.png') }}" alt="Bootstrap" loading="lazy" width="160" height="60">
                <img src="{{ asset('assets/img/img-mysql.png') }}" alt="MySQL" loading="lazy" width="160" height="60">
                <img src="{{ asset('assets/img/img-laragon.webp') }}" alt="Laragon" loading="lazy" width="160" height="60">
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Laravel" class="logo-unggulan" loading="lazy" width="213" height="80" aria-hidden="true">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Flutter" class="logo-unggulan" loading="lazy" width="213" height="80" aria-hidden="true">
                <img src="{{ asset('assets/img/img-dart.png') }}" alt="Dart" class="logo-unggulan" loading="lazy" width="213" height="80" aria-hidden="true">
                <img src="{{ asset('assets/img/img-bootstraps.png') }}" alt="Bootstrap" loading="lazy" width="160" height="60" aria-hidden="true">
                <img src="{{ asset('assets/img/img-mysql.png') }}" alt="MySQL" loading="lazy" width="160" height="60" aria-hidden="true">
                <img src="{{ asset('assets/img/img-laragon.webp') }}" alt="Laragon" loading="lazy" width="160" height="60" aria-hidden="true">
            </div>
        </div>
    </section>
</div>

{{-- ======================================================================= --}}
{{-- BAGIAN LIGHTBOX (MODAL VIEW GAMBAR)                                     --}}
{{-- ======================================================================= --}}
<div id="lightbox-modal" class="lightbox-overlay">
    <span class="lightbox-close" aria-label="Tutup pratinjau gambar">&times;</span>
    <img src="" alt="Portfolio Image Preview" class="lightbox-content">
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Fungsionalitas Lightbox
    const portfolioCards = document.querySelectorAll('.portfolio-card');
    const lightboxModal = document.getElementById('lightbox-modal');
    if (lightboxModal) {
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

        const closeModal = () => {
            lightboxModal.classList.remove('active');
            setTimeout(() => { lightboxImage.setAttribute('src', ''); }, 300);
        };

        lightboxClose.addEventListener('click', closeModal);
        lightboxModal.addEventListener('click', (e) => { if (e.target === lightboxModal) closeModal(); });
        document.addEventListener('keydown', (e) => { 
            if (e.key === 'Escape' && lightboxModal.classList.contains('active')) closeModal();
        });
    }

    // Fungsionalitas Form Kontak
    const contactForm = document.getElementById('main-contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = this.querySelector('.btn-submit');
            submitButton.disabled = true;
            submitButton.textContent = 'Mengirim...';

            const messageData = {
                name: document.getElementById('name').value.trim(),
                email: document.getElementById('email').value.trim(),
                subject: document.getElementById('subject').value.trim(),
                message: document.getElementById('message').value.trim(),
                timestamp: new Date().toISOString()
            };

            try {
                let messages = JSON.parse(localStorage.getItem('contactMessages')) || [];
                messages.push(messageData);
                localStorage.setItem('contactMessages', JSON.stringify(messages));
                showNotification('Pesan Anda telah berhasil terkirim!', 'success');
                this.reset();
            } catch (error) {
                console.error('Gagal menyimpan pesan ke local storage:', error);
                showNotification('Gagal mengirim pesan. Silakan coba lagi.', 'error');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = 'Kirim Pesan';
            }
        });
    }

    // =================================================================
    // Fungsionalitas Game Ular (Mobile Friendly)
    // =================================================================
    const canvas = document.getElementById('snake-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        const scoreValue = document.getElementById('score-value');
        const gameOverlay = document.getElementById('game-overlay');
        const gameOverText = document.getElementById('game-over-text');
        const startGameButton = document.getElementById('start-game-button');
        
        // Tombol kontrol mobile
        const btnUp = document.getElementById('btn-up');
        const btnDown = document.getElementById('btn-down');
        const btnLeft = document.getElementById('btn-left');
        const btnRight = document.getElementById('btn-right');
        
        const gridSize = 20;
        let snake, food, score, direction, changingDirection, isGameOver, gameInterval;

        function initializeGame() {
            snake = [ {x: 10 * gridSize, y: 10 * gridSize} ];
            score = 0;
            direction = 'right';
            changingDirection = false;
            isGameOver = false;
            scoreValue.textContent = score;

            gameOverText.style.display = 'none';
            startGameButton.textContent = 'Mulai Game';
            gameOverlay.style.display = 'flex';
            
            generateFood();
            clearCanvas(); // Membersihkan canvas di awal
            draw(); // Menggambar kondisi awal
        }

        function startGame() {
            if (gameInterval) clearInterval(gameInterval);
            initializeGame();
            gameOverlay.style.display = 'none';
            gameInterval = setInterval(mainLoop, 100);
        }

        function mainLoop() {
            if (isGameOver) {
                gameOverText.style.display = 'block';
                startGameButton.textContent = "Mulai Lagi";
                gameOverlay.style.display = 'flex';
                clearInterval(gameInterval);
                return;
            }

            changingDirection = false;
            clearCanvas();
            drawFood();
            moveSnake();
            draw();
            checkCollision();
        }

        function clearCanvas() {
            ctx.fillStyle = 'var(--bg-dark-navy)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        function draw() {
            snake.forEach(part => {
                ctx.fillStyle = 'var(--accent-cyan)';
                ctx.strokeStyle = 'var(--bg-dark-navy)';
                ctx.fillRect(part.x, part.y, gridSize, gridSize);
                ctx.strokeRect(part.x, part.y, gridSize, gridSize);
            });
        }
        
        function drawFood() {
            ctx.fillStyle = '#E74C3C';
            ctx.strokeStyle = 'var(--bg-dark-navy)';
            ctx.fillRect(food.x, food.y, gridSize, gridSize);
            ctx.strokeRect(food.x, food.y, gridSize, gridSize);
        }

        function generateFood() {
            food = {
                x: Math.floor(Math.random() * (canvas.width / gridSize)) * gridSize,
                y: Math.floor(Math.random() * (canvas.height / gridSize)) * gridSize
            };
            snake.forEach(part => { if (part.x === food.x && part.y === food.y) generateFood(); });
        }

        function moveSnake() {
            const head = {x: snake[0].x, y: snake[0].y};
            if (direction === 'right') head.x += gridSize;
            if (direction === 'left') head.x -= gridSize;
            if (direction === 'up') head.y -= gridSize;
            if (direction === 'down') head.y += gridSize;
            snake.unshift(head);

            if (head.x === food.x && head.y === food.y) {
                score += 10;
                scoreValue.textContent = score;
                generateFood();
            } else {
                snake.pop();
            }
        }
        
        function setDirection(newDirection) {
            if (changingDirection) return;
            changingDirection = true;
            
            const goingUp = direction === 'up';
            const goingDown = direction === 'down';
            const goingRight = direction === 'right';
            const goingLeft = direction === 'left';

            if (newDirection === 'left' && !goingRight) direction = 'left';
            if (newDirection === 'up' && !goingDown) direction = 'up';
            if (newDirection === 'right' && !goingLeft) direction = 'right';
            if (newDirection === 'down' && !goingUp) direction = 'down';
        }

        function handleKeyPress(event) {
            switch (event.key) {
                case 'ArrowLeft': setDirection('left'); break;
                case 'ArrowUp': setDirection('up'); break;
                case 'ArrowRight': setDirection('right'); break;
                case 'ArrowDown': setDirection('down'); break;
            }
        }

        function checkCollision() {
            for (let i = 4; i < snake.length; i++) {
                if (snake[i].x === snake[0].x && snake[i].y === snake[0].y) isGameOver = true;
            }
            const hitLeftWall = snake[0].x < 0;
            const hitRightWall = snake[0].x >= canvas.width;
            const hitTopWall = snake[0].y < 0;
            const hitBottomWall = snake[0].y >= canvas.height;
            if (hitLeftWall || hitRightWall || hitTopWall || hitBottomWall) isGameOver = true;
        }

        // Event Listeners
        startGameButton.addEventListener('click', startGame);
        document.addEventListener('keydown', handleKeyPress);
        btnUp.addEventListener('click', () => setDirection('up'));
        btnDown.addEventListener('click', () => setDirection('down'));
        btnLeft.addEventListener('click', () => setDirection('left'));
        btnRight.addEventListener('click', () => setDirection('right'));

        // Inisialisasi tampilan awal game
        initializeGame();
    }
    
    // Fungsi notifikasi
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);
        requestAnimationFrame(() => notification.classList.add('show'));
        setTimeout(() => {
            notification.classList.remove('show');
            notification.addEventListener('transitionend', () => notification.remove(), { once: true });
        }, 3000);
    }
});
</script>
@endpush