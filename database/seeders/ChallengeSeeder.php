<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Team;
use App\Models\Post;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j < 15; $j++) {
            if ($j % 3 === 0) {
                Challenge::factory()->create([
                    'post_id' => $j,
                    'mode' => '5v5'
                ]);
            } else if ($j % 3 === 2) {
                Challenge::factory()->create([
                    'post_id' => $j,
                    'mode' => '1v1'
                ]);
            } else {
                Challenge::factory()->create([
                    'post_id' => $j,
                    'mode' => '2v2'
                ]);
            }
        }
        // Challenge::factory()->create([
        //     'post_id' => 1,
        //     'mode' => '7v7'
        // ]);
        // $posts = Post::get();
        // foreach ($posts as $post) {
        //     Challenge::factory()->create([
        //         'post_id' => $post->id,
        //         'mode' => '7v7'
        //     ]);
        // }

        // Challenge::factory(5)->create([
        //     'teamA_id' => 1,
        //     'post_id' => 1,
        //     'mode' => '5V5'
        // ]);
        // Challenge::factory(5)->create([
        //     'teamA_id' => 2,
        //     'post_id' => 2,
        //     'mode' => '5V5'
        // ]);
        // Challenge::factory(5)->create([
        //     'teamA_id' => 3,
        //     'post_id' => 3,
        //     'mode' => '5V5'
        // ]);
        // $posts = Post::get();
        // foreach($posts as $post) {
        //     Challenge::factory(1)->create([
        //         'post_id' => $post->id,
        //     ]);
        // }
        // Challenge::factory(1)->create([
        //     'teamA_id' => 1,
        //     'teamB_id' => 2,
        //     'post_id' => 1
        // ]);
        // Challenge::factory(1)->create([
        //     'teamA_id' => 2,
        //     'teamB_id' => 3,
        //     'post_id' => 2
        // ]);
        // Challenge::factory(1)->create([
        //     'teamA_id' => 3,
        //     'teamB_id' => 1,
        //     'post_id' => 3
        // ]);
        // $teams = Team::get();
        // foreach ($teams as $team) {
        //     Challenge::factory(1)->create([
        //         // 'teamA_id' => $team->id,
        //         // 'teamB_id' => $team->id + 1
        //         'teamA_id' => 1,
        //         'teamB_id' => 2
        //     ]);
        // }
    }
}
