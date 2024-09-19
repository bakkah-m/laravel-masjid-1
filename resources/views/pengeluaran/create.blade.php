<x-dashboard-layout>
    <div class="flex flex-col gap-6 p-8 m-4 bg-white rounded-md shadow-sm">
        <h1 class="text-2xl mb-4">Tambah Pengeluaran</h1>

        <form action="{{route('pengeluaran.store')}}" method="POST" class="w-96 flex flex-col gap-6">
            @csrf
            <input name="id_user" value="{{auth()->user()->id}}" type="hidden"/>
            <div>
                <x-input-label :value="__('Judul Pengeluaran')" />
                <x-text-input class="block mt-1 w-full" type="text" name="judul_pengeluaran" required/>
            </div>
            <div>
                <x-input-label :value="__('Deskripsi')" />
                <x-text-input class="block mt-1 w-full" type="text" name="deskripsi" required/>
            </div>
            <div>
                <x-input-label :value="__('Nominal')" />
                <x-text-input class="block mt-1 w-full" type="number" name="nominal" required/>
            </div>
            <div>
                <x-primary-button class="text-lg bg-blue-500">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>