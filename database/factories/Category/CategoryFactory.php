<?php

namespace Database\Factories\Category;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_vi' => $this->faker->word,
            'name_en' => $this->faker->word,
            'description_vi' => $this->faker->optional()->sentence,
            'description_en' => $this->faker->optional()->sentence,
            'icon' => $this->faker->imageUrl(100, 100, 'icon', true),
            'status' => $this->faker->randomElement([0, 1]),
            'created_by' => $this->faker->optional()->numberBetween(1, 10),
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
