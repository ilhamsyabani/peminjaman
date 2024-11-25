
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Daftar Barang LAB TP</h2>
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($items as $item)
                <div class="group relative border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $item->images[0]->path) }}"
                        alt="Front of men&#039;s Basic Tee in black."
                        class="aspect-square w-full max-w-[300px] rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60">
                    <div class="mt-4 flex justify-between  items-start px-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $item->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $item->code }}</p>
                        </div>
                        @if( $item->status == 'tersedia' )
                        <span
                            class="px-4 border border-green-200 bg-green-100 rounded-xl text-sm font-medium text-gray-900">
                            {{ $item->status }}
                        </span>
                        @else
                        <span
                            class="px-4 border border-red-200 bg-red-100 rounded-xl text-sm font-medium text-red-900">
                            {{ $item->status }}
                        </span>
                        @endif
                    </div>
                    <div class="text-xs font-medium text-slate-500 mt-2 mb-4 px-4">
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
            <!-- More products... -->
        </div>
        <div class="flex justify-end mt-6">
            <span class=" font-semibold text-sm text-blue-800">Lihat Semua</span>
        </div>
    </div>
</div>
