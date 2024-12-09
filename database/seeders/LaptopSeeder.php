<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Apple']),
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),
                'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD']),
                'rental_status' => $faker->boolean, // true (đã cho thuê), false (chưa cho thuê)
                'renter_id' => $faker->optional(0.7)->numberBetween(1, 100), // 70% laptop có người thuê
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
