<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 15; $i++) {
            if ($i % 3 === 0) {
                Image::factory()->create([
                    'user_id' => $i,
                    'name' => 'gus.jpg',
                    'path' => '/storage/images/gus.jpg'
                ]);
            } else if ($i % 3 === 1) {
                Image::factory()->create([
                    'user_id' => $i,
                    'name' => 'off.jpg',
                    'path' => '/storage/images/off.jpg'
                ]);
            } else {
                Image::factory()->create([
                    'user_id' => $i,
                    'name' => 'phone.jpg',
                    'path' => '/storage/images/phone.jpg'
                ]);
            }
        }
    }
}
