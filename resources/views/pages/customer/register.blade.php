@extends('layouts.app')

@push('style')
<style type="text/css">
	label{
		text-align: right;
	}
	.custom-file-label{
		text-align: inherit;
	}
	hr{
		border: 1px solid #dee2e6;
		margin: 3rem;
	}
</style>
@endpush
@section('content')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>
              Customer Registration
            </h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="col-12 col-sm-12 col-lg-12">

	    <div class="card card-primary card-outline card-outline-tabs">
	      <div class="card-header p-0 pt-1">
	        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="custom-tabs-one-customer-details-tab" data-toggle="pill" href="#custom-tabs-one-customer-details" role="tab" aria-controls="custom-tabs-one-customer-details" aria-selected="true">Customer Details</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="custom-tabs-one-meter-info-tab" data-toggle="pill" href="#custom-tabs-one-meter-info" role="tab" aria-controls="custom-tabs-one-meter-info" aria-selected="false">Meter Info</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="custom-tabs-one-land-info-tab" data-toggle="pill" href="#custom-tabs-one-land-info" role="tab" aria-controls="custom-tabs-one-land-info" aria-selected="false">Land Info</a>
	          </li>
	        </ul>
	      </div>
	      <div class="card-body">
	        <div class="tab-content" id="custom-tabs-one-tabContent">

	          <div class="tab-pane fade show active" id="custom-tabs-one-customer-details" role="tabpanel" aria-labelledby="custom-tabs-one-customer-details-tab">
	             
	          	<form class="form-horizontal" name="customer_form" method="post" action="">
	          		@csrf
  	                <div class="card-body">
  	                  <div class="form-group row">
  	                    <label for="inputEmail3" class="col-sm-2 col-form-label">
  	                    	Name <font style="font-size: medium;" color="red"> * </font>
  	                    </label>
  	                    <div class="col-sm-10">
  	                      <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Name">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">
  	                    	Customer Number <font style="font-size: medium;" color="red"> * </font></label>
  	                    <div class="col-sm-10">
  	                      <input name="customer_number" type="number" class="form-control" id="inputPassword3" placeholder="Customer Number" disabled="disabled">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Father's Name</label>
  	                    <div class="col-sm-10">
  	                      <input name="father_name" type="text" class="form-control" id="inputPassword3" placeholder="Father's Name" >
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Grand Father Name</label>
  	                    <div class="col-sm-10">
  	                      <input name="grand_father_name" type="text" class="form-control" id="inputPassword3" placeholder="Grand Father Name">
  	                    </div>
  	                  </div>
  	                  
  	                  <div class="form-group row">
  	                  	  <label for="customer_dob" class="col-sm-2 col-form-label">Customer Date Of Birth</label>
  	                  	  <div class="col-sm-10">
  	                  	  	<div class="input-group">
	                          <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
	                          </div>
	                          <input type="text" class="form-control" data-inputmask-alias="datetime" placeholder="dd/mm/yyyy" data-mask="" im-insert="false">
	                      	</div>
  	                  	  </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Number</label>
  	                    <div class="col-sm-10">
  	                      <input name="citizenship_number" type="text" class="form-control" id="inputPassword3" placeholder="Citizenship Number">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Issued District</label>
  	                    <div class="col-sm-10">
  	                      <input name="citizenship_issued_districts" type="text" class="form-control" id="inputPassword3" placeholder="Citizenship Issued District">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">
  	                    	Gender <font style="font-size: medium;" color="red"> * </font>
  	                	</label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="gender">
	                          <option value="male">Male</option>
	                          <option value="female">Female</option>
	                          <option value="others">Others</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">
  	                    	Customer Address/Tole <font style="font-size: medium;" color="red"> * </font>
  	                	</label>
  	                    <div class="col-sm-10">
  	                      <input name="customer_address" type="text" class="form-control" id="inputPassword3" placeholder="Customer Address">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Type
  	                    <font style="font-size: medium;" color="red"> * </font></label>
  	                    <div class="col-sm-10">
  	                      <select class="form-control" name="customer_type">
	                          <option value="private">Private</option>
	                          <option value="dalit">Dalit</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Mobile Number <font style="font-size: medium;" color="red"> * </font>
  	                    </label>
  	                    <div class="col-sm-10">
  	                      <input name="mobile_number" type="text" class="form-control" id="inputPassword3" placeholder="Customer Mobile Number">
  	                    </div>
  	                  </div>


  	                  
  	                <!-- /.card-body -->
  	                <div class="card-footer">
  	                	<!-- <a class="nav-link"  id="custom-tabs-one-land-info-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="true">Land Info</a> -->
  	                  <button type="button" id="continue_btn" class="btn btn-info">Continue</button>
  	                  <button type="submit" class="btn btn-default float-right">Cancel</button>
  	                </div>
  	                <!-- /.card-footer -->
  	            </form>
  	       	  </div>
	        </div>

	          <div class="tab-pane fade" id="custom-tabs-one-meter-info" role="tabpanel" aria-labelledby="custom-tabs-one-meter-info-tab">

	             <form method="post" action="">
	          		@csrf

	          		<div class="card-body">
	          			<div class="form-group row">
	  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Meter Serial <font style="font-size: medium;" color="red"> * </font>
	  	                    </label>
	  	                    <div class="col-sm-10">
	  	                      <input name="meter_serial" type="number" class="form-control" id="inputPassword3" placeholder="Meter Serial">
	  	                    </div>
  	                  	</div>
	          			
	          			<div class="form-group row">
	  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Meter Initial Reading <font style="font-size: medium;" color="red"> * </font>
	  	                    </label>
	  	                    <div class="col-sm-10">
	  	                      <input name="meter_initial_reading" type="number" class="form-control" id="inputPassword3" placeholder="Meter Initial Reading" >
	  	                    </div>
  	                  	</div>
	  	                  <div class="form-group row">
	  	                  	  <label for="meter_connected_date" class="col-sm-2 col-form-label">Meter Connected Date <font style="font-size: medium;" color="red"> * </font></label>
	  	                  	  <div class="col-sm-10">
	  	                  	  	<div class="input-group">
		                          <div class="input-group-prepend">
		                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
		                          </div>
		                          <input type="text" class="form-control" data-inputmask-alias="datetime" placeholder="dd/mm/yyyy" data-mask="" im-insert="false" name="meter_connected_date">
		                      	</div>
	  	                  	  </div>
	  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="meter_reading_zone" class="col-sm-2 col-form-label">Meter Reading Zone <font style="font-size: medium;" color="red"> * </font>
  	                    </label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="meter_reading_zone">
	                          <option value="1">1</option>
	                          <option value="2">2</option>
	                          <option value="3">3</option>
	                          <option value="4">4</option>
	                          <option value="5">5</option>
	                          <option value="6">6</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="ward" class="col-sm-2 col-form-label">Meter Reading Ward <font style="font-size: medium;" color="red"> * </font>
  	                    </label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="ward">
	                          <option value="1">1</option>
	                          <option value="2">2</option>
	                          <option value="3">3</option>
	                          <option value="4">4</option>
	                          <option value="5">5</option>
	                          <option value="6">6</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="tap_type" class="col-sm-2 col-form-label">Tap Type
  	                    	<font style="font-size: medium;" color="red"> * </font>
  	                	</label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="tap_type">
	                          <option value="permanent">Permanent</option>
	                          <option value="temporary">Temporary</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="tap_size" class="col-sm-2 col-form-label">Tap Size 
  	                    	<font style="font-size: medium;" color="red"> * </font>
  	                    </label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="tap_size">
	                          <option value="0.5">0.5</option>
	                          <option value="1">1</option>
	                      </select>
  	                    </div>
  	                  </div>
	          			<div class="form-group row">
	  	                    <label for="number_of_consumers" class="col-sm-2 col-form-label">Number Of Consumers <font style="font-size: medium;" color="red"> * </font></label>
	  	                    <div class="col-sm-10">
	  	                      <input name="number_of_consumers" type="number" class="form-control" id="inputPassword3" placeholder="Number Of Consumers" >
	  	                    </div>
  	                  </div>
	          		</div>

	          		<div class="card-footer">
  	                  <button type="button" id="continue_btn_2" class="btn btn-info">Continue</button>
  	                  <button type="submit" class="btn btn-default float-right">Cancel</button>
  	                </div>
	             	
	             </form>
	          </div>

	          <div class="tab-pane fade" id="custom-tabs-one-land-info" role="tabpanel" aria-labelledby="custom-tabs-one-land-info-tab">
	            	
	            <form method="post" action="">
	            	@csrf
	            	<div class="card-body">
	            		<div class="form-group row">
	  	                    <label for="naksha_number" class="col-sm-2 col-form-label">Naksha Number</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="naksha_number" type="text" class="form-control" id="inputEmail3" placeholder="Naksha Number">
	  	                    </div>
	  	                </div>

	            		<div class="form-group row">
	  	                    <label for="sheet_number" class="col-sm-2 col-form-label">Sheet Number</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="sheet_number" type="text" class="form-control" id="inputEmail3" placeholder="Sheet Number">
	  	                    </div>
	  	                 </div>
	            		<div class="form-group row">
	  	                    <label for="kitta_number" class="col-sm-2 col-form-label">Kitta Number</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="kitta_number" type="text" class="form-control" id="inputEmail3" placeholder="Kitta Number">
	  	                    </div>
	  	                </div>
	            	
	            		<div class="form-group row">
	  	                    <label for="house_number" class="col-sm-2 col-form-label">House Number</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="house_number" type="text" class="form-control" id="inputEmail3" placeholder="House Number">
	  	                    </div>
		            	</div>
	            		<div class="form-group row">
	  	                    <label for="purja_number" class="col-sm-2 col-form-label">Purja Number</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="purja_number" type="text" class="form-control" id="inputEmail3" placeholder="Purja Number">
	  	                    </div>
		            	</div>
	            		<div class="form-group row">
	  	                    <label for="area_of_land" class="col-sm-2 col-form-label">Area Of Land</label>
	  	                    <div class="col-sm-10">
	  	                      <input name="area_of_land" type="text" class="form-control" id="inputEmail3" placeholder="Area Of Land">
	  	                    </div>
		            	</div>

		            	<hr>

		            	<!-- image upload fields -->

	            		<div class="form-group row">
	  	                    <label for="customer_photo" class="col-sm-2 col-form-label">Customer Photo</label>
	  	                    <div class="col-sm-10">
	  	                    	<div class="input-group">
        	                      <div class="custom-file">
        	                        <input type="file" class="custom-file-input" name="customer_photo">
        	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        	                      </div>
        	                       <div class="input-group-append">
	        	                        <span class="input-group-text" id="">Upload</span>
	        	                    </div>
        	                    </div>
	  	                    </div>
		            	</div>
	            		<div class="form-group row">
	  	                    <label for="citizenship" class="col-sm-2 col-form-label">Citizeship Photo</label>
	  	                    <div class="col-sm-5">
	  	                    	<div class="input-group">
        	                      <div class="custom-file">
        	                        <input type="file" class="custom-file-input" name="citizenship_front">
        	                        <label class="custom-file-label" for="exampleInputFile">Citizenship Front Photo</label>
        	                      </div>
        	                    </div>
	  	                    </div>
	  	                    <div class="col-sm-5">
	  	                    	<div class="input-group">
        	                      <div class="custom-file">
        	                        <input type="file" class="custom-file-input" name="citizenship_back">
        	                        <label class="custom-file-label" for="exampleInputFile">Citizenship Back Photo</label>
        	                      </div>
        	                    </div>
	  	                    </div>
		            	</div>

		            	<div class="form-group row">
	  	                    <label for="naksa" class="col-sm-2 col-form-label">Naksa Photo</label>
	  	                    <div class="col-sm-10">
	  	                    	<div class="input-group">
        	                      <div class="custom-file">
        	                        <input type="file" class="custom-file-input" name="naksa">
        	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        	                      </div>
        	                       <div class="input-group-append">
	        	                        <span class="input-group-text" id="">Upload</span>
	        	                    </div>
        	                    </div>
	  	                    </div>
		            	</div>
		            	<div class="form-group row">
	  	                    <label for="naksa" class="col-sm-2 col-form-label">Lalpurja Photo</label>
	  	                    <div class="col-sm-10">
	  	                    	<div class="input-group">
        	                      <div class="custom-file">
        	                        <input type="file" class="custom-file-input" name="lalpurja">
        	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        	                      </div>
        	                       <div class="input-group-append">
	        	                        <span class="input-group-text" id="">Upload</span>
	        	                    </div>
        	                    </div>
	  	                    </div>
		            	</div>

	            	</div><!-- card body end -->

	          		<div class="card-footer">
  	                  <button type="submit" id="submit_btn" class="btn btn-info">Submit</button>
  	                  <button type="submit" class="btn btn-default float-right">Cancel</button>
  	                </div>
	            </form>

	          </div>
	          
	        </div>
	      </div>
	      <!-- /.card body end -->
	    </div>
	</div>
@endsection



@push('script')
<script type="text/javascript">
	$( document ).ready(function() {
	    $("#continue_btn").click(function(){
	 		$("#custom-tabs-one-meter-info").addClass(["active","show"]);
	 		$("#custom-tabs-one-meter-info-tab").addClass("active");
	  		$("#custom-tabs-one-customer-details").removeClass(["active","show"]);
	  		$("#custom-tabs-one-customer-details-tab").removeClass("active");
		});
	    $("#continue_btn_2").click(function(){
	 		$("#custom-tabs-one-land-info").addClass(["active","show"]);
	 		$("#custom-tabs-one-land-info-tab").addClass("active");
	  		$("#custom-tabs-one-meter-info").removeClass(["active","show"]);
	  		$("#custom-tabs-one-meter-info-tab").removeClass("active");
		});
	});
	
</script>
@endpush