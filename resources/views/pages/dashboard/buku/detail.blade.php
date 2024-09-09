<x-dashboard.layout title="{{ $title }}">
    <div x-data="{
        modal: false,
        active: window.location.hash ? window.location.hash.substring(1) : 'detail',
        changeTab(tab) {
            this.active = tab;
            window.location.hash = tab;
        },
        preserveHash(event) {
            // Prevent the form from resetting the hash
            const currentHash = window.location.hash;
            event.target.action += currentHash;
        }
    }" x-init="if (!window.location.hash) {
        window.location.hash = 'detail';
    }
    active = window.location.hash.substring(1);
    window.addEventListener('hashchange', () => active = window.location.hash.substring(1));">
        <div class="flex items-center justify-center p-6">
            <div
                class="h-[32rem] min-w-[40rem] max-w-[60rem] overflow-auto rounded border border-primary shadow shadow-slate-500">
                <ul class="flex justify-around border-b border-primary p-4">
                    <li>
                        <a href="#detail" x-bind:class="active === 'detail' ? 'after:w-full' : ''"
                            class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                            Detail
                        </a>
                    </li>
                    <li>
                        <a href="#ubah" x-bind:class="active === 'ubah' ? 'after:w-full' : ''"
                            class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                            Ubah
                        </a>
                    </li>
                    <li>
                        <a href="#hapus" x-bind:class="active === 'hapus' ? 'after:w-full' : ''"
                            class="relative cursor-pointer after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:content-[''] hover:after:w-full">
                            Hapus
                        </a>
                    </li>
                </ul>

                <div x-bind:class="active !== 'detail' ? '' : '!grid'" class="hidden gap-4 p-4">
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Sampul</strong>
                        <span>:</span>
                        <img src="{{ asset("storage/images/bukus/$buku->sampul") }}" alt="{{ $buku->judul }}" class="aspect-[2/3] object-cover w-36 rounded-xl">
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Kode Buku</strong>
                        <span>:</span>
                        <div>{{ formatKodeBuku($buku->kode_buku) }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Judul</strong>
                        <span>:</span>
                        <div>{{ $buku->judul }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Penerbit</strong>
                        <span>:</span>
                        <div>{{ $buku->penerbit }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Tahun Terbit</strong>
                        <span>:</span>
                        <div>{{ $buku->tahun_terbit }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Jumlah Halaman</strong>
                        <span>:</span>
                        <div>{{ $buku->jumlah_halaman }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Kategori</strong>
                        <span>:</span>
                        <div>{{ $buku->kategori->nama }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Deskripsi</strong>
                        <span>:</span>
                        <div class="whitespace-pre-wrap">{{ $buku->deskripsi }}</div>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dashboard/buku/ubah/{{ $buku->slug }}" method="POST">
                        @csrf
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="kode_buku">Kode Buku</label>
                            <input type="number" name="kode_buku" id="kode_buku"
                                value="{{ $errors->has('kode_buku') ? $buku->kode_buku : old('kode_buku', $buku->kode_buku) }}"
                                required
                                class="{{ $errors->has('kode_buku') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('kode_buku')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" required
                                value="{{ $errors->has('judul') ? $buku->judul : old('judul', $buku->judul) }}"
                                class="{{ $errors->has('judul') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('judul')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" required
                                value="{{ $errors->has('penerbit') ? $buku->penerbit : old('penerbit', $buku->penerbit) }}"
                                class="{{ $errors->has('penerbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('penerbit')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div x-data="{ currentYear: new Date().getFullYear() }" class="mb-4 grid grid-cols-3 items-center">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" min="1900" max="2100" step="1" name="tahun_terbit"
                                id="tahun_terbit" required x-bind:value="currentYear"
                                value="{{ $errors->has('tahun_terbit') ? $buku->tahun_terbit : old('tahun_terbit', $buku->tahun_terbit) }}"
                                class="{{ $errors->has('tahun_terbit') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('tahun_terbit')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="jumlah_halaman">Jumlah Halaman</label>
                            <input type="number" name="jumlah_halaman" id="jumlah_halaman" required
                                value="{{ $errors->has('jumlah_halaman') ? $buku->jumlah_halaman : old('jumlah_halaman', $buku->jumlah_halaman) }}"
                                class="{{ $errors->has('jumlah_halaman') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('jumlah_halaman')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring focus:ring-primary">
                                @foreach ($kategoris as $kategori)
                                    <option
                                        {{ old('kategori_id', $buku->kategori_id) == $kategori->id ? 'selected' : '' }}
                                        value="{{ $kategori->id }}">
                                        {{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" required
                                class="{{ $errors->has('deskripsi') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">{{ $errors->has('deskripsi') ? $buku->deskripsi : old('deskripsi', $buku->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-6 flex justify-center">
                            <button
                                class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Ubah</button>
                        </div>
                    </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <!-- Button to trigger the modal -->
                    <button x-on:click="modal = !modal" type="button"
                        class="font-medium text-red-500 focus:outline-none">Hapus data buku ini</button>
                </div>

                <!-- Modal for confirmation -->
                <div x-bind:class="modal ? '!block' : ''"
                    class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
                    <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
                        <span class="i-mdi-alert me-2 text-lg"></span>
                        Peringatan
                    </div>
                    <div class="p-4">Apakah anda yakin ingin menghapus data buku ini?</div>
                    <div class="flex items-center justify-end bg-gray-200 p-4">
                        <form action="/dashboard/buku/hapus/{{ $buku->slug }}" method="post">
                            @csrf
                            <button type="submit"
                                class="me-4 rounded bg-red-500 px-4 py-1 font-medium text-background shadow shadow-slate-500">Ya</button>
                        </form>
                        <button x-on:click="modal = !modal" type="button"
                            class="cursor-pointer rounded bg-primary px-4 py-1 font-medium text-background shadow shadow-slate-500">
                            Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
