<?php

namespace Database\Seeders;

use App\Models\Borrowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'name', 'no_id', 'photo', 'email', 'phone', 'address', 'status'['aktif', 'nonaktif'],'information'
        $borrowers = [
            [
                'name' => 'Andi Setiawan',
                'no_id' => 'ID-1001',
                'photo' => 'storage/photo1.jpg',
                'email' => 'andi.setiawan@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'status' => 'aktif',
                'information' => 'Peminjam lama yang sering memperbarui buku.',
            ],
            [
                'name' => 'Budi Santoso',
                'no_id' => 'ID-1002',
                'photo' => 'storage/photo2.jpg',
                'email' => 'budi.santoso@example.com',
                'phone' => '081234567891',
                'address' => 'Jl. Pahlawan No. 20, Bandung',
                'status' => 'aktif',
                'information' => 'Menyukai buku tentang teknologi.',
            ],
            [
                'name' => 'Citra Lestari',
                'no_id' => 'ID-1003',
                'photo' => 'storage/photo3.jpg',
                'email' => 'citra.lestari@example.com',
                'phone' => '081234567892',
                'address' => 'Jl. Pemuda No. 30, Surabaya',
                'status' => 'nonaktif',
                'information' => 'Akun nonaktif selama 3 bulan terakhir.',
            ],
            [
                'name' => 'Dewi Rahmawati',
                'no_id' => 'ID-1004',
                'photo' => 'storage/photo4.jpg',
                'email' => 'dewi.rahmawati@example.com',
                'phone' => '081234567893',
                'address' => 'Jl. Mawar No. 40, Yogyakarta',
                'status' => 'aktif',
                'information' => 'Sering meminjam buku-buku fiksi.',
            ],
            [
                'name' => 'Eko Prasetyo',
                'no_id' => 'ID-1005',
                'photo' => 'storage/photo5.jpg',
                'email' => 'eko.prasetyo@example.com',
                'phone' => '081234567894',
                'address' => 'Jl. Kenanga No. 50, Medan',
                'status' => 'aktif',
                'information' => 'Suka meminjam buku sejarah.',
            ],
            [
                'name' => 'Fitriani Hidayat',
                'no_id' => 'ID-1006',
                'photo' => 'storage/photo6.jpg',
                'email' => 'fitriani.hidayat@example.com',
                'phone' => '081234567895',
                'address' => 'Jl. Melati No. 60, Semarang',
                'status' => 'nonaktif',
                'information' => 'Akun nonaktif sementara.',
            ],
            [
                'name' => 'Gilang Permana',
                'no_id' => 'ID-1007',
                'photo' => 'storage/photo7.jpg',
                'email' => 'gilang.permana@example.com',
                'phone' => '081234567896',
                'address' => 'Jl. Cempaka No. 70, Palembang',
                'status' => 'aktif',
                'information' => 'Menyukai buku ekonomi dan bisnis.',
            ],
            [
                'name' => 'Hana Sari',
                'no_id' => 'ID-1008',
                'photo' => 'storage/photo8.jpg',
                'email' => 'hana.sari@example.com',
                'phone' => '081234567897',
                'address' => 'Jl. Anggrek No. 80, Makassar',
                'status' => 'aktif',
                'information' => 'Sering memperpanjang masa pinjaman.',
            ],
            [
                'name' => 'Ivan Putra',
                'no_id' => 'ID-1009',
                'photo' => 'storage/photo9.jpg',
                'email' => 'ivan.putra@example.com',
                'phone' => '081234567898',
                'address' => 'Jl. Seruni No. 90, Pontianak',
                'status' => 'aktif',
                'information' => 'Minat besar pada literatur klasik.',
            ],
            [
                'name' => 'Joko Widodo',
                'no_id' => 'ID-1010',
                'photo' => 'storage/photo10.jpg',
                'email' => 'joko.widodo@example.com',
                'phone' => '081234567899',
                'address' => 'Jl. Kemuning No. 100, Balikpapan',
                'status' => 'nonaktif',
                'information' => 'Akun dinonaktifkan karena tidak ada aktivitas.',
            ],
        ];

        foreach ($borrowers as $borrower) {
            Borrowers::create($borrower);
        }
    }
}
