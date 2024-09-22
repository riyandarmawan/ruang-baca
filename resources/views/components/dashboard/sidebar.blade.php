<aside x-bind:class="detail ? '!w-52 px-2' : ''" id="sidebar-dashboard"
    class="flex w-14 flex-col gap-4 bg-primary py-2 ps-2 text-background duration-300">

    <x-dashboard.navbar />

    <hr x-bind:class="detail ? '' : 'w-10'">

    <div x-data="{ open: false }" class="relative flex cursor-pointer items-center justify-evenly py-4">
        <div x-bind:class="{ 'left-8': !detail, '!block': open }"
            class="absolute bottom-full z-[9999] hidden w-48 overflow-hidden rounded border border-primary bg-background text-primary shadow-2xl">
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
            <form action="/auth/logout" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background w-full">
                    <span class="i-mdi-logout bg-primary text-xl group-hover:bg-background"></span>
                    Logout
                </button>
            </form>
        </div>
        <div class="flex overflow-hidden">
            <div x-on:click="open = !open" class="me-14 ms-1 flex items-center gap-4">
                <img loading="lazy" src="{{ asset('storage/images/users/jajang.jpg') }}" alt="user"
                    class="h-8 w-8 rounded-full border border-background">
                <h4 class="text-lg font-semibold">{{ Auth::user()->name }}</h4>
            </div>
            <span x-on:click="open = !open" x-bind:class="open ? 'i-mdi-arrow-drop-down' : 'i-mdi-arrow-drop-up'"
                class="cursor-pointer bg-background text-4xl"></span>
        </div>
    </div>
</aside>
