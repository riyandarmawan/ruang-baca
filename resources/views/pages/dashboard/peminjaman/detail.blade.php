<x-dashboard.layout title="{{ $title }}">
    <div x-data="{ modal: false, active: 'detail' }" class="relative">
        <div class="flex items-center justify-center p-6">
            <div
                class="h-[32rem] min-w-[40rem] max-w-[60rem] overflow-auto rounded border border-primary shadow shadow-slate-500">
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

                <div x-bind:class="active !== 'detail' ? '' : '!grid'" class="hidden gap-4 p-4">
                    <div class="grid grid-cols-4">
                        <p>NISN</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $peminjaman->nisn }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Buku</p>
                        <div class="col-span-3">
                            <ul>
                                @foreach ($peminjaman->bukus as $buku)
                                    <li class="list-inside list-disc">
                                        {{ $buku->judul . ' (' . $buku->pivot->jumlah . ')' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Tanggal Pinjam</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $peminjaman->tanggal_pinjam }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Tanggal Kembali</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $peminjaman->tanggal_kembali }}</p>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dashboard/peminjaman/detail/{{ $peminjaman->id }}" method="POST">
                        <!-- Siswa Selection -->
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="nisn">Siswa</label>
                            <select name="nisn" id="nisn"
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                                @foreach ($siswas as $siswa)
                                    <option {{ $peminjaman->nisn === $siswa->nisn ? 'selected' : '' }}
                                        value="{{ $siswa->nisn }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Books Section -->
                        <div x-data="bookComponent()" class="mb-4 grid grid-cols-3">
                            <label for="kode_buku">Buku</label>
                            <div id="book-container" class="col-span-2 grid gap-4" x-ref="bookContainer">
                                @foreach ($peminjaman->bukus as $buku)
                                    <div class="flex">
                                        <select name="kode_buku"
                                            class="w-full rounded border border-primary p-2 shadow shadow-slate-500">
                                            @foreach ($bukus as $data_buku)
                                                <option
                                                    {{ $buku->kode_buku === $data_buku->kode_buku ? 'selected' : '' }}
                                                    value="{{ $data_buku->kode_buku }}">{{ $data_buku->judul }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="jumlah" value="{{ $buku->pivot->jumlah }}"
                                            class="w-14 rounded border border-primary p-2 shadow shadow-slate-500">
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-span-3 flex justify-end">
                                <button type="button" class="mt-4 w-fit cursor-pointer" @click="addBook()">+ Tambah
                                    buku</button>
                            </div>
                        </div>

                        <!-- Date Input -->
                        <div x-data="{ currentDate: new Date().toISOString().split('T')[0] }" class="mb-4 grid grid-cols-3 items-center">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" x-bind:value="currentDate"
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        </div>

                        <!-- Return Date Input -->
                        <div x-data="{
                            currentDate: (() => {
                                const today = new Date();
                                today.setDate(today.getDate() + 7);
                                return today.toISOString().split('T')[0];
                            })()
                        }" class="mb-4 grid grid-cols-3 items-center">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                                x-bind:value="currentDate"
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-center">
                            <button
                                class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">
                                Ubah
                            </button>
                        </div>
                    </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <a x-on:click="modal = !modal" x-ref="delete" href="/dashboard/siswa/hapus/{{ $peminjaman->id }}"
                        @click.prevent="" class="font-medium text-red-500">Hapus data peminjaman ini</a>
                </div>
            </div>
        </div>

        <!-- Template for Adding Books -->
        <template x-data="bookComponent()" id="book-template">
            <div class="flex">
                <select name="kode_buku" class="w-full rounded border border-primary p-2 shadow shadow-slate-500">
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->kode_buku }}">{{ $buku->judul }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah" value="1"
                    class="w-14 rounded border border-primary p-2 shadow shadow-slate-500">
            </div>
        </template>

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
</x-dashboard.layout>
