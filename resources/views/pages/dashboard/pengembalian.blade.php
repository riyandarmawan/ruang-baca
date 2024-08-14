@extends('components.dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Pengembalian</h1>
        <a href=""
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Pengembalian</a>

        <table class="mt-8 w-full table-auto border-separate">
            <thead class="bg-slate-400">
                <th>NISN</th>
                <th>Peminjam</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Tanggal Kembali</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center bg-slate-300">
                <tr>
                    <td>123</td>
                    <td>Jajang</td>
                    <td>123</td>
                    <td>Bumi</td>
                    <td>13 Agustus 2024</td>
                    <td>1</td>
                    <td>
                        <a href=""
                            class="rounded bg-tersier px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80 inline-block">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
