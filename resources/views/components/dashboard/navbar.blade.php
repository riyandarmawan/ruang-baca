<ul class="scrollbar-none flex h-[27rem] flex-col gap-4 overflow-y-scroll">
    <li
        class="{{ Request::Is('dashboard') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-chart-arc text-2xl"></span>
            Dashboard
        </a>
    </li>
    <li
        class="min-w-52 {{ Request::is('dashboard/siswa*') ? 'item-active' : '' }} cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/siswa" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-user-outline text-2xl"></span>
            Siswa
        </a>
    </li>
    <li
        class="{{ Request::Is('dashboard/kelas*') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/kelas" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-dining-room text-2xl"></span>
            Kelas</a>
    </li>
    <li
        class="{{ Request::Is('dashboard/buku*') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/buku" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-bookshelf text-2xl"></span>
            Buku</a>
    </li>
    <li
        class="{{ Request::Is('dashboard/kategori*') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/kategori" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-category text-2xl"></span>
            Kategori</a>
    </li>
    <li
        class="{{ Request::Is('dashboard/peminjaman*') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/peminjaman" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-clipboard-text-outline text-2xl"></span>
            Peminjaman
        </a>
    </li>
    <li
        class="{{ Request::Is('dashboard/pengembalian*') ? 'item-active' : '' }} min-w-52 cursor-pointer rounded hover:bg-tersier hover:opacity-80">
        <a href="/dashboard/pengembalian" class="flex items-center gap-4 px-2 py-2 text-lg font-bold">
            <span class="i-mdi-inbox-arrow-down-outline text-2xl"></span>
            Pengembalian
        </a>
    </li>
</ul>
