@extends('layouts.app')

@section('title', 'Customer Edit | Update')


@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
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
	#new-photo-upload:after{
		border-bottom:2px solid #007bff;
		display: block;
		margin:0 auto;
		content: " ";
		width:200px;
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
              Customer Update
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

			<form action="{{route('customer.update',$row->id)}}" method="POST" enctype="multipart/form-data" >
				@csrf
				@method('PUT')
				<div class="tab-content" id="custom-tabs-one-tabContent">

					<div class="tab-pane fade show active" id="custom-tabs-one-customer-details" role="tabpanel" aria-labelledby="custom-tabs-one-customer-details-tab">
						
						<div class="card-body">

							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">
									Customer Name <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif"  placeholder="Customer Name" value="{{$row->name}}">
									@if ($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">
									Customer Name (Nepali) <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="customer_name_nepali" type="text" class="form-control @if($errors->has('customer_name_nepali')) is-invalid @endif"  placeholder="Customer Name in Nepali" value="{{optional($row->customer_nepali_field)->customer_name_nepali}}">
									@if ($errors->has('customer_name_nepali'))
										<span class="text-danger">{{ $errors->first('customer_name_nepali') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Customer Number <font style="font-size: medium;" color="red"> * </font></label>
								<div class="col-sm-10">
									<input name="customer_number" type="number" class="form-control @if($errors->has('customer_number')) is-invalid @endif" readonly="readonly" value="{{$row->customer_number}}">
									@if ($errors->has('customer_number'))
										<span class="text-danger">{{ $errors->first('customer_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Old System Number <font style="font-size: medium;" color="red"> * </font></label>
								<div class="col-sm-10">
									<input name="old_system_no" type="text" class="form-control @if($errors->has('old_system_no')) is-invalid @endif" value="{{$row->old_system_no}}" placeholder="Old System Number">
									@if ($errors->has('old_system_no'))
										<span class="text-danger">{{ $errors->first('old_system_no') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Father's Name</label>
								<div class="col-sm-10">
								<input name="father_name" type="text" class="form-control" value="{{ $row->father_name }}" placeholder="Father's Name" >
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Father's Name (Nepali)</label>
								<div class="col-sm-10">
								<input name="customer_father_name_nepali" type="text" class="form-control" value="{{ optional($row->customer_nepali_field)->customer_father_name_nepali }}" placeholder="Father's Name in Nepali" >
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Grand Father Name</label>
								<div class="col-sm-10">
								<input name="grandfather_name" type="text" class="form-control" value="{{ $row->grandfather_name}}" placeholder="Grand Father Name">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Grand Father Name (Nepali)</label>
								<div class="col-sm-10">
								<input name="customer_grandfather_name_nepali" type="text" class="form-control" value="{{ optional($row->customer_nepali_field)->customer_grandfather_name_nepali}}" placeholder="Grand Father Name in Nepali">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="customer_dob" class="col-sm-2 col-form-label">Customer Date Of Birth</label>
								<div class="col-sm-10">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
										</div>
										<input type="text" name="customer_dob" id="nepali-datepicker" value="{{ $row->customer_dob}}" class="form-control" data-inputmask-alias="datetime" placeholder="yyyy/mm/dd" data-mask="" im-insert="false">
									</div>
									@if ($errors->has('customer_dob'))
										<span class="text-danger">{{ $errors->first('customer_dob') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Number</label>
								<div class="col-sm-10">
								<input name="citizenship_number" type="text" class="form-control" value="{{ $row->citizenship_number}}" placeholder="Citizenship Number">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Citizenship Issued District</label>
								<div class="col-sm-10">
								<input name="citizenship_issued_district" type="text" class="form-control" value="{{ $row->citizenship_issued_district}}" placeholder="Citizenship Issued District">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Gender <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<select class="form-control @if($errors->has('gender')) is-invalid @endif" name="gender">
										<option value="male" {{ ($row->gender == 'male') ? "selected='selected'" : ""}}>Male</option>
										<option value="female" {{ ($row->gender == 'female') ? "selected='selected'" : ""}}>Female</option>
										<option value="others" {{ ($row->gender == 'others') ? "selected='selected'" : ""}}>Others</option>
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
									<input name="customer_address" type="text" value="{{ $row->customer_address}}" class="form-control @if($errors->has('customer_address')) is-invalid @endif" placeholder="Customer Address">
									@if ($errors->has('customer_address'))
										<span class="text-danger">{{ $errors->first('customer_address') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">
									Customer Address (Nepali) <font style="font-size: medium;" color="red"> * </font>
								</label>
								<div class="col-sm-10">
									<input name="customer_address_nepali" type="text" value="{{ optional($row->customer_nepali_field)->customer_address_nepali}}" class="form-control @if($errors->has('customer_address_nepali')) is-invalid @endif" placeholder="Customer Address in Nepali">
									@if ($errors->has('customer_address_nepali'))
										<span class="text-danger">{{ $errors->first('customer_address_nepali') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Customer Type
								<font style="font-size: medium;" color="red"> * </font></label>
								<div class="col-sm-10">
								<select class="form-control @if($errors->has('customer_type')) is-invalid @endif" name="customer_type">
									<option value="private" {{ ($row->customer_type == 'private') ? 'selected' : '' }}>Private</option>
									<option value="dalit" {{ ($row->customer_type == 'dalit') ? 'selected' : '' }}>Dalit</option>
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
									<input name="mobile_number" type="text" value="{{ $row->mobile_number}}" class="form-control @if($errors->has('mobile_number')) is-invalid @endif" placeholder="Customer Mobile Number">
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
								<input name="meter_serial" type="text" value="{{ $row->meter->meter_serial}}" class="form-control @if($errors->has('meter_serial')) is-invalid @endif" placeholder="Meter Serial">
								@if ($errors->has('meter_serial'))
									<span class="text-danger">{{ $errors->first('meter_serial') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Meter Initial Reading <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-10">
								<input name="meter_initial_reading" type="number" value="{{ $row->meter->meter_initial_reading}}" class="form-control @if($errors->has('meter_initial_reading')) is-invalid @endif" placeholder="Meter Initial Reading" >
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
								<input type="text" name="meter_connected_date" id="nepali-datepicker-2" value="{{ $row->meter->meter_connected_date}}" class="form-control @if($errors->has('meter_connected_date')) is-invalid @endif" data-inputmask-alias="datetime" placeholder="yyyy/mm/dd" data-mask="" im-insert="false">
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
									<option value="1" {{ ($row->meter->meter_reading_zone == 1) ? 'selected' : '' }}>1</option>
									<option value="2" {{ ($row->meter->meter_reading_zone == 2) ? 'selected' : '' }}>2</option>
									<option value="3" {{ ($row->meter->meter_reading_zone == 3) ? 'selected' : '' }}>3</option>
									<option value="4" {{ ($row->meter->meter_reading_zone == 4) ? 'selected' : '' }}>4</option>
									<option value="5" {{ ($row->meter->meter_reading_zone == 5) ? 'selected' : '' }}>5</option>
									<option value="6" {{ ($row->meter->meter_reading_zone == 6) ? 'selected' : '' }}>6</option>
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
									<option value="1" {{ ($row->meter->ward == 1) ? 'selected' : '' }}>1</option>
									<option value="2" {{ ($row->meter->ward == 2) ? 'selected' : '' }}>2</option>
									<option value="3" {{ ($row->meter->ward == 3) ? 'selected' : '' }}>3</option>
									<option value="4" {{ ($row->meter->ward == 4) ? 'selected' : '' }}>4</option>
									<option value="5" {{ ($row->meter->ward == 5) ? 'selected' : '' }}>5</option>
									<option value="6" {{ ($row->meter->ward == 6) ? 'selected' : '' }}>6</option>
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
									<option value="permanent" {{ ($row->meter->tap_type == 'permanent') ? 'selected' : '' }}>Permanent</option>
									<option value="temporary" {{ ($row->meter->tap_type == 'temporary') ? 'selected' : '' }}>Temporary</option>
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
									<option value="0.5" {{ ($row->meter->tap_size == '0.5') ? 'selected' : '' }}>0.5</option>
									<option value="1" {{ ($row->meter->tap_size == '1') ? 'selected' : '' }}>1</option>
								</select>
								@if ($errors->has('tap_size'))
									<span class="text-danger">{{ $errors->first('tap_size') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="number_of_consumers" class="col-sm-2 col-form-label">Number Of Consumers <font style="font-size: medium;" color="red"> * </font></label>
							<div class="col-sm-10">
								<input name="number_of_consumers" type="number" value="{{ $row->meter->number_of_consumers}}" class="form-control @if($errors->has('number_of_consumers')) is-invalid @endif" placeholder="Number Of Consumers" >
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
									<input name="naksha_number" type="text" value="{{ optional($row->land_info)->naksha_number}}" class="form-control @if($errors->has('naksha_number')) is-invalid @endif" placeholder="Naksha Number">
									@if($errors->has('naksha_number'))
										<span class="text-danger">{{ $errors->first('naksha_number') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="sheet_number" class="col-sm-2 col-form-label">Sheet Number</label>
								<div class="col-sm-10">
									<input name="sheet_number" type="text" value="{{ optional($row->land_info)->sheet_number}}" class="form-control @if($errors->has('sheet_number')) is-invalid @endif" placeholder="Sheet Number">
									@if($errors->has('sheet_number'))
										<span class="text-danger">{{ $errors->first('sheet_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="kitta_number" class="col-sm-2 col-form-label">Kitta Number</label>
								<div class="col-sm-10">
									<input name="kitta_number" type="text" value="{{ optional($row->land_info)->kitta_number}}" class="form-control @if($errors->has('kitta_number')) is-invalid @endif" placeholder="Kitta Number">
									@if($errors->has('kitta_number'))
										<span class="text-danger">{{ $errors->first('kitta_number') }}</span>
									@endif
								</div>
							</div>
						
							<div class="form-group row">
								<label for="house_number" class="col-sm-2 col-form-label">House Number</label>
								<div class="col-sm-10">
									<input name="house_number" type="text" value="{{ optional($row->land_info)->house_number}}" class="form-control @if($errors->has('house_number')) is-invalid @endif" placeholder="House Number">
									@if($errors->has('house_number'))
										<span class="text-danger">{{ $errors->first('house_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="purja_number" class="col-sm-2 col-form-label">Purja Number</label>
								<div class="col-sm-10">
									<input name="purja_number" type="text" value="{{ optional($row->land_info)->purja_number}}" class="form-control @if($errors->has('purja_number')) is-invalid @endif" placeholder="Purja Number">
									@if($errors->has('purja_number'))
										<span class="text-danger">{{ $errors->first('purja_number') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="area_of_land" class="col-sm-2 col-form-label">Area Of Land</label>
								<div class="col-sm-10">
									<input name="area_of_land" type="text" value="{{ optional($row->land_info)->area_of_land}}" class="form-control @if($errors->has('area_of_land')) is-invalid @endif" placeholder="Area Of Land">
									@if($errors->has('area_of_land'))
										<span class="text-danger">{{ $errors->first('area_of_land') }}</span>
									@endif
								</div>
							</div>

							<br>
								<h5 id="new-photo-upload" class="text-center">Choose New Photo</h5>
							<br>

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
							<button type="submit" id="submit_btn" class="btn btn-primary">Submit</button>
							<button type="submit" class="btn btn-danger float-right">Cancel</button>
						</div>

				</div>
			</form>
			</div><!-- card body end -->
	    </div><!-- /.card  end -->
	</div><!-- /.col  end -->
	      
@endsection


 {{--     script files     --}}

@push('script')
	<script type="text/javascript" src="{{asset('js/script.js')}}" ></script>
	<script type="text/javascript" src="{{asset('js/nepali.datepicker.min.js')}}"></script>
	@include('partial.flash_message_script')
	
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
				ndpYearCount: 30
			});
		});
	</script>


@endpush