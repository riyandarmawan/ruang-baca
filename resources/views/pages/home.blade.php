@extends('components.layout')

@section('content')
    @for ($i = 0; $i < 10; $i++)
        <section class="mb-4">
            <div class="container">
                <h2 class="mb-4 font-lora text-xl font-semibold lg:text-2xl">Terbaru</h2>
                <div class="overflow-x-auto pb-4">
                    <div class="flex gap-4">
                        @for ($j = 0; $j < 10; $j++)
                            <div class="aspect-[9/16] min-w-24 md:min-w-28 lg:min-w-32 xl:min-w-36">
                                <img src="https://upload.wikimedia.org/wikipedia/id/thumb/b/bf/Harry_Potter_and_the_Sorcerer%27s_Stone.jpg/220px-Harry_Potter_and_the_Sorcerer%27s_Stone.jpg"
                                    alt="Harry Potter and the Philosopher's Stone" class="rounded-xl">
                                <h4 class="mb-1 mt-2 line-clamp-2 text-sm md:text-base xl:text-lg font-medium">Harry Potter and the
                                    Philosopher's Stone
                                </h4>
                                <h4 class="line-clamp-1 text-xs md:text-sm xl:text-base text-slate-700">J. K. Rowling</h4>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
    @endfor
@endsection
