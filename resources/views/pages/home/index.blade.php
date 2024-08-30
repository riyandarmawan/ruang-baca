@extends('components.layout')

@section('content')
    <div class="p-8">
        @for ($i = 0; $i < 10; $i++)
            <section class="mb-4">
                <div class="container">
                    <h2 class="mb-4 font-lora text-xl font-semibold lg:text-2xl">Terbaru</h2>
                    <div class="overflow-x-auto pb-4">
                        <div class="flex w-fit gap-4">
                            @for ($j = 0; $j < 10; $j++)
                                <a href="/buku/detail/harry-potter" class="aspect-[9/16] w-24 md:w-28 lg:w-32 xl:w-36">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/b/bf/Harry_Potter_and_the_Sorcerer%27s_Stone.jpg/220px-Harry_Potter_and_the_Sorcerer%27s_Stone.jpg"
                                        alt="Harry Potter and the Philosopher's Stone" class="w-full rounded-xl">
                                    <h4 class="mb-1 mt-2 line-clamp-2 text-sm font-medium md:text-base xl:text-lg">Harry
                                        Potter
                                        and the
                                        Philosopher's Stone
                                    </h4>
                                    <h4 class="line-clamp-1 text-xs text-slate-700 md:text-sm xl:text-base">J. K. Rowling
                                    </h4>
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </section>
        @endfor
    </div>
@endsection
