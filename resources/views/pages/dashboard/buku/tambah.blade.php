<x-dashboard.layout title="{{ $title }}">
    <div class="p-6 flex items-center justify-center">
        <div class="border border-primary h-fit p-4 rounded shadow shadow-slate-500 min-w-[40rem]">
            <h1 class="text-center font-bold text-xl mb-6">Tambah Data Siswa</h1>
            <form action="" method="POST">
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="kode_buku">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div x-data="{ currentYear: new Date().getFullYear() }" class="grid grid-cols-3 items-center mb-4">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" min="1900" max="2100" step="1" x-bind:value="currentYear" name="tahun_terbit" id="tahun_terbit" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" id="jumlah_halaman" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 "></textarea>
                </div>
                <div class="flex justify-center mt-6">
                <button class="py-2 px-6 bg-primary text-background rounded shadow shadow-slate-500 font-medium hover:opacity-80 active:opacity-70 focus:ring focus:ring-slate-500">Tambah</button></div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
