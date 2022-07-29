
<?php $__env->startSection('title'); ?> Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card mb-5">
    <div class="card-body">
        <div class="live-preview">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="<?php echo e(URL::asset('assets//images/small/img-14.png')); ?>" class="d-block w-100" alt="First slide" />
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="<?php echo e(URL::asset('assets/images/small/img-13.png')); ?>" class="d-block w-100" alt="two slide" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="d-none code-view">
            <pre class="language-markup" style="height: 375px;">
<code>&lt;!-- Individual Slide --&gt;
&lt;div id=&quot;carouselExampleInterval&quot; class=&quot;carousel slide&quot; data-bs-ride=&quot;carousel&quot;&gt;
&lt;div class=&quot;carousel-inner&quot;&gt;
&lt;div class=&quot;carousel-item active&quot; data-bs-interval=&quot;10000&quot;&gt;
&lt;img src=&quot;...&quot; class=&quot;d-block w-100&quot; alt=&quot;...&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;carousel-item&quot; data-bs-interval=&quot;2000&quot;&gt;
&lt;img src=&quot;...&quot; class=&quot;d-block w-100&quot; alt=&quot;...&quot;&gt;
&lt;/div&gt;
&lt;div class=&quot;carousel-item&quot;&gt;
&lt;img src=&quot;...&quot; class=&quot;d-block w-100&quot; alt=&quot;...&quot;&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;button class=&quot;carousel-control-prev&quot; type=&quot;button&quot; data-bs-target=&quot;#carouselExampleInterval&quot; data-bs-slide=&quot;prev&quot;&gt;
&lt;span class=&quot;carousel-control-prev-icon&quot; aria-hidden=&quot;true&quot;&gt;&lt;/span&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Previous&lt;/span&gt;
&lt;/button&gt;
&lt;button class=&quot;carousel-control-next&quot; type=&quot;button&quot; data-bs-target=&quot;#carouselExampleInterval&quot; data-bs-slide=&quot;next&quot;&gt;
&lt;span class=&quot;carousel-control-next-icon&quot; aria-hidden=&quot;true&quot;&gt;&lt;/span&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Next&lt;/span&gt;
&lt;/button&gt;
&lt;/div&gt;</code></pre>
        </div>
    </div><!-- end card-body -->
</div><!-- end card -->

<h1 class="card-title mt-5 mb-4">Produk Terpopuler</h1>
<div class="row row-cols-1 row-cols-md-5 g-4 mb-5 pb-4">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col">
        <div class="card" style="height: 350px;">
            <img class="card-img-top img-fluid" src="<?php echo e($product->galleries[0]->photo_url); ?>" alt="Card image cap" style="height: 200px !important; object-fit: cover;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e($product->title); ?></h4>
            </div>
            <div class="card-footer">
                <a href="<?php echo e(url('detail_products?id='.$product->id)); ?>" class="card-link link-secondary">Lihat <i class="ri-arrow-right-s-line align-middle"></i>
                </a>
                <button onclick="event.preventDefault(); document.getElementById('input-cart_<?php echo e($product->id); ?>').submit();" class="btn btn-transparent card-link link-success">Masukkan ke Keranjang <i class="las la-shopping-cart align-middle"></i>
                </button>

                <form action="<?php echo e(route('cart.store')); ?>" id="input-cart_<?php echo e($product->id); ?>" method="POST" style="display: none;">
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="cities_id" value="<?php echo e($product->cooperative->cities_id); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<h1 class="card-title mt-5">Semua Koperasi</h1>
<div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
    <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-3 col-lg-6">
        <div class="card ribbon-box right overflow-hidden">
            <div class="card-body text-center p-4">
                <!-- <div class="ribbon ribbon-info ribbon-shape trending-ribbon"><i class="ri-flashlight-fill text-white align-bottom"></i> <span class="trending-ribbon-text">Trending</span></div> -->

                <img src="<?php echo e(URL::asset('assets/images/companies/'.$coop->avatar)); ?>" alt="" height="45">
                <h5 class="mb-1 mt-4"><a href="<?php echo e(url('seller-details')); ?>" class="link-primary"><?php echo e($coop->name); ?></a></h5>
                <p class="text-muted mb-4"><?php echo e($coop->owner_name); ?></p>
                <div class="row justify-content-center">
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <h5><?php echo e(count($coop->productcoops->where('cooperative_id', $coop->id))); ?></h5>
                        <span class="text-muted">Products</span>
                    </div>
                    <div class="col-lg-6 border-end-dashed border-end">
                        <h5>
                            <?php
                            $totalstock = 0;
                            foreach ($coop->productcoops as $product) {
                                if ($product->cooperative_id = $coop->id) {
                                    $totalstock += $product->stock;
                                }
                            }
                            ?>
                            <?php echo e($totalstock); ?>

                        </h5>
                        <span class="text-muted">Item Stock</span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="<?php echo e(url('sellers/'.$coop->id)); ?>" class="btn btn-light w-100">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!--end row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/swiper/swiper.min.js"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/sellers.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco7\resources\views/user/index.blade.php ENDPATH**/ ?>