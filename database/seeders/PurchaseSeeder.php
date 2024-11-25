<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Purchase::create([
            'name' => 'Pinjaman',
            'vendor' => 'Universitas Gajah Mada',
            'date' => Carbon::now()->subDays(10000),
            'status' => 'Bekas',
            'description' => 'Barang-Barang peninggalan jaman dahulukala.'
        ]);

        Purchase::create([
            'name' => 'Hibah',
            'vendor' => 'Dosen Internal',
            'date' => Carbon::now()->subDays(5),
            'status' => 'Baru',
            'description' => 'Barang-barang yang diberikan dosen dan tenaga pendidikan.'
        ]);

        Purchase::create([
            'name' => 'Pembelian',
            'vendor' => 'Fakultas Ilmu Pendidikan',
            'date' => Carbon::now()->subDays(15),
            'status' => 'Baru',
            'description' => 'Barang pembelian dari dana fakultas'
        ]);
    }
}
