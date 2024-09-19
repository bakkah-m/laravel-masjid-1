<x-dashboard-layout>
    <div class="flex flex-col gap-6 p-8 m-4 bg-white rounded-md shadow-sm">
        <h1 class="text-2xl mb-4">Pengeluaran Masjid</h1>

        <div class="flex justify-end">
            <a href="{{route('pengeluaran.create')}}" class="bg-blue-500 text-white p-2 px-3 text-center rounded-md">+ Tambah Pengeluaran</a>
        </div>

        <table class="mb-4 table-auto border">
            <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold">No</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Penanggung Jawab</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Judul</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Deskripsi</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Nominal</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-left py-3 px-4 font-semibold">{{ $loop->iteration }}</td>
                        <td class="text-left py-3 px-4 font-semibold">{{ $d->user->name }}</td>
                        <td class="text-left py-3 px-4 font-semibold">{{ $d->judul_pengeluaran }}</td>
                        <td class="text-left py-3 px-4 font-semibold">{{ $d->deskripsi }}</td>
                        <td class="text-left py-3 px-4 font-semibold">{{ $d->nominal }}</td>
                        <td class="text-left py-3 px-4 font-semibold inline-flex flex-col gap-2">
                            <a href="{{ route('pengeluaran.edit', $d->id) }}"
                                class="bg-green-500 cursor-pointer text-white p-2 px-3 text-center rounded-md">
                                Edit
                            </a>
                            <form action="{{ route('pengeluaran.destroy', $d->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white p-2 px-3 text-center rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
