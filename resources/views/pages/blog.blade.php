<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('home');
// middleware(['redirect-to-dashboard']);

?>

<x-layouts.marketing>
    @volt('home')
        <section class="">
            <div class="relative bg-hero-pattern bg-cover bg-center bg-no-repeat">
                <div class="absolute inset-0 bg-sky-600 bg-opacity-80"></div>
                <div class="flex items-center w-full max-w-6xl px-8 pt-4 pb-28 mx-auto">
                    <div class="container relative max-w-4xl mx-auto mt-20 text-center sm:mt-24 lg:mt-32">
                        <!-- Banner Gradient -->
                        <div class="inline-block w-auto p-0.5 shadow rounded-full animate-gradient">
                            <h1
                            class="mt-5 text-xl  leading-tight tracking-tight text-centertext-white sm:text-2xl md:text-5xl">
                            Blog
                        </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-24">
                <div class="bg-white py-8 sm:py-12">
                    <div class="mx-auto px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Informasi
                                Tebaru</h2>
                            <p class="mt-2 text-lg/8 text-gray-600">Berita terbaru dan agenda kegiatan LABTP</p>
                        </div>
                        <div
                            class="mx-auto mt-5 border-t border-gray-200 pt-10 sm:mt-8 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <article class="flex items-start space-x-4">
                                <img src="https://tp.fipp.uny.ac.id/sites/tp.fipp.uny.ac.id/files/field/image/WhatsApp%20Image%202024-06-30%20at%2022.27.08.jpeg"
                                    alt="Pembelajaran Yang Meyenangkan di Era Digital"
                                    class="rounded-2xl my-3 border border-gray-200 w-80">
                                <div class="flex-1">
                                    <div class="flex items-center gap-x-4 text-xs">
                                        <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                                        <a href="#"
                                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Pelatihan</a>
                                    </div>
                                    <div class="group relative">
                                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span class="absolute inset-0"></span>
                                                Pembelajaran Yang Meyenangkan di Era Digital
                                            </a>
                                        </h3>
                                        <p class="mt-2 line-clamp-3 text-sm/6 text-gray-600">Departemen Kurikulum dan
                                            Teknologi Pendidikan
                                            Fakultas Ilmu Pendidikan dan Psikologi Universitas Negeri Yogyakarta
                                            menyelengarakan workshop
                                            online #1 dengan tema Pembelajaran Yang Menyenangkan Di Era Digital. </p>
                                    </div>
                                    <div class="relative mt-4 flex items-center gap-x-4 border-t border-gray-200 pt-4">
                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="size-10 rounded-full bg-gray-50">
                                        <div class="text-sm/6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    Michael Foster
                                                </a>
                                            </p>
                                            <p class="text-gray-600">Co-Founder / CTO</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endvolt
</x-layouts.marketing>
