@extends('components.base-layout')


@section('content-layout')
    <header class="py-4 md:py-8">
        <div class="container mb-2 flex items-center justify-between">
            <a href="/">
                <h1 class="font-lora text-2xl font-bold lg:text-3xl">Ruang Baca</h1>
            </a>
            <a href=""
                class="after:content-[' '] relative font-medium after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-primary after:duration-300 after:hover:w-full sm:text-lg xl:text-xl">Login</a>
        </div>
    </header>

    @yield('content')

    <section x-data="{ open: false }" class="text-background">
        <div x-bind:class="!open ? '' : '!block'" class="fixed bottom-0 left-0 right-0 top-0 hidden bg-primary">
            <div class="container py-8">
                <h2 class="mb-8 text-center text-xl font-semibold">FILTER</h2>
                <form action="" method="GET" class="mx-auto flex flex-col items-center sm:max-w-[30rem]">
                    <div class="mb-4 grid w-full grid-cols-3 items-center">
                        <label for="judul" class="font-medium">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="col-span-2 rounded p-2 text-primary outline-none focus:ring focus:ring-tersier">
                    </div>
                    <div class="mb-4 grid w-full grid-cols-3 items-center">
                        <label for="penulis" class="font-medium">Penulis</label>
                        <input type="text" name="penulis" id="penulis"
                            class="col-span-2 rounded p-2 text-primary outline-none focus:ring focus:ring-tersier">
                    </div>
                    <div class="mb-4 grid w-full grid-cols-3 items-center">
                        <label for="penerbit" class="font-medium">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit"
                            class="col-span-2 rounded p-2 text-primary outline-none focus:ring focus:ring-tersier">
                    </div>
                    <div class="mb-4 grid w-full grid-cols-3 items-center">
                        <label for="tahun" class="font-medium">Tahun</label>
                        <input type="text" name="tahun" id="tahun"
                            class="col-span-2 rounded p-2 text-primary outline-none focus:ring focus:ring-tersier">
                    </div>
                    <div class="mt-4 flex w-full justify-center">
                        <button
                            class="rounded bg-background px-8 py-1 font-bold text-primary hover:opacity-80 focus:opacity-60 active:opacity-70">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <button type="button" x-on:click="open = !open" x-bind:class="!open ? 'bg-primary' : '!bg-background'"
            class="fixed bottom-4 right-4 flex h-10 w-10 animate-bounce cursor-pointer items-center justify-center rounded-full bg-primary hover:opacity-90">
            <span x-bind:class="!open ? 'bg-background' : '!bg-primary'" class="i-mdi-filter bg-background text-3xl"></span>
        </button>
    </section>

    <footer class="py-4">
        <div class="container text-center">
            <small class="lg:text-sm">&copy; 2024 Ruang Baca. All rights reserved.</small>
        </div>
    </footer>
@endsection
