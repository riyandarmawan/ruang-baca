<header class="bg-primary">
    <div class="flex h-16 items-center justify-between px-2">
        <div class="flex items-center gap-4 px-2">
            <span x-on:click="detail = !detail" class="i-mdi-hamburger-menu cursor-pointer bg-background text-2xl"></span>
            <a href="/">
                <h1 class="font-lora text-2xl font-bold text-background">Ruang Baca</h1>
            </a>
        </div>

        <form action="" method="GET">
            <div class="relative w-fit">
                <input type="search" id="search" name="search" value="{{ $search }}"
                    placeholder="Cari data disini" class="rounded px-4 py-2 text-base text-slate-600 outline-none"
                    {{ Request::is('dashboard/*') && !Request::Is('dashboard/*/*') ? 'autofocus' : '' }}>
            </div>
        </form>
    </div>
</header>
