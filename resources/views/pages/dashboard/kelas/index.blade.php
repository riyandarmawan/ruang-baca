<x-dashboard.layout title="{{ $title }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Kelas</h1>
        <a href="/dashboard/kelas/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Kelas</a>

        @if (session('success'))
            <div class="mt-4 rounded bg-green-500 bg-opacity-50 p-4">{{ session('success') }}</div>
        @endif

        <table class="mt-8 w-full min-w-[50rem] table-auto mb-8">
            <thead>
                <th>No</th>
                <th>Kode Kelas</th>
                <th>Tingkat</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($kelases as $kelas)
                    <tr>
                        <td>{{ ($kelases->currentPage() - 1) * $kelases->perPage() + $loop->iteration }}</td>
                        <td>{{ $kelas->kode_kelas }}</td>
                        <td>{{ $kelas->tingkat }}</td>
                        <td>{{ $kelas->jurusan }}</td>
                        <td>
                            <a href="/dashboard/kelas/detail/{{ $kelas->kode_kelas }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $kelases->links() }}
    </div>
</x-dashboard.layout>
