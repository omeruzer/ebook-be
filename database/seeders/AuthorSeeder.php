<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
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
            
            Author::create([
                'name' => $faker->name()
            ]);
        }
    }
}
