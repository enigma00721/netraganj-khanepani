@extends('layouts.app')

@section('title', 'Customer List')

@push('style')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.buttons.css') }}" rel="stylesheet">
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
              Customer List
            </h1>
          </div>
	  	</div><!-- /.container-fluid -->
	  </div>
    </section>

    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">S.No.</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Customer Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Father Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Zone</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ward</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">No. Of Consumers</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 50px !important;">Customer Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Meter Connected Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Meter Serial</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Meter Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            <!-- /.card-body -->
          </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



    <script>
        $(document).ready(function() {

            $('body').addClass('sidebar-collapse'); 

            var table = $('#example1').DataTable({
                dom: 'Blftip',
                lengthMenu: [10,20,50,100,500],
                scrollY:"500px",
                scrollX:true,
                scrollCollapse: true,
                fixedColumns: true,
               
                buttons: [
                    {
                        extend:'excel',
                        exportOptions: {
                            columns: ':visible :not(:last-child)'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible :not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible :not(:last-child)'
                        }
                    }
                ],

                processing: true,
                serverSide: true,

                ajax: '{{ route('customer.list.ajax') }}',
              
                columns:[
                    {"data":"DT_RowIndex"},
                    {"data":"name"},
                    {"data":"customer_number"},
                    {"data":"father_name"},
                    {"data":"mobile_number"},
                    {"data":"customer_address"},
                    {"data":"gender"},
                    {"data":"meter_reading_zone"},
                    {"data":"ward"},
                    {"data":"number_of_consumers"},
                    {"data":"customer_type"},
                    {"data":"meter_connected_date"},
                    {"data":"meter_serial"},
                    {"data":"meter_status"},
                    {"data": 'action', name: 'action'}
                ],

                 "columnDefs": [
                    { "width": 5, "targets": 0 }
                ]

            });

        });
       

       
    </script>
@endpush