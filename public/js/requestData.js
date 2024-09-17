function tambahBarisBuku() {
    const bookContainer = document.getElementById('book-container');
    const rowElement = document.createElement('tr');
    rowElement.innerHTML = `
        <td class="p-0">
            <input type="text" name="kode_buku[]" required onkeydown="if(event.key === 'Tab') ambilDataBuku(this)" class="kode_buku w-full rounded px-4 py-2 outline-none">
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

function ambilDataSiswa() {
    const nisn = document.getElementById('nisn');
    const nama = document.getElementById('nama');
    const kodeKelas = document.getElementById('kode_kelas');

    if (!nisn.value) return alert('NISN tidak boleh kosong!');

    fetch(`http://127.0.0.1:8000/api/siswa/${nisn.value}`)
        .then(response => response.ok ? response.json() : response.json().then(error => { throw new Error(error.pesan) }))
        .then(siswa => {
            nama.value = siswa.nama;
            kodeKelas.value = siswa.kode_kelas;
        })
        .catch(error => {
            nisn.focus();
            nama.value = '';
            kodeKelas.value = '';
            alert(error);
        });
}

function ambilDataBuku(inputElement) {
    const row = inputElement.closest('tr');

    const kodeBuku = row.querySelector('.kode_buku');
    const judul = row.querySelector('.judul');
    const penulis = row.querySelector('.penulis');
    const penerbit = row.querySelector('.penerbit');
    const tahunTerbit = row.querySelector('.tahun_terbit');
    const jumlah = row.querySelector('.jumlah');

    if (!kodeBuku.value) return alert('Kode buku tidak boleh kosong!');

    fetch(`http://127.0.0.1:8000/api/buku/${kodeBuku.value}`)
        .then(response => response.ok ? response.json() : response.json().then(error => { throw new Error(error.pesan) }))
        .then(buku => {
            judul.value = buku.judul;
            penulis.value = buku.penulis;
            penerbit.value = buku.penerbit;
            tahunTerbit.value = buku.tahun_terbit;
        })
        .catch(error => {
            kodeBuku.focus();
            judul.value = '';
            penulis.value = '';
            penerbit.value = '';
            tahunTerbit.value = '';
            alert(error);
        });
}