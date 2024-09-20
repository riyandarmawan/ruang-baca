<x-dashboard.layout title="{{ $title }}">
    <div class="p-4">
        @if ($errors->any())
            <div class="mb-4 rounded bg-red-500 p-4 font-bold text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST" class="grid grid-cols-3 gap-8">
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
            <div class="col-start-1 row-start-1 flex items-center gap-2">
                <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                <div x-data="{ showAutoComplete: false, nisn: '' }" @keydown.esc.window="showAutoComplete = false" class="relative w-full">
                    <input type="text" inputmode="numeric" id="nisn" name="nisn" x-model="nisn"
                        @input="showAutoComplete = true; window.filterSiswa(nisn)"
                        @keydown.alt="showAutoComplete = !showAutoComplete" autocomplete="off" autofocus required
                        class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring">
                    <div x-cloak x-show="showAutoComplete" @click.outside="showAutoComplete = false"
                        id="autocomplete-box" class="absolute left-full top-0 ms-2 h-fit w-full bg-background">
                        <ul
                            class="max-h-40 overflow-hidden overflow-y-scroll rounded border border-primary focus:ring focus:ring-primary">
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nama and Kode Kelas Fields -->
            <div class="col-start-1 row-start-2 flex items-center gap-4">
                <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                <input type="text" id="nama" name="nama" disabled
                    class="w-full rounded border px-4 py-2 outline-none focus:ring">
            </div>
            <div class="col-start-1 row-start-3 flex items-center gap-4">
                <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                <input type="text" id="kode_kelas" name="kode_kelas" disabled
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
                <tbody id="book-container" x-init="tambahBarisBuku()">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="p-0">
                            <button type="button" @click="tambahBarisBuku()"
                                class="w-full bg-tersier py-2 font-bold text-white">Tambah Baris Buku</button>
                        </td>
                        <td colspan="3" class="p-0">
                            <button type="submit" class="w-full bg-primary py-2 font-bold text-white">Simpan</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>

    <script src="/js/requestData.js"></script>
</x-dashboard.layout>
