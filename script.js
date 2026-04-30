const formPendaftaran = document.querySelector('.main-form');

if (formPendaftaran) {
    formPendaftaran.addEventListener('submit', function (event) {
        const nama = document.getElementById('username').value.trim();
        if (!nama) {
            event.preventDefault();
            alert('Username tidak boleh kosong!');
            return;
        }

        const platforms = document.querySelectorAll('input[name="platform[]"]:checked');
        if (platforms.length === 0) {
            event.preventDefault();
            alert('Harap pilih minimal satu platform yang digunakan!');
            return;
        }
    });
}

if (formPendaftaran) {
    const btnHapus = document.createElement('button');
    btnHapus.type = 'button';
    btnHapus.textContent = 'Hapus Semua';
    btnHapus.style.padding = '10px';
    btnHapus.style.backgroundColor = '#ff4444';
    btnHapus.style.color = 'white';
    btnHapus.style.border = 'none';
    btnHapus.style.cursor = 'pointer';
    btnHapus.style.fontWeight = 'bold';
    btnHapus.style.marginTop = '5px';

    const btnSubmit = formPendaftaran.querySelector('.btn-submit');
    btnSubmit.insertAdjacentElement('afterend', btnHapus);

    btnHapus.addEventListener('click', function () {
        formPendaftaran.reset();
    });
}