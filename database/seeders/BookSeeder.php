<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3), // Tên sách ngẫu nhiên (3 từ)
                'author' => $faker->name, // Tác giả ngẫu nhiên
                'publication_year' => $faker->year, // Năm xuất bản
                'genre' => $faker->word, // Thể loại ngẫu nhiên
                'library_id' => $faker->numberBetween(1, 100), // Tham chiếu tới ID của libraries
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
