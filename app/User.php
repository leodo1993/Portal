<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Members;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;

    public static function checkEmail($email){
        $check_email = User::where('email', $email)->first();
        if(!$check_email){
            return true;
        }
        return false;
    }
    public static function getUserByToken($token){
        return User::where('remember_token', $token)->first();
    }
    public static function getUserByEmail($email){
        return User::where('email',$email)->first();
    }
    public static function valueMember($id){
        return Members::where('id_user',$id)->first();
    }
}
