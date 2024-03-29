
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.search-results'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/glightbox/glightbox.min.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Pages <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Search Results <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-6">
                        <div class="row g-2">
                            <div class="col">
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Search here.." value="Admin Dashboard">
                                    <a class="btn btn-link link-success btn-lg position-absolute end-0 top-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="ri-mic-fill"></i></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light"><i class="mdi mdi-magnify me-1"></i> Search</button>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <h5 class="fs-16 fw-semibold text-center mb-0">Showing results for "<span class="text-primary fw-medium fst-italic">Admin Dashboard</span> "</h5>
                    </div>
                </div>
                <!--end row-->

                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-body">
                        <button type="button" class="btn-close text-reset float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                            <div class="search-voice">
                                <i class="ri-mic-fill align-middle"></i>
                                <span class="voice-wave"></span>
                                <span class="voice-wave"></span>
                                <span class="voice-wave"></span>
                            </div>
                            <h4>Talk to me, what can I do for you?</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab" aria-selected="false">
                            <i class="ri-search-2-line text-muted align-bottom me-1"></i> All Results
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" id="products-tab" href="#products" role="tab" aria-selected="true">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#cooperatives" role="tab" aria-selected="false">
                            Cooperatives
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="all" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper images-menu mb-3">
                                    <div class="swiper-wrapper">
                                        <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                <div class="flex-shrink-0">
                                                    <img src="<?php echo e(URL::asset($data->avatar)); ?>" alt="" width="60" class="rounded" />
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <a href="<?php echo e(url('sellers/'.$data->id)); ?>" class="stretched-link fw-medium"><?php echo e($data->name); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-light">
                            <div class="row">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a href="<?php echo e(url('products/'.$data->id)); ?>">
                                                <?php $galleries = App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                                <img class="gallery-img img-fluid mx-auto" src="<?php echo e(URL::asset('assets/images/small/img-1.jpg')); ?>" alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption"><?php echo e($data->title); ?>

                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted">by <a href="" class="text-body text-truncate"><?php echo e($data->cooperative->name); ?></a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <?php
                                                        $orders = App\Models\OrderDetail::where('product_id', $data->id)->get();

                                                        $totalpurchased = 0;
                                                        foreach ($orders as $result) {
                                                            $totalpurchased += $result->quantity;
                                                        }
                                                        ?>
                                                        <span><?php echo e($totalpurchased); ?>x purchased</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <div class="tab-pane" id="products" role="tabpanel">
                        <div class="gallery-light">
                            <div class="row">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a href="#">
                                                <img class="gallery-img img-fluid mx-auto" src="<?php echo e(URL::asset('assets/images/small/img-1.jpg')); ?>" alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Glasses and laptop from above</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted">by <a href="" class="text-body text-truncate">Ron Mackie</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 2.2K
                                                        </button>
                                                        <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i> 1.3K
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="cooperatives" role="tabpanel">
                        <div class="row">
                            <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-sm-flex">
                                            <div class="flex-shrink-0">
                                                <img src="<?php echo e(URL::asset($data->avatar)); ?>" alt="" width="80" class="rounded-1" />
                                            </div>
                                            <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                <ul class="list-inline mb-2">
                                                    <li class="list-inline-item"><span class="badge badge-soft-success fs-11"><?php echo e($data->location); ?></span></li>
                                                </ul>
                                                <h5 class="fs-15"><a href="<?php echo e('sellers/'.$data->id); ?>"><?php echo e($data->name); ?></a></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><i class="lab la-product-hunt text-success align-middle me-1"></i> <?php echo e('2 products'); ?></li>
                                                    <li class="list-inline-item"><i class="ri-calendar-2-fill text-success align-middle me-1"></i> Since <?php echo e($data->since_year); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!--end row-->

                        <div class="mt-4">
                            <ul class="pagination pagination-separated justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a href="javascript:void(0);" class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card -->
    </div>
    <!--end card -->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/glightbox/glightbox.min.js')); ?>"></script>

<!-- swiper js -->
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>

<!-- search-result init js -->
<script src="<?php echo e(URL::asset('assets/js/pages/search-result.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco5\resources\views/pages-search-results.blade.php ENDPATH**/ ?>