<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserFormRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    
    public function rules(Request $request){
        
        if($request->role == 0){

            return ($this->store() + $this->student());

        }else{
           
            return ($this->store() + $this->staff());
        }
    }
    public function store(): array
    {
        return [
            'first_name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'dob'=>'date|before_or_equal:today',
            'role'=>'required|integer|in:0,1',
            'password'=>'required|min:2|confirmed'
        ];
    }
    private function student(){

        return [
            'email'=>'email|max:150',
        ];
    }
    private function staff(){

        return [
            'email'=>'required|email|max:150|unique:users',
        ];
    }
}