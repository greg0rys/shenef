<?php

namespace Database\Factories;

use App\Models\CompanyLocations;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
        $first = $this->faker->firstName();
        $last = $this->faker->lastName();
        $full = $first . " " . $last;
        return [
            'company_location_id' => CompanyLocations::all()->random()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'full_name' => $full,
            'personal_email' => $this->faker->unique()->safeEmail,
            'company_name' => $this->faker->company,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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
