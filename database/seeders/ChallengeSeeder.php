<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Team;
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
        $teams = Team::get();

        Challenge::factory(1)->create([
            'teamA_id' => 1,
            'teamB_id' => 2
        ]);
        Challenge::factory(1)->create([
            'teamA_id' => 2,
            'teamB_id' => 3
        ]);
        Challenge::factory(1)->create([
            'teamA_id' => 3,
            'teamB_id' => 1
        ]);
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
