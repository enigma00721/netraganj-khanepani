<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $fillable = [
        'meter_serial' ,'meter_initial_reading' ,
       'meter_connected_date','meter_updated_date' , 'meter_reading_zone' , 
       'ward' , 'tap_type' , 'tap_size' , 'number_of_consumers' , 'cut_off_reason' 
       ,'meter_status' , 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
