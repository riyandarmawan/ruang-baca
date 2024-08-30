@extends('components.base-layout')


@section('content-layout')
    <div x-data="{ detail: false }">
        <header class="bg-primary">
            <div class="flex h-16 items-center justify-between px-2">
                <div class="flex items-center gap-2 px-2">
                    <span x-on:click="detail = !detail"
                        class="i-mdi-hamburger-menu cursor-pointer bg-background text-2xl"></span>
                    <a href="/">
                        <h1 class="font-lora text-2xl font-bold text-background">Ruang Baca</h1>
                    </a>
                </div>
                <form action="" method="GET">
                    <div class="relative w-fit">
                        <input type="search" id="search" name="search" placeholder="Cari data disini"
                            class="rounded px-4 py-2 text-base text-slate-600 outline-none" autofocus>
                        <span class="i-mdi-search absolute right-2 top-2 bg-slate-400 text-2xl"></span>
                    </div>
                </form>
            </div>
        </header>

        <main class="h-fit flex w-full" style="height: calc(100vh - 4rem)">
            <aside x-bind:class="detail ? 'w-52 px-2' : 'w-14'"
                class="flex flex-col gap-4 bg-primary py-2 ps-2 text-background duration-300">
                <ul class="scrollbar-none flex h-[27rem] flex-col gap-4 overflow-y-scroll">
                    <li
                        class="{{ Request::Is('dashboard') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-chart-arc text-2xl"></span>
                            Dashboard
                        </a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-siswa') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-siswa" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-user-outline text-2xl"></span>
                            Siswa</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-kelas') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-kelas" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-dining-room text-2xl"></span>
                            Kelas</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-buku') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-buku" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-bookshelf text-2xl"></span>
                            Buku</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/peminjaman') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/peminjaman" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-clipboard-text-outline text-2xl"></span>
                            Peminjaman
                        </a>
                    </li>
                    <li
                        class="{{ Request::Is('pengembalian') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/pengembalian" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
                            <span class="i-mdi-inbox-arrow-down-outline text-2xl"></span>
                            Pengembalian
                        </a>
                    </li>
                </ul>

                <hr x-bind:class="detail ? '' : 'w-10'">

                <div x-data="{ open: false }" class="relative flex cursor-pointer items-center justify-evenly py-4">
                    <div x-bind:class="{ 'left-8': !detail, '!block': open }"
                        class="absolute bottom-full hidden w-48 rounded bg-background text-primary shadow-2xl">
                        <a href="/dashbaord/user/profile"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-user bg-primary text-xl group-hover:bg-background"></span>
                            Profile
                        </a>
                        <a href="/dashboard/user/settings"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-gear bg-primary text-xl group-hover:bg-background"></span>
                            Settings
                        </a>
                        <a href="/auth/logout"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-logout bg-primary text-xl group-hover:bg-background"></span>
                            Logout
                        </a>
                    </div>
                    <div class="flex overflow-hidden">
                        <div x-on:click="open = !open" class="me-14 ms-1 flex items-center gap-4">
                            <img src="/images/user/jajang.jpg" alt="user"
                                class="h-8 w-8 rounded-full border border-background">
                            <h4 class="text-lg font-semibold">Jajang</h4>
                        </div>
                        <span x-on:click="open = !open"
                            x-bind:class="open ? 'i-mdi-arrow-drop-down' : 'i-mdi-arrow-drop-up'"
                            class="cursor-pointer bg-background text-4xl"></span>
                    </div>
                </div>
            </aside>

            <div class="w-full overflow-y-scroll" style="height: calc(100vh - 5rem)">
                @yield('content')
            </div>
        </main>
    </div>
@endsection
