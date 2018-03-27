<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** 
		@test
    */
	public function it_welcome_users_with_nickname(){

		$this->get('/saludo/Carlos')->assertStatus(200)->assertSee('Bienvenido su nombre es: Carlos');
	}

	/** 
		@test
    */
	public function it_welcome_users_without_nickname(){
		
		$this->get('/saludo/Carlos/Tulosabes')->assertStatus(200)->assertSee('Bienvenido su nombre es: Carlos y su apodo es: Tulosabes');
	}
}
