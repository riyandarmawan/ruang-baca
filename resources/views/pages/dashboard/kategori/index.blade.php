<x-dashboard.layout title="{{ $title }}">
    <div class="p-6">
        <h1 class="mb-8 text-3xl font-bold">Data Kategori</h1>
        <a href="/dashboard/kategori/tambah"
            class="rounded bg-primary px-4 py-2 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Tambah
            Data Kategori</a>

        <table class="mt-8 w-full min-w-[50rem] table-auto">
            <thead>
                <th>Slug</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->slug }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>
                            <a href="/dashboard/kategori/detail/{{ $kategori->slug }}"
                                class="my-2 inline-block rounded bg-primary px-4 py-1 text-lg font-semibold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard.layout>