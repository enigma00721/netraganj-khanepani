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
    protected $meter_array_data = ['meter_serial','meter_initial_reading','meter_connected_date','meter_reading_zone','ward','tap_type','tap_size','number_of_consumers'];
    protected $customer_nepali_field_array_data = ['customer_name_nepali','customer_address_nepali','customer_father_name_nepali','customer_grandfather_name_nepali'];
    protected $land_info_data = ['naksha_number','sheet_number','kitta_number','area_of_land','house_number','purja_number'];

    // constructor 
    public function __construct()
    {
        $this->image_path = "/uploads/images/";
        $this->createDirectory();
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
        $isRelatedTableCreated = $this->updateOrCreateRelatedModel($customer,$request);

        $imageFiles = $this->checkImageRequest($request);

        // image upload service class
        if(!empty($imageFiles)){
            $uploadSuccess = (new ImageUploadService())->storeImage($imageFiles,$customer->id,0);
        }
        if($customer && $isRelatedTableCreated){
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
                return "<span class='badge badge-primary'> " .'Online' . "</span>";
            else
                return "<span class='badge badge-secondary'>" . 'Offline' . "</span>";
        })
        ->editColumn('action', function ($customer) {
             
            $html = '<a href="'.route('customer.edit', $customer->id).'" ><i class="fas fa-edit"></i> </a>';
            $html .= ' <a onclick="document.getElementById(\'delete-customer-form-'.$customer->id.'\').submit();"
                    href="#" >
                    <i class="fas fa-trash text-danger"></i> 
                     </a>';
            $html .= ' <form id="delete-customer-form-'.$customer->id.'" action="'.route('customer.delete', $customer->id).'" method="POST" class="delete-customer-form">
                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                    </form>';
            return $html;
                   
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
        if(!$row)
            return redirect()->back()->with('error_message','Customer Not Found');
        else
            return view('pages.customer.edit',compact('row'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerPost $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $row = $customer->update($request->all());

        // relationship table update
        $isRelatedTableUpdated = $this->updateOrCreateRelatedModel($customer,$request);
       
        // image upload service class
        $imageFiles = $this->checkImageRequest($request);
        if(!empty($imageFiles)){
            $uploadSuccess = (new ImageUploadService())->storeImage($imageFiles,$customer->id,1);
        }

        if($row && $isRelatedTableUpdated)
            return redirect()->back()->with('success_message','Customer Updated Successfully!');
        else
            return redirect()->back()->with('error_message','Customer Could Not Be Updated Successfully!');
    }

    public function updateOrCreateRelatedModel($customer,$request)
    {
        if(!empty($customer->meter))
            $customer->meter()->update($request->only($meter_array_data));
        else
            $customer->meter()->create($request->only($meter_array_data));

        if(!empty($customer->customer_nepali_field))
            $customer->customer_nepali_field()->update($request->only($customer_nepali_field_array_data));
        else
            $customer->customer_nepali_field()->create($request->only($customer_nepali_field_array_data));

        if(!empty($customer->land_info))
            $customer->land_info()->update($request->only($land_info_data));
        else
            $customer->land_info()->create($request->only($land_info_data));

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $customer = Customer::findOrFail($id);
        // dd($customer);

        $customer->meter()->delete();
        $customer->customer_nepali_field()->delete();
        $customer->land_info()->delete();

        // photo/image row/relation exists 
        if(!empty($customer->photo))
            $this->removeImage($customer->photo);
        $customer->photo()->delete();

        if($customer->delete())
            return redirect()->back()->with('success_message','Customer Deleted Successfully!');
        else
            return redirect()->back()->with('error_message','Customer Could Not Be Deleted!');
    }

    public function removeImage($photo)
    {
        $imageFields = ['customer_photo','citizenship_front','citizenship_back','naksa','lalpurja'];

        foreach($imageFields as $field)
        {
            if($photo->$field != null)
                (new ImageUploadService())->deleteOldImage($photo->$field);
        }
         
    }
}
