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
            <div class="card-body border-top border-top-dashed p-4">
                <div>
                    <h6 class="text-muted text-uppercase fw-semibold mb-4">Customer Reviews</h6>
                    <div>
                        <div>
                            <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="fs-16 align-middle text-warning">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-half-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h6 class="mb-0">4.5 out of 5</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-muted">Total <span class="fw-medium">5.50k</span>
                                    reviews</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="row align-items-center g-2">
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0">5 star</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-1">
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0 text-muted">2758</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center g-2">
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0">4 star</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-1">
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0 text-muted">1063</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center g-2">
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0">3 star</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-1">
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0 text-muted">997</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center g-2">
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0">2 star</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-1">
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0 text-muted">227</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center g-2">
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0">1 star</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-1">
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-1">
                                        <h6 class="mb-0 text-muted">408</h6>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
            <div class="card-body p-4 border-top border-top-dashed">
                <h6 class="text-muted text-uppercase fw-semibold mb-4">Products Reviews</h6>
                <!-- Swiper -->
                <div class="swiper vertical-swiper" style="height: 248px;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card border border-dashed shadow-none">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="<?php echo e(URL::asset('assets/images/companies/img-1.png')); ?>" alt="" height="30">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div>
                                                <p class="text-muted mb-1 fst-italic">" Great
                                                    product and looks great, lots of features. "</p>
                                                <div class="fs-11 align-middle text-warning">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="text-end mb-0 text-muted">
                                                - by <cite title="Source Title">Force
                                                    Medicines</cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border border-dashed shadow-none">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" alt="" class="avatar-sm rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div>
                                                <p class="text-muted mb-1 fst-italic">" Amazing
                                                    template, very easy to understand and
                                                    manipulate. "</p>
                                                <div class="fs-11 align-middle text-warning">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </div>
                                            </div>
                                            <div class="text-end mb-0 text-muted">
                                                - by <cite title="Source Title">Henry Baird</cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border border-dashed shadow-none">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="<?php echo e(URL::asset('assets/images/companies/img-8.png')); ?>" alt="" height="30">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div>
                                                <p class="text-muted mb-1 fst-italic">"Very
                                                    beautiful product and Very helpful customer
                                                    service."</p>
                                                <div class="fs-11 align-middle text-warning">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                    <i class="ri-star-line"></i>
                                                </div>
                                            </div>
                                            <div class="text-end mb-0 text-muted">
                                                - by <cite title="Source Title">Zoetic
                                                    Fashion</cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border border-dashed shadow-none">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-2.jpg')); ?>" alt="" class="avatar-sm rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div>
                                                <p class="text-muted mb-1 fst-italic">" The product
                                                    is very beautiful. I like it. "</p>
                                                <div class="fs-11 align-middle text-warning">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </div>
                                            </div>
                                            <div class="text-end mb-0 text-muted">
                                                - by <cite title="Source Title">Nancy Martino</cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="javascript:void(0)" class="link-primary">View All Reviews <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                </div>
            </div>
            <div class="card-body p-4 border-top border-top-dashed">
                <h6 class="text-muted text-uppercase fw-semibold mb-4">Contact Support</h6>
                <form action="#">
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Enter your messages..."></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"><i class="ri-mail-send-line align-bottom me-1"></i> Send
                            Messages</button>
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
                                    <a href="<?php echo e(url('products/'.$data->id)); ?>">
                                        <img src="<?php echo e(url($data->galleries[0]->photo_url)); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('products/'.$data->id)); ?>" class="fw-medium link-primary"><?php echo e($data->title); ?></a>
                                    <br>
                                    <small>Category: <?php echo e($data->category->name); ?></small>
                                </td>
                                <td><?php echo e($data->stock); ?></td>
                                <td><?php echo e("Rp" . number_format($data->price, 2, ",", ".")); ?></td>
                                <?php
                                $orders = 0;

                                // foreach ($orderdetails as $orderdetail) {
                                //     $orders += $orderdetail->quantity;
                                // }
                                ?>
                                <td><?php echo e($orders); ?> (belum dibenerin)</td>
                                <td>
                                    <div class="fw-normal badge bg-light text-dark fs-6">
                                        <i class="lab las la-star text-warning"></i>
                                        <?php echo e('belum diperbarui'); ?>

                                    </div>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/user/seller-details.blade.php ENDPATH**/ ?>