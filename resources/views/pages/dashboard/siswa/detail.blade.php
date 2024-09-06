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
                        <p class="col-span-3"><span class="me-2">:</span> {{ $siswa->nisn }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Nama</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $siswa->nama }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Alamat</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $siswa->alamat }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>No Telepon</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $siswa->no_telp }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Kelas</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $siswa->kode_kelas }}</p>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dashboard/siswa/ubah/{{ $siswa->nisn }}" method="POST">
                        @csrf
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="nisn">NISN</label>
                            <input type="text" inputmode="numeric" name="nisn" id="nisn"
                                value="{{ $errors->has('nisn') ? $siswa->nisn : (old('nisn') ? old('nisn') : $siswa->nisn) }}"
                                required
                                class="{{ $errors->has('nisn') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('nisn')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"
                                value="{{ $errors->has('nama') ? $siswa->nama : (old('nama') ? old('nama') : $siswa->nama) }}"
                                required
                                class="{{ $errors->has('nama') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('nama')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" required
                                class="{{ $errors->has('alamat') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">{{ $errors->has('alamat') ? $siswa->alamat : (old('alamat') ? old('alamat') : $siswa->alamat) }}</textarea>
                            @error('alamat')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="no_telp">No Telp</label>
                            <input type="text" inputmode="numeric" name="no_telp" id="no_telp"
                                value="{{ $errors->has('no_telp') ? $siswa->no_telp : (old('no_telp') ? old('no_telp') : $siswa->no_telp) }}"
                                required
                                class="{{ $errors->has('no_telp') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('no_telp')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="kode_kelas">Kelas</label>
                            <select name="kode_kelas" id="kode_kelas" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none">
                                @foreach ($kelases as $kelas)
                                    <option
                                        {{ (old('kode_kelas') ?? $siswa->kode_kelas) == $kelas->kode_kelas ? 'selected' : '' }}
                                        value="{{ $kelas->kode_kelas }}">{{ $kelas->kode_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-6 flex justify-center">
                            <button
                                class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Ubah</button>
                        </div>
                    </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <a x-on:click="modal = !modal" x-ref="delete" href="/dashboard/siswa/hapus/{{ $siswa->nisn }}"
                        @click.prevent="" class="font-medium text-red-500">Hapus data siswa ini</a>
                </div>
            </div>
        </div>

        <div x-bind:class="modal ? '!block' : ''"
            class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
            <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
                <span class="i-mdi-alert me-2 text-lg"></span>
                Peringatan
            </div>
            <div class="p-4">Apakah anda yakin ingin menghapus data siswa ini?</div>
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
