<x-dashboard.layout title="{{ $title }}" search="">
    <div class="grid grid-cols-3 gap-8 p-4">
        <div class="grid gap-8">
            <div class="rounded-md border-2 border-primary bg-primary p-4 text-background">
                <h4 class="text-center text-xl font-medium">Buku yang dipinjam minggu ini</h4>
                <h2 id="data-pinjam" class="mt-4 text-center text-5xl font-bold">50</h2>
            </div>
            <div class="rounded-md border-2 border-primary bg-primary p-4 text-background">
                <h4 class="text-center text-xl font-medium">Buku yang dikembalikan minggu ini</h4>
                <h2 id="data-kembali" class="mt-4 text-center text-5xl font-bold">30</h2>
            </div>
        </div>
        <div class="col-span-2 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <canvas id="buku-chart"></canvas>
        </div>
    </div>

    @vite('resources/js/bukuChart.js')
</x-dashboard.layout>
