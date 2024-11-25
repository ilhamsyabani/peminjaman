<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Elektronik',
            'description' => 'Barang seperti komputer, smartphone, printer, dan aksesori terkait.'
        ]);

        Category::create([
            'name' => 'Perlengkapan Kantor',
            'description' => 'Barang-barang umum seperti pena, kertas, dan map untuk kebutuhan kantor.'
        ]);

        Category::create([
            'name' => 'Barang Habis Pakai',
            'description' => 'Barang yang digunakan secara berkala, seperti alat pembersih, tisu, dan tinta printer.'
        ]);

        Category::create([
            'name' => 'Alat dan Peralatan',
            'description' => 'Peralatan keras, mesin, atau instrumen yang diperlukan untuk tugas tertentu atau pemeliharaan.'
        ]);

        Category::create([
            'name' => 'Perangkat Lunak dan Lisensi',
            'description' => 'Produk perangkat lunak yang dibeli dan lisensi terkait.'
        ]);
    }
}
