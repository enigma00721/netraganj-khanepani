<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';

    protected $fillable = [
       'name' , 'customer_number', 'customer_dob', 'gender', 'customer_address' , 'father_name' 
       ,'grandfather_name' , 'citizenship_number' , 'citizenship_issued_district' , 'customer_type' , 'mobile_number',
       'tap_type' , 'tap_size' , 'number_of_consumers' , 'meter_serial' ,'meter_initial_reading' ,
       'meter_connected_date' , 'meter_reading_zone' , 'ward' ,
       'naksha_number' , 'sheet_number' , 'kitta_number' , 'area_of_land' , 'house_number' ,'purja_number'
    ];
    
    public function getMobileNumber($value)
    {
        return ltrim($value);
    }
    // relationship methods
     public function photos()
    {
        return $this->hasMany('App\Photo');
    }

}
