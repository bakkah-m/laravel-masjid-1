<x-dashboard-layout>
    <div class="flex flex-col gap-6 p-8 m-4 mb-0 bg-white rounded-md shadow-sm">
        <h1 class="text-2xl mb-4">Filter Laporan</h1>
        <form class="flex gap-2 items-end">
            <div>
                <x-input-label :value="__('Start Date')" />
                <x-text-input class="block mt-1 w-full h-12" type="date" name="start" required />
            </div>
            <div>
                <x-input-label :value="__('End Date')" />
                <x-text-input class="block mt-1 w-full h-12" type="date" name="end" required />
            </div>
            <div>
                <x-primary-button class="text-lg block h-12">
                    {{ __('Filter') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    @if (isset($pemasukan) && isset($pengeluaran))
        <div class="flex gap-6">
            <div class="p-8 m-4 mr-0 bg-white rounded-md shadow-sm w-1/2">
                <h2>Total Pemasukan : </h2>
                <p class="font-bold text-4xl">Rp. {{ $pemasukan->sum('nominal') }}</p>

                <table class="mt-8 table-auto border w-full">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold">No</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold">Tanggal</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan as $d)
                            <tr>
                                <td class="text-left py-3 px-4 font-semibold">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4 font-semibold">{{ $d->created_at }}</td>
                                <td class="text-left py-3 px-4 font-semibold">{{ $d->nominal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-8 m-4 ml-0 bg-white rounded-md shadow-sm w-1/2">
                <h2>Total Pengeluaran : </h2>
                <p class="font-bold text-4xl">Rp. {{ $pengeluaran->sum('nominal') }}</p>

                <table class="mt-8 table-auto border w-full">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold">No</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold">Tanggal</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $d)
                            <tr>
                                <td class="text-left py-3 px-4 font-semibold">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4 font-semibold">{{ $d->created_at }}</td>
                                <td class="text-left py-3 px-4 font-semibold">{{ $d->nominal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-dashboard-layout>
