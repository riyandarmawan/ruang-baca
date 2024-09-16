<x-dashboard.layout title="{{ $title }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Pengembalian</h1>
        <a href="/dashboard/pengembalian/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Pengembalian</a>

        @if (session('success'))
            <div class="mt-4 rounded bg-green-500 bg-opacity-50 p-4">{{ session('success') }}</div>
        @endif

        <table class="mt-8 w-full min-w-[50rem] table-auto border-collapse">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Peminjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalians as $pengembalian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengembalian->siswa->nisn }}</td>
                        <td>{{ $pengembalian->siswa->nama }}</td>
                        <td>{{ $pengembalian->tanggal_kembali }}</td>
                        <td>
                            <a href="/dashboard/pengembalian/detail/{{ $pengembalian->id }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">
                                Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>
