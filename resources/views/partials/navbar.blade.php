<header class="navbar">
    <div class="container">
        <a href="/" class="navbar-brand">
            {{-- HANYA LOGO: Teks brand telah dihapus --}}
            <img src="{{ asset('assets/img/logo-website.png') }}" alt="Joki Website Logo">
        </a>
        <nav class="navbar-menu">
            <ul class="navbar-nav">
                <li><a href="/#beranda" class="nav-link">Beranda</a></li>
                <li><a href="/#layanan" class="nav-link">Layanan</a></li>
                <li><a href="/#portofolio" class="nav-link">Portofolio</a></li>
                <li><a href="/#kontak" class="nav-link">Kontak</a></li>
                <li class="nav-item-mobile-only">
                    <a href="javascript:void(0);" id="btnPesanJasaMobile" class="nav-link nav-link-cta">Pesan Jasa</a>
                </li>
            </ul>
        </nav>
        <a href="javascript:void(0);" id="btnPesanJasa" class="btn btn-primary btn-desktop-only">Pesan Jasa</a>
        <button class="navbar-toggler" aria-label="Toggle navigation menu">
            <span class="toggler-icon"></span>
        </button>
    </div>
</header>