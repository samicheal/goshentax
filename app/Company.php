<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code' , 'name' , 'created_by'
   ];


   /**
     * define relationship between user and news
     *
     * @var array
     */
    public function adverts(){

        return $this->hasMany('App\Company');
        
    }
}
