// Validasi Form
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.main-form');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            const username = document.getElementById('username');
            const platforms = document.querySelectorAll('input[name="platform[]"]:checked');

            if (username && username.value.trim() === '') {
                event.preventDefault();
                alert('Username tidak boleh kosong!');
                username.focus();
                return;
            }

            if (platforms.length === 0) {
                event.preventDefault();
                alert('Harap pilih minimal satu platform!');
                return;
            }
        });
    }

    // Tombol Hapus Semua
    if (form) {
        const btnHapus = document.createElement('button');
        btnHapus.type = 'button';
        btnHapus.textContent = 'Hapus Semua';
        btnHapus.style.cssText = `
            padding: 12px 20px;
            background-color: #ff4444;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            width: 100%;
        `;

        const submitBtn = form.querySelector('.btn-submit');
        if (submitBtn) {
            submitBtn.insertAdjacentElement('afterend', btnHapus);
        }

        btnHapus.addEventListener('click', function() {
            if (confirm('Yakin ingin menghapus semua data form?')) {
                form.reset();
            }
        });
    }
});