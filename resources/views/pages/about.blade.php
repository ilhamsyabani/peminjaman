<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('about');
// middleware(['redirect-to-dashboard']);
?>

<x-layouts.marketing>
    @volt('about')
        <section class="relative bg-cover bg-center bg-no-repeat">
            <!-- Background overlay -->
            <div class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 sm:bg-gradient-to-r">
            </div>

            <!-- Content container -->
            <div class="relative mx-auto max-w-[1200px] px-12 py-24">
                <div class="max-w-3xl text-center sm:text-left">
                    <!-- Header -->
                    <h1 class="text-3xl font-extrabold sm:text-5xl">
                        LABTP

                        <strong class=" block text-4xl font-light text-salte-500"> Inovasi untuk Pendidikan. </strong>
                    </h1>

                    <!-- Description -->
                    <p class="max-w-3xl  mt-4 sm:text-xl/relaxed">
                        Laboratorium Teknologi Pendidikan (Lab TP) adalah pusat pengembangan media edukasi dan pembelajaran
                        yang dirancang untuk mendukung mahasiswa dalam mengeksplorasi potensi mereka. Lab TP menyediakan
                        fasilitas, teknologi, dan bimbingan untuk menciptakan solusi pembelajaran inovatif, serta mendorong
                        pengembangan diri mahasiswa sebagai pendidik dan profesional masa depan.
                    </p>
                    <p class="max-w-3xl  mt-4 sm:text-xl/relaxed">

                        Sebagai tempat belajar dan berkreasi, Lab TP tidak hanya menjadi sarana untuk pengembangan teknologi
                        pembelajaran, tetapi juga sebagai wadah untuk melahirkan ide-ide baru yang dapat diterapkan dalam
                        dunia pendidikan untuk meningkatkan kualitas belajar mengajar.
                    </p>
                </div>
            </div>
        </section>
    @endvolt
</x-layouts.marketing>
