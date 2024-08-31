<x-dashboard.layout title="{{ $title }}">
    <div x-data="{modal: false, active: 'detail' }" class="relative">
        <div class="flex items-center justify-center p-6">
            <div class="h-[28rem] min-w-[40rem] max-w-[60rem] rounded border border-primary shadow shadow-slate-500">
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
                    <form action="" method="POST">
                        <div class="mb-4 grid-cols-3 items-center grid">
                            <label for="nisn">NISN</label>
                            <input type="number" name="nisn" id="nisn" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500" value="{{ $siswa->nisn }}">
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500" value="{{ $siswa->nama }}">
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">{{ $siswa->alamat }}</textarea>
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="no_telp">No Telp</label>
                            <input type="text" name="no_telp" id="no_telp" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500" value="{{ $siswa->no_telp }}">
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="kode_kelas">Kelas</label>
                            <select name="kode_kelas" id="kode_kelas" required
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                                @foreach ($kelases as $kelas)
                                    <option {{ $kelas->kode_kelas === $siswa->kode_kelas ? 'selected' : '' }} value="{{ $kelas->kode_kelas }}">{{ $kelas->kode_kelas }}</option>
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
                    <a x-on:click="modal = !modal" x-ref="delete" href="/dashboard/siswa/hapus/{{ $siswa->nisn }}" @click.prevent="" class="text-red-500 font-medium">Hapus data siswa ini</a>
                </div>
            </div>
        </div>

        <div x-bind:class="modal ? '!block' : ''" class="hidden absolute border border-primary rounded-xl overflow-hidden left-1/3 bottom-1/3 bg-background shadow-xl">
            <div class="bg-gray-200 border-b border-primary p-4 text-red-500 flex items-center font-semibold">
                <span class="i-mdi-alert me-2 text-lg"></span>
                Peringatan
            </div>
            <div class="p-4">Apakah anda yakin ingin menghapus data siswa ini?</div>
            <div class="p-4 flex items-center justify-end bg-gray-200">
                <a x-bind:href="$refs.delete.href" class="bg-red-500 py-1 px-4 rounded shadow shadow-slate-500 text-background font-medium me-4">Ya</a>
                <p x-on:click="modal = !modal" class="bg-primary cursor-pointer py-1 px-4 rounded shadow shadow-slate-500 text-background font-medium">Tidak</p>
            </div>
        </div>
    </div>
</x-dashboard.layout>
