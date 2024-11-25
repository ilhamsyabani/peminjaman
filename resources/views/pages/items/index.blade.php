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
            {{ __('Barang') }}
        </h2>
        <x-ui.button href="{{ route('barang.create') }}" width="md" size="lg" tag="a" type="primary"
            rounded="md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path
                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            Tambah Barang</x-ui.button>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="row row-cards">
        <div class="col-12">
            <section class="mt-10">
                <div class="mx-auto max-w-full">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800">
                        <div class="flex items-center justify-between d py-4">
                            <div class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" wire:model.live.debounce.300ms="search" wire:change="updateSearch"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                        placeholder="Search" required="">
                                </div>
                            </div>
                            <div class="flex space-x-3">
                                <div class="flex gap-1 items-center">
                                    <label class="w-32 text-sm text-end font-medium text-gray-900">Satatus:</label>
                                    <select wire:model.live="status" wire:change="updateStatus"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">All</option>
                                        <option value="tersedia">Tersedia</option>
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="hilang">Hilang</option>
                                    </select>
                                </div>
                                <div class="flex gap-1 items-center">
                                    <label class="w-32 text-sm font-medium text-end text-gray-900">Lokasi:</label>
                                    <select wire:model.live="location" wire:change="updateLocation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="">All</option>
                                        <option value="Location">Lokasi</option>
                                        <option value="Room">Room</option>
                                        <option value="Locker">Locker</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 text-start">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-start" wire:click="setSortingBy('name')">
                                            <button class="flex items-center gap-5 uppercase">
                                                Nama Barang
                                                @if ($sortBy !== 'name')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="size-5">
                                                        <path fill-rule="evenodd"
                                                            d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @elseif($sortDir == 'ASC')
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @else
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">Kode</th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            <button class="flex justify-between items-center gap-4 uppercase"
                                            wire:click="setSortingBy('category')">
                                            Kategori
                                            @if ($sortBy !== 'category')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="size-5">
                                                    <path fill-rule="evenodd"
                                                        d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @elseif($sortDir == 'ASC')
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                        fill="#0F172A" fill-opacity="0.42" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                        fill="#0F172A" />
                                                </svg>
                                            @else
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                        fill="#0F172A" fill-opacity="0.42" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                        fill="#0F172A" />
                                                </svg>
                                            @endif
                                        </button></th>
                                        <th scope="col" class="px-4 py-3 text-center">
                                            <button class="mx-auto flex justify-center items-center gap-1 uppercase"
                                                wire:click="setSortingBy('status')">
                                                Status
                                                @if ($sortBy !== 'status')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="size-5">
                                                        <path fill-rule="evenodd"
                                                            d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @elseif($sortDir == 'ASC')
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @else
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            <button class="flex justify-center items-center gap-4 uppercase"
                                                wire:click="setSortingBy('location_type')">
                                               Lokasi
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            <button class="mx-auto flex justify-center items-center gap-1 uppercase"
                                                wire:click="setSortingBy('condition')">
                                                Kondisi
                                                @if ($sortBy !== 'condition')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="size-5">
                                                        <path fill-rule="evenodd"
                                                            d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @elseif($sortDir == 'ASC')
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 3.46967C10.2374 3.17678 9.76256 3.17678 9.46967 3.46967L7.84467 5.09467L6.21967 6.71967C5.92678 7.01256 5.92678 7.48744 6.21967 7.78033C6.51256 8.07322 6.98744 8.07322 7.28033 7.78033L10 5.06066L12.7197 7.78033C13.0126 8.07322 13.4874 8.07322 13.7803 7.78033C14.0732 7.48744 14.0732 7.01256 13.7803 6.71967L10.5303 3.46967Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @else
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.46967 3.46967C9.76256 3.17678 10.2374 3.17678 10.5303 3.46967L12.1553 5.09467L13.7803 6.71967C14.0732 7.01256 14.0732 7.48744 13.7803 7.78033C13.4874 8.07322 13.0126 8.07322 12.7197 7.78033L10 5.06066L7.28033 7.78033C6.98744 8.07322 6.51256 8.07322 6.21967 7.78033C5.92678 7.48744 5.92678 7.01256 6.21967 6.71967L9.46967 3.46967Z"
                                                            fill="#0F172A" fill-opacity="0.42" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5303 16.5303C10.2374 16.8232 9.76256 16.8232 9.46967 16.5303L7.84467 14.9053L6.21967 13.2803C5.92678 12.9874 5.92678 12.5126 6.21967 12.2197C6.51256 11.9268 6.98744 11.9268 7.28033 12.2197L10 14.9393L12.7197 12.2197C13.0126 11.9268 13.4874 11.9268 13.7803 12.2197C14.0732 12.5126 14.0732 12.9874 13.7803 13.2803L10.5303 16.5303Z"
                                                            fill="#0F172A" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="">Tindakan</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs">
                                    @foreach ($items as $item)
                                        <tr wire:key="{{ $item->id }}" class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-start items-start"">
                                                <div class="flex gap-3">
                                                    <div class="">
                                                        {{ $item->name }}
                                                        <span class="block text-xs text-slate-500">kode resmi:
                                                            {{ $item->official_code }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="px-4 py-3">{{ $item->code }}</td>
                                            <td class="px-4 py-3">{{ $item->category->name }}</td>
                                            <td class="px-4 py-3 text-center">
                                                @php
                                                    $statusClasses = [
                                                        'hilang' => 'bg-red-50 text-red-700 ring-red-600/20',
                                                        'dipinjam' => 'bg-yellow-50 text-yellow-700 ring-yellow-600/20',
                                                        'tersedia' => 'bg-green-50 text-green-700 ring-green-600/20',
                                                    ];
                                                    $statusClass =
                                                        $statusClasses[$item->status] ??
                                                        'bg-gray-50 text-gray-700 ring-gray-600/20';
                                                @endphp
                                                <span
                                                    class="inline-flex items-center rounded-full py-1 px-3 w-min-24 text-xs font-medium ring-1 ring-inset {{ $statusClass }}">
                                                    {{ $item->status }}
                                                </span>
        
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($item->location_type)
                                                    <p>
                                                        @if ($item->location_type == 'Location')
                                                            {{ App\Models\Location::find($item->location_id)->name }}
                                                        @elseif ($item->location_type == 'Room')
                                                            {{ App\Models\Room::find($item->location_id)->name }},
                                                            {{ App\Models\Room::find($item->location_id)->location->name }}
                                                        @elseif ($item->location_type == 'Locker')
                                                            {{ App\Models\Locker::find($item->location_id)->name }} di
                                                            dalam
                                                            {{ App\Models\Locker::find($item->location_id)->room->name }}
                                                        @endif
                                                    </p>
                                                @else
                                                    <p>No storage assigned.</p>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $item->condition }}
                                            </td>
                                            <td class="px-4 py-3 flex items-center justify-center">
                                                {{-- Tombol View --}}
                                                <x-ui.action-button :url="route('barang.view', $item->id)" class="text-blue-500 hover:text-blue-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </x-ui.action-button>
                                            
                                                {{-- Tombol Edit --}}
                                                <x-ui.action-button :url="route('barang.edit', $item->id)" class="text-yellow-500 hover:text-yellow-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </x-ui.action-button>
                                            
                                                {{-- Tombol Delete --}}
                                                <button class="px-3 py-2 rounded text-red-500 hover:text-red-700" onclick="confirm('Anda yakin akan menghapus data {{ $item->name }} ?')? '' : event.stopImmediatePropagation()" wire:click="deleteItem({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        
                        <div class="py-4 px-3">
                            <div class="flex ">
                                <div class="flex space-x-4 items-center mb-3">
                                    <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                    <select wire:model.live='perPage'
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
