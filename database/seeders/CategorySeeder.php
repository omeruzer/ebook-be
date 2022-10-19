<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Roman'
        ]);

        Category::create([
            'name' => 'Dünya Klasiği',
            'parent_id' => 1
        ]);

        Category::create([
            'name' => 'Romantizm',
            'parent_id' => 1
        ]);

        Category::create([
            'name' => 'TYT'
        ]);

        Category::create([
            'name' => 'Matematik',
            'parent_id' => 4
        ]);

        Category::create([
            'name' => 'Türkçe',
            'parent_id' => 4
        ]);


        Category::create([
            'name' => 'AYT'
        ]);

        Category::create([
            'name' => 'Matematik',
            'parent_id' => 7
        ]);

        Category::create([
            'name' => 'Edebiyat',
            'parent_id' => 7
        ]);


    }
}
