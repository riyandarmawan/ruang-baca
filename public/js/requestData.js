function tambahBarisBuku() {
    const bookContainer = document.getElementById('book-container');
    const rowElement = document.createElement('tr');
    rowElement.innerHTML = `
        <td class="p-0">
            <input type="text" name="kode_buku[]" required autocomplete="off" class="kode_buku w-full rounded px-4 py-2 outline-none">
        </td>
        <td class="p-0">
            <input type="text" name="judul[]" disabled class="judul w-full rounded px-4 py-2 outline-none">
        </td>
        <td class="p-0">
            <input type="text" name="penulis[]" disabled class="penulis w-full rounded px-4 py-2 outline-none">
        </td>
        <td class="p-0">
            <input type="text" name="penerbit[]" disabled class="penerbit w-full rounded px-4 py-2 outline-none">
        </td>
        <td class="p-0">
            <input type="text" name="tahun_terbit[]" disabled class="tahun_terbit w-full rounded px-4 py-2 outline-none">
        </td>
        <td class="p-0">
            <input type="number" name="jumlah[]" min="1" value="1" required class="jumlah w-full rounded px-4 py-2 outline-none">
        </td>
    `;

    bookContainer.appendChild(rowElement);
}

(() => {
    document.addEventListener('DOMContentLoaded', function () {
        ambilSemuaSiswa();

        window.filterSiswa = filterSiswa;
    });

    let siswas = [];
    let selectedNisn = null;

    let bukus = [];
    let selectedKodeBuku = null;

    async function ambilSemuaSiswa() {
        try {
            const response = await fetch(`http://127.0.0.1:8000/api/siswas`);
            if (!response.ok) {
                throw new Error('Terjadi kesalahan saat mengambil data.');
            }
            siswas = await response.json();
            updateSiswaAutocompleteList(siswas);
        } catch (error) {
            console.error(error);
        }
    }

    // Updates the autocomplete list dynamically
    function updateSiswaAutocompleteList(filteredSiswas) {
        const autocompleteBox = document.getElementById('autocomplete-box');
        const nisnListContainer = autocompleteBox.getElementsByTagName('ul')[0];
        nisnListContainer.innerHTML = ''; // Clear previous results

        // If no results, show a message
        if (filteredSiswas.length < 1) {
            const li = document.createElement('li');
            li.className = 'py-2 px-4 hover:text-background hover:bg-tersier cursor-pointer font-medium';
            li.textContent = 'NISN tidak terdaftar!';
            nisnListContainer.appendChild(li);
        } else {
            filteredSiswas.forEach(siswa => {
                const li = document.createElement('li');
                li.className = `py-2 px-4 hover:text-background hover:bg-tersier cursor-pointer font-medium`;

                const sanitizedNisn = window.purify.sanitize(siswa.nisn); // Sanitize NISN
                li.textContent = sanitizedNisn;

                // On selection of NISN from the list
                li.addEventListener('click', () => {
                    const nisnInput = document.getElementById('nisn');
                    nisnInput.value = sanitizedNisn;

                    if (selectedNisn) {
                        selectedNisn.classList.remove('bg-tersier', 'text-background');
                    }

                    li.classList.add('bg-tersier', 'text-background');
                    selectedNisn = li;

                    pilihSiswa(siswa); // Fill in the student details
                });

                nisnListContainer.appendChild(li);
            });
        }
    }

    // Filters the students based on the input value
    function filterSiswa(query) {
        const filtered = siswas.filter(siswa => siswa.nisn.toLowerCase().includes(query.toLowerCase()));
        updateSiswaAutocompleteList(filtered);
    }

    // Updates the fields when a student is selected
    function pilihSiswa(siswa) {
        const nama = document.getElementById('nama');
        const kodeKelas = document.getElementById('kode_kelas');
        nama.value = siswa.nama;
        kodeKelas.value = siswa.kode_kelas;
    }
})();