<?php

namespace Database\Factories;

use app\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserModel>
 */
class UserFactory extends Factory
{
    protected $model = UserModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = rand(0,1) ? 'Male' : 'Female';
        $female = rand(0,1) ? 'Mrs' : 'Miss';
        $title = $gender == 'Male' ? 'Mr' : $female;
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'username' => fake()->userName(),
            'password' => Hash::make(Str::random(4, 16)), // password
            'gender' => $gender,
            'title' => $title,
            'date_of_birth' => fake()->date(),
            'phone_number' => fake()->phoneNumber(),
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
