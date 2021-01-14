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
        $customers = Customer::filterByRequest($request)->with('meter')->get();

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
        // update relationship model Meter
        $row->meter()->update($request->only(['meter_reading_zone','ward','tap_type','tap_size']));
        if($row->update($request->only('customer_address'))){
            return redirect()->route($this->route_thaausaari)->with('success_message','Customer Meter Thaausaari Updated Successfully!');
        }else{
            return redirect()->route($this->route_thaausaari)->with('error_message','Customer Meter Thaausaari Could Not Be Updated!');
        }
    }

    public function meterNaamsaari()
    {
        return view('pages.meter.naamsaari');
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
        $customers = Customer::filterByRequest($request)->with('meter')->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route($this->route_naamsaari)->with(['error_message'=>'No customer found!']);
        else
            return view('pages.meter.naamsaari',compact('customers','customerCount'));
    }

    public function meterNaamsaariEdit($id)
    {   
        // $row = Customer::findOrFail($id);
        $row = Customer::where('id','=' ,$id)->with('meter')->first();
        return view('pages.meter.naamsaari_edit',compact('row'));
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
        // update relationship model Meter
        $row->meter()->update($request->only(['meter_reading_zone','ward','tap_type','tap_size','number_of_consumers']));
        if($row->update($request->all())){
            return redirect()->route($this->route_naamsaari)->with('success_message','Customer Meter Naamsaari Updated Successfully!');
        }else{
            return redirect()->route($this->route_naamsaari)->with('error_message','Customer Meter Naamsaari Could Not Be Updated!');
        }
    }

    public function meterChange()
    {
        return view('pages.meter.change_meter');
    }
    public function meterChangeSearchSubmit(Request $request)
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
        $customers = Customer::filterByRequest($request)->with('meter')->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route('meter.change')->with(['error_message'=>'No customer found!']);
        else
            return view('pages.meter.change_meter',compact('customers','customerCount'));

    }

    public function meterDisconnect()
    {
        return view('pages.meter.disconnect');
    }
    public function meterDisconnectSearchSubmit(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required_without:customer_number',
                'customer_number' => 'required_without:name'
            ]);
        }
        catch (\Exception $ex) {
            return redirect()->route('meter.disconnect')->with('error_message','Search Customer By Name or By Customer Number');
        }
        $customers = Customer::filterByRequest($request)->with('meter')->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route('meter.change')->with(['error_message'=>'No customer found!']);
        else
            return view('pages.meter.disconnect',compact('customers','customerCount'));
    }

}
