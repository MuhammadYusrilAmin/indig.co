<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard')); ?>" class="nav-link">
                        <i class="bx bxs-dashboard"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="nav-item" id="navbar-nav">
                    <a class="nav-link" href="<?php echo e(url('products')); ?>">
                        <i class="lab la-product-hunt"></i>
                        <span>
                            Products
                        </span>
                    </a>
                </li>

                <li class="nav-item" id="navbar-nav">
                    <a class="nav-link" href="<?php echo e(url('orders')); ?>">
                        <i class="lab la-first-order"></i>
                        <span><?php echo app('translator')->get('translation.orders'); ?></span>
                    </a>
                </li>

                <li class="nav-item" id="navbar-nav">
                    <a class="nav-link" href="<?php echo e(url('employees')); ?>">
                        <i class="las la-users-cog"></i>
                        <span>Employees</span>
                    </a>
                </li>

                <li class="nav-item" id="navbar-nav">
                    <a class="nav-link" href="<?php echo e(url('transaction')); ?>">
                        <i class="las la-shopping-cart"></i>
                        <span><?php echo app('translator')->get('translation.transactions'); ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div><?php /**PATH D:\laragon\www\saas\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>