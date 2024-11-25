<div id="hero"
    class="relative bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center w-full h-auto overflow-hidden"
    x-cloak>
    <div class="absolute inset-0 bg-sky-600 bg-opacity-80"></div>
    <header class="flex items-center w-full max-w-6xl px-8 pt-4 pb-28 mx-auto">
        <div class="container relative max-w-4xl mx-auto mt-20 text-center sm:mt-24 lg:mt-32">
            <!-- Banner Gradient -->
            <div class="inline-block w-auto p-0.5 shadow rounded-full animate-gradient"
                style="background-image: linear-gradient(160deg, #e66735, #e335e2 50%, #73f7f8, #a729ed);">
                <p
                    class="w-auto h-full px-3 bg-slate-50 dark:bg-neutral-900 dark:text-white py-1.5 font-medium text-sm tracking-widest uppercase rounded-full text-slate-800/90">
                    Selamat Datang di LABTP
                </p>
            </div>
            <!-- Heading -->
            <h1
                class="mt-5 text-xl  leading-tight tracking-tight text-centertext-white sm:text-2xl md:text-5xl">
                Temukan Solusi untuk Setiap Kebutuhanmu
            </h1>
            <!-- Subheading -->
            <p class="w-full max-w-2xl mx-auto mt-4 text-lg dark:text-white/60 text-slate-100">
                Dari peminjaman alat hingga kebutuhan ruangan, pelatihan, dan layanan eksklusif lainnya — kami hadir
                untuk mendukung langkahmu.
            </p>
            <!-- Search Section -->
            <div class="bg-white w-[80%] rounded-xl px-5 py-4 mx-auto mt-12 flex flex-col space-y-4 items-start ">
                <p class="text-sm font-medium leading-5 text-gray-700 dark:text-gray-300">
                    Cari barang yang dibutuhkan di sini:
                </p>
                <form action="" class="flex w-full gap-4" aria-label="Search form">
                    <div class="relative w-full flex items-center">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </span>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-3"
                            placeholder="Search" aria-label="Search for items" required>
                    </div>
                    <x-ui.button width="sm" rounded="lg" size="lg">
                        Cari
                    </x-ui.button>
                </form>
            </div>
        </div>
    </header>
</div>
