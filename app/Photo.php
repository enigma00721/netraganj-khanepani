<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
       'customer_id','customer_photo','citizenship_front','citizenship_back','naksa','lalpurja'
    ];


    // relationship methods
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
