<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';

    protected $fillable = [
       'name' , 'customer_number','old_system_no' ,'customer_dob', 'gender', 'customer_address' , 'father_name' 
       ,'grandfather_name' , 'citizenship_number' , 'citizenship_issued_district' , 'customer_type' , 'mobile_number'
    ];

    // ------------- accessors ---------------
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
    // ------------- accessors end ---------------

    //---------------relationship methods-----------
    public function meter()
    {
        return $this->hasOne('App\Meter','customer_id');
    }
    public function customer_nepali_field()
    {
        return $this->hasOne('App\CustomerNepaliField','customer_id');
    }
    public function land_info()
    {
        return $this->hasOne('App\LandInfo','customer_id');
    }
    public function photo()
    {
        return $this->hasOne('App\Photo','customer_id');
    }
    //---------------relationship methods-----------


    // -------------- scope filter query -------------------
    public function scopeFilterByRequest($query, Request $request)
    {
        if (!empty($request->input('name'))) 
            $query->where('name', 'like' , '%'.$request->get('name') .'%');
        if (!empty($request->input('customer_number'))) 
            $query->where('customer_number','=',$request->get('customer_number'));
        return $query;
    }

}
