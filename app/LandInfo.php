<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandInfo extends Model
{
    protected $fillable = [
       'naksha_number' , 'sheet_number' , 'kitta_number' , 'area_of_land' , 'house_number' ,'purja_number'
       , 'customer_id'
    ];

    // ------------- relationship -------------
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
