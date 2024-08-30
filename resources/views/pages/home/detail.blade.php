@extends('components.layout');

@section('content')
<div class="container">
        <nav>
            <ul class="flex gap-4">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>&raquo;</li>
                <li>
                    Buku
                </li>
                <li>&raquo;</li>
                <li>
                    Detail
                </li>
                <li>&raquo;</li>
                <li class="font-bold">
                    Harry Potter
                </li>
            </ul>
        </nav>

        <div class="flex flex-col items-center gap-4 lg:flex-row lg:gap-6">
            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/b/bf/Harry_Potter_and_the_Sorcerer%27s_Stone.jpg/220px-Harry_Potter_and_the_Sorcerer%27s_Stone.jpg"
                alt="Harry Potter and the Philosopher's Stone" class="w-56 rounded-xl">
            <div class="lg:p-4">
                <h1 class="mb-6 text-center text-2xl font-bold">Harry Potter and Friends</h1>
                <p class="mb-4 text-justify">Harry Potter memulai petualangannya di dunia sihir bersama dengan teman-teman
                    barunya di Hogwarts, sebuah sekolah sihir yang penuh dengan misteri dan keajaiban. Bersama Hermione dan
                    Ron, mereka menghadapi tantangan besar, mulai dari teka-teki sihir yang rumit hingga melawan kekuatan
                    gelap yang mengancam dunia mereka. Persahabatan, keberanian, dan sihir berpadu dalam kisah epik yang
                    akan mengubah hidup mereka selamanya.</p>
                <div>
                    <h3 class="mb-2 text-lg font-bold">Detail:</h3>
                    <ul class="grid sm:grid-cols-2">
                        <li class="mb-2"><span class="block font-medium">Jumlah Halaman</span> 350</li>
                        <li class="mb-2"><span class="block font-medium">Tahun Terbit</span> 2024</li>
                        <li class="mb-2"><span class="block font-medium">Penerbit</span> Gramedia</li>
                        <li class="mb-2"><span class="block font-medium">ISBN</span> 9786020658049</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
