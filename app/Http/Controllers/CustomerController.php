<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Customer;
use App\Meter;
use App\LandInfo;
use App\CustomerNepaliField;
use App\Services\ImageUploadService;
use App\Http\Requests\StoreCustomerPost;
use DataTables;

class CustomerController extends Controller
{
    protected $image_path;
    // constructor 
    public function __construct()
    {
        $this->image_path = "/uploads/images/";
        $this->createDirectory();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all(); 
        dd($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_no = $this->generateCustomerNumber();
        return view('pages.customer.register',compact('customer_no'));
    }

    // return unique customer number with 5 digits
    public function generateCustomerNumber()
    {
        $digits = 10;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }

    // directory create if not created
    public function createDirectory()
    {
        if(!is_dir(public_path() . $this->image_path)){
            mkdir(public_path() .  $this->image_path, 0777, true);
        }
    }

    // check if there are any image request and make array of imageFiles
    public function checkImageRequest(Request $request)
    {
        $imageFiles = [];
        if ($request->hasFile('customer_photo')) $imageFiles["customer_photo"] = $request->file('customer_photo');
        if ($request->hasFile('citizenship_front')) $imageFiles["citizenship_front"] = $request->file('citizenship_front');
        if ($request->hasFile('citizenship_back')) $imageFiles["citizenship_back"] = $request->file('citizenship_back');
        if ($request->hasFile('naksa')) $imageFiles["naksa"] = $request->file('naksa');
        if ($request->hasFile('lalpurja')) $imageFiles["lalpurja"] = $request->file('lalpurja');
        return $imageFiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPost $request)
    {
        $customer = Customer::create($request->all());

        // relationship model save
        $request->request->add(['customer_id' => $customer->id]); //add request (foreign key)

        Meter::create($request->only(['customer_id','meter_serial','meter_initial_reading','meter_connected_date','meter_reading_zone','ward','tap_type','tap_size','number_of_consumers']));
        CustomerNepaliField::create($request->only(['customer_id','customer_name_nepali','customer_address_nepali','customer_father_name_nepali','customer_grandfather_name_nepali']));
        LandInfo::create($request->only(['customer_id','naksha_number','sheet_number','kitta_number','area_of_land','house_number','purja_number']));

        $imageFiles = $this->checkImageRequest($request);

        // image upload service class
        if(!empty($imageFiles)){
            $uploadSuccess = (new ImageUploadService())->storeImage($imageFiles,$customer->id,0);
        }
        if($customer){
            return redirect()->back()->with('success_message','Customer has been registered successfully!');
        }else{
            return redirect()->back()->with('error_message','Customer could not be registered!');
        }
    }

    /**
     * Display the specified resource.
     *
     * return page where list of customers is displayed
     * @return \Illuminate\Http\Response
     */
    public function list()
    { 
        return view('pages.customer.list');
    }

    // ajax request to load customers dynamically in customer list page
    public function getCustomers()
    {
        $customer = Customer::with('meter')->get();

        return DataTables::of($customer)
        ->addIndexColumn()
        ->editColumn('meter_status', function ($customer) {
            if ($customer->meter["meter_status"] == 1) 
                return "<span class='badge badge-success'> " .'Online' . "</span>";
            else
                return "<span class='badge badge-danger'>" . 'Offline' . "</span>";
        })
        ->editColumn('action', function ($customer) {
            return '<a href="'.route('customer.edit', $customer->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        ->rawColumns(['meter_status','action'])
        ->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Customer::where('id','=',$id)->with(['meter','customer_nepali_field','land_info'])->first();
        if(!$row){
            return redirect()->back()->with('error_message','Customer Not Found');
        }
        return view('pages.customer.edit',compact('row'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
