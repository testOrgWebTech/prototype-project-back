<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Str;
use App\Models\User;

class RegistrationTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            //Cant use this cuz it auto submit form and post to db when using $user->email, tbh,i dont even know why-_-! 
            // $user = User::create([
            //     'name' => 'Tester',
            //     'email' => Str::random(5) . '123@test.com',
            //     'password' => 'pass1234',
            // ]);
            
            $browser->visit('http://localhost:8080/signUp')
                ->type('name', 'Tester')
                // ->type('email', $user->email)
                ->type('email', Str::random(8) . '1@test.com')
                ->type('password', 'pass1234')
                ->type('password_confirm', 'pass1234')
                ->attach('photo', __DIR__ . '/images/boy.png')
                ->press('Sign Up')
                ->press('OK')
                ->waitForReload()
                ->assertPathIs('/');
            // ->dump();
        });
    }
}
