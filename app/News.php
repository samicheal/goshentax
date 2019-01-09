<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'approved', 'slug', 'featured', 'user_id'
   ];


   /**
     * define relationship between user and news
     *
     * @var array
     */
    public function user(){

        return $this->belongsTo('App\User');
        
    }

}
