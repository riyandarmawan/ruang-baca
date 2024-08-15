@extends('components.base-layout')

@section('content-layout')
    <header x-data="{ open: false, openFilter: false, currentYear: new Date().getFullYear() }" class="fixed left-0 right-0 top-0 bg-background shadow-md">
        <div class="container flex h-16 items-center justify-between">
            <a href="/">
                <h1 class="font-lora text-2xl font-bold lg:text-3xl">Ruang Baca</h1>
            </a>
            <span x-on:click="open = !open" x-if="open ? '' : openFilter = false" x-bind:class="open ? 'i-mdi-close' : 'i-mdi-hamburger-menu'"
                class="cursor-pointer text-2xl"></span>
            <div x-bind:class="open ? '!left-0' : ''"
                class="container fixed bottom-0 left-full right-0 top-16 flex flex-col gap-4 bg-secondary py-4 duration-300"
                style="height: calc(100vh - 4rem)">
                <div x-on:click="openFilter = !openFilter" x-bind:class="openFilter ? 'justify-center' : 'justify-between'"
                    class="group relative flex cursor-pointer items-center">
                    <h3 x-bind:class="openFilter ? '' :
                        'relative after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full'"
                        class="after:content-[' '] text-lg font-medium">
                        Filter</h3>
                    <span x-bind:class="openFilter ? 'i-mdi-menu-left absolute left-0 top-0' : 'i-mdi-menu-right'"
                        class="text-3xl"></span>
                </div>
                <div x-show="openFilter" class="mt-4 w-full">
                    <form action="" method="GET">
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="w-full outline-none px-4 py-2 bg-background border-primary border rounded">
                        </div>
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="penulis">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="w-full outline-none px-4 py-2 bg-background border-primary border rounded">
                        </div>
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="w-full outline-none px-4 py-2 bg-background border-primary border rounded">
                        </div>
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="tahun">Tahun</label>
                            <input type="number" name="tahun" id="tahun" x-bind:value="currentYear" class="w-full outline-none px-4 py-2 bg-background border-primary border rounded">
                        </div>
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="w-full outline-none px-4 py-2 bg-background border-primary border rounded">
                                <option value="novel">Novel</option>
                                <option value="Movivasi">Movivasi</option>
                            </select>
                        </div>
                        <div class="flex justify-end w-full">
                            <button class="bg-background border border-primary py-1 px-4 rounded hover:bg-slate-200">Filter</button>
                        </div>
                    </form>
                </div>
                <a x-bind:class="openFilter ? 'hidden' : ''" href=""
                    class="group flex cursor-pointer items-center justify-between">
                    <h3
                        class="after:content-[' '] relative text-lg font-medium after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full">
                        Masuk</h3>
                </a>
                <a x-bind:class="openFilter ? 'hidden' : ''" href=""
                    class="group flex cursor-pointer items-center justify-between">
                    <h3
                        class="after:content-[' '] relative text-lg font-medium after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full">
                        Daftar</h3>
                </a>
            </div>
        </div>
    </header>

    <div class="mt-20">
        @yield('content')
    </div>

    <footer class="py-4">
        <div class="container text-center">
            <small class="lg:text-sm">&copy; 2024 Ruang Baca. All rights reserved.</small>
        </div>
    </footer>
@endsection
