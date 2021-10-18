<?php

namespace Database\Seeders;

use App\Models\TeamUser;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $teams = Team::get();
        // foreach($teams as $team){
        //     TeamUser::create([
        //         'team_id' => team,
        //         'user_id' => ,
        //     ]);
        // }

        // for ($i = 1; $i < 15; $i++) {
        //     if ($i % 2 === 0) {
        //         TeamUser::create([
        //             'team_id' => 1,
        //             'user_id' => $i,
        //         ]);
        //     } else {
        //         TeamUser::create([
        //             'team_id' => 2,
        //             'user_id' => $i,
        //         ]);
        //     }
        // }
        // for ($i = 1; $i < 11; $i++) {
        //     if ($i % 2 === 0) {
        //         TeamUser::create([
        //             'team_id' => 3,
        //             'user_id' => $i,
        //         ]);
        //     } else {
        //         TeamUser::create([
        //             'team_id' => 4,
        //             'user_id' => $i,
        //         ]);
        //     }
        // }
    }
}
