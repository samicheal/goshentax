<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLegislation extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audit_legislation';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action', 'resource_name', 'user_id'
   ];



}
