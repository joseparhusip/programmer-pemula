{{-- resources/views/partials/popup-form.blade.php --}}

{{-- ======== FORM PEMESANAN UTAMA ======== --}}
<div class="popup-overlay" id="popupForm">
    <div class="popup-content">
        <button class="popup-close" id="closePopupBtn">&times;</button>
        <div class="popup-header">
            <h3>Form Pemesanan Jasa</h3>
            <p>Isi detail di bawah ini untuk memulai project Anda bersama kami.</p>
        </div>
        
        {{-- [DIUBAH] Menghapus action, method, dan menambahkan id pada form --}}
        <form id="whatsappOrderForm" enctype="multipart/form-data">
            {{-- @csrf tidak lagi diperlukan karena tidak ada submit ke server Laravel --}}
            
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="whatsapp">No. WhatsApp</label>
                <input type="tel" id="whatsapp" name="whatsapp" placeholder="Contoh: 081234567890" required>
            </div>
            <div class="form-group">
                <label for="detail">Detail Project</label>
                <textarea id="detail" name="detail" placeholder="Jelaskan kebutuhan website atau aplikasi Anda" required></textarea>
            </div>
            <div class="form-group">
                <label for="design_link">Link Figma / Desain Lain (Opsional)</label>
                <input type="url" id="design_link" name="design_link" placeholder="https://figma.com/...">
            </div>
            
            <div class="form-group">
                <label>Unggah File (Opsional)</label>
                <div class="file-upload-wrapper">
                    <input type="file" id="file_upload" name="file_upload" class="file-upload-input">
                    <label for="file_upload" class="file-upload-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        <span>Pilih File</span>
                    </label>
                    <span id="file-name-display" class="file-name-display">Belum ada file dipilih.</span>
                </div>
                <small>Maksimal ukuran file: 5 MB.</small>
            </div>

            <button type="submit" class="btn-submit-popup">Kirim Pesanan via WhatsApp</button>
        </form>
    </div>
</div>

{{-- [BARU] POPUP SUKSES (AWALNYA TERSEMBUNYI) --}}
<div class="popup-overlay" id="successPopup">
    <div class="popup-content success-popup-content">
        <div class="success-icon">
             <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <h3>Pesan Terkirim!</h3>
        <p>Anda akan segera diarahkan ke WhatsApp. Mohon tunggu balasan dari kami.</p>
        <button class="btn-close-success" id="closeSuccessPopupBtn">Tutup</button>
    </div>
</div>