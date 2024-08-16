@extends('components.dashboard.layout')

@section('content')
    <div class="container h-full">
        <div class="grid h-full grid-cols-2 items-center gap-4 text-background">
            <div class="rounded bg-primary p-4">
                <h2 class="mb-4 text-center text-3xl font-bold uppercase">Peminjam per hari</h2>
                <h1 class="flex items-center justify-center gap-2 text-5xl font-bold">
                    <span class="i-mdi-account bg-background"></span>
                    1.000.000
                </h1>
            </div>
            <div class="rounded bg-primary p-4">
                <h2 class="mb-4 text-center text-3xl font-bold uppercase">Buku belum kembali</h2>
                <h1 class="flex items-center justify-center gap-2 text-5xl font-bold">
                    <span class="i-mdi-book bg-background"></span>
                    500.000
                </h1>
            </div>
            <div class="col-span-2 rounded bg-primary p-4">
                <h2 class="mb-4 text-center text-3xl font-bold uppercase">Buku terfavorit</h2>
                <div class="flex">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/b/bf/Harry_Potter_and_the_Sorcerer%27s_Stone.jpg/220px-Harry_Potter_and_the_Sorcerer%27s_Stone.jpg"
                        alt="Harry Potter and the Philosopher's Stone" class="rounded-xl w-24">
                        <div>
                    <h4 class="mb-1 mt-2 line-clamp-2 text-sm font-medium md:text-base xl:text-lg">Harry Potter and the
                        Philosopher's Stone
                    </h4>
                    <h4 class="line-clamp-1 text-xs text-slate-700 md:text-sm xl:text-base">J. K. Rowling</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
