<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Gudang Jurusan',
            'location_id' => '1'
        ]);
        Room::create([
            'name' => 'Ruang Control',
            'location_id' => '2'
        ]);
        Room::create([
            'name' => 'Ruang Studio 1',
            'location_id' => '2'
        ]);
        Room::create([
            'name' => 'Ruang Studio 2',
            'location_id' => '2'
        ]);
        Room::create([
            'name' => 'Ruang Ruang Rapat',
            'location_id' => '2'
        ]);
        Room::create([
            'name' => 'Gudang Belakang',
            'location_id' => '3'
        ]);
    }
}
