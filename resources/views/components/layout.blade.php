<!doctype html>
<html lang="en" class="bg-background font-roboto text-primary">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body x-data="{ open: false }">
    <header class="py-4 md:py-8">
        <div class="container mb-2 flex items-center justify-between">
            <a href="/">
                <h1 class="font-lora text-2xl font-bold">Ruang Baca</h1>
            </a>
            <div class="relative">
                <span x-on:click="open = !open" class="i-mdi-search cursor-pointer text-2xl md:cursor-default md:absolute md:right-4 md:top-2 md:text-slate-400"></span>
                <form action="" method="GET" class="hidden md:block">
                    <input type="search" name="search" placeholder="Search any book here"
                        class="w-full min-w-96 rounded-full bg-secondary px-4 py-2 text-slate-700 placeholder:text-slate-400 outline-none focus:ring focus:ring-primary">
                </form>
            </div>
        </div>
        <div class="container md:hidden">
            <form action="" method="GET" x-bind:class="!open ? '' : '!block'"
                class="float-end max-w-96 mb-4 hidden w-full">
                <input type="search" name="search" placeholder="Search any book here"
                    class="w-full rounded bg-secondary p-2 text-slate-700 placeholder:text-slate-400 outline-none focus:ring focus:ring-primary">
            </form>
        </div>
    </header>

    @yield('content')

    <footer class="py-4">
        <div class="container text-center">
            <small class="lg:text-sm">&copy; 2024 Ruang Baca. All rights reserved.</small>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
