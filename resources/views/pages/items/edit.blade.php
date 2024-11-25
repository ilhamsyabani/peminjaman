<div class="flex-1 w-full">
    <div x-data="{
        bannerVisible: false,
        bannerVisibleAfter: 300,
    }" x-init="window.addEventListener('alert:shown', () => {
        bannerVisible = true;
        setTimeout(() => { bannerVisible = false }, 5000); // Hide after 5 seconds
    });" x-show="bannerVisible"
        x-transition:enter="transition ease-out duration-500" x-transition:enter-start="-translate-y-10"
        x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-10"
        class="fixed z-10 right-10 h-auto py-2 duration-300 ease-out bg-lime-300 shadow-sm sm:py-0 sm:h-10" x-cloak>
        <div class="flex items-center justify-between w-full h-full px-3 mx-auto max-w-7xl">
            <a href="#"
                class="flex flex-col w-full h-full text-xs leading-6 text-black duration-150 ease-out sm:flex-row sm:items-center opacity-80 hover:opacity-100">
                <span class="flex items-center">
                    <strong class="font-semibold">{{ session('status') }}</strong>
                    <span class="hidden w-px h-4 mx-3 rounded-full sm:block bg-neutral-200"></span>
                </span>
                <span class="block pt-1 pb-2 leading-none sm:inline sm:pt-0 sm:pb-0">{{ session('message') }}</span>
            </a>
            <button @click="bannerVisible = false"
                class="flex items-center flex-shrink-0 translate-x-1 ease-out duration-150 justify-center w-6 h-6 p-1.5 text-black rounded-full hover:bg-neutral-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div class="flex items-center justify-between w-full mb-4 py-4">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Data Barang') }}
        </h2>
    </div>

    <div class="flex items-center justify-between w-full mb-4 py-4">
        <div class="flex flex-col flex-1 pb-4 mx-auto h-full min-h-[500px]">
            <div class="w-full h-full">
                <div
                    class="flex justify-between items-center w-full h-full bg-pink-100 overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-full">
                    <div class="flex relative flex-col p-6 w-full">
                        <div
                            class="flex items-center pb-2 mb-6 space-x-1.5 text-gray-800 border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                            <p class="mb-1 text-sm text-zinc-500 dark:text-gray-400">Silahkan lengkapi data barang baru
                                untuk menambahkan barang.
                            </p>
                        </div>

                        <div class="flex items-center w-full">
                            <form wire:submit.prevent="updateItem" class="space-y-6 w-full"
                                enctype="multipart/form-data">
                                <p class="text-md mb-1">Informasi Umum</p>

                                <div id="hs-file-upload-with-limited-file-size" class="drobzone"
                                    data-hs-file-upload='{
                                    "url": "/image-upload",
                                    "acceptedFiles": "image/*",
                                    "headers": {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                                    "maxFilesize": 1,
                                    "extensions": {
                                      "default": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "xls": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "zip": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "csv": {
                                        "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"m5 12-3 3 3 3\"/><path d=\"m9 18 3-3-3-3\"/></svg>",
                                        "class": "shrink-0 size-5"
                                      }
                                    }
                                  }'>
                                    <template data-hs-file-upload-preview="">
                                        <div
                                            class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                                            <div class="mb-1 flex justify-between items-center">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500"
                                                        data-hs-file-upload-file-icon="">
                                                        <img class="rounded-lg hidden" data-dz-thumbnail="">
                                                    </span>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                            <span
                                                                class="truncate inline-block max-w-[300px] align-bottom"
                                                                data-hs-file-upload-file-name=""></span>.<span
                                                                data-hs-file-upload-file-ext=""></span>
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-neutral-500"
                                                            data-hs-file-upload-file-size=""
                                                            data-hs-file-upload-file-success=""></p>
                                                        <p class="text-xs text-red-500" style="display: none;"
                                                            data-hs-file-upload-file-error="">File exceeds size
                                                            limit.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-x-2">
                                                    <span class="hs-tooltip [--placement:top] inline-block"
                                                        style="display: none;" data-hs-file-upload-file-error="">
                                                        <span
                                                            class="hs-tooltip-toggle text-red-500 hover:text-red-800 focus:outline-none focus:text-red-800 dark:text-red-500 dark:hover:text-red-200 dark:focus:text-red-200">
                                                            <svg class="shrink-0 size-4"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <circle cx="12" cy="12" r="10">
                                                                </circle>
                                                                <line x1="12" x2="12" y1="8"
                                                                    y2="12"></line>
                                                                <line x1="12" x2="12.01" y1="16"
                                                                    y2="16"></line>
                                                            </svg>
                                                            <span
                                                                class="hs-tooltip-content max-w-[100px] hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                                role="tooltip">
                                                                Please try to upload a file smaller than 1MB.
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <button type="button"
                                                        class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                                        data-hs-file-upload-reload="">
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8">
                                                            </path>
                                                            <path d="M21 3v5h-5"></path>
                                                        </svg>
                                                    </button>
                                                    <button type="button"
                                                        class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                                        data-hs-file-upload-remove="">
                                                        <svg class="shrink-0 size-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17"></line>
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17"></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-x-3 whitespace-nowrap">
                                                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                                    role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                    aria-valuemax="100" data-hs-file-upload-progress-bar="">
                                                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500"
                                                        style="width: 0" data-hs-file-upload-progress-bar-pane="">
                                                    </div>
                                                </div>
                                                <div class="w-10 text-end">
                                                    <span class="text-sm text-gray-800 dark:text-white">
                                                        <span data-hs-file-upload-progress-bar-value="">0</span>%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600"
                                        data-hs-file-upload-trigger="">
                                        <div class="text-center">
                                            <span
                                                class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full dark:bg-neutral-700 dark:text-neutral-200">
                                                <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                    <polyline points="17 8 12 3 7 8"></polyline>
                                                    <line x1="12" x2="12" y1="3"
                                                        y2="15"></line>
                                                </svg>
                                            </span>

                                            <div
                                                class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                                                <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                                                    Geser gambar Anda dibagian ini atau
                                                </span>
                                                <span
                                                    class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">Buka
                                                    Penyimpanan</span>
                                            </div>

                                            <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                                                Ukuran gambar tidak boleh lebih dari 2MB.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 space-y-2 empty:mt-0" data-hs-file-upload-previews=""></div>


                                </div>
                                {{-- preview --}}
                                @foreach ($item->images as $image)
                                    @if ($imageIdToDelete)
                                        <div
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
                                            <div class="bg-white rounded-lg shadow-lg p-6">
                                                <h2 class="text-lg font-bold">Konfirmasi hapus data</h2>
                                                <p>Apakah Anda yakin ingin menghapus data gambar ini?</p>
                                                <div class="mt-4 flex justify-end space-x-2">
                                                    <button wire:click="$set('imageIdToDelete', null)"
                                                        class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">Batal</button>
                                                    <button wire:click="removeImage"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div
                                        class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                                        <div class="mb-1 flex justify-between items-center">
                                            <div class="flex items-center gap-x-3">
                                                <span
                                                    class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500"
                                                    data-hs-file-upload-file-icon="">
                                                    <img class="rounded-lg"
                                                        src="{{ asset('storage/' . $image->path) }}"
                                                        alt="{{ $item->name }}" loading="lazy">
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-x-2">
                                                <button type="button"
                                                    class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                                    wire:click="confirmDelete({{ $image->id }})">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                        <line x1="10" x2="10" y1="11"
                                                            y2="17"></line>
                                                        <line x1="14" x2="14" y1="11"
                                                            y2="17"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <span class=" text-slate-400 text-xs mb-4">*Tolong pastikan semua gambar yang terupload
                                    bersetatus hujau, karena tampilan akan hilang ketika memilih lokasi
                                    penyimpanan.</span>

                                <x-ui.input label="Nama Barang" id="name" name="name" wire:model="name"
                                    class="w-full" />
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 items-center">
                                    <x-ui.select label="Kategori" id="category_id" name="category_id"
                                        :options="$categories" wire:model="category_id" />
                                    <x-ui.input label="Jumlah" id="amount" name="amount" type="number"
                                        wire:model="amount" />
                                </div>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-4 pb-8 border-b border-dotted border-zinc-200">
                                    <x-ui.input label="Kode resmi" id="official_code" name="official_code"
                                        wire:model="official_code" />
                                    <x-ui.input label="Kode" id="code" name="code" wire:model="code" />
                                </div>

                                <p class="text-md mb-1">Informasi Penyimpanan</p> {{ $location_type }}
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-4 pb-8 border-b border-dotted border-zinc-200">
                                    <x-ui.select label="Jenis Penyimpanan" id="location_type" name="location_type"
                                        :options="['Location' => 'Lokasi', 'Room' => 'Ruang', 'Locker' => 'Loker']" wire:model.change="location_type" wire:loading.attr="disabled"/>

                                    <x-ui.select label="Lokasi penyimpanan" id="location_id" name="location_id"
                                        :options="$locationOptions" wire:model="location_id" />
                                </div>

                                <!-- Condition & Status -->
                                <p class="text-md mb-1">Informasi status barang</p>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-4 pb-8 border-b border-dotted border-zinc-200">
                                    <x-ui.select label="Keadaan barang" id="condition" name="condition"
                                        wire:model="condition" :options="['baik' => 'Baik', 'rusak' => 'Rusak', 'hilang' => 'Hilang']" />
                                    <x-ui.select label="Status" id="status" name="status" wire:model="status"
                                        :options="[
                                            'tersedia' => 'Tersedia',
                                            'dipinjam' => 'Dipinjam',
                                            'hilang' => 'Hilang',
                                        ]" />
                                </div>
                                <!-- Additional Details -->
                                <p class="text-md mb-1">Informasi tambahan</p>
                                <div class="mb-6">
                                    <!-- Textarea Component for Description -->
                                    <x-ui.text-area label="Deskripsi" type="text" id="description"
                                        name="description" wire:model="description" class="w-full">
                                    </x-ui.text-area>
                                </div>
                                <div class="mb-6">
                                    <x-ui.select label="Pembelian" id="purchase_id" name="purchase_id"
                                        wire:model="purchase_id" :options="$purchases" />
                                </div>

                                <x-ui.button type="primary" rounded="md" submit="true" id="submit"
                                    width="auto">Perbarui data</x-ui.button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    window.addEventListener('load', () => {
        const imagesPath = [];
        const checkHSFileUpload = setInterval(() => {

            if (window.$hsFileUploadCollection) {
                // console.log(window.$hsFileUploadCollection);
                clearInterval(checkHSFileUpload); // Berhenti ketika $hsFileUploadCollection terdeteksi
                const {
                    element
                } = HSFileUpload.getInstance('#hs-file-upload-with-limited-file-size', true);

                element.dropzone.on('success', (file, response) => {
                    if (response.filePath) {
                        console.log("File uploaded successfully:", response.filePath);
                        imagesPath.push(response.filePath); // Add file path to array
                    }
                });
            }
        }, 100);

        const submitButton = document.getElementById('submit');
        submitButton.addEventListener('click', () => {
            console.log("Submitting file paths:", imagesPath); // Debugging output
            Livewire.dispatch('imagesUploaded', {
                filePath: imagesPath
            });
        });

    });
</script>
