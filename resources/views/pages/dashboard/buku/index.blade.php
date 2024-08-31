@extends('components.dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Buku</h1>
        <a href=""
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Buku</a>

        <table class="mt-8 w-full table-auto">
            <thead>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($bukus
                 as $buku)
                <tr>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>
                        <a href=""
                            class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
