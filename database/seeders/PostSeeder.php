<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Challenge;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();

        foreach ($users as $user) {
            if ($user->id % 2 == 0){
                Post::factory()->create([
                    'user_id' => $user->id,
                    'mode' => 'post'
                ]);
            }
            else{
                Post::factory()->create([
                    'user_id' => $user->id,
                    'mode' => 'challenge'
                ]);
            }
        }
    }
}
