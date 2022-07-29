<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
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

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" style="{{ Auth::user()->role == 'User' || Auth::user()->role == 'Super Admin' ? 'display: none' :'' }}">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item" style="display: none;">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="las la-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link">
                        <i class="bx bxs-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('products') }}">
                        <i class="lab la-product-hunt"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('orders-admin') }}">
                        <i class="lab la-first-order"></i>
                        <?php $history = App\Models\Order::all(); ?>
                        <span>Orders
                            @if (count($history->where('status', 'Pending')) != 0)
                            <span class="badge bg-primary align-middle ms-1">{{ count($history->where('status', 'Pending')) }}</span>
                            @endif
                        </span>
                    </a>
                </li>

                <li class="nav-item" style="{{ Auth::user()->role == 'Employee' ? 'display: none' :'' }}">
                    <a class="nav-link" href="{{ url('employees') }}">
                        <i class="las la-users-cog"></i>
                        <span>Employees</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('kasir') }}">
                        <i class="las la-shopping-cart"></i>
                        <span>Transactions</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>