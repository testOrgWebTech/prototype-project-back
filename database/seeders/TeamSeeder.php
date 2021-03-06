<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;


class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory(4)->create([]);



        for ($j = 1; $j < 15; $j++) {
            if ($j % 2 !== 0) {
                $team = Team::find(1);
                $team->users()->attach($j);
            } else {
                $team = Team::find(2);
                $team->users()->attach($j);
            }
        }
        for ($j = 1; $j < 11; $j++) {
            if ($j % 2 !== 0) {
                $team = Team::find(3);
                $team->users()->attach($j);
            } else {
                $team = Team::find(4);
                $team->users()->attach($j);
            }
        }
        // for ($i = 0; $i < 2; $i++) {
        // }
        // for ($i = 1; $i < 15; $i++) {
        //     if ($i % 2 === 0) {
        //         Team::factory()->create([
        //             'team_id' => 1,
        //             'user_id' => $i,
        //         ]);
        //     } else {
        //         Team::factory()->create([
        //             'team_id' => 2,
        //             'user_id' => $i,
        //         ]);
        //     }
        // }
        // for ($i = 1; $i < 11; $i++) {
        //     if ($i % 2 === 0) {
        //         Team::factory()->create([
        //             'team_id' => 3,
        //             'user_id' => $i,
        //         ]);
        //     } else {
        //         Team::factory()->create([
        //             'team_id' => 4,
        //             'user_id' => $i,
        //         ]);
        //     }
        // }
    }
}
