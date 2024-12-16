<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckDoctorPageTest extends DuskTestCase
{
    protected static $migrationRun = false;

    public function setUp(): void{
        parent::setUp();

        if(!static::$migrationRun){
            $this->artisan('migrate:fresh');
            $this->artisan('db:seed');
            static::$migrationRun = true;
        }
    }
    /**
     * A Dusk test example.
     */
    public function testDashboardPage(): void
    {
        $this->browse(callback: function (Browser $browser) {
            $browser->visit('/')
                //->waitForLocation('/')
                ->clickLink('Log in')
                ->type('email', 'doctor@gmail.com')
                ->type('password', '111')
                ->click('button[type="submit"]')
                ->assertSee('Welcome Doctor!');


            $browser->click('@span-patients')
                ->waitForText('PATIENT RECORDS')
                ->assertSee('PATIENT RECORDS')
                ->press('@btn-insert-patient')
                ->type('first_name', 'Carlos')
                ->type('last_name', 'Noyola Sanchez')
                ->type('date_of_birth', '11041992')
                ->select('gender', 'Male')
                ->type('email', fake()->unique()->safeEmail())
                ->type('phone', '353899819085')
                ->type('address', 'Final de calle')
                ->type('city', 'Dublin')
                ->type('state', 'Dublin')
                ->type('zip_code', 'D08K333')
                ->press('@btn-create-patient')
                ->pause(1000);

            $browser->type('input[type="search"]','Noyola')
                ->assertSee('Sanchez');

        });
    }

    public function testModifyPatientPage(): void
    {
        $this->browse(callback: function (Browser $browser) {


            $browser->click('@span-patients')
                ->waitForText('PATIENT RECORDS')
                ->assertSee('PATIENT RECORDS');

            $browser->type('input[type="search"]','Noyola')
                ->assertSee('Sanchez');



            $browser->clickLink('Show')
                ->clickLink('Edit')
                ->type('first_name', 'carlos alberto Edit')
                ->type('address', 'SI SE')
                ->press('Update Patient')
                ->assertSee('carlos alberto Edit');

        });
    }



}
