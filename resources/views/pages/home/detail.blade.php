<x-home.layout title="{{ $title }}">
    <div class="container pt-8">
        <nav class="mb-8">
            <ul class="flex gap-4 flex-wrap">
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
                    {{ $buku->judul }}
                </li>
            </ul>
        </nav>

        <div class="flex flex-col items-center gap-4 lg:flex-row lg:gap-6">
            <img loading="lazy" src="/images/bukus/{{ $buku->sampul }}"
                alt="{{ $buku->judul }}" class="w-56 aspect-[2/3] object-cover rounded-xl">
            <div class="lg:p-4">
                <h1 class="mb-6 text-center text-2xl font-bold">{{ $buku->judul }}</h1>
                <p class="mb-4 text-justify">{{$buku->deskripsi}}</p>
                <div>
                    <h3 class="mb-2 text-lg font-bold">Detail:</h3>
                    <ul class="grid sm:grid-cols-2">
                        <li class="mb-2"><span class="block font-medium">Jumlah Halaman</span> {{ $buku->jumlah_halaman }}</li>
                        <li class="mb-2"><span class="block font-medium">Tahun Terbit</span> {{ $buku->tahun_terbit }}</li>
                        <li class="mb-2"><span class="block font-medium">Penerbit</span> {{ $buku->penerbit }}</li>
                        <li class="mb-2"><span class="block font-medium">ISBN</span> {{ $buku->kode_buku }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-home.layout>
