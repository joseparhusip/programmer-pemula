document.addEventListener('DOMContentLoaded', function () {
    // === Selektor untuk elemen-elemen popup ===
    const popupForm = document.getElementById('popupForm');
    const successPopup = document.getElementById('successPopup');
    const closePopupBtn = document.getElementById('closePopupBtn');
    const closeSuccessPopupBtn = document.getElementById('closeSuccessPopupBtn');
    const orderForm = document.getElementById('whatsappOrderForm');
    const fileNameDisplay = document.getElementById('file-name-display');
    const fileUploadInput = document.getElementById('file_upload');

    // Nomor WhatsApp tujuan (Ganti dengan nomor Anda)
    // Format internasional tanpa spasi, tanda kurung, atau '+'
    const yourWhatsAppNumber = '6281292690095'; 

    // === Logika untuk menampilkan nama file yang diunggah ===
    if (fileUploadInput) {
        fileUploadInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                fileNameDisplay.textContent = this.files[0].name;
            } else {
                fileNameDisplay.textContent = 'Belum ada file dipilih.';
            }
        });
    }

    // === Fungsi untuk menampilkan atau menyembunyikan popup ===
    
    // Fungsi untuk membuka popup form utama
    function openPopup() {
        if (popupForm) {
            popupForm.classList.add('active');
            document.body.classList.add('body-no-scroll');
        }
    }

    // Fungsi untuk menutup semua popup
    function closeAllPopups() {
        if (popupForm) {
            popupForm.classList.remove('active');
        }
        if (successPopup) {
            successPopup.classList.remove('active');
        }
        document.body.classList.remove('body-no-scroll');
    }
    
    // Contoh tombol pemicu untuk membuka popup
    // Anda bisa menempatkan tombol dengan id="orderBtn" di mana saja di halaman Anda
    const orderTriggerButtons = document.querySelectorAll('.open-popup-btn'); 
    orderTriggerButtons.forEach(btn => {
        btn.addEventListener('click', openPopup);
    });

    // Event listener untuk tombol close
    if (closePopupBtn) {
        closePopupBtn.addEventListener('click', closeAllPopups);
    }
    if (closeSuccessPopupBtn) {
        closeSuccessPopupBtn.addEventListener('click', closeAllPopups);
    }
    
    // Menutup popup jika mengklik area overlay di luar konten
    if (popupForm) {
        popupForm.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAllPopups();
            }
        });
    }
     if (successPopup) {
        successPopup.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAllPopups();
            }
        });
    }


    // === Logika utama untuk submit form ke WhatsApp ===
    if (orderForm) {
        orderForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah form melakukan submit standar

            // 1. Mengambil data dari form
            const nama = document.getElementById('nama').value;
            const whatsapp = document.getElementById('whatsapp').value;
            const detail = document.getElementById('detail').value;
            const designLink = document.getElementById('design_link').value;

            // 2. Format pesan untuk WhatsApp
            let message = `Halo, saya ingin memesan jasa pembuatan website/aplikasi.\n\nBerikut detailnya:\n\n`;
            message += `*Nama Lengkap:* ${nama}\n`;
            message += `*No. WhatsApp:* ${whatsapp}\n`;
            message += `*Detail Project:*\n${detail}\n\n`;

            // Tambahkan link figma jika diisi
            if (designLink) {
                message += `*Link Desain (Figma):* ${designLink}\n`;
            }
            
            // Beri tahu jika ada file yang diunggah (karena file tidak bisa dikirim via URL)
            if (fileUploadInput.files.length > 0) {
                message += `*Catatan:* Saya juga telah melampirkan file referensi (${fileUploadInput.files[0].name}) pada form di website.`;
            }

            // 3. Encode pesan agar sesuai format URL
            const encodedMessage = encodeURIComponent(message);

            // 4. Buat URL WhatsApp
            const whatsappURL = `https://wa.me/${yourWhatsAppNumber}?text=${encodedMessage}`;

            // 5. Buka WhatsApp di tab baru
            window.open(whatsappURL, '_blank');
            
            // 6. Tampilkan popup sukses
            if (popupForm) {
                popupForm.classList.remove('active'); // Sembunyikan form utama
            }
            if (successPopup) {
                successPopup.classList.add('active'); // Tampilkan notifikasi sukses
            }
        });
    }
});