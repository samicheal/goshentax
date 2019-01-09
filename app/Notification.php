<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'line_one', 'line_two', 'message', 'approved', 'user_id'
    ];

    /**
     * define relationship between user and notification
     *
     * @var array
     */
    public function user(){

        return $this->belongsTo('App\User');
        
    }

}
