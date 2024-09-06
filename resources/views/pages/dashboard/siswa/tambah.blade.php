<x-dashboard.layout title="{{ $title }}">
    <div class="flex items-center justify-center p-6">
        <div class="h-fit min-w-[40rem] rounded border border-primary p-4 shadow shadow-slate-500">
            <h1 class="mb-6 text-center text-xl font-bold">Tambah Data Siswa</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="nisn">NISN</label>
                    <input type="text" inputmode="numeric" name="nisn" id="nisn" value="{{ $errors->has('nisn') ? '' : old('nisn') }}" required
                        class="{{ $errors->has('nisn') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 outline-none focus:ring">
                    @error('nisn')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $errors->has('nama') ? '' : old('nama') }}" required
                        class="{{ $errors->has('nama') ? 'input-error' : 'input-unerror' }} col-span-2 w-full rounded border p-2 shadow shadow-slate-500 focus:ring outline-none">
                    @error('nama')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" required
                        class="{{ $errors->has('alamat') ? 'input-error' : 'input-unerror' }} outline-none col-span-2 w-full rounded border p-2 shadow shadow-slate-500 focus:ring">{{ $errors->has('alamat') ? '' : old('alamat') }}</textarea>
                    @error('alamat')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="no_telp">No Telp</label>
                    <input type="text" inputmode="numeric" name="no_telp" id="no_telp" value="{{ $errors->has('no_telp') ? '' : old('no_telp') }}" required
                        class="{{ $errors->has('no_telp') ? 'input-error' : 'input-unerror' }} outline-none col-span-2 w-full rounded border p-2 shadow shadow-slate-500 focus:ring">
                    @error('no_telp')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 grid grid-cols-3 items-center">
                    <label for="kode_kelas">Kelas</label>
                    <select name="kode_kelas" id="kode_kelas" required
                        class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        @foreach ($kelases as $kelas)
                        <option {{ $kelas->kode_kelas === old('kode_kelas') ? 'selected' : '' }} value="{{ $kelas->kode_kelas }}">{{ $kelas->kode_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-6 flex justify-center">
                    <button
                        class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
