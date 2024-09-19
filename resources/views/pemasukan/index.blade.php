<x-dashboard-layout>
    <div class="flex flex-col gap-6 p-8 m-4 bg-white rounded-md shadow-sm">
        <h1 class="text-2xl mb-4">Validasi Infaq</h1>

        <table class="mb-4 table-auto border">
            <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold">No</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Tanggal/Waktu</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Nama</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Instansi</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Nominal</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Bukti</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td class="text-left py-3 px-4 font-semibold">{{$loop->iteration}}</td>
                    <td class="text-left py-3 px-4 font-semibold">{{$d->created_at}}</td>
                    <td class="text-left py-3 px-4 font-semibold">{{$d->nama}}</td>
                    <td class="text-left py-3 px-4 font-semibold">{{$d->instansi}}</td>
                    <td class="text-left py-3 px-4 font-semibold">{{$d->nominal}}</td>
                    <td class="text-left py-3 px-4 font-semibold">
                        <img class="w-60 bg-white" src="{{asset('/images/bukti_bayar/'.$d->bukti_bayar)}}"/>
                    </td>
                    <td class="text-left py-3 px-4 font-semibold inline-flex flex-col gap-2">
                        @if($d->is_valid == 0)
                        <a  href="{{route('pemasukan.validasi', $d->id)}}" 
                            class="bg-green-500 cursor-pointer text-white p-2 px-3 text-center rounded-md">
                            Validasi
                        </a>
                        <form action="{{ route('pemasukan.destroy', $d->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white p-2 px-3 text-center rounded-md">
                                Hapus
                            </button>
                        </form>
                        @else
                            Data Telah Valid
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>