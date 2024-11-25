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
            {{ __('Peminjam') }}
        </h2>
        <x-ui.button href="{{ route('peminjam.create') }}" width="md" size="lg" tag="a" type="primary"
            rounded="md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path
                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            Tambah Peminjam</x-ui.button>
    </div>
    <!-- Delete Confirmation Modal -->
    @if ($isModalDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-bold">Konfirmasi hapus data</h2>
                <p>Apakah Anda yakin ingin menghapus data gambar ini?</p>
                <div class="mt-4 flex justify-end space-x-2">
                    <button @click="openDelete = false" wire:click="closeModalPopover"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>
                    <button wire:click="deleteItem({{ $confirmDeleteId }})"
                        class="px-4 py-2 bg-red-600 text-white rounded">
                        Delete
                    </button> </div>
            </div>
        </div>
    @endif
    <div class="row row-cards">
        <div class="col-12">
         <livewire:borrowers-table />
        </div>

    </div>
