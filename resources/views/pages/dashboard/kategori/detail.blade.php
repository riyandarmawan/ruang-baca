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
                        <strong>Nama Kategori</strong>
                        <span>:</span>
                        <div>{{ $kategori->nama }}</div>
                    </div>
                </div>

                <div x-bind:class="active !== 'ubah' ? '' : '!block'" class="hidden p-4">
                    <form action="/dashboard/kategori/ubah/{{ $kategori->slug }}" method="POST">
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" required value="{{ $kategori->slug }}"
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        </div>
                        <div class="mb-4 grid grid-cols-3 items-center">
                            <label for="Nama">Nama Kategori</label>
                            <input type="text" name="Nama" id="Nama" required value="{{ $kategori->slug }}"
                                class="col-span-2 w-full rounded border border-primary p-2 shadow shadow-slate-500">
                        </div>
                        <div class="mt-6 flex justify-center">
                            <button
                                class="rounded bg-primary px-6 py-2 font-medium text-background shadow shadow-slate-500 hover:opacity-80 focus:ring focus:ring-slate-500 active:opacity-70">Ubah</button>
                        </div>
                    </form>
                </div>

                <div x-bind:class="active !== 'hapus' ? '' : '!block'" class="hidden p-4">
                    <a x-on:click="modal = !modal" x-ref="delete" href="/dashboard/kategori/hapus/{{ $kategori->slug }}"
                        @click.prevent="" class="font-medium text-red-500">Hapus data kategori ini</a>
                </div>
            </div>
        </div>

        <div x-bind:class="modal ? '!block' : ''"
            class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
            <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
                <span class="i-mdi-alert me-2 text-lg"></span>
                Peringatan
            </div>
            <div class="p-4">Apakah anda yakin ingin menghapus data kategori ini?</div>
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
