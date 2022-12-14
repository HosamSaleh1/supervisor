<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_the_api_login_returns_a_successful_response2()
    {
        $response = $this->post('/api/users/login',['email'=>'user@user.com' ,'password'=>'password']);

        $response->assertStatus(200);
    }

    public function test_the_api_register_returns_a_successful_response2()
    {
        $response = $this->post('/api/users/register',['name'=> fake()->name(),'email'=> fake()->unique()->safeEmail() ,'password'=>'password']);

        $response->assertStatus(200);
    }
}
