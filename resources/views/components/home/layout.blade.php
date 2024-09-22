<x-base-layout title="{{ $title }}">
    <x-home.header search="{{ $search ?? '' }}" />

    <div class="mt-14">
        {{ $slot }}
    </div>

    <footer class="py-4">
        <div class="container text-center">
            <small class="lg:text-sm">&copy; 2024 Ruang Baca. All rights reserved.</small>
        </div>
    </footer>
</x-base-layout>
