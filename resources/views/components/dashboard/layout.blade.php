@extends('components.base-layout')


@section('content-layout')
    <div x-data="{ open: true }">
        <header class="bg-primary">
            <div class="flex h-20 items-center justify-between px-6">
                <div class="flex items-center gap-2 px-2">
                    <span x-on:click="open = !open" class="i-mdi-hamburger-menu cursor-pointer bg-background text-5xl"></span>
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

        <main class="flex hfit w-full">
            <aside x-bind:class="open ? 'left-0 relative' : '-left-full absolute'"
                class="min-w-96 flex flex-col gap-4 bg-primary p-4 text-background duration-300">
                <ul class="flex flex-col gap-4 h-[25rem] overflow-y-scroll scrollbar-none">
                    <li
                        class="{{ Request::Is('dashboard') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-chart-arc text-5xl"></span>
                            Dashboard
                        </a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-siswa') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-siswa" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-user-outline text-5xl"></span>
                            Data siswa</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-kelas') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-kelas" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-dining-room text-5xl"></span>
                            Data kelas</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/data-buku') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/data-buku" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-bookshelf text-5xl"></span>
                            Data buku</a>
                    </li>
                    <li
                        class="{{ Request::Is('dashboard/peminjaman') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/peminjaman" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-clipboard-text-outline text-5xl"></span>
                            Peminjaman
                        </a>
                    </li>
                    <li
                        class="{{ Request::Is('pengembalian') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
                        <a href="/dashboard/pengembalian" class="flex items-center gap-2 px-4 py-2 text-xl font-bold">
                            <span class="i-mdi-inbox-arrow-down-outline text-5xl"></span>
                            Pengembalian
                        </a>
                    </li>
                </ul>

                <hr>

                <div x-data="{ open: false }" class="relative flex cursor-pointer items-center justify-between p-4">
                    <div x-bind:class="open ? '!block' : ''"
                        class="absolute bottom-full hidden w-80 overflow-hidden rounded bg-background text-primary">
                        <a href="/dashbaord/user/profile"
                            class="group flex items-center gap-2 p-4 text-lg font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-user bg-primary text-2xl group-hover:bg-background"></span>
                            Profile
                        </a>
                        <a href="/dashboard/user/settings"
                            class="group flex items-center gap-2 p-4 text-lg font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-gear bg-primary text-2xl group-hover:bg-background"></span>
                            Settings
                        </a>
                        <a href="/auth/logout"
                            class="group flex items-center gap-2 p-4 text-lg font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-logout bg-primary text-2xl group-hover:bg-background"></span>
                            Logout
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="/images/user/jajang.jpg" alt="user"
                            class="h-12 w-12 rounded-full border border-background">
                        <h4 class="text-xl font-semibold">Jajang</h4>
                    </div>
                    <span x-on:click="open = !open" x-bind:class="open ? 'i-mdi-arrow-drop-down' : 'i-mdi-arrow-drop-up'"
                        class="cursor-pointer bg-background text-4xl"></span>
                </div>
            </aside>

            <div class="w-full overflow-scroll" style="height: calc(100vh - 5rem)">
                @yield('content')
            </div>
        </main>
    </div>
@endsection
