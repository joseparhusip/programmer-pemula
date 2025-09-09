@extends('layouts.app')

{{-- Menambahkan stylesheet khusus untuk halaman home --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
@endpush

@section('content')
<section id="beranda" class="carousel-container">
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/img-home-1.png') }}" alt="Jasa Pembuatan Website Profesional">
                <div class="carousel-caption">
                    <h1 class="carousel-title"><b>Jasa Pembuatan Website Profesional</b></h1>
                    <p class="carousel-subtitle">Membangun website impian Anda dengan teknologi Laravel terkini. Cepat, aman, dan modern.</p>
                    <a href="#kontak" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem;">Hubungi Kami</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img-home-2.png') }}" alt="Jasa Pembuatan Aplikasi Mobile">
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
    <section id="layanan" class="services">
        <h2 class="section-title"><b>Layanan Unggulan Kami</b></h2>
        <p class="section-subtitle">Fokus kami adalah memberikan hasil terbaik menggunakan teknologi modern yang paling diminati saat ini.</p>
        <div class="services-grid">
            <div class="service-card">
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Jasa Website Laravel" class="service-card-image">
                <h3 class="service-card-title">Jasa Website Laravel</h3>
                <p class="service-card-description">Mengerjakan landing page, sistem informasi, e-commerce, dan website custom lainnya dengan framework Laravel.</p>
            </div>
            <div class="service-card">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Jasa Aplikasi Flutter" class="service-card-image">
                <h3 class="service-card-title">Jasa Aplikasi Flutter</h3>
                <p class="service-card-description">Membangun aplikasi mobile cross-platform untuk Android & iOS dengan Flutter. Desain UI/UX menarik dan performa cepat.</p>
            </div>
        </div>
    </section>

    <section class="why-us">
        <h2 class="section-title"><b>Mengapa Memilih Kami?</b></h2>
        <p class="section-subtitle">Kami berkomitmen untuk memberikan solusi digital terbaik yang sesuai dengan kebutuhan dan anggaran Anda.</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-technology.png') }}" alt="Teknologi Terkini"></div>
                <h3 class="feature-card-title">Teknologi Terkini</h3>
                <p class="feature-card-description">Menggunakan stack teknologi modern seperti Laravel dan Flutter untuk hasil yang optimal, aman, dan skalabel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-price.png') }}" alt="Harga Terjangkau"></div>
                <h3 class="feature-card-title">Harga Terjangkau</h3>
                <p class="feature-card-description">Kami menawarkan kualitas pengerjaan premium dengan harga yang kompetitif dan transparan tanpa biaya tersembunyi.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><img src="{{ asset('assets/icons/icons-times.png') }}" alt="Proses Cepat dan Efisien"></div>
                <h3 class="feature-card-title">Proses Cepat & Efisien</h3>
                <p class="feature-card-description">Dengan alur kerja yang terstruktur dan komunikasi yang efektif, kami pastikan proyek Anda selesai tepat waktu.</p>
            </div>
        </div>
    </section>

    <section class="detailed-services">
        <h2 class="section-title"><b>Kami Siap Membantu</b></h2>
        <p class="section-subtitle">Apapun kebutuhan digital Anda, kami memiliki solusi yang tepat, cepat, dan terjangkau.</p>
        <div class="detailed-services-grid">
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-website-perusahaan.png') }}" alt="Icon Website Perusahaan & Bisnis">
                </div>
                <div>
                    <h3 class="detailed-service-title">Website Perusahaan & Bisnis</h3>
                    <p class="detailed-service-description">Membangun company profile, landing page, dan website profesional untuk meningkatkan citra dan jangkauan bisnis Anda.</p>
                </div>
            </div>
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-e-commerce.png') }}" alt="Icon Solusi Toko Online">
                </div>
                <div>
                    <h3 class="detailed-service-title">Solusi Toko Online</h3>
                    <p class="detailed-service-description">Membuat platform e-commerce yang fungsional, aman, dan mudah dikelola untuk mendorong pertumbuhan penjualan Anda.</p>
                </div>
            </div>
            <div class="detailed-service-card">
                <div class="detailed-service-icon">
                    <img src="{{ asset('assets/icons/icons-web-custom.png') }}" alt="Icon Aplikasi Web Custom">
                </div>
                <div>
                    <h3 class="detailed-service-title">Aplikasi Web Custom</h3>
                    <p class="detailed-service-description">Mengembangkan sistem informasi, aplikasi manajemen, atau solusi web lainnya yang dirancang khusus untuk kebutuhan unik Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="portofolio" class="portfolio">
        <h2 class="section-title"><b>Portofolio Terbaru Kami</b></h2>
        <p class="section-subtitle">Berikut beberapa proyek yang telah berhasil kami kerjakan untuk klien dari berbagai kalangan.</p>
        <div class="portfolio-grid">
            <a href="{{ asset('assets/img/img-portfolio/img-website-dashboard.png') }}" class="portfolio-card">
                <span class="portfolio-category">Website</span>
                <img src="{{ asset('assets/img/img-portfolio/img-website-dashboard.png') }}" alt="Portfolio Website Dashboard Admin" class="portfolio-image">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Dashboard Admin Penjualan</h3><p class="portfolio-tech">Laravel & Chart.js</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
            <a href="{{ asset('assets/img/img-portfolio/img-website-ecommerce-stylo.png') }}" class="portfolio-card">
                <span class="portfolio-category">Website</span>
                <img src="{{ asset('assets/img/img-portfolio/img-website-ecommerce-stylo.png') }}" alt="Portfolio Website E-commerce Stylo" class="portfolio-image">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Website E-Commerce Stylo</h3><p class="portfolio-tech">Laravel & Midtrans</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
            <a href="{{ asset('assets/img/img-portfolio/img-flutter-trivo.png') }}" class="portfolio-card">
                <span class="portfolio-category">Mobile App</span>
                <img src="{{ asset('assets/img/img-portfolio/img-flutter-trivo.png') }}" alt="Portfolio Mobile App Trivo" class="portfolio-image">
                <div class="portfolio-overlay">
                    <div><h3 class="portfolio-title">Aplikasi Booking Travel 'Trivo'</h3><p class="portfolio-tech">Flutter & Firebase</p></div>
                    <div class="portfolio-view-icon">+</div>
                </div>
            </a>
        </div>
    </section>

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
                        <a href="https://wa.me/6281292690095" target="_blank">+62 812-9269-0095</a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="#" method="POST">
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
    <section class="tech-stack">
        <h2 class="section-title"><b>Teknologi Andalan Kami</b></h2>
        <div class="tech-scroller">
            <div class="tech-scroller-inner">
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Laravel" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Flutter" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-dart.png') }}" alt="Dart" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-bootstraps.png') }}" alt="Bootstrap">
                <img src="{{ asset('assets/img/img-mysql.png') }}" alt="MySQL">
                <img src="{{ asset('assets/img/img-laragon.webp') }}" alt="Laragon">
                
                <img src="{{ asset('assets/img/img-laravel.png') }}" alt="Laravel" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-flutter.png') }}" alt="Flutter" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-dart.png') }}" alt="Dart" class="logo-unggulan">
                <img src="{{ asset('assets/img/img-bootstraps.png') }}" alt="Bootstrap">
                <img src="{{ asset('assets/img/img-mysql.png') }}" alt="MySQL">
                <img src="{{ asset('assets/img/img-laragon.webp') }}" alt="Laragon">
            </div>
        </div>
    </section>
</div>

<div id="lightbox-modal" class="lightbox-overlay">
    <span class="lightbox-close">&times;</span>
    <img src="" alt="Portfolio Image Preview" class="lightbox-content">
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lightbox functionality
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

        function closeModal() {
            lightboxModal.classList.remove('active');
            setTimeout(() => { lightboxImage.setAttribute('src', ''); }, 300);
        }

        lightboxClose.addEventListener('click', closeModal);
        lightboxModal.addEventListener('click', function(e) { 
            if (e.target === this) closeModal(); 
        });
        document.addEventListener('keydown', function(e) { 
            if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
                closeModal();
            }
        });
    }
});
</script>
@endpush