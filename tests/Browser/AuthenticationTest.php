<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Str;


class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testLoginFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8080')
                // ->waitForReload()
                // ->waitForText('Home')
                ->pause(3000)
                ->click('@login-dropdown')
                ->type('loginEmail', 'Tester')
                ->type('loginPassword', 'Tester')
                ->press('Login')
                ->waitForText('Login Failed!!')
                ->assertSee('Login Failed!!')
                // ->assertDialogOpened('Login Failed!!')
                ->pause(3000);
        });
    }
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();

            $browser->visit('http://localhost:8080')
                ->pause(3000)
                ->click('@login-dropdown')
                ->type('loginEmail', $user->email)
                ->type('loginPassword', 'password')
                ->press('Login')
                ->waitForText('Logout')
                ->assertSee('Logout');
        });
    }
    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8080')
                ->pause(3000)
                ->press('Logout')
                ->waitForText('Login')
                ->assertSee('Login');
        });
    }
}
