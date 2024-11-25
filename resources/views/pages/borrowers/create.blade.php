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
                            <p class="mb-1 text-sm text-zinc-500 dark:text-gray-400">Silahkan lengkapi data peminjam
                                untuk membuat pinjaman.
                            </p>
                        </div>

                        <div class="flex items-center w-full">
                            <div x-data="captureImage" class="container">
                                <p class="text-sm font-medium leading-5 text-gray-700 dark:text-gray-300">Foto Peminjam</p>
                                <div class="grid grid-cols-2 w-[80%] content-start">
                                    <video id="video" class="w-[360px] h-[280px] rounded-md" width="360"
                                        height="280" autoplay></video>
                                    <canvas id="canvas" width="360" height="280"
                                        class="hidden rounded-md"></canvas>
                                </div>
                                <div class="mb-4">
                                    <!-- Tombol untuk menangkap gambar -->
                                    <x-ui.button type="primary" rounded="md" width="auto" id="capture"
                                        x-show="!imageCaptured">
                                        Tangkap Gambar
                                    </x-ui.button>

                                    <!-- Tombol untuk menyimpan gambar -->
                                    <x-ui.button type="secondary" rounded="md" width="auto" id="save"
                                        class="btn" x-show="imageCaptured">
                                        Simpan Gambar
                                    </x-ui.button>
                                </div>
                                <div id="output" class="mb-4 text-sm text-green-500 dark:text-green-400 "></div>
                            </div>
                        </div>
                        <div>
                            <form wire:submit.prevent="storeBorrower" class="space-y-6 w-[80%]"
                                enctype="multipart/form-data">
                                {{-- 'name', 'no_id', 'photo', 'email', 'phone', 'address', 'status','information' --}}
                             
                                <x-ui.input label="Nama Peminjam" id="name" name="name" wire:model="name"
                                    class="w-full" />
                                <x-ui.input label="Nomor Identitas" id="no_id" name="no_id" wire:model="no_id"
                                    class="w-full" />
                                <x-ui.input label="Alamat Email" id="email" name="email" wire:model="email"
                                    class="w-full" />
                                <x-ui.input label="Nomor Hanphone" id="phone" name="phone" wire:model="phone"
                                    class="w-full" />
                                <x-ui.text-area label="Alamat" type="text" id="address" name="address"
                                    wire:model="address" class="w-full">
                                </x-ui.text-area>
                                <x-ui.text-area label="Informasi lainya" type="text" id="information"
                                    name="information" wire:model="information" class="w-full">
                                </x-ui.text-area>

                                <x-ui.button type="primary" rounded="md" submit="true" id="submit"
                                    width="auto">Simpan</x-ui.button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('captureImage', () => ({
            imageCaptured: false,

            init() {
                const video = document.getElementById('video');
                const canvas = document.getElementById('canvas');
                const captureButton = document.getElementById('capture');
                const saveButton = document.getElementById('save');
                const output = document.getElementById('output');
                const context = canvas.getContext('2d');
                const photo = document.getElementById('photo');

                // Akses kamera
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(stream => {
                        video.srcObject = stream;
                    })
                    .catch(err => {
                        console.error("Error accessing camera: ", err);
                    });

                // Tangkap gambar
                captureButton.addEventListener('click', () => {
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    canvas.style.display = 'block';
                    this.imageCaptured = true; // Perbarui status Alpine.js
                    output.innerHTML = '<p>Image captured! Click "Save" to store it.</p>';
                });

                // Kirim gambar ke server
                saveButton.addEventListener('click', () => {
                    const image = canvas.toDataURL('image/png');
                    fetch('{{ route('capture.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                image
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // photo.value = data.file;
                                Livewire.dispatch('photosUploaded', {
                                    filePath: data.file
                                });
                                output.innerHTML =
                                    `<p>Image saved! File: ${data.file}</p>`;
                                this.imageCaptured = false; // Reset status jika perlu
                            }
                        })
                        .catch(err => {
                            console.error("Error saving image: ", err);
                        });
                });
            }
        }));
    });
</script>
