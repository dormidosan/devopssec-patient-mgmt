@extends('dashboard.dashboard')

@section('custom-css')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
@endsection

@section('main')

    <div class="page-content">

        <nav class="page-breadcrumb">


        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Patient Records</h6>
                        <div class="table-responsive">
                            Welcome Doctor!
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
