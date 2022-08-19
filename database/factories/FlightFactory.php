<?php

namespace Database\Factories;

use App\Models\FlightModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightModel>
 */
class FlightFactory extends Factory
{
    protected $model = FlightModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = '2022-08-20';
        $time = '09:00:00';
        return [
            'airplane_id' => '1',
            'route_id' => '163',
            'depart_date_time' => $date.' '.$time,
        ];
    }
}
