<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'item_id' => 1,
                'path' => 'uploads/item1_mage1.jpg',
            ],
            [
                'item_id' => 1,
                'path' => 'uploads/item1_image2.jpg',
            ],
            [
                'item_id' => 1,
                'path' => 'uploads/item1_image3.jpg',
            ],
            [
                'item_id' => 2,
                'path' => 'uploads/item2_image1.jpg',
            ],
            [
                'item_id' => 2,
                'path' => 'uploads/item2_image2.jpg',
            ],
            [
                'item_id' => 3,
                'path' => 'uploads/item3_image1.jpg',
            ],
            [
                'item_id' => 3,
                'path' => 'uploads/item3_image2.jpg',
            ],
            [
                'item_id' => 4,
                'path' => 'uploads/item4_image1.jpg',
            ],
            [
                'item_id' => 4,
                'path' => 'uploads/item4_image2.jpg',
            ],
            [
                'item_id' => 4,
                'path' => 'uploads/item4_image3.jpg',
            ],
            [
                'item_id' => 5,
                'path' => 'uploads/item5_image1.jpg',
            ],
            [
                'item_id' => 5,
                'path' => 'uploads/item5_image2.jpg',
            ],
            [
                'item_id' => 5,
                'path' => 'uploads/item5_image3.jpg',
            ],
            [
                'item_id' => 6,
                'path' => 'uploads/item6_image1.jpg',
            ],
            [
                'item_id' => 6,
                'path' => 'uploads/item6_image2.jpg',
            ],
            [
                'item_id' => 7,
                'path' => 'uploads/item7_image1.jpg',
            ],
            [
                'item_id' => 7,
                'path' => 'uploads/item7_image2.jpg',
            ],
            [
                'item_id' => 8,
                'path' => 'uploads/item8_image1.jpg',
            ],
            [
                'item_id' => 8,
                'path' => 'uploads/item8_image2.jpg',
            ],
            [
                'item_id' => 9,
                'path' => 'uploads/item9_image1.jpg',
            ],
            [
                'item_id' => 10,
                'path' => 'uploads/item10_image1.jpg',
            ],
            [
                'item_id' => 10,
                'path' => 'uploads/item10_image2.jpg',
            ],
            [
                'item_id' => 10,
                'path' => 'uploads/item10_image3.jpg',
            ], 
        ];
        
        foreach ($images as $image) {
            Images::create($image);
        }
    }
}
