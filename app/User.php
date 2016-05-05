<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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


    public function roles() 
    {
        return $this->belongsTo('App\Role', 'role_id');
    } 


    public function isAdmin() 
    {
        if ('admin' == $this->roles->name) {
            return true;
        }
    }

    public function isUser() 
    {
        if ('user' == $this->roles->name) {
            return true;
        }
    }

}
