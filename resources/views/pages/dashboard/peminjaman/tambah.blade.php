<x-dashboard.layout title="{{ $title }}">
    <div class="p-4">
        @if ($errors->any())
            <div class="col-span-3 mb-8 rounded bg-red-500 p-4 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST" class="grid grid-cols-3 gap-8" x-data="bookFormHandler({{ json_encode(old('books', [])) }})">
            @csrf
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
                <div class="w-full">
                    <input type="text" inputmode="numeric" id="nisn" name="nisn" x-model="nisn"
                        x-init="nisn = '{{ old('nisn') }}'" @keydown.tab="nisn ? fetchStudent() : alert('NISN tidak boleh kosong!')"
                        autofocus required class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring"
                        x-ref="nisn">
                </div>
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
                            <!-- Kode Buku Field -->
                            <td class="p-0">
                                <input type="text" x-model="book.kode_buku"
                                    @keydown.tab="book.kode_buku ? fetchBookData(index) : alert('Kode buku tidak boleh kosong!')"
                                    :x-ref="'kode_buku' + index" :name="'books[' + index + '][kode_buku]'" required
                                    class="w-full rounded px-4 py-2 outline-none" :value="book.kode_buku">
                            </td>

                            <td class="p-0">
                                <input type="text" x-model="book.judul" readonly :x-ref="'judul' + index"
                                    class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.penulis" readonly :x-ref="'penulis' + index"
                                    class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.penerbit" readonly :x-ref="'penerbit' + index"
                                    class="w-full rounded px-4 py-2 outline-none">
                            </td>
                            <td class="p-0">
                                <input type="text" x-model="book.tahun_terbit" readonly
                                    :x-ref="'tahun_terbit' + index" class="w-full rounded px-4 py-2 outline-none">
                            </td>

                            <!-- Jumlah Buku Field -->
                            <td class="p-0">
                                <input type="number" x-model="book.jumlah" min="1" :x-ref="'jumlah' + index"
                                    required :name="'books[' + index + '][jumlah]'"
                                    class="w-full rounded px-4 py-2 outline-none"
                                    :value="book.jumlah ? book.jumlah : 1">
                            </td>
                        </tr>
                    </template>

                    <!-- Add Row and Save Buttons -->
                    <tr>
                        <td colspan="3" class="p-0">
                            <button type="button" @click="addBookRow()"
                                class="w-full bg-tersier py-2 font-bold text-white">Tambah Buku</button>
                        </td>
                        <td colspan="3" class="p-0">
                            <button type="submit" class="w-full bg-primary py-2 font-bold text-white">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script src="/js/requestDataPeminjaman.js"></script>
</x-dashboard.layout>
