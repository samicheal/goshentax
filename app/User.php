<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    // add the authenticatable namespace to enable use with the auth facade
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * define relationship between user and news
     *
     * @var array
     */
    public function news(){

        return $this->hasMany('App\News');
        
    }

    /**
     * define relationship between user and advert
     *
     * @var array
     */
    public function adverts(){

        return $this->hasMany('App\Advert');
        
    }

    /**
     * define relationship between user and legislation
     *
     * @var array
     */
    public function legislations(){

        return $this->hasMany('App\Legislation');
        
    }

    /**
     * define relationship between user and notification
     *
     * @var array
     */
    public function notifications(){

        return $this->hasMany('App\Notification');
        
    }

}