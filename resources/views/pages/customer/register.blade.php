@extends('layouts.app')

@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/nepali.datepicker.min.css')}}">
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
	#currentMonth #ndp-month-select, #currentMonth #ndp-year-select{
		width: 70px !important;
	}
</style>
@endpush
@section('content')

	@include('partial.flash_message')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>
              Customer Registration
            </h1>
          </div>
	  	</div><!-- /.container-fluid -->
	  </div>
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

			<form action="{{route('customer.register.submit')}}" method="post" enctype="multipart/form-data" >
				@csrf
				<div class="tab-content" id="custom-tabs-one-tabContent">

					<div class="tab-pane fade show active" id="custom-tabs-one-customer-details" role="tabpanel" aria-labelledby="custom-tabs-one-customer-details-tab">
						
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">
									Name <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif"  placeholder="Name" value="{{old('name')}}">
									@if ($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Customer Number <font style="font-size: medium;" color="red"> * </font></label>
								<div class="col-sm-10">
									<input name="customer_number" type="number" class="form-control @if($errors->has('customer_number')) is-invalid @endif" readonly="readonly" value="{{$customer_no}}">
									@if ($errors->has('customer_number'))
										<span class="text-danger">{{ $errors->first('customer_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Father's Name</label>
								<div class="col-sm-10">
								<input name="father_name" type="text" class="form-control" value="{{ old('father_name') }}" placeholder="Father's Name" >
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Grand Father Name</label>
								<div class="col-sm-10">
								<input name="grand_father_name" type="text" class="form-control" value="{{ old('grand_father_name')}}" placeholder="Grand Father Name">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="customer_dob" class="col-sm-2 col-form-label">Customer Date Of Birth</label>
								<div class="col-sm-10">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
										</div>
										<input type="text" name="customer_dob" id="nepali-datepicker" value="{{ old('customer_dob')}}" class="form-control" data-inputmask-alias="datetime" placeholder="yyyy/mm/dd" data-mask="" im-insert="false">
									</div>
									@if ($errors->has('customer_dob'))
										<span class="text-danger">{{ $errors->first('customer_dob') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Number</label>
								<div class="col-sm-10">
								<input name="citizenship_number" type="text" class="form-control" value="{{ old('citizenship_number')}}" placeholder="Citizenship Number">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Issued District</label>
								<div class="col-sm-10">
								<input name="citizenship_issued_districts" type="text" class="form-control" value="{{ old('citizenship_issued_districts')}}" placeholder="Citizenship Issued District">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Gender <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<select class="form-control @if($errors->has('gender')) is-invalid @endif" name="gender">
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="others">Others</option>
									</select>
									@if ($errors->has('gender'))
										<span class="text-danger">{{ $errors->first('gender') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Customer Address/Tole <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="customer_address" type="text" value="{{ old('customer_address')}}" class="form-control @if($errors->has('customer_address')) is-invalid @endif" placeholder="Customer Address">
									@if ($errors->has('customer_address'))
										<span class="text-danger">{{ $errors->first('customer_address') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Customer Type
								<font style="font-size: medium;" color="red"> * </font></label>
								<div class="col-sm-10">
								<select class="form-control @if($errors->has('customer_type')) is-invalid @endif" name="customer_type">
									<option value="private">Private</option>
									<option value="dalit">Dalit</option>
								</select>
								@if ($errors->has('customer_type'))
									<span class="text-danger">{{ $errors->first('customer_type') }}</span>
								@endif
								
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Customer Mobile Number <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="mobile_number" type="text" value="{{ old('mobile_number')}}" class="form-control @if($errors->has('mobile_number')) is-invalid @endif" placeholder="Customer Mobile Number">
									@if ($errors->has('mobile_number'))
										<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
									@endif
								</div>
							</div>
							
							<!-- /.card-body -->
							<div class="card-footer">
									<!-- <a class="nav-link"  id="custom-tabs-one-land-info-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="true">Land Info</a> -->
								<button type="button" id="continue_btn" class="btn btn-primary">Continue</button>
								<button type="submit" class="btn btn-danger float-right">Cancel</button>
							</div>
						<!-- /.card-footer -->
					</div>
				</div>

				{{-- meter info form --}}
				<div class="tab-pane fade" id="custom-tabs-one-meter-info" role="tabpanel" aria-labelledby="custom-tabs-one-meter-info-tab">

					<div class="card-body">
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Meter Serial <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<input name="meter_serial" type="number" value="{{ old('meter_serial')}}" class="form-control @if($errors->has('meter_serial')) is-invalid @endif" placeholder="Meter Serial">
								@if ($errors->has('meter_serial'))
									<span class="text-danger">{{ $errors->first('meter_serial') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Meter Initial Reading <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<input name="meter_initial_reading" type="number" value="{{ old('meter_initial_reading')}}" class="form-control @if($errors->has('meter_initial_reading')) is-invalid @endif" placeholder="Meter Initial Reading" >
								@if ($errors->has('meter_initial_reading'))
									<span class="text-danger">{{ $errors->first('meter_initial_reading') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="meter_connected_date" class="col-sm-2 col-form-label">Meter Connected Date <font style="font-size: medium;" color="red"> * </font></label>
							<div class="col-sm-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
									</div>
								<input type="text" name="meter_connected_date" id="nepali-datepicker-2" value="{{ old('meter_connected_date')}}" class="form-control @if($errors->has('meter_connected_date')) is-invalid @endif" data-inputmask-alias="datetime" placeholder="yyyy/mm/dd" data-mask="" im-insert="false">
								</div>
								@if ($errors->has('meter_connected_date'))
									<span class="text-danger">{{ $errors->first('meter_connected_date') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="meter_reading_zone" class="col-sm-2 col-form-label">Meter Reading Zone <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<select class="form-control @if($errors->has('meter_reading_zone')) is-invalid @endif" name="meter_reading_zone">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
								@if ($errors->has('meter_reading_zone'))
									<span class="text-danger">{{ $errors->first('meter_reading_zone') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="ward" class="col-sm-2 col-form-label">Meter Reading Ward <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<select class="form-control @if($errors->has('ward')) is-invalid @endif" name="ward">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							@if ($errors->has('ward'))
								<span class="text-danger">{{ $errors->first('ward') }}</span>
							@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="tap_type" class="col-sm-2 col-form-label">Tap Type
								<font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<select class="form-control @if($errors->has('tap_type')) is-invalid @endif" name="tap_type">
									<option value="permanent">Permanent</option>
									<option value="temporary">Temporary</option>
								</select>
							@if ($errors->has('tap_type'))
								<span class="text-danger">{{ $errors->first('tap_type') }}</span>
							@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="tap_size" class="col-sm-2 col-form-label">Tap Size 
								<font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<select class="form-control @if($errors->has('tap_size')) is-invalid @endif" name="tap_size">
									<option value="0.5">0.5</option>
									<option value="1">1</option>
								</select>
								@if ($errors->has('tap_size'))
									<span class="text-danger">{{ $errors->first('tap_size') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="number_of_consumers" class="col-sm-2 col-form-label">Number Of Consumers <font style="font-size: medium;" color="red"> * </font></label>
							<div class="col-sm-10">
								<input name="number_of_consumers" type="number" value="{{ old('number_of_consumers')}}" class="form-control @if($errors->has('number_of_consumers')) is-invalid @endif" placeholder="Number Of Consumers" >
								@if ($errors->has('number_of_consumers'))
									<span class="text-danger">{{ $errors->first('number_of_consumers') }}</span>
								@endif

							</div>
						</div>
					</div>

					<div class="card-footer">
						<button type="button" id="continue_btn_2" class="btn btn-primary">Continue</button>
						<button type="submit" class="btn btn-danger float-right">Cancel</button>
					</div>
						
				</div>

				{{-- land info and image form --}}
				<div class="tab-pane fade" id="custom-tabs-one-land-info" role="tabpanel" aria-labelledby="custom-tabs-one-land-info-tab">
						
						<div class="card-body">
							<div class="form-group row">
								<label for="naksha_number" class="col-sm-2 col-form-label">Naksha Number</label>
								<div class="col-sm-10">
									<input name="naksha_number" type="text" value="{{ old('naksha_number')}}" class="form-control @if($errors->has('naksha_number')) is-invalid @endif" placeholder="Naksha Number">
									@if($errors->has('naksha_number'))
										<span class="text-danger">{{ $errors->first('naksha_number') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="sheet_number" class="col-sm-2 col-form-label">Sheet Number</label>
								<div class="col-sm-10">
									<input name="sheet_number" type="text" value="{{ old('sheet_number')}}" class="form-control @if($errors->has('sheet_number')) is-invalid @endif" placeholder="Sheet Number">
									@if($errors->has('sheet_number'))
										<span class="text-danger">{{ $errors->first('sheet_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="kitta_number" class="col-sm-2 col-form-label">Kitta Number</label>
								<div class="col-sm-10">
									<input name="kitta_number" type="text" value="{{ old('kitta_number')}}" class="form-control @if($errors->has('kitta_number')) is-invalid @endif" placeholder="Kitta Number">
									@if($errors->has('kitta_number'))
										<span class="text-danger">{{ $errors->first('kitta_number') }}</span>
									@endif
								</div>
							</div>
						
							<div class="form-group row">
								<label for="house_number" class="col-sm-2 col-form-label">House Number</label>
								<div class="col-sm-10">
									<input name="house_number" type="text" value="{{ old('house_number')}}" class="form-control @if($errors->has('house_number')) is-invalid @endif" placeholder="House Number">
									@if($errors->has('house_number'))
										<span class="text-danger">{{ $errors->first('house_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="purja_number" class="col-sm-2 col-form-label">Purja Number</label>
								<div class="col-sm-10">
									<input name="purja_number" type="text" value="{{ old('purja_number')}}" class="form-control @if($errors->has('purja_number')) is-invalid @endif" placeholder="Purja Number">
									@if($errors->has('purja_number'))
										<span class="text-danger">{{ $errors->first('purja_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="area_of_land" class="col-sm-2 col-form-label">Area Of Land</label>
								<div class="col-sm-10">
									<input name="area_of_land" type="text" value="{{ old('area_of_land')}}" class="form-control @if($errors->has('area_of_land')) is-invalid @endif" placeholder="Area Of Land">
									@if($errors->has('area_of_land'))
										<span class="text-danger">{{ $errors->first('area_of_land') }}</span>
									@endif
								</div>
							</div>

							<hr>

							<!-- image upload fields -->

							<div class="form-group row">
								<label for="customer_photo" class="col-sm-2 col-form-label">Customer Photo</label>
								<div class="col-sm-10">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="customer_photo" id="customer_photo">
											<label class="custom-file-label" for="customer_photo">Choose File</label>
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
										<label class="custom-file-label" for="citizenship_front">Citizenship Front Photo</label>
									</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="citizenship_back">
										<label class="custom-file-label" for="citizenship_back">Citizenship Back Photo</label>
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
										<label class="custom-file-label" for="naksa">Choose file</label>
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
											<label class="custom-file-label" for="lalpurja">Choose file</label>
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
							<button type="submit" class="btn btn-danger float-right">Cancel</button>
						</div>

				</div>
			</form>
			</div><!-- card body end -->
	    </div><!-- /.card  end -->
	</div><!-- /.col  end -->
	      
@endsection

 {{-- --}}

@push('script')
<script type="text/javascript" src="{{asset('js/nepali.datepicker.min.js')}}"></script>
 
{{--  script for nabar/tabs switch/change --}}
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

{{-- initializing nepali data picker fields --}}
<script>
	$(document).ready(function(){
		$('#nepali-datepicker').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
			ndpYearCount: 50
		});
		$('#nepali-datepicker-2').nepaliDatePicker({
			ndpYear: true,
			ndpMonth: true,
			ndpYearCount: 10
		});
	});
</script>

{{-- adding dynamic image name to file input fields --}}
<script type="text/javascript">
    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });
</script>

@endpush