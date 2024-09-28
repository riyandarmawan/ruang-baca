<x-dashboard.layout title="{{ $title }}">
    <div x-data="{ showModalHapus: false, active: 'detail' }" class="relative">
        <div class="flex items-center justify-center p-6">
            <div class="h-[32rem] min-w-[40rem] overflow-auto rounded border border-primary shadow shadow-slate-500">
                <ul class="flex justify-around border-b border-primary p-4">
                    <li x-on:click="active = 'detail'" x-bind:class="active === 'detail' ? 'after:w-full' : ''"
                        class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                        Detail</li>
                    <li x-on:click="active = 'ubah'" x-bind:class="active === 'ubah' ? 'after:w-full' : ''"
                        class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                        Ubah</li>
                    <li x-on:click="active = 'hapus'" x-bind:class="active === 'hapus' ? 'after:w-full' : ''"
                        class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                        Hapus</li>
                </ul>

                <div x-bind:class="active !== 'detail' ? '' : '!grid'" class="hidden grid-cols-3 gap-8 p-4">
                    <!-- Date Fields -->
                    <div class="col-start-3 row-start-1 flex items-center gap-4">
                        <label for="tanggal_kembali" class="w-48 whitespace-nowrap">Tanggal Kembali</label>
                        <input type="date" value="{{ $pengembalian->tanggal_kembali }}" disabled
                            class="w-full rounded border px-4 py-2 outline-none focus:ring">
                    </div>

                    <!-- NISN Field -->
                    <div class="col-start-1 row-start-1 flex items-center gap-2">
                        <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                        <div class="w-full">
                            <input type="text" inputmode="numeric" value="{{ $pengembalian->nisn }}" disabled
                                class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>
                    </div>

                    <!-- Nama and Kode Kelas Fields -->
                    <div class="col-start-1 row-start-2 flex items-center gap-4">
                        <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                        <input type="text" value="{{ $pengembalian->siswa->nama }}" disabled
                            class="w-full rounded border px-4 py-2 outline-none focus:ring">
                    </div>
                    <div class="col-start-1 row-start-3 flex items-center gap-4">
                        <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                        <input type="text" value="{{ $pengembalian->siswa->kode_kelas }}" disabled
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
                            @foreach ($pengembalian->bukus as $buku)
                                <tr>
                                    <td class="p-0">
                                        <input type="text" value="{{ $buku->kode_buku }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>

                                    <td class="p-0">
                                        <input type="text" value="{{ $buku->judul }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>
                                    <td class="p-0">
                                        <input type="text" value="{{ $buku->penulis }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>
                                    <td class="p-0">
                                        <input type="text" value="{{ $buku->penerbit }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>
                                    <td class="p-0">
                                        <input type="text" value="{{ $buku->tahun_terbit }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>

                                    <!-- Jumlah Buku Field -->
                                    <td class="p-0">
                                        <input type="number" value="{{ $buku->pivot->jumlah }}" disabled
                                            class="w-full rounded px-4 py-2 outline-none">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    @if ($errors->any())
                        <div class="mb-4 rounded bg-red-500 p-4 font-bold text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/dashboard/pengembalian/ubah/{{ $pengembalian->id }}" method="POST"
                        x-data="{ showNisnSuggestions: false, nisn: '{{ $pengembalian->siswa->nisn }}', showKodeBukuSuggestions: false }" class="relative grid grid-cols-3 gap-8">
                        @csrf
                        <!-- Date Fields -->
                        <div class="col-start-3 row-start-1 flex items-center gap-4">
                            <label for="tanggal_kembali" class="w-48 whitespace-nowrap">Tanggal Kembali</label>
                            <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                value="{{ $pengembalian->tanggal_kembali }}" readonly
                                class="w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>

                        <!-- NISN Field -->
                        <div class="col-start-1 row-start-1 flex items-center gap-2">
                            <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                            <div class="relative w-full">
                                <input type="text" inputmode="numeric" id="nisn" name="nisn"
                                    x-model="nisn" @input="showNisnSuggestions = true; window.filterSiswa(nisn)"
                                    @keydown.alt="showNisnSuggestions = !showNisnSuggestions" autocomplete="off"
                                    autofocus required
                                    class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring">
                                <div x-cloak x-show="showNisnSuggestions" @click.outside="showNisnSuggestions = false"
                                    id="nisn-suggestions-box"
                                    class="absolute left-full top-0 ms-2 h-fit w-full bg-background">
                                    <ul
                                        class="max-h-40 overflow-hidden overflow-y-auto rounded border border-primary focus:ring focus:ring-primary">
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Nama and Kode Kelas Fields -->
                        <div class="col-start-1 row-start-2 flex items-center gap-4">
                            <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                            <input type="text" id="nama" name="nama" disabled
                                value="{{ $pengembalian->siswa->nama }}"
                                class="w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>
                        <div class="col-start-1 row-start-3 flex items-center gap-4">
                            <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                            <input type="text" id="kode_kelas" name="kode_kelas" disabled
                                value="{{ $pengembalian->siswa->kode_kelas }}"
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
                            <tbody id="book-container">
                                @foreach ($pengembalian->bukus as $buku)
                                    <tr x-data="{kodeBuku: '{{ $buku->kode_buku }}'}">
                                        <td class="p-0">
                                            <input type="text" name="kode_buku[]" required autocomplete="off"
                                                x-model="kodeBuku"
                                                @input="showKodeBukuSuggestions = true; window.filterBuku(kodeBuku)"
                                                @keydown.alt="showKodeBukuSuggestions = !showKodeBukuSuggestions"
                                                @focus="window.selectedKodeBukuInput = $el"
                                                class="kode_buku w-full rounded px-4 py-2 outline-none">
                                        </td>
                                        <td class="p-0">
                                            <input type="text" name="judul[]" disabled value="{{ $buku->judul }}"
                                                class="judul w-full rounded px-4 py-2 outline-none">
                                        </td>
                                        <td class="p-0">
                                            <input type="text" name="penulis[]" disabled value="{{ $buku->penulis }}"
                                                class="penulis w-full rounded px-4 py-2 outline-none">
                                        </td>
                                        <td class="p-0">
                                            <input type="text" name="penerbit[]" disabled value="{{ $buku->penerbit }}"
                                                class="penerbit w-full rounded px-4 py-2 outline-none">
                                        </td>
                                        <td class="p-0">
                                            <input type="text" name="tahun_terbit[]" disabled value="{{ $buku->tahun_terbit }}"
                                                class="tahun_terbit w-full rounded px-4 py-2 outline-none">
                                        </td>
                                        <td class="p-0">
                                            <input type="number" name="jumlah[]" min="1"
                                                value="{{ $buku->pivot->jumlah }}" required
                                                class="jumlah w-full rounded px-4 py-2 outline-none">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="p-0">
                                        <button type="button" @click="tambahBarisBuku()"
                                            class="w-full bg-tersier py-2 font-bold text-white">Tambah Baris
                                            Buku</button>
                                    </td>
                                    <td colspan="3" class="p-0">
                                        <button type="submit"
                                            class="w-full bg-primary py-2 font-bold text-white">Simpan</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div x-cloak x-show="showKodeBukuSuggestions" @click.outside="showKodeBukuSuggestions = false"
                            id="kode-buku-suggestions-box" class="absolute -bottom-44 h-fit w-full bg-background">
                            <ul
                                class="max-h-40 overflow-hidden overflow-y-auto rounded border border-primary focus:ring focus:ring-primary">
                            </ul>
                        </div>
                    </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <!-- Button to trigger the showModalHapus -->
                    <button x-on:click="showModalHapus = !showModalHapus" type="button"
                        class="font-medium text-red-500 focus:outline-none">Hapus data pengembalian ini</button>
                </div>

                <!-- Modal for confirmation -->
                 <div x-cloak x-show="showModalHapus"
                    class="fixed inset-0 z-40 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <!-- Modal Container -->
                    <div @click.outside="showModalHapus = false"
                        class="w-96 scale-100 transform rounded-lg bg-white p-6 shadow-lg transition-transform duration-300">
                        <!-- Modal Header -->
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">Konfirmasi Hapus</h2>
                            <button @click="showModalHapus = false"
                                class="i-mdi-close text-2xl text-gray-400 transition duration-200 hover:text-gray-600">
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="mt-4">
                            <p class="text-gray-600">
                                Apakah anda yakin ingin menghapus data pengembalian ini?
                            </p>
                        </div>

                        <!-- Modal Footer -->
                        <div class="mt-6 flex justify-end space-x-3">
                            <button @click="showModalHapus = false"
                                class="rounded bg-gray-200 px-4 py-2 font-medium text-gray-700 transition duration-200 hover:bg-gray-300">
                                Batal
                            </button>
                            <form action="/dashboard/pengembalian/hapus/{{ $pengembalian->id }}" method="POST">
                                @csrf
                                <button
                                    class="rounded bg-red-500 px-4 py-2 font-medium text-white transition duration-200 hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/requestData.js"></script>
</x-dashboard.layout>
