@extends('layouts.app')

@section('title', 'Meter Naamsaari')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/nepali.datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    
    <style>
         label{
            text-align:right;
        }
    </style>
@endpush

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>
               Meter Naamsaari
            </h1>
          </div>
	  	</div><!-- /.container-fluid -->
	  </div>
    </section>

    <div class="container-fluid row">
        <div class="col-12 col-sm-12 col-lg-9">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header">
                    {{-- <h4>Update New Info</h4> --}}
                    <h3 class="card-title">Update New Info</h3>
                </div>
                <form action="{{route('meter.naamsaari.submit',$row->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                     <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">
                                Name <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif"  placeholder="Enter Customer New Name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">
                                Customer Number <font style="font-size: medium;" color="red"> * </font></label>
                            <div class="col-sm-9">
                                <input name="customer_number" type="number" class="form-control @if($errors->has('customer_number')) is-invalid @endif" readonly="readonly" value="{{$row->customer_number}}">
                                @if ($errors->has('customer_number'))
                                    <span class="text-danger">{{ $errors->first('customer_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Father's Name</label>
                            <div class="col-sm-9">
                            <input name="father_name" type="text" class="form-control" value="{{ old('father_name') }}" placeholder="Father's Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Grand Father Name</label>
                            <div class="col-sm-9">
                            <input name="grand_father_name" type="text" class="form-control" value="{{ old('grandfather_name')}}" placeholder="Grand Father Name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="customer_dob" class="col-sm-3 col-form-label">Customer Date Of Birth</label>
                            <div class="col-sm-9">
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
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Citizenship Number</label>
                            <div class="col-sm-9">
                            <input name="citizenship_number" type="text" class="form-control" value="{{ old('citizenship_number')}}" placeholder="Citizenship Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Citizenship Issued District</label>
                            <div class="col-sm-9">
                            <input name="citizenship_issued_district" type="text" class="form-control" value="{{ old('citizenship_issued_district')}}" placeholder="Citizenship Issued District">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">
                                Gender <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
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
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Customer Type
                            <font style="font-size: medium;" color="red"> * </font></label>
                            <div class="col-sm-9">
                            <select class="form-control @if($errors->has('customer_type')) is-invalid @endif" name="customer_type">
                                <option value="private" {{$row->customer_type=="private"?'selected':''}}>Private</option>
                                <option value="dalit" {{$row->customer_type=="dalit"?'selected':''}}>Dalit</option>
                            </select>
                            @if ($errors->has('customer_type'))
                                <span class="text-danger">{{ $errors->first('customer_type') }}</span>
                            @endif
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Customer Mobile Number <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <input name="mobile_number" type="text" value="{{ old('mobile_number')}}" class="form-control @if($errors->has('mobile_number')) is-invalid @endif" placeholder="Enter New Customer Mobile Number">
                                @if ($errors->has('mobile_number'))
                                    <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">
                                Customer Address/Tole <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <input name="customer_address" type="text" value="{{ $row->customer_address}}" class="form-control @if($errors->has('customer_address')) is-invalid @endif" placeholder="Customer Address">
                                @if ($errors->has('customer_address'))
                                    <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
							<label for="meter_reading_zone" class="col-sm-3 col-form-label">Meter Reading Zone <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-9">
								<select class="form-control @if($errors->has('meter_reading_zone')) is-invalid @endif" name="meter_reading_zone">
									<option value="1" {{$row->meter_reading_zone==1?'selected':''}}>1</option>
									<option value="2" {{$row->meter_reading_zone==2?'selected':''}}>2</option>
									<option value="3" {{$row->meter_reading_zone==3?'selected':''}}>3</option>
									<option value="4" {{$row->meter_reading_zone==4?'selected':''}}>4</option>
									<option value="5" {{$row->meter_reading_zone==5?'selected':''}}>5</option>
									<option value="6" {{$row->meter_reading_zone==6?'selected':''}}>6</option>
								</select>
								@if ($errors->has('meter_reading_zone'))
									<span class="text-danger">{{ $errors->first('meter_reading_zone') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="ward" class="col-sm-3 col-form-label">Meter Reading Ward <font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-9">
								<select class="form-control @if($errors->has('ward')) is-invalid @endif" name="ward">
									<option value="1" {{$row->ward==1?'selected':''}}>1</option>
									<option value="2" {{$row->ward==2?'selected':''}}>2</option>
									<option value="3" {{$row->ward==3?'selected':''}}>3</option>
									<option value="4" {{$row->ward==4?'selected':''}}>4</option>
									<option value="5" {{$row->ward==5?'selected':''}}>5</option>
									<option value="6" {{$row->ward==6?'selected':''}}>6</option>
								</select>
							@if ($errors->has('ward'))
								<span class="text-danger">{{ $errors->first('ward') }}</span>
							@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="tap_type" class="col-sm-3 col-form-label">Tap Type
								<font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-9">
								<select class="form-control @if($errors->has('tap_type')) is-invalid @endif" name="tap_type">
									<option value="permanent" {{$row->tap_type=='permanent'?'selected':''}}>Permanent</option>
									<option value="temporary" {{$row->tap_type=='temporary'?'selected':''}}>Temporary</option>
								</select>
							@if ($errors->has('tap_type'))
								<span class="text-danger">{{ $errors->first('tap_type') }}</span>
							@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="tap_size" class="col-sm-3 col-form-label">Tap Size 
								<font style="font-size: medium;" color="red"> * </font>
							</label>
							<div class="col-sm-9">
								<select class="form-control @if($errors->has('tap_size')) is-invalid @endif" name="tap_size">
									<option value="0.5" {{$row->tap_size=='0.5'?'selected':''}}>0.5</option>
									<option value="1" {{$row->tap_size=='1'?'selected':''}}>1</option>
								</select>
								@if ($errors->has('tap_size'))
									<span class="text-danger">{{ $errors->first('tap_size') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="number_of_consumers" class="col-sm-3 col-form-label">Number Of Consumers <font style="font-size: medium;" color="red"> * </font></label>
							<div class="col-sm-9">
								<input name="number_of_consumers" type="number" value="{{ $row->number_of_consumers}}" class="form-control @if($errors->has('number_of_consumers')) is-invalid @endif" placeholder="Number Of Consumers" >
								@if ($errors->has('number_of_consumers'))
									<span class="text-danger">{{ $errors->first('number_of_consumers') }}</span>
								@endif

							</div>
                        </div>
                        <div class="form-group row">
								<label for="customer_photo" class="col-sm-3 col-form-label">Customer Photo</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="customer_photo" id="customer_photo">
											<label class="custom-file-label" for="customer_photo" style="text-align: left;">Choose File</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text" id="">Upload</span>
										</div>
									</div>
								</div>
							</div>
                        <div class="card-footer">
                            <button type="submit"  class="btn btn-primary">Update</button>
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
					    </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- old customer info sidebar --}}
        <div class="col-12 col-sm-12 col-lg-3">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header">
                    <h3 class="card-title">Old Customer Info</h3>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="name" class="col-sm-6 col-form-label">Customer Name :</label>
                        <div  class="col-sm-6 col-form-label">{{$row->name}}</div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-6 col-form-label">Father Name :</label>
                        <div  class="col-sm-6 col-form-label">{{$row->father_name}}</div>
                    </div>
                    <div class="row form-group">
                        <label for="name" class="col-sm-6 col-form-label">Mobile Number :</label>
                        <div  class="col-sm-6 col-form-label">{{$row->mobile_number}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection



@push('script')

	@include('partial.flash_message_script')

	<script type="text/javascript" src="{{asset('js/nepali.datepicker.min.js')}}"></script>

    {{-- initializing nepali data picker fields --}}
	<script>
		$(document).ready(function(){
			$('#nepali-datepicker').nepaliDatePicker({
				ndpYear: true,
				ndpMonth: true,
				ndpYearCount: 50
			});
		});
	</script>
    
@endpush
