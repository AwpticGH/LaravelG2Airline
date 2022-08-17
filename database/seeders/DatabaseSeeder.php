<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'Name' => 'Admin',
            'Email' => 'admin@gmail.com',
            'PhoneNumber' => '+6281234567890'
        ]);

        \App\Models\UserModel::factory(10)->create();
    }
}
