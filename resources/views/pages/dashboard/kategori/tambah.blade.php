<x-dashboard.layout title="{{ $title }}">
    <div class="p-6 flex items-center justify-center">
        <div class="border border-primary h-fit p-4 rounded shadow shadow-slate-500 min-w-[40rem]">
            <h1 class="text-center font-bold text-xl mb-6">Tambah Data Kategori</h1>
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" value="{{ $errors->has('nama') ? '' : old('nama') }}" required class="{{ $errors->has('nama') ? 'input-error' : 'input-unerror' }} border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                    @error('nama')
                    <p class="col-span-2 col-start-2 mt-2 text-red-500 font-medium text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center mt-6">
                <button class="py-2 px-6 bg-primary text-background rounded shadow shadow-slate-500 font-medium hover:opacity-80 active:opacity-70 focus:ring focus:ring-slate-500">Tambah</button></div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
