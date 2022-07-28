
<?php $__env->startSection('title'); ?> Product Detail <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Product Detail <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $id = $showDetail->id; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5">
                    <div class="col-xl-4 col-md-8 mx-auto">
                        <div class="product-img-slider sticky-side-div">
                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                <div class="swiper-wrapper">
                                    <?php
                                    $kategory = \App\Models\ProductGallery::where('product_id', $showDetail->id)->orderBy('created_at', 'desc')->get(); ?>
                                    <?php $__currentLoopData = $kategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e($value->photo_url); ?>" alt="" class="img-fluid d-block" />
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <!-- end swiper thumbnail slide -->
                            <div class="swiper product-nav-slider mt-2">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $kategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <div class="nav-slide-item ">
                                            <img src="<?php echo e($value->photo_url); ?>" alt="" class="img-fluid d-block" />
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- end swiper nav slide -->
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4><?php echo e($showDetail->title); ?></h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div><a href="#" class="text-primary d-block">Tommy
                                                Hilfiger</a></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic Fashion</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Published : <span class="text-body fw-medium"><?php echo e($showDetail->tanggal); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <?php $url = Illuminate\Support\Facades\Request::segment(1); ?>
                                        <?php $favorit = \App\Models\Wishlist::whereRaw('product_id = ' . $showDetail->id . ' AND user_id = ' . Illuminate\Support\Facades\Auth::user()->id)->first(); ?>
                                        <?php if($showDetail->cooperative_id != Auth::user()->cooperative_id): ?>
                                        <?php if($favorit != null): ?>
                                        <form action="<?php echo e(route('whistlist.destroy', $favorit->id)); ?>" method="post" class="d-flex justify-content-center">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($showDetail->id); ?>">
                                            <input type="hidden" name="url" value="<?php echo e($url); ?>">
                                            <button type="submit" class="card-link link-danger btn btn-transparent">Remove Wishlist<i class="bx bx bx-heart align-middle ms-1 lh-1"></i></button>
                                        </form>
                                        <?php else: ?>
                                        <form action="<?php echo e(route('whistlist.store')); ?>" method="post" class="d-flex justify-content-center">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($showDetail->id); ?>">
                                            <input type="hidden" name="url" value="<?php echo e($url); ?>">
                                            <button type="submit" class="card-link link-success btn btn-transparent">Add to Wishlist<i class="bx bx bx-heart align-middle ms-1 lh-1"></i></button>
                                        </form>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                <div class="text-muted fs-16">
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                </div>
                                <div class="text-muted">( 5.50k Customer Review )</div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-primary fs-24">
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Price :</p>
                                                <h5 class="mb-0"><?php echo e("Rp " . number_format($showDetail->price , 2, ",", ".")); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-primary fs-24">
                                                    <i class="ri-file-copy-2-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">No. of Orders :</p>
                                                <h5 class="mb-0">2,234</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-primary fs-24">
                                                    <i class="ri-stack-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Available Stocks :</p>
                                                <h5 class="mb-0"><?php echo e($showDetail->stock); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <?php if($showDetail->cooperative_id != Auth::user()->cooperative_id): ?>
                            <div class=" mt-4">
                                <form action="<?php echo e(route('orderDetail.store')); ?>" id="input-cart2" method="post">
                                    <?php echo csrf_field(); ?>
                                    <h5 class="fs-14">Request :</h5>
                                    <input type="text" class="form-control" id="request" name="request2" placeholder="Enter request (size, color, etc)">
                            </div>
                            <?php endif; ?>

                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">Description :</h5>
                                <p><?php echo e($showDetail->description); ?></p>
                            </div>
                            <?php if($showDetail->cooperative_id != Auth::user()->cooperative_id): ?>
                            <div class="mt-4 text-muted">
                                <input type="hidden" name="id" value="<?php echo e($showDetail->id); ?>">
                                <input type="hidden" name="cities_id" value="<?php echo e($showDetail->cooperative->cities_id); ?>">
                                <input type="hidden" id="price3" name="price" value="<?php echo e($showDetail->price); ?>">
                                <div class="input-step">
                                    <?php if($showDetail->stock != 0): ?>
                                    <button type="button" id="minus">–</button>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="100">
                                    <button type="button" id="plus">+</button>
                                    <?php else: ?>
                                    <button disabled type="button" id="minus">–</button>
                                    <input readonly type="number" value="1" min="1" name="quantity" max="100" id="quantity">
                                    <button disabled type="button" id="plus">+</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4 text-muted">
                                <?php if($showDetail->stock != 0): ?>
                                <button onclick="InputCart2()" class="btn btn-success">Buy Now</button>
                                </form>
                                <?php else: ?>
                                <button disabled class="btn btn-success">Buy Now</button>
                                <?php endif; ?>
                                <?php if($showDetail->stock != 0): ?>
                                <button onclick="InputCart()" class="btn btn-primary">Add to Cart</button>
                                <?php else: ?>
                                <button disabled class="btn btn-primary">Add to Cart</button>
                                <?php endif; ?>
                                <form action="<?php echo e(route('cart.store')); ?>" id="input-cart" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($showDetail->id); ?>">
                                    <input type="hidden" name="cities_id" value="<?php echo e($showDetail->cooperative->cities_id); ?>">
                                    <input type="hidden" id="price2" name="price" value="<?php echo e($showDetail->price); ?>">
                                    <input type="hidden" name="request2" id="request2" value="">
                                    <input type="hidden" name="quantity" id="demo2" value="1" required>
                                </form>
                            </div>
                            <?php endif; ?>

                            <div class="product-content mt-5">
                                <h5 class="fs-14 mb-3">Product Description :</h5>
                                <nav>
                                    <ul class="nav nav-tabs nav-tabs-custom nav-primary" id="nav-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Specification</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;">
                                                            Category</th>
                                                        <?php $kategory = \App\Models\ProductCategory::where('id', $showDetail->category_id)->first(); ?>
                                                        <td><?php echo e($kategory->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Brand</th>
                                                        <td>Tommy Hilfiger</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Color</th>
                                                        <td>Blue</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Material</th>
                                                        <td>Cotton</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Weight</th>
                                                        <td><?php echo e($showDetail->weight); ?> Gram</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                        <div>
                                            <h5 class="font-size-16 mb-3">Tommy Hilfiger Sweatshirt for Men (Pink)</h5>
                                            <p>Tommy Hilfiger men striped pink sweatshirt. Crafted
                                                with cotton. Material composition is 100% organic
                                                cotton. This is one of the world’s leading designer
                                                lifestyle brands and is internationally recognized
                                                for celebrating the essence of classic American cool
                                                style, featuring preppy with a twist designs.</p>
                                            <div>
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>Machine Wash</p>
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>Fit Type: Regular</p>
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>100% Cotton</p>
                                                <p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>Long sleeve</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product-content -->

                            <div class="mt-5">
                                <div>
                                    <h5 class="fs-14 mb-3">Ratings & Reviews</h5>
                                </div>
                                <div class="row gy-4 gx-0">
                                    <div class="col-lg-4">
                                        <div>
                                            <div class="pb-3">
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
                                                    <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">5 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">2758</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">4 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 19.32%" aria-valuenow="19.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">1063</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">3 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">997</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">2 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">408</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row align-items-center g-2">
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0">1 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="p-2">
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="p-2">
                                                            <h6 class="mb-0 text-muted">274</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-8">
                                        <div class="ps-lg-4">
                                            <div class="d-flex flex-wrap align-items-start gap-3">
                                                <h5 class="fs-14">Reviews: </h5>
                                            </div>

                                            <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                <ul class="list-unstyled mb-0">
                                                    <?php for($i = 0; $i < 5; $i++): ?> <li class="py-2">
                                                        <div class="border border-dashed rounded p-3">
                                                            <div class="d-flex align-items-start mb-3">
                                                                <div class="hstack gap-3">
                                                                    <div class="badge rounded-pill bg-primary mb-0">
                                                                        <i class="mdi mdi-star"></i>
                                                                        4.0
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                    <div class="flex-grow-1">
                                                                        <p class="text-muted mb-0">
                                                                            Great at this price,
                                                                            Product quality and look
                                                                            is awesome.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-end">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-0">Nancy
                                                                    </h5>
                                                                </div>

                                                                <div class="flex-shrink-0">
                                                                    <p class="text-muted fs-13 mb-0">
                                                                        06 Jul, 21</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <?php endfor; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end Ratings & Reviews -->
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="assets/libs/swiper/swiper.min.js"></script>
<script>
    function InputCart() {
        event.preventDefault();
        let weight = $('#quantity').val();
        let request = $('#request').val();
        if (weight == '' || weight == 0) {
            alert('Input jumlah pembelian dengan benar')
        } else {
            $('#request2').val(request);
            $('#demo2').val(weight);
            $('#price2').val(<?= $showDetail->price ?> * weight);
            $('#input-cart').submit();
        }

    }

    function InputCart2() {
        event.preventDefault();
        let weight = $('#quantity').val();
        let request = $('#request').val();
        if (weight == '' || weight == 0) {
            alert('Input jumlah pembelian dengan benar')
        } else {
            $('#request2').val(request);
            $('#demo2').val(weight);
            $('#price3').val(<?= $showDetail->price ?> * weight);
            $('#input-cart2').submit();
        }

    }

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#quantity').on('keyup', function() {
                let id = $('#quantity').val();
                if (id >= <?= $showDetail->stock ?>) {
                    $("#quantity").val(<?= $showDetail->stock ?>);
                } else if (id == '') {
                    $("#quantity").val();
                }
            })
        });

        $(function() {
            $('#minus').on('click', function() {
                let stok = $('#quantity').val();
                if (stok > 1) {
                    $("#quantity").val(stok -= 1);
                } else {
                    $("#quantity").val('1');
                }
            });
        });

        $(function() {
            $('#plus').on('click', function() {
                let stok = $('#quantity').val();
                let plus = parseInt(stok) + 1;
                if (stok >= <?= $showDetail->stock ?>) {
                    $("#quantity").val(<?= $showDetail->stock ?>);
                } else {
                    $("#quantity").val(plus);
                }
            });
        });

    });
</script>
<script src="assets/js/pages/ecommerce-product-details.init.js"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco5\resources\views/admin/product/detail.blade.php ENDPATH**/ ?>