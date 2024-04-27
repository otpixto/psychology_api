<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\UserModel::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Default password for all users
            ]);
        }
    }
}
