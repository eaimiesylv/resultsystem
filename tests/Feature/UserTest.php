<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $user;
    protected $password;

    public function setUp(): void
    {
    
      parent::setUp();
      $this->password = Hash::make("12s");

      $this->user =  [
            "first_name"=>"okom",
            "last_name"=>"emmanuel",
            "regno"=>"maj1@gmail.com", // email = regno set from the user model
            'email'=>'maj1@gmail.com',
            "sex"=>"male",
            "dob"=>"2023-05-05",
            "password"=>$this->password,
            "password_confirmation"=>$this->password,
            "role"=>"0"

      ];

    }

    public function test_user_can_register(){

        $response = $this->post('api/v1/user', $this->user);

        unset($this->user['password_confirmation']);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', $this->user);

    }
    
}