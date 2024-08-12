@extends('components.base-layout')


@section('content-layout')
    <div x-data="{ open: true }">
        <header class="bg-primary">
            <div class="flex h-20 items-center justify-between px-6">
                <div class="flex items-center gap-2">
                    <span x-on:click="open = !open" class="i-mdi-hamburger-menu cursor-pointer bg-background text-3xl"></span>
                    <a href="/">
                        <h1 class="font-lora text-3xl font-bold text-background">Ruang Baca</h1>
                    </a>
                </div>
                <form action="" method="GET">
                    <div class="relative w-fit">
                        <input type="search" id="search" name="search" placeholder="Cari data disini"
                            class="rounded px-4 py-2 text-lg text-slate-600 outline-none" autofocus>
                        <span class="i-mdi-search absolute right-2 top-2 bg-slate-400 text-2xl"></span>
                    </div>
                </form>
            </div>
        </header>

        <aside x-bind:class="open ? 'left-0 relative' : '-left-full absolute'"
            class="max-w-96 flex flex-col justify-between bg-primary p-4 text-background duration-300"
            style="height: calc(100vh - 5rem)">
            <ul class="flex flex-col gap-4">
                <li class="item-active cursor-pointer rounded px-4 py-2 hover:bg-tersier hover:opacity-80">
                    <a href="" class="flex items-center gap-2 text-xl font-bold">
                        <span class="i-mdi-chart-arc text-5xl"></span>
                        Laporan
                    </a>
                </li>
                <li class="cursor-pointer rounded px-4 py-2 hover:bg-tersier hover:opacity-80">
                    <a href="" class="flex items-center gap-2 text-xl font-bold">
                        <span class="i-mdi-user-outline text-5xl"></span>
                        Data siswa</a>
                </li>
                <li class="cursor-pointer rounded px-4 py-2 hover:bg-tersier hover:opacity-80">
                    <a href="" class="flex items-center gap-2 text-xl font-bold">
                        <span class="i-mdi-bookshelf text-5xl"></span>
                        Data buku</a>
                </li>
                <li class="cursor-pointer rounded px-4 py-2 hover:bg-tersier hover:opacity-80">
                    <a href="" class="flex items-center gap-2 text-xl font-bold">
                        <span class="i-mdi-clipboard-text-outline text-5xl"></span>
                        Peminjaman
                    </a>
                </li>
                <li class="cursor-pointer rounded px-4 py-2 hover:bg-tersier hover:opacity-80">
                    <a href="" class="flex items-center gap-2 text-xl font-bold">
                        <span class="i-mdi-inbox-arrow-down-outline text-5xl"></span>
                        Pengembalian
                    </a>
                </li>
            </ul>

            <hr>

            <div class="flex cursor-pointer items-center justify-between p-4">
                <div class="flex items-center gap-4">
                    <img src="" alt="user" class="h-12 w-12 rounded-full bg-white">
                    <h4 class="text-xl font-semibold">Ujang Melayu</h4>
                </div>
                <span class="i-mdi-arrow-drop-up cursor-pointer bg-background text-4xl"></span>
            </div>
        </aside>
    </div>
@endsection
