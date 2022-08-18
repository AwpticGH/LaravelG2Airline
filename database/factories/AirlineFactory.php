<?php

namespace Database\Factories;

use App\Models\AirlineModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirlineModel>
 */
class AirlineFactory extends Factory
{
    protected $model = AirlineModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'GA',
            'name' => 'Garuda Indonesia'
        ];
    }
}
