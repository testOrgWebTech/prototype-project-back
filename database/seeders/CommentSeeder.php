<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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
            Comment::factory(1)->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
