<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();

            Book::create([
                'image' => 'https://m.media-amazon.com/images/I/31TWabocOlL._AC_SY1000_.jpg',
                'name' => $faker->sentence(1),
                'desc' => $faker->sentence(10),
                'year' => $faker->year(),
                'publisher_id' => rand(1, 10),
                'author_id' => rand(1, 10),
                'category_id' => rand(1, 9),
            ]);
        }
    }
}
