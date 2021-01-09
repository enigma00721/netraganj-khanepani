@extends('layouts.app')

@section('title', 'Meter Thaausaari')

@push('style')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    
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
               Meter Thaausaari
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
                <form action="{{route('meter.thaausaari.search.submit')}}" method="POST">
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
                                        <td>{{$row->meter_reading_zone}}</td>
                                        <td>{{$row->ward}}</td>
                                        <td>
                                            @if ($row->meter_status == 1)
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="{{route('meter.thaausaari.submit')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$row->id}}">
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">
                                Name
                            </label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$row->name}}" type="text" class="form-control"  placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">
                                Customer Old Address
                            </label>
                            <div class="col-sm-9">
                                <input name="customer_old_address" value="{{$row->customer_address}}" type="text" 
                                    class="form-control" disabled="disabled">
                                @if ($errors->has('customer_address'))
                                    <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">
                                New Address
                                <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <input name="customer_address" type="text" placeholder="Enter Customer New Address"
                                    class="form-control @if($errors->has('customer_address')) is-invalid @endif" required>
                                @if ($errors->has('customer_address'))
                                    <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meter_reading_zone" class="col-sm-3 col-form-label">Meter Reading Zone 
                            <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control " name="meter_reading_zone">
                                    <option value="1" {{ ( $row->meter_reading_zone == 1 ) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ( $row->meter_reading_zone == 2 ) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ( $row->meter_reading_zone == 3 ) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ( $row->meter_reading_zone == 4 ) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ( $row->meter_reading_zone == 5 ) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ( $row->meter_reading_zone == 6 ) ? 'selected' : '' }}>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ward" class="col-sm-3 col-form-label">Meter Reading Ward <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control " name="ward">
                                    <option value="1" {{ ( $row->ward == 1 ) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ( $row->ward == 2 ) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ( $row->ward == 3 ) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ( $row->ward == 4 ) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ( $row->ward == 5 ) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ( $row->ward == 6 ) ? 'selected' : '' }}>6</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tap_type" class="col-sm-3 col-form-label">Tap Type
                                <font style="font-size: medium;" color="red"> * </font>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control @if($errors->has('tap_type')) is-invalid @endif" name="tap_type">
                                    <option value="permanent" {{ ( $row->tap_type == 'permanent' ) ? 'selected' : '' }}>Permanent</option>
                                    <option value="temporary" {{ ( $row->tap_type == 'temporary' ) ? 'selected' : '' }}>Temporary</option>
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
                                    <option value="0.5" {{ ( $row->ward == 0.5 ) ? 'selected' : '' }}>0.5</option>
                                    <option value="1" {{ ( $row->ward == 1 ) ? 'selected' : '' }}>1</option>
                                </select>
                                @if ($errors->has('tap_size'))
                                    <span class="text-danger">{{ $errors->first('tap_size') }}</span>
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
                    responsive: true,
                });

            });
        </script>
    @endisset
@endpush