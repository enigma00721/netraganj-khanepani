@extends('layouts.app')

@push('page_css')
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
	            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Customer Details</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Meter Info</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Land Info</a>
	          </li>
	        </ul>
	      </div>
	      <div class="card-body">
	        <div class="tab-content" id="custom-tabs-one-tabContent">
	          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
	             
	          	<form class="form-horizontal" name="customer_form">
  	                <div class="card-body">
  	                  <div class="form-group row">
  	                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
  	                    <div class="col-sm-10">
  	                      <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Name">
  	                    </div>
  	                  </div>
  	                  
  	                  <div class="form-group row">
  	                    <label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Number</label>
  	                    <div class="col-sm-10">
  	                      <input name="citizenship_number" type="text" class="form-control" id="inputPassword3" placeholder="Citizenship Number">
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
  	                
  	                <!-- /.card-body -->
  	                <div class="card-footer">
  	                  <button type="submit" class="btn btn-info">Continue</button>
  	                  <button type="submit" class="btn btn-default float-right">Cancel</button>
  	                </div>
  	                <!-- /.card-footer -->
  	            </form>

	          </div>

	          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
	             Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
	          </div>

	          <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
	             Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
	          </div>
	          
	        </div>
	      </div>
	      <!-- /.card body end -->
	    </div>
	</div>
@endsection
