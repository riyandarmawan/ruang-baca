<x-dashboard.layout title="{{ $title }}" search="{{ $search }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Buku</h1>
        <a href="/dashboard/buku/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Buku</a>

        @if (session('success'))
            <div class="mt-4 rounded bg-green-500 bg-opacity-50 p-4">{{ session('success') }}</div>
        @endif

        <table class="mt-8 w-full min-w-[50rem] table-auto mb-8">
            <thead>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($bukus as $buku)
                    <tr>
                        <td>{{ ($bukus->currentPage() - 1) * $bukus->perPage() + $loop->iteration }}</td>
                        <td>{{ formatKodeBuku($buku->kode_buku) }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>{{ $buku->kategori->nama }}</td>
                        <td>
                            <a href="/dashboard/buku/detail/{{ $buku->slug }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $bukus->links() }}
    </div>
</x-dashboard.layout>
