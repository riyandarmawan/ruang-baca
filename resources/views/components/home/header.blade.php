<!-- Header Component -->
<header x-data="{ open: false, openFilter: false, currentYear: new Date().getFullYear() }" class="fixed left-0 right-0 top-0 z-[9999] bg-background shadow-md">
    <!-- Container for header content -->
    <div class="container flex h-16 items-center justify-between">

        <!-- Logo and Home link -->
        <a href="/">
            <h1 class="font-lora text-2xl font-bold lg:text-3xl">Ruang Baca</h1>
        </a>

        <!-- Mobile menu toggle button -->
        <span x-on:click="open = !open" x-if="open ? '' : openFilter = false"
            x-bind:class="open ? 'i-mdi-close' : 'i-mdi-hamburger-menu'"
            class="cursor-pointer text-2xl lg:text-3xl"></span>

        <!-- Mobile menu (visible when menu is open) -->
        <div x-bind:class="open ? '!left-0' : ''"
            class="fixed bottom-0 left-full right-0 top-16 bg-secondary py-4 duration-300"
            style="height: calc(100vh - 4rem)">
            <div class="container flex flex-col gap-4">
                <!-- Filter toggle button (inside mobile menu) -->
                <div x-on:click="openFilter = !openFilter"
                    x-bind:class="openFilter ? 'justify-center' : 'justify-between'"
                    class="group relative flex cursor-pointer items-center">
                    <h3 x-bind:class="openFilter ? '' :
                        'relative after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full'"
                        class="after:content-[' '] text-lg font-medium">
                        Filter
                    </h3>
                    <span x-bind:class="openFilter ? 'i-mdi-menu-left absolute left-0 top-0' : 'i-mdi-menu-right'"
                        class="text-3xl"></span>
                </div>

                <!-- Filter form (visible when filter is open) -->
                <div x-bind:class="openFilter ? '' : 'hidden'" class="mt-4 w-full">
                    <form action="/" method="GET">
                        <!-- Title input -->
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" value="{{ $judul }}"
                                class="w-full rounded border border-primary bg-background px-4 py-2 outline-none">
                        </div>

                        <!-- Author input -->
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="penulis">Penulis</label>
                            <input type="text" name="penulis" id="penulis" value="{{ $penulis }}"
                                class="w-full rounded border border-primary bg-background px-4 py-2 outline-none">
                        </div>

                        <!-- Category select -->
                        <div class="mb-3 flex items-center gap-4">
                            <label class="w-24" for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id"
                                class="w-full rounded border border-primary bg-background px-4 py-2 outline-none">
                                <option value="all">Semua Kategori</option>
                                @foreach ($allKategoris as $kategori)
                                    <option {{ $kategori->id == $kategoriId ? 'selected' : '' }}
                                        value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter button -->
                        <div class="flex w-full justify-end gap-4">
                            <button
                                class="rounded border bg-primary px-4 py-1 text-background shadow hover:opacity-80">Filter</button>
                        </div>
                    </form>
                </div>

                <!-- Login link (hidden when filter is open) -->
                <a x-bind:class="openFilter ? 'hidden' : ''" href="/auth/login"
                    class="group flex cursor-pointer items-center justify-between">
                    <h3
                        class="after:content-[' '] relative text-lg font-medium after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full">
                        Masuk
                    </h3>
                </a>

                <!-- Register link (hidden when filter is open) -->
                <a x-bind:class="openFilter ? 'hidden' : ''" href="/auth/register"
                    class="group flex cursor-pointer items-center justify-between">
                    <h3
                        class="after:content-[' '] relative text-lg font-medium after:absolute after:left-0 after:top-full after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:group-hover:w-full">
                        Daftar
                    </h3>
                </a>
            </div>
        </div>
    </div>
</header>
