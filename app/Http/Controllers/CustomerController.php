<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Customer;
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
        $digits = 5;
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
        $imageFiles = $this->checkImageRequest($request);

        $uploadSuccess = (new ImageUploadService())->storeImage($imageFiles,$customer->id);
        
        if($customer && $uploadSuccess){
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
        $customers = Customer::all();
        // return view('pages.customer.list');
        return view('pages.customer.list',compact('customers'));
    }

    // ajax request to load customers dynamically
    public function getCustomers()
    {
        $model = Customer::all();
        return DataTables::of($model)->addIndexColumn()->toJson();
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
        //
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
