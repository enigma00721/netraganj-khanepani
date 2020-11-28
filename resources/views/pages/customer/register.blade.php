@extends('layouts.app')

@push('style')
<style type="text/css">
	label{
		text-align: right;
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
	            <a class="nav-link" id="custom-tabs-one-land-info-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Land Info</a>
	          </li>
	        </ul>
	      </div>
	      <div class="card-body">
	        <div class="tab-content" id="custom-tabs-one-tabContent">
	          <div class="tab-pane fade show active" id="custom-tabs-one-customer-details" role="tabpanel" aria-labelledby="custom-tabs-one-customer-details-tab">
	             
	          	<form class="form-horizontal" name="customer_form">
  	                <div class="card-body">
  	                  <div class="form-group row">
  	                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
  	                    <div class="col-sm-10">
  	                      <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Name">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Number</label>
  	                    <div class="col-sm-10">
  	                      <input name="customer_numbers" type="number" class="form-control" id="inputPassword3" placeholder="Customer Number">
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
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Gender</label>
  	                    <div class="col-sm-10">
  	                    	<select class="form-control" name="gender">
	                          <option value="male">Male</option>
	                          <option value="female">Female</option>
	                          <option value="others">Others</option>
	                      </select>
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
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Address</label>
  	                    <div class="col-sm-10">
  	                      <input name="customer_address" type="text" class="form-control" id="inputPassword3" placeholder="Customer Address">
  	                    </div>
  	                  </div>



  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Type</label>
  	                    <div class="col-sm-10">
  	                      <select class="form-control" name="customer_type">
	                          <option value="private">Private</option>
	                          <option value="dalit">Dalit</option>
	                      </select>
  	                    </div>
  	                  </div>
  	                 <!--  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
  	                    <div class="col-sm-10">
  	                      <input name="" type="text" class="form-control" id="inputPassword3" placeholder="">
  	                    </div>
  	                  </div>
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
  	                    <div class="col-sm-10">
  	                      <input name="" type="text" class="form-control" id="inputPassword3" placeholder="">
  	                    </div>
  	                  </div> -->
  	                  <!-- <div class="form-group row">
  	                    <div class="offset-sm-2 col-sm-10">
  	                      <div class="form-check">
  	                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
  	                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
  	                      </div>
  	                    </div>
  	                  </div>
  	                </div> -->
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
	             Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
	          </div>

	          <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-land-info-tab">
	             Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
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
	    console.log( "ready!" );
	    $("#continue_btn").click(function(){
	  $("#custom-tabs-one-meter-info-tab").addClass("active");
	  $("#custom-tabs-one-customer-details-tab").removeClass("active");
	});
	});
	
</script>
@endpush