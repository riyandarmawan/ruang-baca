<x-dashboard.layout title="{{ $title }}">
    <div class="flex items-center justify-center p-6">
        <div class="h-fit min-w-[40rem] rounded border border-primary p-4 shadow shadow-slate-500">
            <h1 class="mb-6 text-center text-xl font-bold">Tambah Data Buku</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="kode_buku">Kode Buku</label>
                    <input type="number" name="kode_buku" id="kode_buku"
                        value="{{ $errors->has('kode_buku') ? '' : old('kode_buku') }}" required
                        class="{{ $errors->has('kode_buku') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">
                    @error('kode_buku')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" required
                        value="{{ $errors->has('judul') ? '' : old('judul') }}"
                        class="{{ $errors->has('judul') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">
                    @error('judul')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" required
                        value="{{ $errors->has('penerbit') ? '' : old('penerbit') }}"
                        class="{{ $errors->has('penerbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">
                    @error('penerbit')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ currentYear: new Date().getFullYear() }" class="mb-4 grid grid-cols-3 items-center">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" min="1900" max="2100" step="1" name="tahun_terbit"
                        id="tahun_terbit" required x-bind:value="currentYear"
                        value="{{ $errors->has('tahun_terbit') ? '' : old('tahun_terbit') }}"
                        class="{{ $errors->has('tahun_terbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">
                    @error('tahun_terbit')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" id="jumlah_halaman" required
                        value="{{ $errors->has('jumlah_halaman') ? '' : old('jumlah_halaman') }}"
                        class="{{ $errors->has('jumlah_halaman') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">
                    @error('jumlah_halaman')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" required
                        class="col-span-2 w-full outline-none focus:ring focus:ring-primary rounded border border-primary p-2 shadow shadow-slate-500">
                        @foreach ($kategoris as $kategori)
                            <option {{ old('kategori_id') ? 'selected' : '' }} value="{{ $kategori->id }}">
                                {{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" required
                        class="{{ $errors->has('deskripsi') ? 'input-error' : 'input-unerror' }} col-span-2 w-full outline-none focus:ring rounded border border-primary p-2 shadow shadow-slate-500">{{ $errors->has('deskripsi') ? '' : old('deskripsi') }}</textarea>
                    @error('deskripsi')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 flex justify-center">
                    <button
                        class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
