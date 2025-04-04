<?php

namespace Database\Factories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->optional()->phoneNumber,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Đặt mật khẩu mặc định
            'role' => $this->faker->randomElement([10, 20]),
            'biography' => $this->faker->optional()->text,
            'avatar' => $this->faker->optional()->imageUrl(100, 100, 'avatar'),
            'birthday' => $this->faker->optional()->date,
            'ward_code' => $this->faker->optional()->numerify('######'),
            'district_code' => $this->faker->optional()->numerify('######'),
            'province_code' => $this->faker->optional()->numerify('######'),
            'full_address' => $this->faker->address,
            'region' => $this->faker->optional()->randomElement(['North', 'South', 'Central']),
            'vendor' => $this->faker->randomElement([1, 2]),
            'status' => $this->faker->randomElement([0, 1]),
            'created_by' => $this->faker->optional()->numberBetween(1, 10),
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
