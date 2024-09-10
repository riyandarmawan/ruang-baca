<x-home.layout title="{{ $title }}">
    <div class="pt-8">
        @foreach ($kategoris as $kategori)
            @if ($kategori->bukus->isNotEmpty())
                <section class="mb-4">
                    <div class="container">
                        <h2 class="mb-4 font-lora text-xl font-semibold lg:text-2xl">{{ $kategori->nama }}</h2>
                        <div class="overflow-x-auto pb-4">
                            <div class="flex w-fit gap-4">
                                @foreach ($kategori->bukus as $buku)
                                    <a href="/buku/detail/{{ $buku->slug }}" class="block w-24 md:w-28 lg:w-32 xl:w-36">
                                        <div class="relative aspect-[2/3] w-full">
                                            <img loading="lazy" src="{{ asset("storage/images/bukus/$buku->sampul") }}"
                                                alt="{{ $buku->judul }}" class="h-full w-full rounded-xl object-cover">
                                        </div>
                                        <h4 class="mb-1 mt-2 line-clamp-2 text-sm font-medium md:text-base xl:text-lg">
                                            {{ $buku->judul }}
                                        </h4>
                                        <h4 class="line-clamp-1 text-xs text-slate-700 md:text-sm xl:text-base">
                                            {{ $buku->penerbit }}
                                        </h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </div>
</x-home.layout>
