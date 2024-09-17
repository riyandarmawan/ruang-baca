<x-dashboard.layout title="{{ $title }}">
    <div x-data="{ modal: false, active: 'detail' }" class="relative">
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
                        <label for="tanggal_pinjam" class="w-48 whitespace-nowrap">Tanggal Pinjam</label>
                        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
                            value="{{ $peminjaman->tanggal_pinjam }}" disabled
                            class="w-full rounded border px-4 py-2 outline-none focus:ring">
                    </div>
                    <div class="col-start-3 row-start-2 flex items-center gap-4">
                        <label for="tanggal_kembali" class="w-48 whitespace-nowrap">Tanggal Kembali</label>
                        <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                            value="{{ $peminjaman->tanggal_kembali }}" disabled
                            class="w-full rounded border px-4 py-2 outline-none focus:ring">
                    </div>

                    <!-- NISN Field -->
                    <div class="col-start-1 row-start-1 flex items-center gap-4">
                        <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                        <div class="w-full">
                            <input type="text" inputmode="numeric" id="nisn" name="nisn"
                                value="{{ $peminjaman->nisn }}" disabled
                                class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>
                    </div>

                    <!-- Nama and Kode Kelas Fields -->
                    <div class="col-start-1 row-start-2 flex items-center gap-4">
                        <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ $peminjaman->siswa->nama }}"
                            disabled class="w-full rounded border px-4 py-2 outline-none focus:ring">
                    </div>
                    <div class="col-start-1 row-start-3 flex items-center gap-4">
                        <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                        <input type="text" id="kode_kelas" name="kode_kelas"
                            value="{{ $peminjaman->siswa->kode_kelas }}" disabled
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
                            @foreach ($peminjaman->bukus as $buku)
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
                                        <input type="number" value="{{ $buku->pivot->jumlah }}"
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

                    <form action="" method="POST" class="grid grid-cols-3 gap-8">
                        @csrf
                        <!-- Date Fields -->
                        <div class="col-start-3 row-start-1 flex items-center gap-4">
                            <label for="tanggal_pinjam" class="w-48 whitespace-nowrap">Tanggal Pinjam</label>
                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
                                value="{{ $peminjaman->tanggal_pinjam }}" readonly
                                class="w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>
                        <div class="col-start-3 row-start-2 flex items-center gap-4">
                            <label for="tanggal_kembali" class="w-48 whitespace-nowrap">Tanggal Kembali</label>
                            <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                value="{{ $peminjaman->tanggal_kembali }}" readonly
                                class="w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>

                        <!-- NISN Field -->
                        <div class="col-start-1 row-start-1 flex items-center gap-4">
                            <label for="nisn" class="w-48 whitespace-nowrap">NISN</label>
                            <div class="w-full">
                                <input type="text" inputmode="numeric" id="nisn" name="nisn"
                                    @keydown.tab="ambilDataSiswa()" value="{{ $peminjaman->nisn }}" autofocus
                                    required
                                    class="input-unerror w-full rounded border px-4 py-2 outline-none focus:ring">
                            </div>
                        </div>

                        <!-- Nama and Kode Kelas Fields -->
                        <div class="col-start-1 row-start-2 flex items-center gap-4">
                            <label for="nama" class="w-48 whitespace-nowrap">Nama</label>
                            <input type="text" id="nama" name="nama"
                                value="{{ $peminjaman->siswa->nama }}" disabled
                                class="w-full rounded border px-4 py-2 outline-none focus:ring">
                        </div>
                        <div class="col-start-1 row-start-3 flex items-center gap-4">
                            <label for="kode_kelas" class="w-48 whitespace-nowrap">Kelas</label>
                            <input type="text" id="kode_kelas" name="kode_kelas"
                                value="{{ $peminjaman->siswa->kode_kelas }}" disabled
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
                                @foreach ($peminjaman->bukus as $buku)
                                    <tr>
                                        <td class="p-0">
                                            <input type="text" name="kode_buku[]" required
                                                onkeydown="if(event.key === 'Tab') ambilDataBuku(this)" value="{{ $buku->kode_buku }}"
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
                                            <input type="number" name="jumlah[]" min="1" value="1" value="{{ $buku->pivot->jumlah }}"
                                                required class="jumlah w-full rounded px-4 py-2 outline-none">
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
                    </form>

                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <a x-on:click="modal = !modal" x-ref="delete"
                        href="/dashboard/siswa/hapus/{{ $peminjaman->id }}" @click.prevent=""
                        class="font-medium text-red-500">Hapus data peminjaman ini</a>
                </div>
            </div>
        </div>

        <script>
            function bookComponent() {
                return {
                    addBook() {
                        const template = document.getElementById('book-template').content.cloneNode(true);
                        this.$refs.bookContainer.appendChild(template);
                    }
                };
            }
        </script>

        <div x-bind:class="modal ? '!block' : ''"
            class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
            <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
                <span class="i-mdi-alert me-2 text-lg"></span>
                Peringatan
            </div>
            <div class="p-4">Apakah anda yakin ingin menghapus data peminjaman ini?</div>
            <div class="flex items-center justify-end bg-gray-200 p-4">
                <a x-bind:href="$refs.delete.href"
                    class="me-4 rounded bg-red-500 px-4 py-1 font-medium text-background shadow shadow-slate-500">Ya</a>
                <p x-on:click="modal = !modal"
                    class="cursor-pointer rounded bg-primary px-4 py-1 font-medium text-background shadow shadow-slate-500">
                    Tidak</p>
            </div>
        </div>
    </div>

    <script src="/js/requestDataPeminjaman.js"></script>
</x-dashboard.layout>
