<x-dashboard.layout title="{{ $title }}">
    <div class="p-4">
        <form action="" method="POST" class="grid grid-cols-3 gap-8" x-data="bookFormHandler()">
            <!-- Date Fields -->
            <div class="col-start-3 row-start-1 flex items-center gap-4">
                <label for="tanggal_pinjam" class="w-48 whitespace-nowrap">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" readonly
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>
            <div class="col-start-3 row-start-2 flex items-center gap-4">
                <label for="tanggal_kembali" class="w-48 whitespace-nowrap">Tanggal Kembali</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                    value="{{ date('Y-m-d', strtotime('+1 week')) }}" readonly
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>

            <!-- NISN Field -->
            <div class="col-start-1 row-start-1 flex items-center gap-4">
                <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                <input type="text" inputmode="numeric" id="nisn" name="nisn" x-model="nisn" @keydown.tab="fetchStudent()" autofocus
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>
            <!-- Nama and Kode Kelas Fields -->
            <div class="col-start-1 row-start-2 flex items-center gap-4">
                <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                <input type="text" id="nama" name="nama" x-model="nama" disabled
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>
            <div class="col-start-1 row-start-3 flex items-center gap-4">
                <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                <input type="text" id="kode_kelas" name="kode_kelas" x-model="kodeKelas" disabled
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>

            <!-- Book Table -->
            <table class="col-span-3 col-start-1 row-start-4 table-auto">
                <thead>
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Buku</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic book rows -->
                    <template x-for="(book, index) in books" :key="index">
                        <tr>
                            <td class="p-0">
                                <input type="text" x-model="book.kode_buku" @keydown.tab="fetchBookData(index)"
                                    class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.judul" readonly class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.penulis" readonly class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.penerbit" readonly class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.tahun_terbit" readonly class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="number" x-model="book.jumlah" value="1" min="1" class="w-full rounded px-4 py-2 outline-none">
                            </td>
                        </tr>
                    </template>

                    <!-- Add Row and Save Buttons -->
                    <tr>
                        <td colspan="3" class="p-0">
                            <button type="button" @click="addBookRow()" class="bg-tersier w-full text-white py-2 font-bold">Tambah Buku</button>
                        </td>
                        <td colspan="3" class="p-0">
                            <button type="submit" class="bg-primary w-full text-white py-2 font-bold">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script src="/js/requestDataPeminjaman.js"></script>
</x-dashboard.layout>
