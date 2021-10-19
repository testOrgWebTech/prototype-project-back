<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(TeamUserSeeder::class);
        $this->call(ImageSeeder::class);
    }
}
