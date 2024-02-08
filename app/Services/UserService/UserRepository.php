<?php

namespace App\Services\UserService;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;



class UserRepository
{
    public function getUserByEmail($email){

        return  User::where('email', $email)->first();

    }

    public function createUser(array $data)
    {
       
        try {
      
             return User::Create($data);
             
        } catch (QueryException $e) {

            Log::channel('insertion_errors')->error('Error creating user: ' . $e->getMessage());

            return response()->json(['message' => "Insertion error"], 500);
        }
    }

   
}
