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
            $randTeamA = rand(1, 4);
            $randTeamB = rand(1, 4);
            if ($randTeamA === $randTeamB) {
                if ($randTeamB === 1) {
                    $randTeamB += 1;
                } else if ($randTeamB === 4) {
                    $randTeamB -= 1;
                }
            }
            $post = Post::findOrFail($j);
            $teamA = Team::findOrFail($randTeamA);
            $teamB = Team::findOrFail($randTeamB);
            if ($post->mode === 'challenge'){
                if ($j % 3 === 0) {
                    Challenge::factory()->create([
                        'post_id' => $j,
                        'teamA_id' => $randTeamA,
                        'teamA_name'=> $teamA->name,
                        'mode' => '5v5'
                    ]);
                } else if ($j % 3 === 2) {
                    Challenge::factory()->create([
                        'teamA_id' => $randTeamA,
                        'post_id' => $j,
                        'teamA_name'=> $teamA->name,
                        'mode' => '1v1'
                    ]);
                } else {
                    $winner = rand(1, 2);
                    if ($winner === 1) {
                        $winnerTeam  = 'A';
                    } else if ($winner === 2) {
                        $winnerTeam  = 'B';
                    }
                    Challenge::factory()->create([
                        'post_id' => $j,
                        'teamA_id' => $randTeamA,
                        'teamA_name'=> $teamA->name,
                        'teamB_id' => $randTeamB,
                        'teamB_name'=> $teamB->name,
                        'mode' => '5v5',
                        'match_progress' => 'ENDED',
                        'victory_team' => $winnerTeam
                    ]);
                }
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
