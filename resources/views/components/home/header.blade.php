<!-- Header Component -->
<header class="fixed left-0 right-0 top-0 z-[9999] bg-background shadow-md">
    <div class="container flex h-16 items-center justify-between">
        <a href="/">
            <h1 class="font-lora text-2xl font-bold lg:text-3xl">Ruang Baca</h1>
        </a>

        <form x-data="{ search: false }" action="/" method="GET">
            <div :class="search ? '!left-4' : ''"
                class="absolute left-full right-4 top-full mt-4 rounded bg-white p-4 shadow-xl duration-300 sm:relative sm:mt-0 sm:bg-transparent sm:p-0 sm:shadow-none sm:right-0 sm:left-0 sm:top-0">
                <input type="text" id="search" name="search" placeholder="Cari buku disini..." autofocus
                    autocomplete="off" value="{{ $search }}"
                    class="w-full rounded-full border border-slate-400 px-4 py-2 text-slate-600 outline-none focus:ring focus:ring-slate-400">
            </div>
            <span @click="search = !search" class="i-mdi-search mt-1 cursor-pointer text-2xl sm:hidden"></span>
        </form>
    </div>
</header>
