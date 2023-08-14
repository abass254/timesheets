@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
    <style>
        div.card-header {
            height: 6rem;
        }

        div.modal-backdrop {
            display: none;
        }
    </style>


    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">

                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <img src="{{ asset('images/logos/ponea.png') }}" height="80" width="350" />
                                <h2 style="color:black">TIMESHEEET MODULE</h2>
                                <h6 style="color:black">Enter your details to login. </h6>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">

                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4" style="text-transform: uppercase">welcome back</h3>
                                </div>
                            </div>
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <input hidden type="text" data-val="true"
                                data-val-required="The ReturnUrl field is required." id="ReturnUrl" name="ReturnUrl"
                                value="/" />
                            <div class="form-group mb-3">
                                <span class="text-danger field-validation-valid" data-valmsg-for="Email"
                                    data-valmsg-replace="true"></span>
                                <label class="label" for="name">Email</label>
                                <input type="text" value="{{ csrf_token() }}" hidden id="token">
                                <input type="email" class="form-control" id="username" placeholder="Email" required
                                    data-val="true" data-val-email="The Email field is not a valid e-mail address."
                                    data-val-required="The Email field is required." id="username" name="Email"
                                    value="">
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-danger field-validation-valid" data-valmsg-for="Password"
                                    data-valmsg-replace="true"></span>
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" required data-val="true"
                                    data-val-required="The Password field is required." id="password" name="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-login-user btn-primary submit px-3">Sign
                                    In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">
                                        Remember Me
                                        <input type="checkbox" checked data-val="true"
                                            data-val-required="The Remember me? field is required." id="RememberMe"
                                            name="RememberMe" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <input name="__RequestVerificationToken" type="hidden" value="" /><input
                                name="RememberMe" type="hidden" value="false">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/components/jq.blockUI.js') }}"></script>
@endsection
