<x-dashboard.layout title="{{ $title }}">
    <div class="grid grid-cols-3 gap-8 p-4">
        <div class="rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku yang dipinjam minggu ini</h4>
            <h2 id="data-pinjam" class="mt-4 text-center text-5xl font-bold">{{ $jumlahBukuDiPinjam }}</h2>
        </div>

        <div class="col-start-1 row-start-2 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku yang dikembalikan minggu ini</h4>
            <h2 id="data-kembali" class="mt-4 text-center text-5xl font-bold">{{ $jumlahBukuDiKembalikan }}</h2>
        </div>

        <div class="col-span-2 row-span-2 rounded-md border-2 border-primary bg-primary p-4 text-background">
            <div class="m-auto w-10/12">
                <canvas id="buku-chart"></canvas>
            </div>
        </div>

        <div class=" rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Buku terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">{{ $bukuTerfavorit }}</h2>
        </div>

        <div class=" rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Penulis terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">{{ $penulisTerfavorit }}</h2>
        </div>

        <div class=" rounded-md border-2 border-primary bg-primary p-4 text-background">
            <h4 class="text-center text-xl font-medium">Penerbit terfavorit</h4>
            <h2 id="data-buku-terfavorit" class="mt-4 text-center text-lg font-bold">{{ $penerbitTerfavorit }}</h2>
        </div>
    </div>

    <script>
        window.dataChart =  {
            pinjamPerHari: @json($pinjamPerHari),
            kembaliPerHari: @json($kembaliPerHari)
        };
    </script>
    
    @vite('resources/js/bukuChart.js')
</x-dashboard.layout>
