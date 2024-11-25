<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'official_code' => 'ELE-001',
                'code' => 'ELEC-1234',
                'name' => 'Laptop Dell XPS 15',
                'amount' => 1,
                'category_id' => 1,
                'location_id' => 1,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Laptop high-end untuk pengembangan software',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'ELE-002',
                'code' => 'ELEC-5678',
                'name' => 'Printer Canon PIXMA',
                'amount' => 3,
                'category_id' => 2,
                'location_id' => 2,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Printer warna multifungsi untuk kantor',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'SW-001',
                'code' => 'SOFT-001',
                'name' => 'Microsoft Office 365',
                'amount' => 12,
                'category_id' => 5,
                'location_id' => 3,
                'location_type' => 'Locker',
                'condition' => 'baik',
                'status' => 'dipinjam',
                'description' => 'Lisensi Microsoft Office untuk semua karyawan',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'TOOL-001',
                'code' => 'TOOL-4321',
                'name' => 'Obeng Set',
                'amount' => 4,
                'category_id' => 4,
                'location_id' => 4,
                'location_type' => 'Location',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Peralatan obeng untuk maintenance',
                'purchase_id' => 2,
            ],
            [
                'official_code' => 'ELE-003',
                'code' => 'ELEC-9987',
                'name' => 'Router MikroTik',
                'amount' => 4,
                'category_id' => 1,
                'location_id' => 1,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Router jaringan untuk koneksi internet',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'ELE-004',
                'code' => 'ELEC-5623',
                'name' => 'Proyektor Epson',
                'amount' => 3,
                'category_id' => 2,
                'location_id' => 2,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Proyektor untuk presentasi kantor',
                'purchase_id' => 1,
            ],
            [
                'official_code' => 'TOOL-002',
                'code' => 'TOOL-5678',
                'name' => 'Bor Listrik',
                'amount' => 2,
                'category_id' => 4,
                'location_id' => 4,
                'location_type' => 'Location',
                'condition' => 'baik',
                'status' => 'dipinjam',
                'description' => 'Bor listrik untuk perbaikan instalasi',
                'purchase_id' => 2,
            ],
            [
                'official_code' => 'HBK-001',
                'code' => 'CONSUM-1234',
                'name' => 'Kertas A4 80gsm',
                'amount' => 100,
                'category_id' => 3,
                'location_id' => 2,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Kertas cetak untuk keperluan kantor',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'SW-002',
                'code' => 'SOFT-002',
                'name' => 'Adobe Photoshop CC',
                'amount' => 4,
                'category_id' => 5,
                'location_id' => 3,
                'location_type' => 'Locker',
                'condition' => 'baik',
                'status' => 'hilang',
                'description' => 'Lisensi software editing untuk tim kreatif',
                'purchase_id' => 3,
            ],
            [
                'official_code' => 'ELE-005',
                'code' => 'ELEC-2134',
                'name' => 'Switch Cisco 24 Port',
                'amount' => 4,
                'category_id' => 1,
                'location_id' => 1,
                'location_type' => 'Room',
                'condition' => 'baik',
                'status' => 'tersedia',
                'description' => 'Switch untuk jaringan internal kantor',
                'purchase_id' => 1,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}

