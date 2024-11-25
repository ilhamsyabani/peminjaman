<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'official_code' => $this->faker->unique()->numerify('OC###'),
            'code' => $this->faker->unique()->numerify('C###'),
            'name' => $this->faker->word,
            'amount' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 5), // Asumsi ada 5 kategori
            'location_id' => $this->faker->numberBetween(1, 4), // Asumsi ada 10 lokasi penyimpanan
            'location_type' => $this->faker->randomElement(['App\Models\Location', 'App\Models\Room', 'App\Models\Locker']),
            'condition' => $this->faker->randomElement(['baik', 'rusak', 'hilang']),
            'status' => $this->faker->randomElement(['tersedia', 'dipinjam', 'hilang']),
            'description' => $this->faker->sentence,
            'purchase_id' => $this->faker->numberBetween(1, 7), 
        ];
    }
}
