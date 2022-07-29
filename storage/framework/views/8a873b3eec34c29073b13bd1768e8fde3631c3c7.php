
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.sellers-details'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/gridjs/gridjs.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Seller Details <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-body p-4">
                <div>
                    <div class="flex-shrink-0 avatar-md mx-auto">
                        <div class="avatar-title bg-light rounded">
                            <img src="<?php echo e(url($cooperative->avatar)); ?>" alt="" height="50" />
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-1"><?php echo e($cooperative->name); ?></h5>
                        <p class="text-muted">Since <?php echo e($cooperative->since_year); ?></p>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                <tr>
                                    <th><span class="fw-medium">Owner Name</span></th>
                                    <td><?php echo e($cooperative->owner_name); ?></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Company Type</span></th>
                                    <td><?php echo e($cooperative->company_name); ?></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Email</span></th>
                                    <td><?php echo e($cooperative->email); ?></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Website</span></th>
                                    <td><a href="<?php echo e($cooperative->website); ?>" class="link-primary"><?php echo e($cooperative->website); ?></a></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Contact No.</span></th>
                                    <td><?php echo e($cooperative->contact); ?></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Fax</span></th>
                                    <td><?php echo e($cooperative->fax); ?></td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Location</span></th>
                                    <td><?php echo e($cooperative->location); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-body-->
            <div class="card-body p-4 border-top border-top-dashed">
                <h6 class="text-muted text-uppercase fw-semibold mb-4">Contact Support</h6>
                <form action="#">
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Enter your messages..."></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class="ri-mail-send-line align-bottom me-1"></i> Send Messages</button>
                    </div>
                </form>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->

    <div class="col-xxl-9">

        <div class="row g-4 mb-3">
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <div class="search-box ms-2">
                        <input type="text" class="form-control" placeholder="Search Products...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive table-card mb-1">
                    <table class="table table-nowrap align-middle" id="orderTable">
                        <thead class="text-muted table-light">
                            <tr class="text-uppercase">
                                <th class="sort" data-sort="">#</th>
                                <th class="sort" data-sort="">Image</th>
                                <th class="sort" data-sort="">Product</th>
                                <th class="sort" data-sort="">Stock</th>
                                <th class="sort" data-sort="">Price</th>
                                <th class="sort" data-sort="">Orders</th>
                                <th class="sort" data-sort="">Rating</th>
                                <th class="sort" data-sort="">Published</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php $i = 1 ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td>
                                    <a href="<?php echo e(url('detail_products?id='.$data->id)); ?>">
                                        <img src="<?php echo e(url($data->galleries[0]->photo_url)); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('detail_products?id='.$data->id)); ?>" class="fw-medium link-primary"><?php echo e($data->title); ?></a>
                                    <br>
                                    <small>Category: <?php echo e($data->category->name); ?></small>
                                </td>
                                <td><?php echo e($data->stock); ?></td>
                                <td><?php echo e("Rp" . number_format($data->price, 2, ",", ".")); ?></td>
                                <?php
                                $orderdetails = App\Models\OrderDetail::where('product_id', $data->id)->get();
                                $orders = 0;

                                foreach ($orderdetails as $orderdetail) {
                                    $orders += $orderdetail->quantity;
                                }
                                ?>
                                <td><?php echo e($orders . 'x purchased'); ?></td>
                                <td>
                                    <?php
                                    $ratings = App\Models\Rating::where('product_id', $data->id)->get();
                                    $total = 0;

                                    foreach ($ratings as $rating) {
                                        $total += $rating->rating;
                                    }

                                    if (count($ratings) != null) {
                                        $rata2 = $total / count($ratings);
                                    }
                                    ?>
                                    <?php if(count($ratings) == null): ?>
                                    <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#" disabled>No Rating</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-light btn-sm">
                                        <i class="lab las la-star text-warning"></i>
                                        <?php echo e($rata2); ?>

                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($data->updated_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/nouislider/nouislider.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/wnumb/wnumb.min.js')); ?>"></script>
<script src="assets/libs/gridjs/gridjs.min.js"></script>
<script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/swiper/swiper.min.js"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco6\resources\views/user/seller-details.blade.php ENDPATH**/ ?>