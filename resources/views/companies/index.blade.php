@extends('layouts.main')

@section('title', 'Companies')

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
        <h1 class="display-4">Ponea Companies</h1>
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
                        <th>COMPANY NAME</th>
                        <th>PHYSICAL ADDRESS</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $td)
                        <tr>
                            <td id="dist_id_{{ $td->cp_id }}" data-id="{{ $td->cp_id }}" class="pl-4"
                                width="1">1</td>
                            <td class="text-primary font-weight-bold px-0">{{ strtoupper($td->cp_name) }}
                            </td>
                            <td>{{ $td->cp_address }}</td>
                            <td>
                                <div width="1"
                                    class="badge badge-pill badge-{{ $td->cp_status == 1 ? 'success' : 'danger' }}">
                                    {{ $td->cp_status == 1 ? 'ACTIVE' : 'NOT ACTIVE' }}</div>
                            </td>
                            <td width="1"><a href="{{ url('/company/' . $td->cp_id) }} "
                                    class="btn btn-primary text-white btn-rounded btn-pkg-preview"
                                    data-uuid="{{ $td->cp_id }}">View</a>
                                <button data-uuid="{{ $td->cp_id }}" data-idnt="{{ $td->cp_id }}"
                                    onclick="updateUser({{ $td }})"
                                    class="border-0 btn btn-edit-dist bg-danger text-white opacity-8">
                                    EDIT
                                </button>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


    <!-- Modal Section -->

    <section class="modal-container d-none">
        <div id="add-dist-modal" class="modal-content" aria-modal-class="">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">
                    COMPANY DETAILS
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body form-update-location">
                <input type="text" hidden class="form-control" name="_token" id="user_token"
                    value="{{ $token }}">
                <input type="text" hidden class="form-control" name="cp_id" id="cp-id">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="patient-location">Company Name</label>
                            <div class="input-group">
                                <input required class="form-control form-control-sm patient-location" data-label="Address"
                                    id="cp-name" name="name" placeholder="Country Name" required="required"
                                    type="text" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 status-field data-field-col">
                        <label for="data-status">Country of Operation</label>
                        <select class="form-control" name="status" id="cp-country">
                            <option value="" selected disabled>..</option>
                            @foreach ($countries as $ct)
                                <option value="{{ $ct->ct_id }}">{{ $ct->ct_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Training level will be added from the Stages Section -->
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="patient-details">Physical Address</label>
                            <div class="input-group">
                                <textarea required name="desc" class="form-control form-control-sm validate bg-white pr-0" id="cp-address"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 status-field data-field-col">
                        <label for="data-status">Status</label>
                        <select class="form-control" name="status" id="cp-status">
                            <option value="" disabled>..</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer col-md-12">
                    <button type="button" class="btn btn-outline-danger btn-lg" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-lg btn-save-company">Save</button>
                </div>
            </form>
        </div>
    </section>


    <script src="{{ asset('vuexy/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('js/companies.js') }}"></script>
    <script src="{{ asset('js/components/jq.blockUI.js') }}"></script>
@endsection
