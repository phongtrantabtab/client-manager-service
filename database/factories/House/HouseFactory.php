<?php

namespace Database\Factories\House;

use App\Models\House\House;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Model>
 */
class HouseFactory extends Factory
{
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lessor_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'province_code' => $this->faker->randomElement(['01', '02', '03']),
            'district_code' => $this->faker->randomElement(['001', '002', '003']),
            'ward_code' => $this->faker->randomElement(['00001', '00002', '00003']),
            'full_address' => $this->faker->address,
            'thumbnail' => $this->faker->imageUrl(640, 480, 'house', true),
            'category_id' => $this->faker->numberBetween(1, 5),
            'verified_at' => $this->faker->optional()->dateTime,
            'status' => $this->faker->randomElement([0, 1]),
            'created_by' => $this->faker->numberBetween(1, 10),
            'updated_by' => null,
            'deleted_by' => null,
            'approve_by' => $this->faker->optional()->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
            'reason_delete' => null,
        ];
    }
}
