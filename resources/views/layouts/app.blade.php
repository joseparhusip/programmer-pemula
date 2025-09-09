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

    {{-- Memanggil semua partials popup --}}
    @include('partials.popup-form')
    @include('partials.popup-iklan')
    
    <a href="https://wa.me/6281292690095?text=Halo%2C%20saya%20ingin%20bertanya." class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat di WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
    </a>

    {{-- Memanggil file JavaScript utama yang berisi semua logika --}}
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')

</body>
</html>