<aside x-data="{ logoutModal: false }" x-bind:class="detail ? '!w-52 px-2' : ''" id="sidebar-dashboard"
    class="flex w-14 flex-col gap-4 bg-primary py-2 ps-2 text-background duration-300">

    <x-dashboard.navbar />

    <hr x-bind:class="detail ? '' : 'w-10'">

    <div x-data="{ open: false }" class="relative flex cursor-pointer items-center justify-evenly py-4 max-h-20">
        <div x-bind:class="{ 'left-8': !detail, '!block': open }"
            class="absolute bottom-full z-[9999] hidden w-48 overflow-hidden rounded border border-primary bg-background text-primary shadow-2xl">
            <a href="/dashboard/user/profile"
                class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                <span class="i-mdi-user bg-primary text-xl group-hover:bg-background"></span>
                Profile
            </a>
            <button @click="logoutModal = !logoutModal" type="button"
                class="group flex w-full items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                <span class="i-mdi-logout bg-primary text-xl group-hover:bg-background"></span>
                Logout
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

    <div x-bind:class="logoutModal ? '!block' : ''"
        class="absolute bottom-1/3 left-1/3 hidden overflow-hidden rounded-xl border border-primary bg-background shadow-xl">
        <div class="flex items-center border-b border-primary bg-gray-200 p-4 font-semibold text-red-500">
            <span class="i-mdi-alert me-2 text-lg"></span>
            Peringatan
        </div>
        <div class="p-4 text-primary">Apakah anda yakin ingin logout?</div>
        <div class="flex items-center justify-end bg-gray-200 p-4">
            <form action="/auth/logout" method="post">
                @csrf
                <button type="submit"
                    class="me-4 rounded bg-red-500 px-4 py-1 font-medium text-background shadow shadow-slate-500 hover:opacity-80">Ya</button>
            </form>
            <button x-on:click="logoutModal = !logoutModal" type="button"
                class="cursor-pointer rounded bg-primary px-4 py-1 font-medium text-background shadow shadow-slate-500 hover:opacity-80">
                Tidak</button>
        </div>
    </div>
</aside>
