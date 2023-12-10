@extends('dashboard.dashboard')

@section('custom-css')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
@endsection

@section('main')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <a href="#" class="btn btn-inverse-success">Insert Drug </a>

        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Drugs inventory</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Drug Name</th>
                                    <th>Composition</th>
                                    <th>Manufacture</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drugs as $key => $drug)
                                    <tr>
                                        <td>{{$drug->name }}</td>
                                        <td>{{Str::limit($drug->composition, 25) }}</td>
                                        <td>{{$drug->manufacture }}</td>
                                        <td>
                                            <a href="#" class="btn btn-inverse-primary">Show</a>
                                            <a href="#" class="btn btn-inverse-warning">Edit</a>

                                                <button type="submit" class="btn btn-inverse-danger" onclick="return confirm('Are you sure you want to delete this drug?')">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection



@section('libraries')
    <script src="{{ asset('../assets/vendors/datatables.net/jquery.dataTables.js')}}" ></script>
    <script src="{{ asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
@endsection


@section('scripts')
    <script>
        $(function() {
            'use strict';

            const dataTableExample = $('#dataTableExample');

            $(function() {
                dataTableExample.DataTable({
                    "aLengthMenu": [
                        [10, 30, 50, -1],
                        [10, 30, 50, "All"]
                    ],
                    "iDisplayLength": 10,
                    "language": {
                        search: ""
                    }
                });
                dataTableExample.each(function() {
                    const datatable = $(this);
                    // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                    const search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                    search_input.attr('placeholder', 'Search');
                    search_input.removeClass('form-control-sm');
                    // LENGTH - Inline-Form control
                    const length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                    length_sel.removeClass('form-control-sm');
                });
            });


        });
    </script>
@endsection
