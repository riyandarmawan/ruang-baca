<x-dashboard.layout title="{{ $title }}">
    <div x-data="{modal: false, active: 'detail' }" class="relative">
        <div class="flex items-center justify-center p-6">
            <div class="h-[32rem] min-w-[40rem] max-w-[60rem] rounded border border-primary overflow-auto shadow shadow-slate-500">
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
                        <p>Kode Kelas</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $kelas->kode_kelas }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Nama</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $kelas->tingkat }}</p>
                    </div>
                    <div class="grid grid-cols-4">
                        <p>Alamat</p>
                        <p class="col-span-3"><span class="me-2">:</span> {{ $kelas->jurusan }}</p>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dasbhoard/kelas/ubah/{{ $kelas->kode_kelas }}" method="POST">
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="kode_kelas">Kode Kelas</label>
                    <input type="text" name="kode_kelas" id="kode_kelas" value="{{ $kelas->kode_kelas }}" required class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="tingkat">Tingkat</label>
                    <input type="text" name="tingkat" id="tingkat" required value="{{ $kelas->tingkat }}" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2 ">
                </div>
                <div class="grid grid-cols-3 items-center mb-4">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" required value="{{ $kelas->jurusan }}" class="border col-span-2 w-full border-primary shadow shadow-slate-500 rounded p-2">
                </div>
                <div class="flex justify-center mt-6">
                <button class="py-2 px-6 bg-primary text-background rounded shadow shadow-slate-500 font-medium hover:opacity-80 active:opacity-70 focus:ring focus:ring-slate-500">Ubah</button></div>
            </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <a x-on:click="modal = !modal" x-ref="delete" href="/dashboard/kelas/hapus/{{ $kelas->kode_kelas }}" @click.prevent="" class="text-red-500 font-medium">Hapus data kelas ini</a>
                </div>
            </div>
        </div>

        <div x-bind:class="modal ? '!block' : ''" class="hidden absolute border border-primary rounded-xl overflow-hidden left-1/3 bottom-1/3 bg-background shadow-xl">
            <div class="bg-gray-200 border-b border-primary p-4 text-red-500 flex items-center font-semibold">
                <span class="i-mdi-alert me-2 text-lg"></span>
                Peringatan
            </div>
            <div class="p-4">Apakah anda yakin ingin menghapus data kelas ini?</div>
            <div class="p-4 flex items-center justify-end bg-gray-200">
                <a x-bind:href="$refs.delete.href" class="bg-red-500 py-1 px-4 rounded shadow shadow-slate-500 text-background font-medium me-4">Ya</a>
                <p x-on:click="modal = !modal" class="bg-primary cursor-pointer py-1 px-4 rounded shadow shadow-slate-500 text-background font-medium">Tidak</p>
            </div>
        </div>
    </div>
</x-dashboard.layout>
