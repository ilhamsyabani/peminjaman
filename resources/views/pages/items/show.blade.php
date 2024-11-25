<div class="w-[80%] mx-auto my-8" wire:key="{{ $item->id }}">
    <div class="py-4 px-4 sm:px-0">
        <h3 class="text-base/7 font-semibold text-gray-900">Informasi barang</h3>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Informasi detail tentang barang </p>
    </div>
    <div class="py-2 sm:px-0">
        <!-- Slider -->
        <div x-data="imageSlider" class="relative max-w-[58%] overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
            <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                <span x-text="currentIndex + 1"></span>/<span x-text="images.length"></span>
            </div>

            <button @click="previous()"
                class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>

            <button @click="forward()"
                class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>

            </button>

            <div class="relative h-80" style="width: 30rem">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="currentIndex === index" x-transition:enter="transition transform duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute top-0 w-full h-full">
                        <img :src="image" alt="image" class="rounded-sm w-full h-full object-cover" />
                    </div>
                </template>
            </div>
        </div>
        <!-- End Slider -->
    </div>
    <div class="mt-2 border-t border-gray-100">
        <dl class="divide-y divide-gray-100 border-blue-100">
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Nama Barang</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $item->name }}</dd>
            </div>
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Kode Barang</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $item->code }} <span
                        class="block text-emerald-600 ">{{ $item->official_code }}</span></dd>
            </div>
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Kategori</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $item->category->name }}</dd>
            </div>
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Status</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $item->status }}</dd>
            </div>
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Lokasi Penyimpanan</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                    @if ($item->location_type)
                        <p>
                            @if ($item->location_type == 'Location')
                                Location - {{ App\Models\Location::find($item->location_id)->name }}
                            @elseif ($item->location_type == 'Room')
                                Room - {{ App\Models\Room::find($item->location_id)->name }},
                                {{ App\Models\Room::find($item->location_id)->location->name }}
                            @elseif ($item->location_type == 'Locker')
                                Locker - {{ App\Models\Locker::find($item->location_id)->name }} di dalam
                                {{ App\Models\Locker::find($item->location_id)->room->name }}
                            @endif
                        </p>
                    @else
                        <p>No storage assigned.</p>
                    @endif
                </dd>
            </div>
            <div class="px-2 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Kodisi dan deskripsi</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                    <span class="block ">Kondisi {{ $item->condition }}</span>
                    {{ $item->description }}
                </dd>
            </div>
        </dl>
        <div class="flex justify-end mt-8 gap-5">
            {{-- <x-ui.button  onclick="confirm('Anda yakin akan menghapus data {{ $item->name }} ?')? '' : event.stopImmediatePropagination()" wire:click="deleteItem({{ $item->id }})" width="md" size="lg" type="secondary" rounded="md">
                Hapus data barang
            </x-ui.button> --}}
            <x-ui.button href="{{ route('barang.index') }}" width="md" size="lg" tag="a"
                type="secondary" rounded="md">Selesai</x-ui.button>
            <x-ui.button href="{{ route('barang.edit', $item->id) }}" width="md" size="lg" tag="a"
                type="primary" rounded="md">Edit data barang</x-ui.button>
        </div>
    </div>
</div>


<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 0,
            images: @json($item->images->map(fn($image) => asset('storage/' . $image->path))),
            previous() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images
                    .length;
            },
            forward() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },
        }));
    });
</script>
