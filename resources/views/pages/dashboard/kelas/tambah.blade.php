<x-dashboard.layout title="{{ $title }}">
    <div class="p-6 flex items-center justify-center">
        <div class="border border-primary h-fit p-4 rounded shadow shadow-slate-500 min-w-[40rem]">
            <h1 class="text-center font-bold text-xl mb-6">Tambah Data Kelas</h1>
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="kode_kelas">Kode Kelas</label>
                    <input type="text" name="kode_kelas" id="kode_kelas" value="{{ $errors->has('kode_kelas') ? '' : old('kode_kelas') }}" required class="{{ $errors->has('kode_kelas') ? 'input-error' : 'input-unerror' }} border outline-none col-span-2 w-full focus:ring shadow shadow-slate-500 rounded p-2">
                    @error('kode_kelas')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="tingkat">Tingkat</label>
                    <select type="text" name="tingkat" id="tingkat" required class="input-unerror border outline-none col-span-2 w-full focus:ring shadow shadow-slate-500 rounded p-2">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" value="{{ $errors->has('jurusan') ? '' : old('jurusan') }}" required class="{{ $errors->has('jurusan') ? 'input-error' : 'input-unerror' }} border outline-none col-span-2 w-full focus:ring shadow shadow-slate-500 rounded p-2">
                    @error('jurusan')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center mt-6">
                <button class="py-2 px-6 bg-primary text-background rounded shadow shadow-slate-500 font-medium hover:opacity-80 active:opacity-70 focus:ring focus:ring-slate-500">Tambah</button></div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
