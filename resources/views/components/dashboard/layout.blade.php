<x-base-layout title="{{ $title }}">
    <div x-data="{ detail: JSON.parse(window.localStorage.getItem('openSidebar')) }">
        <x-dashboard.header search="{{ $search ?? '' }}"/>

        <main class="h-fit flex w-full" style="height: calc(100vh - 4rem)">
            
            <x-dashboard.sidebar/>

            <div class="w-full overflow-auto" style="height: calc(100vh - 5rem)">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-base-layout>
