<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MeterController extends Controller
{

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
            return redirect()->route('meter.thaausaari')->with('error_message','Search Customer By Name or By Customer Number');
        }
        $customers = Customer::filterByRequest($request)->get();
        $customerCount = $customers->count();
        if($customerCount == 0)
            return redirect()->route('meter.thaausaari')->with(['error_message'=>'No customer found!']);
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
            return redirect()->route('meter.thaausaari')->with('error_message','Customer New Address Field Is Rrequired!');
        }
        $row = Customer::findOrFail($request->get('id'));
        if($row->update($request->all())){
            return redirect()->route('meter.thaausaari')->with('success_message','Customer Thaausaari Updated Successfully!');
        }else{
            return redirect()->route('meter.thaausaari')->with('error_message','Customer Thaausari Could Not Be Updated!');
        }
    }

}
