<style>
    div.ml-auto .toggle.btn {
        min-width: 80px;
        border-radius: 1rem;
    }

    div.ml-auto span.btn.toggle-handle {
        border-radius: 1rem;
        width: 30px;
    }

    .btn .badge-dot.badge-dot-profile {
        top: 30px;
        right: 18px;
    }

    .btn .badge-dot.badge-dot-profile-inline {
        top: 30px;
        right: 0px;
        border: #d8e9f7 solid 2px;
    }
</style>

<div class="app-header header-shadow">
    <div class="app-header__logo">
        <a class="logo-src" href="/dashboard">
            <img src="/images/logos/ponea.png" alt="Logo" style="height:58px; width:250px;">
        </a>
        &nbsp
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic is-active"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper dropdown">
                <div class="input-holder" id="search-input-holder" data-toggle="dropdown" aria-haspopup="false"
                    aria-expanded="false">
                    <input type="text" class="search-input search-results" placeholder="Type to search">
                    <button class="search-icon">
                        <span></span>
                    </button>
                </div>
                <div class="dropdown-menu dropdown-menu-search d-none" aria-labelledby="search-input-holder">
                    <a class="dropdown-item">No Matches</a>
                </div>
                <button class="close"></button>
            </div>
        </div>
        <div class="app-header-right">
            <div class="header-dots">
                <div class="dropdown">
                    <button type="button" class="p-0 mr-2 btn btn-link">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-primary"></span>
                            <i class="icon text-primary ion-android-apps"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle"
                                        src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name }}+{{ Auth::user()->last_name }}"
                                        : icon)" alt="">
                                    <span class="badge badge-dot badge-dot-profile badge-dot-lg badge-success">Online
                                        Status</span>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                style="background-image: url('/images/dropdown-header/city3.jpg');">
                                            </div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <a class="btn p-0">
                                                                <img width="42" class="rounded-circle"
                                                                    src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name }}+{{ Auth::user()->last_name }}"
                                                                    alt="avatar">
                                                                <span
                                                                    class="badge badge-dot badge-dot-profile-inline badge-dot-lg badge-success">Online
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">
                                                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                                            </div>
                                                            <div class="widget-subheading opacity-8">
                                                                {{ Auth::user()->email }}
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <a href="{{ route('logout') }}"
                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                            </div>
                            <div class="widget-subheading">
                                'System User' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg">
                <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
