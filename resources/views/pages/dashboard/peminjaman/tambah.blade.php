<x-dashboard.layout title="{{ $title }}">
    <div class="flex items-center justify-center p-6">
        <div class="h-fit min-w-[40rem] rounded border border-primary p-4 shadow shadow-slate-500">
            <h1 class="mb-6 text-center text-xl font-bold">Tambah Data Peminjaman</h1>
            <form action="" method="POST">
                <!-- Siswa Selection -->
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="nisn">Siswa</label>
                    <select name="nisn" id="nisn"
                        class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->nisn }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Books Section -->
                <div x-data="bookComponent()" class="mb-4 grid grid-cols-3">
                    <label for="kode_buku">Buku</label>
                    <div id="book-container" class="col-span-2 grid gap-4" x-ref="bookContainer">
                        <div class="flex">
                            <select name="kode_buku"
                                class="w-full rounded border border-primary p-2 shadow shadow-slate-500">
                                @foreach ($bukus as $buku)
                                    <option value="{{ $buku->kode_buku }}">{{ $buku->judul }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="jumlah" value="1"
                                class="w-14 rounded border border-primary p-2 shadow shadow-slate-500">
                        </div>
                    </div>
                    <div class="col-span-3 flex justify-end">
                        <button type="button" class="mt-4 w-fit cursor-pointer" @click="addBook()">+ Tambah buku</button>
                    </div>
                </div>

                <!-- Date Input -->
                <div x-data="{ currentDate: new Date().toISOString().split('T')[0] }" class="mb-4 grid grid-cols-3 items-center">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" x-bind:value="currentDate"
                        class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                </div>

                <!-- Return Date Input -->
                <div x-data="{ currentDate: (() => {
                        const today = new Date();
                        today.setDate(today.getDate() + 7);
                        return today.toISOString().split('T')[0];
                    })() }" class="mb-4 grid grid-cols-3 items-center">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" x-bind:value="currentDate"
                        class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex justify-center">
                    <button
                        class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">
                        Tambah
                    </button>
                </div>
            </form>
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
</x-dashboard.layout>
