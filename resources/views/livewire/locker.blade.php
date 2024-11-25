<div class="w-full h-full">
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




    <div class="flex flex-col md:flex-row items-center justify-between w-full mb-4 py-4 space-y-4 md:space-y-0">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Loker') }}
        </h2>
        <div class="flex items-center gap-4 space-x-4">
            <x-ui.select id="location_filter" name="location_filter" wire:model.live="location_filter"
            placeholder="Pilih Location" :options="$locations" class="md:w-48 mx-4" status="Semua lokasi" />
            <x-ui.select id="room_filter" name="room_filter" wire:model.live="room_filter"
                placeholder="Pilih room" :options="$roomOptions" class="md:w-48 mx-4" status="Semua ruangan" />
            <x-ui.input id="search" name="search" wire:model.live="keyword" width="sm" placeholder="Search..."
                class="md:w-48" />
        </div>
    </div>



    <div class="flex gap-6">
        <div class="flex flex-col flex-1 pb-4 mx-auto h-full min-h-[500px]">
            <div class="w-full h-full">
                <div
                    class="flex justify-between items-center w-full h-full bg-pink-100 overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-full">
                    <div class="flex relative flex-col p-6 w-full">
                        <div
                            class="flex items-center pb-2 mb-2 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                            <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">Input Data
                                loker</h2>
                        </div>
                        <p class="mb-5 text-sm text-zinc-500 dark:text-gray-400">Silahkan masukan data loker baru
                            dalam
                            formulir berikut untuk menambah data loker
                        </p>
                        <div class="flex items-center w-full">
                            <form wire:submit.prevent="storeLocker" class="space-y-6 w-full">
                                <!-- Input Component for Name -->
                                <x-ui.select label="Lokasi loker" id="room_id" name="room_id"
                                    wire:model="room_id" placeholder="Pilih room" :options="$rooms" />

                                <x-ui.input label="Nama Loker" id="name" name="name" wire:model="name"
                                    class="w-full" />

                                <div class="flex gap-4">
                                    @if ($updateData == true)
                                        <x-ui.button wire:click="updateLocker()" type="primary" rounded="md"
                                            width="auto">Perbarui</x-ui.button>
                                    @else
                                        <x-ui.button type="primary" rounded="md" submit="true"
                                            width="auto">Simpan</x-ui.button>
                                    @endif
                                    <x-ui.button wire:click="resetForm()" type="secondary" rounded="md"
                                        width="auto">Batalkan</x-ui.button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-1 pb-5 mx-auto h-full min-h-[500px] min-w-[600px]">
            <div class="w-full h-full">
                <div
                    class="flex justify-between items-center w-full h-full bg-pink-100 overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-full">
                    <div class="flex relative flex-col p-4 w-full">
                        <div
                            class="flex items-center pb-4 mb-4 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                            <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">Daftar Data
                                Loker</h2>
                        </div>
                        @if ($lockers->count())
                            <div class="relative overflow-x-auto  border rounded-lg overflow-hidden dark:border-neutral-700">
                                <table class="w-full text-sm text-left divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-100">
                                        <tr class="border-b dark:border-gray-700">
                                            <th>
                                                <div class="py-3 px-6 flex items-center"> Nama loker </div>
                                            </th>
                                            <th>
                                                <div class="py-3 px-6 flex items-center"> Nama Ruangan </div>
                                            </th>
                                            <th>
                                                <div class="py-3 px-6 flex items-center"> Nama Lokasi </div>
                                            </th>
                                            <th>
                                                <div class="py-3 px-6 flex items-center"> Tindakan </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lockers as $key => $value)
                                            <tr class="border-b dark:border-gray-700">
                                                <td>
                                                    <div class="py-3 px-6 flex items-center">{{ $value->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="py-3 px-6 flex items-center">
                                                        {{ $value->room->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="py-3 px-6 flex items-center">
                                                        {{ $value->room->location->name }}</div>
                                                </td>
                                                <td>

                                                    <div class="py-3 px-6 flex  gap-2 items-center">
                                                        <x-ui.button wire:click="editLocker({{ $value->id }})"
                                                            type="primary" rounded="md" size="sm"
                                                            submit="true" width="sm">
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.2411 2.99111L12.3661 1.86612C12.8543 1.37796 13.6457 1.37796 14.1339 1.86612C14.622 2.35427 14.622 3.14573 14.1339 3.63388L4.55479 13.213C4.20234 13.5654 3.76762 13.8245 3.28993 13.9668L1.5 14.5L2.03319 12.7101C2.17548 12.2324 2.43456 11.7977 2.78701 11.4452L11.2411 2.99111ZM11.2411 2.99111L13 4.74999"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </x-ui.button>
                                                        <x-ui.button wire:click="deleteLocker({{ $value->id }})"
                                                            type="warning" rounded="md" size="sm"
                                                            submit="true" width="sm">
                                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.82692 6L9.59615 12M6.40385 12L6.17308 6M12.8184 3.86038C13.0464 3.89481 13.2736 3.93165 13.5 3.97086M12.8184 3.86038L12.1065 13.115C12.0464 13.8965 11.3948 14.5 10.611 14.5H5.38905C4.60524 14.5 3.95358 13.8965 3.89346 13.115L3.18157 3.86038M12.8184 3.86038C12.0542 3.74496 11.281 3.65657 10.5 3.59622M2.5 3.97086C2.72638 3.93165 2.95358 3.89481 3.18157 3.86038M3.18157 3.86038C3.94585 3.74496 4.719 3.65657 5.5 3.59622M10.5 3.59622V2.98546C10.5 2.19922 9.8929 1.54282 9.10706 1.51768C8.73948 1.50592 8.37043 1.5 8 1.5C7.62957 1.5 7.26052 1.50592 6.89294 1.51768C6.1071 1.54282 5.5 2.19922 5.5 2.98546V3.59622M10.5 3.59622C9.67504 3.53247 8.84131 3.5 8 3.5C7.15869 3.5 6.32496 3.53247 5.5 3.59622"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></x-ui.button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-full mt-4">
                                {{ $lockers->links() }}
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Tidak ada daftar loker</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
