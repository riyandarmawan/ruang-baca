<x-base-layout title="{{ $title }}">
    <div x-data="{ detail: false }">
        <x-dashboard.header/>

        <main class="h-fit flex w-full" style="height: calc(100vh - 4rem)">
            
            <x-dashboard.sidebar/>

            <div class="w-full overflow-auto" style="height: calc(100vh - 5rem)">
                @yield('content')
            </div>
        </main>
    </div>
</x-base-layout>
