@extends('components.dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Pengembalian</h1>
        <a href=""
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Pengembalian</a>

        <table class="mt-8 w-full table-auto border-collapse">
            <thead class="bg-gray-200 text-left">
                <tr>
                    <th class="border px-4 py-2">NISN</th>
                    <th class="border px-4 py-2">Peminjam</th>
                    <th class="border px-4 py-2">Kode Buku</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Tanggal Kembali</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($pengembalians as $pengembalian)
                    <tr>
                        <td class="border px-4 py-2">{{ $pengembalian->siswa->nisn }}</td>
                        <td class="border px-4 py-2">{{ $pengembalian->siswa->nama }}</td>
                        <td class="border px-4 py-2">
                            <ul class="list-inside list-disc">
                                @foreach ($pengembalian->bukus as $buku)
                                    <li>{{ $buku->kode_buku }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border px-4 py-2">
                            <ul class="list-inside list-disc">
                                @foreach ($pengembalian->bukus as $buku)
                                    <li>{{ $buku->judul }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border px-4 py-2">
                            <ul class="list-inside list-disc">
                                @foreach ($pengembalian->bukus as $buku)
                                    <li>{{ $buku->pivot->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border px-4 py-2">{{ $pengembalian->tanggal_kembali }}</td>
                        <td class="border px-4 py-2">
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
