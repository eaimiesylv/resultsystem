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
    public function setUp(): void
    {
        parent::setUp();

      $this->user =  [
            "first_name"=>"okom",
            "last_name"=>"emmanuel",
            "regno"=>"maj1",
            "sex"=>"male",
            "dob"=>"2023-05-05",
            "password"=>"12s",
            "password_confirmation"=>"12s",
            "role"=>"0"

      ];

    }

    public function test_user_can_register(){

        $response = $this->post('api/v1/user', $this->user);
        
        $response->assertStatus(201);

    }
}