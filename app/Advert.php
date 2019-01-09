<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'banner', 'amount', 'paid', 'expiration', 'approved', 'user_id' , 'company_id'
    ];

     /**
     * define relationship between user and advert
     *
     * @var
     */
    public function user(){

        return $this->belongsTo('App\User');
        
    }

    /**
     * define relationship between advert and company
     *
     * @var
     */
    public function company(){

        return $this->belongsTo('App\Company');
        
    }

}
