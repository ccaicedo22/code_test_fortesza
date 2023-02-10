<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    /** @test */
    public function store_user()
    {
        $response = $this->post('/api/usuarios',[
            "fullname" => "carlos andres balaguera caicedo",
            "username" => "ccaicedo22",
            "email" => "carlitosandresbalaguera@gmail.com",
            "password" => "123456"
        ]);


        $response->assertStatus(201);
           

        $this->assertDatabaseHas('users',['fullname'=>'carlos andres balaguera caicedo','username'=>'ccaicedo22','email'=>'carlitosandresbalaguera@gmail.com','password'=>'123456']);
    }

    /** @test */
    public function test_list_users()
    {
        $user = User::factory(20)->create();
        $response = $this->get('/api/usuarios');
        $response->assertStatus(201);
    }

    
    
}
