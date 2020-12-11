@extends('layouts.app')

@section('title', 'Meter Thaausaari')

@push('style')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    
    <style>
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
                <form action="{{route('meter.thaausaari.submit')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Customer Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Number</label>
                        <input type="number" name="customer_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer Number">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>

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
                                        <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $row)
                                    <tr role="row" class="odd">
                                        <td> {{$row->name}} </td>
                                        <td>{{$row->customer_number}}</td>
                                        <td>{{$row->mobile_number}}</td>
                                        <td>{{$row->customer_address}}</td>
                                        <td>{{$row->meter_reading_zone}}</td>
                                        <td>{{$row->ward}}</td>
                                        <td>{{$row->meter_status}}</td>
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
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>

    <script>
        $(document).ready(function() {
            var scrollSize = "";
            var count = {{$customers->count()}};
            if(count > 1)scrollSize = "200px";
            else scrollSize = "50px";

            var table = $('#example1').DataTable({
                scrollY:scrollSize,                 // dynamic scrollY
                info:false,
                searching: false,
                lengthChange: false,
                responsive: true,

            });

        });
    </script>
@endpush