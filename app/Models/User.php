<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'regno',
        'email',
        'password',
        'sex',
        'dob',
        'status',
        'role',
        'ip',
        'passport'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot(){
        
        parent::boot();
        static::creating(function($user){
            
            $userdetails=[
                'ip'=>request()->getClientIp(),
            ];
            // use student regno as email
            if(request()->role == 0){

                $userdetails=[
                    'email'=>request()->regno,
                   
                ];
            }
            // use staff email as regon
           else {
           
                $userdetails=[
                    'regno'=>request()->email,
                   
                    
                ];

            }
           
            
            $user->fill($userdetails);
        });

    }
}
