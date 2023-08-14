@extends('layouts.main')

@section('title', 'Onboard User')

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

        label {
            font-weight: bold;
            text-transform: uppercase
        }
    </style>



    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="div px-1 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">ONBOARD A USER</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>

                    <div class="divider mt-0"></div>
                    <div data-parent="#accordion" id="" aria-labelledby="headingOne" class="collapse show">
                        <div class="card-body">
                            <button type="button" class="text-left my-0 mb-3 p-0 btn btn-link btn-block">
                                <span class="form-heading">User Details</span>
                            </button>
                            <div class="divider mt-0"></div>
                            <form class="form-vendors" method="POST" action="{{ route('user.store') }}">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleAddress2">First Name</label>
                                            <input class="form-control bg-white autocomplete" id="first-name"
                                                name="vendor_region" placeholder="..." value="" required="required"
                                                type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Last Name</label>
                                            <input class="form-control bg-white autocomplete" id="last-name"
                                                name="vendor_email" placeholder="..." required="required" type="text"
                                                value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Email Address</label>
                                            <input class="form-control bg-white autocomplete" id="vendor-website"
                                                name="vendor_website" placeholder="..." required="required" type="text"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">EMP ID</label>
                                            <input class="form-control bg-white autocomplete" id="mep-id"
                                                name="vendor_email" placeholder="..." required="required" type="text"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Date Joined</label>
                                            <input type="text" name="date_joined"
                                                class="form-control input-start-date bg-white date-range"
                                                placeholder="DD/MM/YYYY" data-toggle="datetime" id="date-joined"
                                                aria-controls="DataTables_Table_0" value=""
                                                style="padding-right:1rem!important;" readonly="readonly">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Company</label>
                                            <select class="form-control" name="company" id="company">
                                                <option value="">...</option>
                                                @foreach ($company as $sp)
                                                    <option value="{{ $sp->cp_id }}">{{ $sp->cp_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Department</label>
                                            <select class="form-control" name="department" id="department">
                                                <option value="">...</option>
                                                @foreach ($department as $sp)
                                                    <option value="{{ $sp->dp_id }}">{{ $sp->dp_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Reports To</label>
                                            <select class="form-control" name="reports_to" id="reports-to">
                                                <option value="">...</option>
                                                <option value="0">Direct to the CVO</option>
                                                @foreach ($supervisor as $sp)
                                                    <option value="{{ $sp->id }}">{{ $sp->first_name }}
                                                        {{ $sp->last_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Employment Type</label>
                                            <select class="form-control" name="department" id="department">
                                                <option disabled value="">...</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Consultancy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Ratings</label>
                                            <input class="form-control bg-white autocomplete" id="ratings"
                                                name="ratings" placeholder="..." required="required" type="number"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Currency</label>
                                            <select class="form-control" name="currency" id="currency">
                                                <option disabled value="">...</option>
                                                <option value="Ksh">KSH</option>
                                                <option value="Dollar">Dollar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="lpo-idnt">Ratings per</label>
                                            <select class="form-control" name="ratings" id="ratings_per">
                                                <option disabled value="">...</option>
                                                <option value="hour">Hour</option>
                                                <option value="month">Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12 pl-0">
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input class="form-check-input chk-custom-filter" type="checkbox"
                                                    name="sdp_capable" value="{{ 'checked' ? '1' : '0' }}"
                                                    id="sdp-capable">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Supervisor?
                                                </label>
                                            </div>
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input class="form-check-input" type="checkbox" name="in_country_offices"
                                                    value="{{ 'checked' ? '1' : '0' }}" id="in-country-offices">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Active?
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="clearfix">
                        <button type="submit"
                            class="btn-shadow btn-wide float-right btn-save-vendor btn-pill btn-hover-shine btn btn-primary">Save</button>
                        <button type="type" id="cancel-btn"
                            class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>


    <script src="{{ asset('vuexy/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vuexy/js/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('js/countries.js') }}"></script>
    <script src="{{ asset('js/components/jq.blockUI.js') }}"></script>
@endsection
