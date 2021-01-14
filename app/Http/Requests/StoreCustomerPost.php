<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'customer_name_nepali' => 'required',
            'customer_number' => 'unique:customers',
            'old_system_no' => 'required|unique:customers',
            'gender' => 'required|in:male,female,others',
            'customer_address' => 'required|string|min:3|max:50',
            'customer_address_nepali' => 'required|string|min:3|max:200',
            'customer_type' => 'required|in:dalit,private',
            'mobile_number' => 'required|numeric|digits_between:5,15',

            'meter_serial' => 'required|numeric',
            'meter_initial_reading' => 'required|numeric',
            'meter_connected_date' => 'required|date',
            'meter_reading_zone' => 'required|numeric',
            'ward' => 'required|numeric',
            'tap_type' => 'required|in:temporary,permanent',
            'tap_size' => 'required|numeric',
            'number_of_consumers' => 'required|numeric',
            
            'naksha_number' => 'string|max:20|nullable',
            'sheet_number' => 'string|max:20|nullable',
            'kitta_number' => 'string|max:20|nullable',
            'area_of_land' => 'string|max:20|nullable',
            'house_number' => 'string|max:20|nullable',
            'purja_number' => 'string|max:20|nullable',

            'customer_photo' => 'mimes:jpeg,jpg,png,jpg|nullable|max:4096', // 4mb
            'citizenship_front' => 'mimes:jpeg,jpg,png,jpg|nullable|max:4096' ,
            'citizenship_back' => 'mimes:jpeg,jpg,png,jpg|nullable|max:4096' ,
            'naksa' => 'mimes:jpeg,jpg,png,jpg|nullable|max:4096' ,
            'lalpurja' => 'mimes:jpeg,jpg,png,jpg|nullable|max:4096' ,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
