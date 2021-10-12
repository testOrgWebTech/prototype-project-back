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
        $posts = Post::get();
        foreach($posts as $post) {
            Category::factory(5)->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
