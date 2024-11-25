<?php

namespace Database\Seeders;

use App\Models\Locker;
use Illuminate\Cache\Lock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locker::create([
            'name' => 'Loker barang',
            'room_id' => '1'
        ]);

        Locker::create([
            'name' => 'Lemari Barang',
            'room_id' => '2'
        ]);

        Locker::create([
            'name' => 'Loker Alat',
            'room_id' => '2'
        ]);

        Locker::create([
            'name' => 'Loker Alat',
            'room_id' => '3'
        ]);

        Locker::create([
            'name' => 'Loker Alat',
            'room_id' => '4'
        ]);

        Locker::create([
            'name' => 'Loker penyimpanan',
            'room_id' => '5'
        ]);

        Locker::create([
            'name' => 'Loker penyimpanan',
            'room_id' => '6'
        ]);
    }
}
