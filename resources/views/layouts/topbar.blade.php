<header id="page-topbar" style="background-color: #350e5f;">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    @if (Auth::user()->role == 'Super Admin')
                    <a href="{{ url('#') }}" class="logo logo-light">
                        <h1 style="color: white;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <a href="{{ url('#') }}" class="logo logo-dark">
                        <h1 style="color: black;" class="mt-3">INDIG.CO</h1>
                    </a>
                    @else
                    <a href="{{ url('/') }}" class="logo logo-light">
                        <h1 style="color: white;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <a href="{{ url('/') }}" class="logo logo-dark">
                        <h1 style="color: black;" class="mt-3">INDIG.CO</h1>
                    </a>
                    @endif
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                @if (Auth::user()->role != 'Super Admin')
                <form class="app-search d-none d-md-block" action="{{ route('search.store') }}" method="POST">
                    @csrf
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" name="search">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
                @endif
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user" style="background-color: rgb(72, 28, 119);">
                    <?php
                    $carts = App\Models\Cart::all();
                    $history = App\Models\Order::all();
                    ?>
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="@if (Auth::user()->avatar != ''){{ URL::asset('assets/images/users/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                    {{Auth::user()->name}}
                                    @if (count($carts->where('user_id', Auth::user()->id))+count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) != 0)
                                    <span class="badge bg-primary align-middle ms-1">{{ count($carts->where('user_id', Auth::user()->id))+count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) }}</span>
                                    @endif
                                </span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{Auth::user()->role}}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                        <a class="dropdown-item" href="{{ url('profile') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="{{ url('chat') }}"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span>
                            <!-- <span class="badge bg-primary align-middle ms-1">10</span> -->
                        </a>
                        @if (Auth::user()->role != 'Super Admin')
                        <a class="dropdown-item" href="{{ url('cart') }}"><i class="las la-shopping-cart text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Shopping Cart</b></span>
                            @if (count($carts->where('user_id', Auth::user()->id)) != 0)
                            <span class="badge bg-primary align-middle ms-1">{{ count($carts->where('user_id', Auth::user()->id)) }}</span>
                            @endif
                        </a>
                        <a class="dropdown-item" href="{{ url('orders') }}"><i class="las la-history text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Transaction History</b> </span>
                            @if (count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) != 0)
                            <span class="badge bg-primary align-middle ms-1">{{ count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) }}</span>
                            @endif
                        </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('faqs') }}"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout">@lang('translation.logout')</span></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>