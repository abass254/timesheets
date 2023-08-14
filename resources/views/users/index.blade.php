@extends('layouts.main')

@section('title', 'System Users')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/css/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/css/datatable/datatables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/data-list-view.css') }}">
    <style type="text/css">
        table.data-list-view.dataTable,
        table.data-thumb-view.dataTable {
            border-spacing: 0 0.3rem;
            padding: 2;
        }

        table.data-list-view.dataTable tbody td,
        table.data-thumb-view.dataTable tbody td {
            padding: 1rem 1.357rem;
        }

        table.data-list-view th:nth-child(2),
        table.data-list-view td:nth-child(2) {
            padding: 0 !important;
            border-top-left-radius: 0rem;
            border-bottom-left-radius: 0rem;
        }

        table.data-list-view td:nth-child(3) {
            white-space: nowrap;
        }

        table.data-list-view th:last-child,
        table.data-list-view td:last-child {
            white-space: nowrap;
        }

        td {
            font-size: 0.9em !important;
            text-transform: uppercase;
        }
    </style>

    <div class="">
        <h1 class="display-4">System Users</h1>
        <hr />
    </div>

    <section id="data-list-view" class="data-list-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    {{-- <button type="button" class="btn btn-white px-3 py-1 dropdown-toggle waves-effect waves-light"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button> --}}
                    <div class="dropdown-menu mt-1 dt-action">
                        <a class="dropdown-item dt-dropdown-action dt-action-view"><i
                                class="feather icon-trash"></i>View</a>
                        <a class="dropdown-item dt-dropdown-action dt-action-edit"><i
                                class="feather icon-edit-1"></i>Edit</a>
                        <a class="dropdown-item dt-dropdown-action dt-action-delete"><i
                                class="feather icon-trash-2"></i>Delete</a>
                        <a class="dropdown-item"><i class="feather icon-shopping-cart"></i>Allocate</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- DataTable starts -->
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr class="text-primary">
                        <th class="pl-4">#</th>
                        <th>EMP NO</th>
                        <th>FULL NAME</th>
                        <th>USERNAME</th>
                        <th>DATE JOINED</th>
                        <th>EMPLOYEE TYPE</th>
                        <th>DEPARTMENT</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </section>


    <!-- Modal Section -->




    <script src="{{ asset('vuexy/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('js/users.js') }}"></script>
    <script src="{{ asset('js/components/jq.blockUI.js') }}"></script>
@endsection
