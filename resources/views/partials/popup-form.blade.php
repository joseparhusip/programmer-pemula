{{-- resources/views/partials/popup-form.blade.php --}}

{{-- ======== FORM PEMESANAN UTAMA ======== --}}
<div class="popup-overlay" id="popupForm">
    <div class="popup-content">
        <button class="popup-close" id="closePopupBtn">&times;</button>
        <div class="popup-header">
            <h3>Form Pemesanan Jasa</h3>
            <p>Isi detail di bawah ini untuk memulai project Anda bersama kami.</p>
        </div>
        
        <form id="whatsappOrderForm" enctype="multipart/form-data">
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
        
        {{-- DEBUG INFO (HAPUS SETELAH BERHASIL) --}}
        <div style="margin-top: 15px; padding: 10px; background: #f8f9fa; border-radius: 5px; font-size: 12px;">
            <strong>Debug Info:</strong>
            <div id="formDebugInfo">Data akan muncul di sini setelah submit</div>
        </div>
    </div>
</div>

{{-- POPUP SUKSES --}}
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

<script>
// SCRIPT KHUSUS UNTUK FORM WHATSAPP - SOLUSI SEDERHANA
document.addEventListener('DOMContentLoaded', function() {
    
    // Function untuk membuat pesan WhatsApp
    function createWhatsAppMessage(formData) {
        let message = "Halo, saya ingin memesan jasa.\n\n";
        message += "*Nama Lengkap:* " + formData.nama + "\n";
        message += "*No. WhatsApp:* " + formData.whatsapp + "\n";
        message += "*Detail Project:*\n" + formData.detail + "\n\n";
        
        if (formData.design_link && formData.design_link.trim() !== '') {
            message += "*Link Desain:* " + formData.design_link + "\n";
        }
        
        if (formData.fileName) {
            message += "*File Terlampir:* " + formData.fileName + " (akan dikirim manual via chat)\n";
        }
        
        return message;
    }
    
    // Function untuk membuka WhatsApp
    function openWhatsApp(message) {
        const phoneNumber = '6281292690095';
        const encodedMessage = encodeURIComponent(message);
        const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
        
        console.log('WhatsApp URL:', whatsappURL);
        console.log('Message:', message);
        
        // Buka WhatsApp
        try {
            const newWindow = window.open(whatsappURL, '_blank', 'noopener,noreferrer');
            
            // Jika popup diblokir, redirect langsung
            if (!newWindow || newWindow.closed || typeof newWindow.closed == 'undefined') {
                console.log('Popup blocked, redirecting...');
                window.location.href = whatsappURL;
            }
        } catch (error) {
            console.error('Error opening WhatsApp:', error);
            window.location.href = whatsappURL;
        }
        
        return whatsappURL;
    }
    
    // Event listener untuk form submit
    const form = document.getElementById('whatsappOrderForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            console.log('=== FORM SUBMIT STARTED ===');
            
            // Ambil semua data form
            const formData = {
                nama: document.getElementById('nama').value.trim(),
                whatsapp: document.getElementById('whatsapp').value.trim(),
                detail: document.getElementById('detail').value.trim(),
                design_link: document.getElementById('design_link').value.trim(),
                fileName: ''
            };
            
            // Cek file upload
            const fileInput = document.getElementById('file_upload');
            if (fileInput && fileInput.files.length > 0) {
                formData.fileName = fileInput.files[0].name;
            }
            
            console.log('Form data collected:', formData);
            
            // Validasi
            if (!formData.nama || !formData.whatsapp || !formData.detail) {
                alert('❌ Mohon isi semua field yang wajib diisi!');
                return;
            }
            
            // Buat pesan WhatsApp
            const message = createWhatsAppMessage(formData);
            console.log('WhatsApp message created:', message);
            
            // Update debug info
            const debugInfo = document.getElementById('formDebugInfo');
            if (debugInfo) {
                debugInfo.innerHTML = `
                    <strong>Data:</strong> ${JSON.stringify(formData)}<br>
                    <strong>Message:</strong> ${message.substring(0, 100)}...
                `;
            }
            
            // Buka WhatsApp
            const whatsappURL = openWhatsApp(message);
            
            // Tutup popup form
            const popupForm = document.getElementById('popupForm');
            if (popupForm) {
                popupForm.classList.remove('active');
            }
            
            // Tampilkan popup sukses
            const successPopup = document.getElementById('successPopup');
            if (successPopup) {
                setTimeout(() => {
                    successPopup.classList.add('active');
                }, 500);
            }
            
            // Reset form
            form.reset();
            const fileDisplay = document.getElementById('file-name-display');
            if (fileDisplay) {
                fileDisplay.textContent = 'Belum ada file dipilih.';
            }
            
            console.log('=== FORM SUBMIT COMPLETED ===');
        });
    } else {
        console.error('❌ Form tidak ditemukan!');
    }
    
    // Event listener untuk file input
    const fileInput = document.getElementById('file_upload');
    const fileDisplay = document.getElementById('file-name-display');
    
    if (fileInput && fileDisplay) {
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                fileDisplay.textContent = e.target.files[0].name;
                console.log('File selected:', e.target.files[0].name);
            } else {
                fileDisplay.textContent = 'Belum ada file dipilih.';
            }
        });
    }
    
    console.log('✅ WhatsApp form script loaded successfully!');
});
</script>