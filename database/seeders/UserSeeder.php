<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Off',
            'email' => 'off@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Gus',
            'email' => 'gus@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Tan',
            'email' => 'tan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Jimmy',
            'email' => 'jimmy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Phone',
            'email' => 'phone@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Dol',
            'email' => 'dol@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Saac',
            'email' => 'saac@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Naruto',
            'email' => 'naruto@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Prayut',
            'email' => 'prayut@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Pravit',
            'email' => 'pravit@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Pratord',
            'email' => 'pratord@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Elon Musk',
            'email' => 'ElonMusk@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Mark Zuckerberg',
            'email' => 'MarkZuckerberg@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Bill Gates',
            'email' => 'BillGates@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass1234'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
            'role'=>'ADMIN'
        ]);
        User::create([
            'name' => 'Jimmy',
            'email' => 'patchapon.r@ku.th',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
            'role'=>'PLAYER'
        ]);
    }
}
