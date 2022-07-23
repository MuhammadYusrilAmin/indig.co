

<?php $__env->startSection('container'); ?>
<div class="row" id="body-row">
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group" style="height: 100%; position: fixed;">
            <img src="https://visafoto.com/img/4x4-cm-passport-photo-example.jpg" width="100" height="100" class="img-fluid circle mx-auto d-block mt-2" alt="...">
            <h5 class="text-center text-dark fw-bold mt-2">Dashboard Anda</h5>
            <h6 class="text-center text-dark mb-4">Username</h6>

            <a href="<?php echo e(url('dashboard')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Dashboard') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-th-large"></i>
                    <span class="menu-collapsed">&nbsp Dashboard</span>
                </div>
            </a>

            <a href="<?php echo e(url('uji-kemampuan')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Uji Kemampuan') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-edit"></i>
                    <span class="menu-collapsed">&nbsp Uji Kemampuan</span>
                </div>
            </a>

            <a href="<?php echo e(url('modul')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Modul') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-book"></i>
                    <span class="menu-collapsed">&nbsp Modul</span>
                </div>
            </a>

            <a href="<?php echo e(url('try-out')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Try Out') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="menu-collapsed">&nbsp Try Out</span>
                </div>
            </a>

            <a href="<?php echo e(url('grafik')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Grafik') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-chart-bar"></i>
                    <span class="menu-collapsed">&nbsp Grafik</span>
                </div>
            </a>

            <a href="<?php echo e(url('record')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Record Zoom') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-dot-circle"></i>
                    <span class="menu-collapsed">&nbsp Record Zoom</span>
                </div>
            </a>

            <a href="<?php echo e(url('profile-mentor')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Profile Mentor') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-id-badge"></i>
                    <span class="menu-collapsed">&nbsp Profile Mentor</span>
                </div>
            </a>

            <a href="<?php echo e(url('jadwal')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Jadwal') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="menu-collapsed">&nbsp Jadwal</span>
                </div>
            </a>

            <hr class="my-2">

            <a href="<?php echo e(url('settings')); ?>" data-toggle="collapse" aria-expanded="false" class="px-4 flex-column align-items-start pt-custom pointer mr <?php echo e(($title == 'Settings') ? 'active-sidebar' : 'hover'); ?>">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <i class="fas fa-cog"></i>
                    <span class="menu-collapsed">&nbsp Settings</span>
                </div>
            </a>
        </ul>
    </div>

    <div class="col bg-light">
        <?php echo $__env->yieldContent('subcontainer'); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.super-admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/layouts/super-admin/sidebar.blade.php ENDPATH**/ ?>