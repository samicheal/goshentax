<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTemporary extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscriber_temporaries';


      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'email_token', 'email_verification'
   ];
}
