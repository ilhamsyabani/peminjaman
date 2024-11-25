<div class="w-[80%] my-8" >
    <div class="py-4 px-4 sm:px-0">
        <h3 class="text-base/7 font-semibold text-gray-900">Informasi barang</h3>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Informasi detail tentang barang </p>
    </div>
    <div class="mt-4 border-gray-100">
        <div class="flex flex-col items-stretch flex-1 mx-auto h-100 min-h-[400px] w-full">
            <div class="relative flex-1 w-full h-100">
                <div class="flex justify-between items-center w-full h-100 bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-[500px]">
                    <div class="flex relative space-x-10 p-10">
                        <img src="{{ asset('' . $borrower->photo )}}" alt="{{ $borrower->name }}" class="rounded-lg w-80 h-80">
                        <div class="flex-1">
                            <dl class="divide-y divide-gray-100 border-blue-100">
                                <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm/6 font-medium text-gray-900">Nama</dt>
                                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $borrower->name }}</dd>
                                </div>
                                <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm/6 font-medium text-gray-900">Kontak</dt>
                                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $borrower->email }} <span
                                            class="block text-emerald-600 ">{{ $borrower->phone }}</span></dd>
                                </div>
                                <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm/6 font-medium text-gray-900">Alamat</dt>
                                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $borrower->address }}</dd>
                                </div>
                                <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm/6 font-medium text-gray-900">Status</dt>
                                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $borrower->status }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-5 mt-6">
            {{-- <x-ui.button  onclick="confirm('Anda yakin akan menghapus data {{ $item->name }} ?')? '' : event.stopImmediatePropagination()" wire:click="deleteItem({{ $item->id }})" width="md" size="lg" type="secondary" rounded="md">
                Hapus data barang
            </x-ui.button> --}}
            <x-ui.button href="{{ route('peminjam.index')}}" width="md" size="lg" tag="a"
                type="secondary" rounded="md">Selesai</x-ui.button>
            <x-ui.button href="{{ route('peminjam.edit', $borrower->id )}}" width="md" size="lg" tag="a"
                type="primary" rounded="md">Edit Data</x-ui.button>
        </div>
    </div>
</div>



