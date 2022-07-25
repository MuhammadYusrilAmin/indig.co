<?php $__env->startSection('title'); ?> Profile <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="<?php echo e(URL::asset('assets/images/profile-bg.jpg')); ?>" class="profile-wid-img" alt="">
    </div>
</div>

<div class="row">
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="<?php echo e(URL::asset('assets/images/users/'.Auth::user()->avatar)); ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1"><?php echo e(Auth::user()->name); ?></h5>
                    <p class="text-muted mb-0"><?php echo e(Auth::user()->role); ?></p>
                </div>
            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Profile Info</h5>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="ps-0" scope="row">Full Name :</th>
                                <td class="text-muted"><?php echo e(Auth::user()->name); ?></td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">E-mail :</th>
                                <td class="text-muted"><?php echo e(Auth::user()->email); ?></td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">Joining Date</th>
                                <td class="text-muted"><?php echo e(Auth::user()->created_at); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                            <i class="fas fa-home"></i>
                            Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="fullnameInput" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullnameInput" placeholder="Enter your full name" value="<?php echo e(Auth::user()->name); ?>" name="name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email
                                            Address</label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter your email" value="<?php echo e(Auth::user()->email); ?>" name="email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="JoiningdatInput" class="form-label">Joining Date</label>
                                        <input type="text" class="form-control" data-provider="flatpickr" id="JoiningdatInput" data-date-format="d M, Y" data-deafult-date="24 Nov, 2021" value="<?php echo e(Auth::user()->created_at); ?>" disabled />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="<?php echo e(url('change-password', Auth::user()->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                        <input type="password" class="form-control" id="oldpasswordInput" placeholder="Enter current password" name="oldpassword">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">New Password*</label>
                                        <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password" name="newpassword">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                        <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password" name="confirmpassword">
                                    </div>
                                </div>
                                <!--end col-->
                                <!-- <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                    </div>
                                </div> -->
                                <!--end col-->
                                <div class="col-lg-12 mt-3">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/js/pages/profile-setting.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/profile/index.blade.php ENDPATH**/ ?>