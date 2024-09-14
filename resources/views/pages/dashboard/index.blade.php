<x-dashboard.layout title="{{ $title }}">
    <div class="grid grid-cols-3 gap-8 p-4">
        <div class="rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku yang dipinjam minggu ini</h4>
            <h2 id="data-pinjam" class="mt-4 text-center text-5xl font-bold">50</h2>
        </div>

        <div class="order-3 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku yang dikembalikan minggu ini</h4>
            <h2 id="data-kembali" class="mt-4 text-center text-5xl font-bold">30</h2>
        </div>

        <div class="col-span-2 row-span-2 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <div class="m-auto w-3/4">
                <canvas id="buku-chart"></canvas>
            </div>
        </div>

        <div class="order-4 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">Harry Poter dan Batu Bertuah</h2>
        </div>

        <div class="order-5 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Penulis terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">J.K Rowling</h2>
        </div>

        <div class="order-5 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Penerbit terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">Gramedia</h2>
        </div>
    </div>

    @vite('resources/js/bukuChart.js')
</x-dashboard.layout>
