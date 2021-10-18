<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;


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
            'name' => 'Football'
        ]);
        Category::create([
            'name' => 'Basketball'
        ]);
        Category::create([
            'name' => 'CSGO'
        ]);
        Category::create([
            'name' => 'Valorant'
        ]);
        Category::create([
            'name' => 'Chess'
        ]);
    }
}
