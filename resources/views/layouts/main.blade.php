<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ponea Timesheets | @yield('title')</title>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.custom.css') }}" rel="stylesheet">

    <link href="{{ asset('/images/logos/favicon.png') }}" rel="icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}


    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow {{ Auth::check() ? 'fixed-header fixed-sidebar' : '' }}">
        @if (Auth::check())
            @include('layouts.navbar')
            <div class="app-main">
                @include('layouts.sidebar')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <script type="text/javascript" src="{{ asset('/lib/signalr/signalr.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('/js/core-script.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('/lib/extensions/toastr.min.js') }}"></script>

                        @yield('content')
                    </div>

                    <!--Footer-->
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    <div class="footer-dots">
                                        <div class="dropdown">
                                            <a class="dot-btn-wrapper">
                                                <i class="dot-btn-icon lnr-pie-chart icon-gradient bg-happy-itmeo"></i>
                                            </a>
                                        </div>
                                        <div class="dots-separator"></div>
                                        <div class="dropdown">
                                            <a href="/downloads" class="dot-btn-wrapper dd-chart-btn-2">
                                                <i
                                                    class="dot-btn-icon lnr-cloud-download icon-gradient bg-love-kiss"></i>
                                                <div class="badge badge-dot badge-abs badge-dot-sm badge-warning">
                                                    Notifications</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-footer-right">
                                    <ul class="header-megamenu nav">
                                        <li class="nav-item">
                                            Product of <a class="text-danger" href="https://ponea.com/"
                                                target="_blank">Ponea Health Limited</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="app-main">
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <script type="text/javascript" src="{{ asset('/js/auth-script.js') }}"></script>
                        <script type="text/javascript" src="{{ asset('/lib/extensions/toastr.min.js') }}"></script>
                        @yield('content')
                    </div>

                    <!--Footer-->
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left pl-5">
                                    <div class="footer-dots">
                                        <div class="dropdown">
                                            <a class="dot-btn-wrapper">
                                                <i class="dot-btn-icon lnr-pie-chart icon-gradient bg-happy-itmeo"></i>
                                            </a>
                                        </div>
                                        <div class="dots-separator"></div>
                                        <div class="dropdown">
                                            <a href="/downloads" class="dot-btn-wrapper dd-chart-btn-2">
                                                <i
                                                    class="dot-btn-icon lnr-cloud-download icon-gradient bg-love-kiss"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-footer-right pr-5">
                                    <ul class="header-megamenu nav">
                                        <li class="nav-item">
                                            Product of <a class="text-danger" href="https://ponea.com/"
                                                target="_blank">Ponea Health Limited</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="modal-container-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-container-label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
