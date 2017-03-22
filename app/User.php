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
        'name', 'email', 'password','is_active',
        'user_id','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function event(){
      return $this->hasMany('App\Event','event-users');
    }

    //KORISNIK JE ADMINISTRATOR I STATUS MU JE ACTIVE
    public function isAdmin(){
        if($this->role_id == 1 && $this->is_active == 1){
            return true;
        }
        return false;

    }
    //KORISNIK JE SUBSCRIBER
    public function isSubscriber(){
        if($this->role_id == 2){
            return true;
        }
        return false;

    }
}
