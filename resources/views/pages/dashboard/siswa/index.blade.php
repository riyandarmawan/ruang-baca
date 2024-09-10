<x-dashboard.layout title="{{ $title }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Siswa</h1>
        <a href="/dashboard/siswa/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Siswa</a>

        @if (session('success'))
            <div class="mt-4 rounded bg-green-500 bg-opacity-50 p-4">{{ session('success') }}</div>
        @endif

        <table class="mt-4 w-full min-w-[50rem] table-auto mb-8">
            <thead>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas->kode_kelas }}</td>
                        <td>
                            <a href="/dashboard/siswa/detail/{{ $siswa->nisn }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $siswas->links() }}
    </div>
</x-dashboard.layout>
