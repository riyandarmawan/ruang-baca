<x-dashboard.layout title="{{ $title }}">
    <div class="p-6 flex items-center justify-center">
        <div class="border border-primary h-fit p-4 rounded shadow shadow-slate-500 min-w-[40rem]">
            <h1 class="text-center font-bold text-xl mb-6">Tambah Data Siswa</h1>
            <form action="" method="POST">
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="nisn">NISN</label>
                    <input type="number" name="nisn" id="nisn" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2"></textarea>
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" id="no_telp" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-6">
                    <label for="kode_kelas">Kelas</label>
                    <select name="kode_kelas" id="kode_kelas" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                        <option value="12">1</option>
                    </select>
                </div>
                <div class="flex justify-center">
                <button class="py-2 px-6 bg-primary text-background rounded shadow shadow-slate-500 font-medium hover:opacity-80 active:opacity-70 focus:ring focus:ring-slate-500">Tambah</button></div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
