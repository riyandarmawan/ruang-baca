<aside x-data="{ showModalLogout: false }" x-bind:class="detail ? '!w-52 px-2' : ''" id="sidebar-dashboard"
    class="flex w-14 flex-col gap-4 bg-primary py-2 ps-2 text-background duration-300">

    <x-dashboard.navbar />

    <hr x-bind:class="detail ? '' : 'w-10'">

    <div x-data="{ open: false }" @click.outside="open = false"
        class="relative flex max-h-20 cursor-pointer items-center justify-evenly py-4">
        <div x-bind:class="{ 'left-8': !detail, '!block': open }"
            class="absolute bottom-full z-30 hidden w-48 overflow-hidden rounded border border-primary bg-background text-primary shadow-2xl">
            <a href="/dashboard/user/profile"
                class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                <span class="i-mdi-user bg-primary text-xl group-hover:bg-background"></span>
                Profile
            </a>
            @if (Auth::user()->role === 'superadmin')
                <a href="/dashboard/users"
                    class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                    <span class="i-mdi-user-group bg-primary text-xl group-hover:bg-background"></span>
                    Users
                </a>
            @endif
            <button @click="showModalLogout = !showModalLogout" type="button"
                class="group flex w-full items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                <span class="i-mdi-logout bg-primary text-xl group-hover:bg-background"></span>
                Keluar
            </button>
        </div>
        <div class="flex overflow-hidden">
            <div x-on:click="open = !open" class="me-14 ms-1 flex items-center gap-4">
                <img loading="lazy" src="{{ asset('storage/images/users/' . Auth::user()->profile) }}" alt="user"
                    class="h-8 w-8 rounded-full border border-background">
                <h4 class="w-fit text-lg font-semibold">{{ Auth::user()->name }}</h4>
            </div>
            <span x-on:click="open = !open" x-bind:class="open ? 'i-mdi-arrow-drop-down' : 'i-mdi-arrow-drop-up'"
                class="cursor-pointer bg-background text-4xl"></span>
        </div>
    </div>

    <div x-cloak x-show="showModalLogout"
        class="fixed inset-0 z-40 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <!-- Modal Container -->
        <div @click.outside="showModalLogout = false"
            class="w-96 scale-100 transform rounded-lg bg-white p-6 shadow-lg transition-transform duration-300">
            <!-- Modal Header -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800">Konfirmasi Hapus</h2>
                <button @click="showModalLogout = false"
                    class="i-mdi-close text-2xl text-gray-400 transition duration-200 hover:text-gray-600">
                </button>
            </div>

            <!-- Modal Body -->
            <div class="mt-4">
                <p class="text-gray-600">
                    Apakah anda yakin ingin keluar?
                </p>
            </div>

            <!-- Modal Footer -->
            <div class="mt-6 flex justify-end space-x-3">
                <button @click="showModalLogout = false"
                    class="rounded bg-gray-200 px-4 py-2 font-medium text-gray-700 transition duration-200 hover:bg-gray-300">
                    Batal
                </button>
                <form action="/auth/logout" method="POST">
                    @csrf
                    <button
                        class="rounded bg-red-500 px-4 py-2 font-medium text-white transition duration-200 hover:bg-red-600">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
