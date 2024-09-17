<x-dashboard.layout title="{{ $title }}" search="{{ $search }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Peminjaman</h1>
        <a href="/dashboard/peminjaman/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Peminjaman</a>

        @if (session('success'))
            <div class="mt-4 rounded bg-green-500 bg-opacity-50 p-4">{{ session('success') }}</div>
        @endif

        <table class="mt-8 w-full min-w-[50rem] table-auto border-collapse">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjaman->siswa->nisn }}</td>
                        <td>{{ $peminjaman->siswa->nama }}</td>
                        <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        <td>{{ $peminjaman->tanggal_kembali }}</td>
                        <td>
                            <a href="/dashboard/peminjaman/detail/{{ $peminjaman->id }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">
                                Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $peminjamans->links() }}
    </div>
</x-dashboard.layout>
