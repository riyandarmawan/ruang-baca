<x-dashboard.layout title="{{ $title }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Siswa</h1>
        <a href="/dashboard/siswa/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Siswa</a>

        <table class="mt-8 w-full min-w-[50rem] table-auto">
            <thead>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kode_kelas }}</td>
                        <td>
                            <a href="/dashboard/siswa/detail/{{ $siswa->nisn }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>
