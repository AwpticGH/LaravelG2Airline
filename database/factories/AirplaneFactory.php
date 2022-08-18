<?php

namespace Database\Factories;

use App\Models\AirplaneModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirplaneModel>
 */
class AirplaneFactory extends Factory
{
    protected $model = AirplaneModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => 'Boeing 777-300ER',
            'total_seats' => '314',
            'airline_id' => '1',
        ];
    }
}
