<?php

namespace Database\Factories;

use App\Models\RouteModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RouteModel>
 */
class RouteFactory extends Factory
{
    protected $model = RouteModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => '163',
            'departure_id' => '1',
            'destination_id' => '2',
            'time_of_flight_minutes' => '120',
        ];
    }
}
