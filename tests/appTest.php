<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class appTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewUserRegistration()
	{
	    $this->visit('/auth/login')
	         ->type('jibin@ecodons.com', 'email')
	         ->type('jibin123', 'password')
	         ->press('Sign In')
	         ->seePageIs('/home');
	}
}
