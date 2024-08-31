@extends('components.dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Peminjaman</h1>
        <a href=""
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Peminjaman</a>

        <table class="mt-8 w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Peminjam</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $peminjaman->siswa->nisn }}</td>
                        <td>{{ $peminjaman->siswa->nama }}</td>
                        <td>
                            <ul class="list-inside list-disc">
                                @foreach ($peminjaman->bukus as $buku)
                                    <li>{{ $buku->kode_buku }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-inside list-disc">
                                @foreach ($peminjaman->bukus as $buku)
                                    <li>{{ $buku->judul }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-inside list-disc">
                                @foreach ($peminjaman->bukus as $buku)
                                    <li>{{ $buku->pivot->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        <td>{{ $peminjaman->tanggal_kembali }}</td>
                        <td>
                            <a href="#"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">
                                Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
