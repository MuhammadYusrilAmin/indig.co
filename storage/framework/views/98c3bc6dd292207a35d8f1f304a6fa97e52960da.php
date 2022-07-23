
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

<h1 class="card-title mt-5 mb-4">Popular Products</h1>
<div class="row row-cols-1 row-cols-md-5 g-4 mb-5 pb-4">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col">
        <div class="card" style="height: 350px;">
            <img class="card-img-top img-fluid" src="<?php echo e($product->galleries[0]->photo_url); ?>" alt="Card image cap" style="height: 100% !important; object-fit: cover;">
            <div class="card-body">
                <h4 class="card-title mb-2"><?php echo e($product->title); ?></h4>
            </div>
            <div class="card-footer"><a href="<?php echo e(url('detail_products?id='.$product->id)); ?>" class="btn btn-transparent card-link link-secondary">See More <i class="ri-arrow-right-s-line ms-1 align-middle lh-1"></i></a>
                <button onclick="event.preventDefault(); document.getElementById('input-cart_<?php echo e($product->id); ?>').submit();" class="btn btn-transparent card-link link-success">Add to Cart <i class="las la-shopping-cart align-middle ms-1 lh-1"></i></button>

                <form action="<?php echo e(route('cart.store')); ?>" id="input-cart_<?php echo e($product->id); ?>" method="POST" style="display: none;">
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Recommended Cooperative <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="card">
    <div class="card-header border-0 rounded">
        <div class="row g-2">
            <div class="col-xl-3">
                <div class="search-box">
                    <input type="text" class="form-control search" placeholder="Search for cooperative..."> <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <!--end col-->
            <div class="col-xl-2 ms-auto">
                <div>
                    <select class="form-control" data-choices data-choices-search-false>
                        <option value="">Select Categories</option>
                        <option value="All">All</option>
                        <option value="Retailer">Retailer</option>
                        <option value="Health & Medicine">Health & Medicine</option>
                        <option value="Manufacturer">Manufacturer</option>
                        <option value="Food Service">Food Service</option>
                        <option value="Computers & Electronics">Computers & Electronics</option>
                    </select>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-auto">
                <div class="hstack gap-2">
                    <button type="button" class="btn btn-danger"><i class="ri-equalizer-fill me-1 align-bottom"></i> Filters</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSeller"><i class="ri-add-fill me-1 align-bottom"></i> Add Seller</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>

<div class="row mt-4">
    <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-3 col-lg-6">
        <div class="card ribbon-box right overflow-hidden">
            <div class="card-body text-center p-4">
                <!-- <div class="ribbon ribbon-info ribbon-shape trending-ribbon"><i class="ri-flashlight-fill text-white align-bottom"></i> <span class="trending-ribbon-text">Trending</span></div> -->

                <img src="<?php echo e($coop->avatar); ?>" alt="" height="45">
                <h5 class="mb-1 mt-4"><a href="<?php echo e(url('seller-details')); ?>" class="link-primary"><?php echo e($coop->name); ?></a></h5>
                <p class="text-muted mb-4"><?php echo e($coop->owner_name); ?></p>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div id="chart-seller1" data-colors='["--vz-info"]'></div>
                    </div>
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

<div class="row g-0 text-center text-sm-start align-items-center mb-3">
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0">Showing 1 to 8 of 12 entries</p>
        </div>
    </div> <!-- end col -->
    <div class="col-sm-6">
        <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
            <li class="page-item disabled"> <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a> </li>
            <li class="page-item active"> <a href="#" class="page-link">1</a> </li>
            <li class="page-item "> <a href="#" class="page-link">2</a> </li>
            <li class="page-item"> <a href="#" class="page-link">3</a> </li>
            <li class="page-item"> <a href="#" class="page-link">4</a> </li>
            <li class="page-item"> <a href="#" class="page-link">5</a> </li>
            <li class="page-item"> <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a> </li>
        </ul>
    </div><!-- end col -->
</div><!-- end row -->

<!-- Modal -->
<div class="modal fade zoomIn" id="addSeller" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerLabel">Add Seller</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content border-0 mt-3">
                <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                            Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab" aria-selected="false">
                            Business Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab" aria-selected="false">
                            Bank Details
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Enter your lastname">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="contactnumberInput" class="form-label">Contact Number</label>
                                        <input type="number" class="form-control" id="contactnumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phonenumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailidInput" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailidInput" placeholder="Enter your email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="birthdayidInput" class="form-label">Date of Birth</label>
                                        <input type="text" id="birthdayidInput" class="form-control" data-provider="flatpickr" placeholder="Enter your date of birth">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="cityidInput" class="form-label">City</label>
                                        <input type="text" class="form-control" id="cityidInput" placeholder="Enter your city">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="countryidInput" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="countryidInput" placeholder="Enter your country">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="zipcodeidInput" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="zipcodeidInput" placeholder="Enter your zipcode">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="tab-pane" id="businessDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="companynameInput" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="companynameInput" placeholder="Enter your company name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Company Type</label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                            <option value="">Select type</option>
                                            <option value="All" selected>All</option>
                                            <option value="Merchandising">Merchandising</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="Partnership">Partnership</option>
                                            <option value="Corporation">Corporation</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pancardInput" class="form-label">Pan Card Number</label>
                                        <input type="text" class="form-control" id="pancardInput" placeholder="Enter your pan-card number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="websiteInput" class="form-label">Website</label>
                                        <input type="url" class="form-control" id="websiteInput" placeholder="Enter your URL">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="faxInput" class="form-label">Fax</label>
                                        <input type="text" class="form-control" id="faxInput" placeholder="Enter your fax">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="companyemailInput" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="companyemailInput" placeholder="Enter your email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="worknumberInput" class="form-label">Number</label>
                                        <input type="number" class="form-control" id="worknumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="companylogoInput" class="form-label">Company Logo</label>
                                        <input type="file" class="form-control" id="companylogoInput">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="tab-pane" id="bankDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="banknameInput" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="banknameInput" placeholder="Enter your bank name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="branchInput" class="form-label">Branch</label>
                                        <input type="text" class="form-control" id="branchInput" placeholder="Branch">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="accountnameInput" class="form-label">Account Holder Name</label>
                                        <input type="text" class="form-control" id="accountnameInput" placeholder="Enter account holder name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="accountnumberInput" class="form-label">Account Number</label>
                                        <input type="number" class="form-control" id="accountnumberInput" placeholder="Enter account number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ifscInput" class="form-label">IFSC</label>
                                        <input type="number" class="form-control" id="ifscInput" placeholder="IFSC">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/swiper/swiper.min.js"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/sellers.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco 2\resources\views/user/index.blade.php ENDPATH**/ ?>