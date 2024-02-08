<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use App\Services\AuthService\AuthService;


class AuthController extends Controller
{
    
    protected AuthService $authService;

    public function __invoke(AuthService $authService, AuthFormRequest $request)
    {
      
        
        $this->authService = $authService;
       
        $response = $this->authService->authenticateUser($request->all());
        
        if(is_null($response)){

            return response()->json(['message' =>'Invalid credentials'], 404);
        }
        return $response;
      

    }
   
  
   
}
