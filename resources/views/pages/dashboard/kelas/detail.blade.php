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
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Kode Kelas</strong>
                        <span>:</span>
                        <div>{{ formatKodeBuku($kelas->kode_kelas) }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Nama</strong>
                        <span>:</span>
                        <div>{{ $kelas->tingkat }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Alamat</strong>
                        <span>:</span>
                        <div>{{ $kelas->jurusan }}</div>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dashboard/kelas/ubah/{{ $kelas->kode_kelas }}" method="POST">
                        @csrf
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="kode_kelas">Kode Kelas</label>
                            <input type="text" name="kode_kelas" id="kode_kelas"
                                value="{{ $errors->has('kode_kelas') ? $kelas->kode_kelas : old('kode_kelas', $kelas->kode_kelas) }}"
                                required
                                class="{{ $errors->has('kode_kelas') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('kode_kelas')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="tingkat">Tingkat</label>
                            <select type="text" name="tingkat" id="tingkat" required
                                class="input-unerror col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                                <option {{ old('tingkat', $kelas->tingkat) == 'X' ? 'selected' : '' }} value="X">X
                                </option>
                                <option {{ old('tingkat', $kelas->tingkat) == 'XI' ? 'selected' : '' }} value="XI">
                                    XI</option>
                                <option {{ old('tingkat', $kelas->tingkat) == 'XII' ? 'selected' : '' }}
                                    value="XII">XII</option>
                            </select>
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan"
                                value="{{ $errors->has('jurusan') ? $kelas->jurusan : old('jurusan', $kelas->jurusan) }}"
                                required
                                class="{{ $errors->has('jurusan') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                            @error('jurusan')
                                <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}
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
                        class="font-medium text-red-500 focus:outline-none">Hapus data kelas ini</button>
                </div>

                <!-- Modal for confirmation -->
                <div x-bind:class="modal ? '!block' : ''"
                    class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
                    <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
                        <span class="i-mdi-alert me-2 text-lg"></span>
                        Peringatan
                    </div>
                    <div class="p-4">Apakah anda yakin ingin menghapus data kelas ini?</div>
                    <div class="flex items-center justify-end bg-gray-200 p-4">
                        <form action="/dashboard/kelas/hapus/{{ $kelas->kode_kelas }}" method="post">
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
