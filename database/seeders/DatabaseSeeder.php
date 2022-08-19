<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AirlineModel;
use App\Models\AirplaneModel;
use App\Models\AirportModel;
use App\Models\FlightModel;
use App\Models\RouteModel;
use App\Models\UserModel;
use Database\Factories\AirportFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserModel::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123'),
            'phone_number' => '6281234567890'
        ]);

        AirlineModel::factory()->create();
        AirplaneModel::factory()->count(10)->create();
        AirportModel::factory()->create([
            'code' => 'CGK',
            'name' => 'Bandara Soekarno-Hatta',
            'province' => 'Banten',
            'city' => 'Tanggerang'
        ]);
        AirportModel::factory()->create([
            'code' => 'UPG',
            'name' => 'Bandara Sultah Hasanuddin',
            'province' => 'Sulawesi Selatan',
            'city' => 'Makassar'
        ]);
        RouteModel::factory()->create();
        FlightModel::factory()->create();
    }
}
