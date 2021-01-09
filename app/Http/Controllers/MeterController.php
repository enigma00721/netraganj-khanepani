<?php

namespace App\Http\Controllers;

use App\Customer;
use File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Services\ImageUploadService;


class MeterController extends Controller
{
    protected $route_thaausaari = 'meter.thaausaari';
    protected $route_naamsaari = 'meter.naamsaari';
    protected $image_path = '/uploads/images/';

    public function meterNaamsaari()
    {
        return view('pages.meter.naamsaari');
    }

    public function meterThaausaari()
    {
        return view('pages.meter.thaausaari');
    }

    public function meterThaausaariSearchSubmit(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required_without:customer_number',
                'customer_number' => 'required_without:name'
            ]);
        }
        catch (\Exception $ex) {
            return redirect()->route($this->route_thaausaari)->with('error_message','Search Customer By Name or By Customer Number');
        }
        $customers = Customer::filterByRequest($request)->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route($this->route_thaausaari)->with(['error_message'=>'No customer found!']);
        else
            return view('pages.meter.thaausaari',compact('customers','customerCount'));
    }

    public function meterThaausaariSubmit(Request $request)
    {
        try{
            $this->validate($request, [
                'customer_address' => 'required|string|min:3|max:50'
            ]);
        }catch(\Exception $ex){
            return redirect()->route($this->route_thaausaari)->with('error_message','Customer New Address Field Is Rrequired!');
        }
        $row = Customer::findOrFail($request->get('id'));
        if($row->update($request->all())){
            return redirect()->route($this->route_thaausaari)->with('success_message','Customer Meter Thaausaari Updated Successfully!');
        }else{
            return redirect()->route($this->route_thaausaari)->with('error_message','Customer Meter Thaausaari Could Not Be Updated!');
        }
    }

    public function meterNaamsaariEdit($id)
    {   $row = Customer::findOrFail($id);
        return view('pages.meter.naamsaari_update',compact('row'));
    }

    public function meterNaamsaariSearchSubmit(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required_without:customer_number',
                'customer_number' => 'required_without:name'
            ]);
        }
        catch (\Exception $ex) {
            return redirect()->route($this->route_naamsaari)->with('error_message','Search Customer By Name or By Customer Number');
        }
        $customers = Customer::filterByRequest($request)->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route($this->route_naamsaari)->with(['error_message'=>'No customer found!']);
        else
            return view('pages.meter.naamsaari',compact('customers','customerCount'));
    }

    public function meterNaamsaariSubmit(Request $request , $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:100',
            'mobile_number' => 'required|numeric|digits_between:5,15'
        ]);
        $row = Customer::findOrFail($id);
        if ($request->hasFile('customer_photo'))
        {
            $photo = $row->photo;               // relationship associated photo model
            if(!empty($photo->customer_photo)){
                if(file_exists(public_path($this->image_path.$photo->customer_photo))){
                    unlink(public_path($this->image_path.$photo->customer_photo));
                }
            }
            $newCustomerImage['customer_photo'] = $request->file('customer_photo');
            $uploadSuccess = (new ImageUploadService())->storeImage($newCustomerImage,$row->id,1);
        }
        if($row->update($request->all())){
            return redirect()->route($this->route_naamsaari)->with('success_message','Customer Meter Naamsaari Updated Successfully!');
        }else{
            return redirect()->route($this->route_naamsaari)->with('error_message','Customer Meter Naamsaari Could Not Be Updated!');
        }
    }

}
