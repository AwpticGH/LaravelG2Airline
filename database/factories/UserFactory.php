<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserModel>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Name' => fake()->name(),
            'Email' => fake()->safeEmail(),
            'Username' => fake()->userName(),
            'Password' => Hash::make(Str::random(4, 16)), // password
            $gender = rand(0,1) ? 'Male' : 'Female',
            'Gender' => $gender,
            $female = rand(0,1) ? 'Mrs' : 'Miss',
            $title = $gender == 'Male' ? 'Mr' : $female,
            'Title' => $title,
            'DateOfBirth' => fake()->date(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
