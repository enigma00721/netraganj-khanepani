@extends('layouts.app')

@section('title', 'Meter Naamsaari')

@push('style')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.buttons.css') }}" rel="stylesheet">
    
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
               Meter Naamsaari
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
                <form action="{{route('meter.naamsaari.search.submit')}}" method="POST">
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

    @if (@isset($customers))

    {{-- customer search list --}}

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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Father Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Zone</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ward</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">No. Of Consumers</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Meter Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $key=>$row)
                                        <tr role="row" class="odd">
                                            <td> {{$row->name}} </td>
                                            <td>{{$row->customer_number}}</td>
                                            <td>{{$row->father_name}}</td>
                                            <td>{{$row->mobile_number}}</td>
                                            <td>{{$row->customer_address}}</td>
                                            <td>{{$row->gender}}</td>
                                            <td>{{$row->meter_reading_zone}}</td>
                                            <td>{{$row->ward}}</td>
                                            <td>{{$row->number_of_consumers}}</td>
                                            <td>
                                                @if ($row->meter_status == 1)
                                                    <span class="badge badge-success"> Online</span>
                                                @else
                                                    <span class="badge badge-danger"> Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('meter.naamsaari.edit',$row->id)}}" class="btn btn-primary" >
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                            </td>
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
                });

            });
        </script>
    @endisset
@endpush
