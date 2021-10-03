<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory(3)->create([
            'sender_id' => 1,
            'receiver_id' => 2,
        ]);
        Message::factory(3)->create([
            'sender_id' => 2,
            'receiver_id' => 3,
        ]);
        Message::factory(3)->create([
            'sender_id' => 3,
            'receiver_id' => 1,
        ]);
    }
}
