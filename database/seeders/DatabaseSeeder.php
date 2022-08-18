<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AirlineModel;
use App\Models\AirplaneModel;
use App\Models\AirportModel;
use App\Models\RouteModel;
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
        \App\Models\UserModel::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123'),
            'phone_number' => '6281234567890'
        ]);

        AirlineModel::factory()->make();
        AirplaneModel::factory()->count(10)->make();
        AirportModel::factory()->make();
        RouteModel::factory()->make();
    }
}
