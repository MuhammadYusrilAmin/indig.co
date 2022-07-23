
<?php $__env->startSection('title'); ?> Dashboard Admin <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i class="las la-info-circle"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Cooperative Has Not Been Verified</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825"><?php echo e(count($notverified)); ?></span></h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i class="las la-check-square"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-uppercase fw-medium text-muted mb-3">Cooperative Verified</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522"><?php echo e(count($verified)); ?></span></h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i class="las la-window-close"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Cooperative Rejected</p>
                                <div class="d-flex align-items-center mb-3">
                                    <?php $rejected = App\Models\Cooperative::where('status', 'rejected')->get(); ?>
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522"><?php echo e(count($rejected)); ?></span></h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- NOT VERIFIED -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row g-4">
                    <div class="col-sm-auto">
                        <div>
                            <h4 class="card-title mb-0 mt-2">Cooperative Verification Now</h4>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">No</th>
                                    <th class="sort" data-sort="nik">NIK</th>
                                    <th class="sort" data-sort="owner_name">Owner Name</th>
                                    <th class="sort" data-sort="company_name">Company Name</th>
                                    <th class="sort" data-sort="website">Website</th>
                                    <th class="sort" data-sort="location">Location</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $notverified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo e($i++); ?>

                                    </th>
                                    <td class="nik"><?php echo e($data->nik); ?></td>
                                    <td class="owner_name"><?php echo e($data->owner_name); ?></td>
                                    <td class="company_name"><?php echo e($data->company_name); ?></td>
                                    <?php $url = $data->website ?>
                                    <td class="website"><a target="_blank" href="<?php echo e('https://'.$url); ?>"><?php echo e($url); ?></a></td>
                                    <td class="location"><?php echo e($data->location); ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#myModal<?php echo e($data->id); ?>">Verification</button>
                                            </div>
                                            <div class="remove">
                                                <a class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal<?php echo e($data->id); ?>">
                                                    Reject
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Verification Modal -->
                                <div id="myModal<?php echo e($data->id); ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel<?php echo e($data->id); ?>" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel<?php echo e($data->id); ?>">Please check the data suitability</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="ri-checkbox-circle-fill text-success"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <p class="text-muted mb-0">Silahkan cek legalitas koperasi pada website <a href="http://nik.depkop.go.id/" target="_blank">cek legalitas</a> berdasarkan informasi:
                                                            <br>
                                                            1. Provinsi : <?php echo e($data->province->name); ?>

                                                            <br>
                                                            2. Kabupaten : <?php echo e($data->city->type.' '.$data->city->name); ?>

                                                            <br>
                                                            3. Nama Koperasi : <?php echo e($data->company_name); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                <form action="<?php echo e(route('dashboard-admin.update', $data->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <button type="submit" class="btn btn-primary">Suitable</button>
                                                </form>
                                            </div>

                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!-- Rejected Modal -->
                                <div class="modal fade zoomIn" id="deleteRecordModal<?php echo e($data->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-2 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:100px;height:100px"></lord-icon>
                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                        <h4>Are you sure ?</h4>
                                                        <p class="text-muted mx-4 mb-0">Are you sure you want to reject this record ?</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                    <form action="<?php echo e(url('reject-cooperative', $data->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Reject It!</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>

<div class="row">
    <!-- VERIFIED -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Verified</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="users">
                    <div class="row mb-2">
                        <div class="col">
                            <div>
                                <input class="search form-control" placeholder="Search" />
                            </div>
                        </div>
                    </div>

                    <div data-simplebar style="height: 242px;" class="mx-n3">
                        <ul class="list list-group list-group-flush mb-0">
                            <?php $__currentLoopData = $verified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item" data-id="1">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-1"><?php echo e($data->company_name); ?></h5>
                                        <p class="born timestamp text-muted mb-0" data-timestamp="12345"><?php echo e($data->updated_at); ?></p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <img class="image avatar-xs rounded-circle" alt="" src="<?php echo e(url($data->avatar)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <!-- end ul list -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <!-- REJECTED -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Rejected</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="users">
                    <div class="row mb-2">
                        <div class="col">
                            <div>
                                <input class="search form-control" placeholder="Search" />
                            </div>
                        </div>
                    </div>

                    <div data-simplebar style="height: 242px;" class="mx-n3">
                        <ul class="list list-group list-group-flush mb-0">
                            <?php $rejected = App\Models\Cooperative::where('status', 'rejected')->get(); ?>
                            <?php $__currentLoopData = $rejected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item" data-id="1">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-1"><?php echo e($data->company_name); ?></h5>
                                        <p class="born timestamp text-muted mb-0" data-timestamp="12345"><?php echo e($data->updated_at); ?></p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <img class="image avatar-xs rounded-circle" alt="" src="<?php echo e(url($data->avatar)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <!-- end ul list -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<!-- JAVASCRIPT -->
<script src="<?php echo e(URL::asset('/assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/node-waves/node-waves.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/feather-icons/feather-icons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/plugins/lord-icon-2.1.0.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/prismjs/prismjs.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/list.js/list.js.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>

<!-- listjs init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/listjs.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/super-admin/index.blade.php ENDPATH**/ ?>