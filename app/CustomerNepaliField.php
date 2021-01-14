<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerNepaliField extends Model
{
    protected $fillable = [
            'customer_name_nepali',
            'customer_address_nepali' , 'customer_father_name_nepali'
            ,'customer_grandfather_name_nepali' , 'customer_id'
    ];

    // ------------- relationship -------------
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
