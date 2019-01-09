<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legislation extends Model
{

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'legislation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title' , 'excerpt', 'content', 'approved', 'slug' , 'user_id'
   ];


   /**
     * define relationship between user and legislation
     *
     * @var array
     */
    public function user(){

        return $this->belongsTo('App\User');
        
    }


}
