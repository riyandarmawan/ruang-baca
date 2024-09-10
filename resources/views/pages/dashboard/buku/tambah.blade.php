<x-dashboard.layout title="{{ $title }}">
    <div class="flex items-center justify-center p-6">
        <div class="h-fit min-w-[40rem] rounded border border-primary p-4 shadow shadow-slate-500">
            <h1 class="mb-6 text-center text-xl font-bold">Tambah Data Buku</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div x-data="{ imagePreview: '{{ asset('storage/images/bukus/no-cover.png') }}' }" class="mb-4 grid grid-cols-3 items-center">
                    <label for="sampul">Sampul</label>
                    <div class="col-span-2 flex flex-col gap-4">
                        <label for="sampul"
                            class="focus focus-ring {{ $errors->has('sampul') ? 'input-error' : 'input-unerror' }} aspect-[2/3] w-36 cursor-pointer overflow-hidden rounded-xl border border-primary focus:ring shadow shadow-slate-50 outline-none">
                            <img src="{{ asset('storage/images/bukus/no-cover.png') }}" :src="imagePreview" alt="Sampul"
                                class="aspect-[2/3] w-full object-cover">
                        </label>
                        <input type="file" name="sampul" id="sampul"
                            value="{{ $errors->has('sampul') ? '' : old('sampul') }}" required @change="fileChosen"
                            class="{{ $errors->has('sampul') ? 'input-error' : 'input-unerror' }} w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring hidden">
                    </div>
                    @error('sampul')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="kode_buku">Kode Buku</label>
                    <input type="number" name="kode_buku" id="kode_buku"
                        value="{{ $errors->has('kode_buku') ? '' : old('kode_buku') }}" required
                        class="{{ $errors->has('kode_buku') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('kode_buku')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" required
                        value="{{ $errors->has('judul') ? '' : old('judul') }}"
                        class="{{ $errors->has('judul') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('judul')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" required
                        value="{{ $errors->has('penerbit') ? '' : old('penerbit') }}"
                        class="{{ $errors->has('penerbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('penerbit')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ currentYear: new Date().getFullYear() }" class="mb-4 grid grid-cols-3 items-center">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" min="1900" max="2100" step="1" name="tahun_terbit"
                        id="tahun_terbit" required x-bind:value="currentYear"
                        value="{{ $errors->has('tahun_terbit') ? '' : old('tahun_terbit') }}"
                        class="{{ $errors->has('tahun_terbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('tahun_terbit')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" id="jumlah_halaman" required
                        value="{{ $errors->has('jumlah_halaman') ? '' : old('jumlah_halaman') }}"
                        class="{{ $errors->has('jumlah_halaman') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('jumlah_halaman')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" required
                        class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring focus:ring-primary">
                        @foreach ($kategoris as $kategori)
                            <option {{ old('kategori_id') ? 'selected' : '' }} value="{{ $kategori->id }}">
                                {{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" required
                        class="{{ $errors->has('deskripsi') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">{{ $errors->has('deskripsi') ? '' : old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 flex justify-center">
                    <button
                        class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function fileChosen(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-dashboard.layout>
