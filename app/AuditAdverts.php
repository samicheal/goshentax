<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditAdverts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action', 'resource_name', 'user_id'
   ];

}
