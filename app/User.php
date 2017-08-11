<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

     // public $age;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'email_token', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {

        return $this->hasOne('\App\Profile');
    }



    public function messages() 
    {

         return $this->hasMany('App\Message');
 
    }


    /**
     *
     *
     */
    public function isAdmin()
    {
        
        return $this->is_admin; // this looks for an admin column in your users table
    }
}
