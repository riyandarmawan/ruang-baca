@extends('components.dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Kelas</h1>
        <a href=""
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Kelas</a>

        <table class="mt-8 w-full min-w-[50rem] table-auto">
            <thead>
                <th>Kode Kelas</th>
                <th>Tingkat</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($kelases as $kelas)
                    <tr>
                        <td>{{ $kelas->kode_kelas }}</td>
                        <td>{{ $kelas->tingkat }}</td>
                        <td>{{ $kelas->jurusan }}</td>
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
