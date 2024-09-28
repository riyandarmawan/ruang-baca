<x-dashboard.layout title="{{ $title }}">
    <div x-data="{
        showModalHapus: false,
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
                        <strong>Kode Kelas</strong>
                        <span>:</span>
                        <div>{{ $kelas->kode_kelas }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Tingkat</strong>
                        <span>:</span>
                        <div>{{ $kelas->tingkat }}</div>
                    </div>
                    <div class="grid grid-cols-[13rem_auto_1fr] gap-4">
                        <strong>Jurusan</strong>
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
                    <!-- Button to trigger the showModalHapus -->
                    <button x-on:click="showModalHapus = !showModalHapus" type="button"
                        class="font-medium text-red-500 focus:outline-none">Hapus data kelas ini</button>
                </div>

                <!-- showModalHapus for confirmation -->
                <div x-cloak x-show="showModalHapus"
                    class="fixed inset-0 z-40 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <!-- Modal Container -->
                    <div @click.outside="showModalHapus = false"
                        class="w-96 scale-100 transform rounded-lg bg-white p-6 shadow-lg transition-transform duration-300">
                        <!-- Modal Header -->
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-800">Konfirmasi Hapus</h2>
                            <button @click="showModalHapus = false"
                                class="i-mdi-close text-2xl text-gray-400 transition duration-200 hover:text-gray-600">
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="mt-4">
                            <p class="text-gray-600">
                                Apakah anda yakin ingin menghapus kelas ini?
                            </p>
                        </div>

                        <!-- Modal Footer -->
                        <div class="mt-6 flex justify-end space-x-3">
                            <button @click="showModalHapus = false"
                                class="rounded bg-gray-200 px-4 py-2 font-medium text-gray-700 transition duration-200 hover:bg-gray-300">
                                Batal
                            </button>
                            <form action="/dashboard/kelas/hapus/{{ $kelas->kode_kelas }}" method="POST">
                                @csrf
                                <button
                                    class="rounded bg-red-500 px-4 py-2 font-medium text-white transition duration-200 hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
