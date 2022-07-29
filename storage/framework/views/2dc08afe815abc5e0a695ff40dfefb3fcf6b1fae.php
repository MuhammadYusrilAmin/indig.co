<header id="page-topbar" style="background-color: #350e5f;">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <?php if(Auth::user()->role == 'Super Admin'): ?>
                    <a href="<?php echo e(url('#')); ?>" class="logo logo-light">
                        <h1 style="color: white;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <a href="<?php echo e(url('#')); ?>" class="logo logo-dark">
                        <h1 style="color: black;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(url('/')); ?>" class="logo logo-light">
                        <h1 style="color: white;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                        <h1 style="color: black;" class="mt-3">INDIG.CO</h1>
                    </a>
                    <?php endif; ?>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <?php if(Auth::user()->role != 'Super Admin'): ?>
                <form class="app-search d-none d-md-block" action="<?php echo e(route('search.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" name="search">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
                <?php endif; ?>
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
                            <img class="rounded-circle header-profile-user" src="<?php if(Auth::user()->avatar != ''): ?><?php echo e(URL::asset('assets/images/users/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?><?php endif; ?>" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                    <?php echo e(Auth::user()->name); ?>

                                    <?php if(count($carts->where('user_id', Auth::user()->id))+count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) != 0): ?>
                                    <span class="badge bg-primary align-middle ms-1"><?php echo e(count($carts->where('user_id', Auth::user()->id))+count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups'))); ?></span>
                                    <?php endif; ?>
                                </span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo e(Auth::user()->role); ?></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome <?php echo e(Auth::user()->name); ?>!</h6>
                        <a class="dropdown-item" href="<?php echo e(url('profile')); ?>"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="<?php echo e(url('chat')); ?>"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span>
                            <!-- <span class="badge bg-primary align-middle ms-1">10</span> -->
                        </a>
                        <?php if(Auth::user()->role != 'Super Admin'): ?>
                        <a class="dropdown-item" href="<?php echo e(url('cart')); ?>"><i class="las la-shopping-cart text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Shopping Cart</b></span>
                            <?php if(count($carts->where('user_id', Auth::user()->id)) != 0): ?>
                            <span class="badge bg-primary align-middle ms-1"><?php echo e(count($carts->where('user_id', Auth::user()->id))); ?></span>
                            <?php endif; ?>
                        </a>
                        <a class="dropdown-item" href="<?php echo e(url('orders')); ?>"><i class="las la-history text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Transaction History</b> </span>
                            <?php if(count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups')) != 0): ?>
                            <span class="badge bg-primary align-middle ms-1"><?php echo e(count($history->where('user_id', Auth::user()->id)->where('status', 'Pickups'))); ?></span>
                            <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(url('faqs')); ?>"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout"><?php echo app('translator')->get('translation.logout'); ?></span></a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><?php /**PATH D:\KMIPN PROJECT\indigco7\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>