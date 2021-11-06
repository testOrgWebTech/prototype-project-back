<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                // ->loginAs(User::find(15))
                ->visit('http://localhost:8080')
                ->refresh()
                ->assertPathIs('/');
                // ->assertSee('Home');
                // ->waitForLocation('http://localhost:8080')
                // ->waitForReload()
                // ->assertPathBeginsWith('/home');
                // ->assertScript('window.isLoaded')
                // ->assertAuthenticatedAs($user);
                // ->assertUrlIs('http://localhost:8080');
            // ->assertDialogOpened('Dialog message');
        });
    }
}
