{{-- resources/views/partials/popup-iklan.blade.php --}}

<div class="popup-overlay" id="iklanPopup">
    <div class="popup-content popup-iklan-content">
        <button class="popup-close" id="closeIklanPopupBtn">&times;</button>
        <a href="#" class="iklan-link" target="_blank">
            {{-- [OPTIMASI] Tambahkan loading="lazy" agar gambar tidak dimuat sebelum popup tampil. --}}
            {{-- Atribut width dan height ditambahkan untuk mencegah layout shift. Sesuaikan jika perlu. --}}
            <img src="{{ asset('assets/img/img-iklan.png') }}" alt="Iklan ProgrammerPemula" loading="lazy" width="500" height="500">
        </a>
    </div>
</div>