@extends('layouts.app')

@section('title', 'Change Meter')

@push('style')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/nepali.datepicker.min.css')}}">
    
    <style>
        label{
            text-align:right;
        }
        /* show 10 entries style */
        #example1_length{
            float:left;
            margin-left:10px;
        }
        select[name="example1_length"] {
            height: calc(1.8125rem + 8px);
        }
        /* show 10 entries style */

        /* style for pagination and detail info */
        .dataTables_info{
            float: left;
        }
        .dataTables_paginate paging_simple_numbers{
            float: right;
        }
        .dataTables_scroll{
            margin-bottom: 20px;
        }
        /* style for pagination and detail info */

    </style>
@endpush

@section('content')

	@include('partial.flash_message')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>
               Change Meter
            </h1>
          </div>
	  	</div><!-- /.container-fluid -->
	  </div>
    </section>

    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Search Customer
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('meter.change.search.submit')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">
                            Customer Name </label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" >
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">
                            Customer Number</label>
                        <div class="col-sm-10">
                            <input name="customer_number" type="number" class="form-control @if($errors->has('customer_number')) is-invalid @endif">
                            @if ($errors->has('customer_number'))
                                <span class="text-danger">{{ $errors->first('customer_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>

    {{-- customer list table   --}}
    @if (@isset($customers))
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Customer List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Customer Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Zone</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ward</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Meter Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $key=>$row)
                                    <tr role="row" class="odd">
                                        <td> {{$row->name}} </td>
                                        <td>{{$row->customer_number}}</td>
                                        <td>{{$row->mobile_number}}</td>
                                        <td>{{$row->customer_address}}</td>
                                        <td>{{$row->meter->meter_reading_zone}}</td>
                                        <td>{{$row->meter->ward}}</td>
                                        <td>
                                            @if ($row->meter->meter_status == 1)
                                                <span class="badge badge-success"> Online</span>
                                            @else
                                                <span class="badge badge-danger"> Offline</span>
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-{{$key}}"><i class="fas fa-user-edit"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
    </div>


    <!-- customer thaausaari edit modal box -->
    @foreach($customers as $key=>$row)
    <div class="modal fade show" id="modal-lg-{{$key}}"  aria-modal="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('meter.thaausaari.submit')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">
                                    Meter Change Date
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="meter_change_date" id="nepali-datepicker" class="form-control" data-inputmask-alias="datetime" placeholder="yyyy/mm/dd" data-mask="" im-insert="false">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">
                                    Old Meter's Last Reading
                                </label>
                                <div class="col-sm-8">
                                    <input name="customer_old_address"  type="number" class="form-control" >
                                    @if ($errors->has('customer_address'))
                                        <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">
                                    Consumed Units
                                    <font style="font-size: medium;" color="red"> * </font>
                                </label>
                                <div class="col-sm-8">
                                    <input name="customer_address" type="text" class="form-control @if($errors->has('customer_address')) is-invalid @endif">
                                    @if ($errors->has('customer_address'))
                                        <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">
                                    New Meter Initial Reading 
                                    <font style="font-size: medium;" color="red"> * </font>
                                </label>
                                <div class="col-sm-8">
                                    <input name="customer_address" type="text" value="0"
                                        class="form-control @if($errors->has('customer_address')) is-invalid @endif" required>
                                    @if ($errors->has('customer_address'))
                                        <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">
                                    New Meter Seiral Number
                                    <font style="font-size: medium;" color="red"> * </font>
                                </label>
                                <div class="col-sm-8">
                                    <input name="customer_address" type="text" placeholder="Enter New Meter Serial Number"
                                        class="form-control @if($errors->has('customer_address')) is-invalid @endif" required>
                                    @if ($errors->has('customer_address'))
                                        <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                    @endif
                                </div>
                            </div>
                         
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form> 
                </div>
                <div class="col-md-4">
                    <div class="card card-primary m-3">
                        <div class="card-header">
                            <h3 class="card-title">Old Meter Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="name" class="col-sm-6 col-form-label">Last Read Unit :</label>
                                <div  class="col-sm-6 col-form-label">{{$row->name}}</div>
                            </div>
                            <div class="row form-group">
                                <label for="name" class="col-sm-6 col-form-label">Year/Month :</label>
                                <div  class="col-sm-6 col-form-label">{{$row->father_name}}</div>
                            </div>
                            <div class="row form-group">
                                <label for="name" class="col-sm-6 col-form-label">Read Date :</label>
                                <div  class="col-sm-6 col-form-label">{{$row->mobile_number}}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>   <!-- /.modal -->
    @endforeach
    <!-- customer thaausaari edit modal box -->
    
    @endif



@endsection

@push('script')

	@include('partial.flash_message_script')

    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/nepali.datepicker.min.js')}}"></script>
    
    @isset($customers)
        <script>
            $(document).ready(function() {
                
                var scrollSize = "";
                var count = {{$customerCount}};
                if(count > 1)scrollSize = "200px";
                else scrollSize = "100px";

                var table = $('#example1').DataTable({
                    scrollY:scrollSize,                 // dynamic scrollY
                    searching: false,
                    lengthChange: false,
                });

            });
        </script>
    @endisset


    {{-- initializing nepali data picker fields --}}
	<script>
		$(document).ready(function(){
			$('#nepali-datepicker').nepaliDatePicker({
				ndpYear: true,
				ndpMonth: true,
				ndpYearCount: 50,
			});
            $('#nepali-datepicker').val(NepaliFunctions.ConvertDateFormat
                    (NepaliFunctions.GetCurrentBsDate()));
		});
	</script>
@endpush