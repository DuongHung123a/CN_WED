<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}