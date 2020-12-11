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
    public function meterThaausaariSubmit(Request $request)
    {
        // dd(new Collection());
        if(isset($request->name))
        {
            $customers = Customer::where('name', 'like' , '%'.$request->get('name') .'%')->get();
        }else if(isset($request->customer_number))
        {
            $customers = Customer::where('customer_number','=',$request->get('customer_number'))->take(1)->get();
        }else{

        }
        // dd($customers);
        return view('pages.meter.thaausaari',compact('customers'));
    }

     // ajax request to load customers dynamically
    public function getCustomers()
    {
        $model = Customer::all();
        return DataTables::of($model)
        ->addIndexColumn()
        ->editColumn('meter_status', function ($model) {
            if ($model->meter_status === 1) {
                return "<span class='badge badge-success'> " .
                'Online' .
                "</span>";
            }else
            return "<span class='badge badge-danger'>" .
                'Offline' .
                "</span>";
        })
        ->addColumn('action', function ($model) {
            return '<a href="#" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        ->rawColumns(['meter_status','action'])
        ->toJson();
    }
}
