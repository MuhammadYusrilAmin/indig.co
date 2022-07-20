<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.create-product'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Create Product <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<form action="<?php echo e(url('products/')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Product Title</label>
                        <input type="text" class="form-control <?php echo e($errors->get('title') ? 'is-invalid' : ''); ?>" id="product-title-input" placeholder="Enter product title" name="title">
                        <?php $__currentLoopData = $errors->get('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="product-price-input">Price</label>
                        <input type="number" class="form-control <?php echo e($errors->get('price') ? 'is-invalid' : ''); ?>" id="product-price-input" placeholder="Enter price" name="price">
                        <?php $__currentLoopData = $errors->get('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="product-weight-input">Weight</label>
                        <input type="number" class="form-control <?php echo e($errors->get('weight') ? 'is-invalid' : ''); ?>" id="product-weight-input" placeholder="Enter weight (gram)" name="weight">
                        <?php $__currentLoopData = $errors->get('weight'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                        <label class="form-label" for="product-stock-input">Stock</label>
                        <input type="number" class="form-control <?php echo e($errors->get('stock') ? 'is-invalid' : ''); ?>" id="product-stock-input" placeholder="Enter stock" name="stock">
                        <?php $__currentLoopData = $errors->get('stock'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Gallery</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="fs-13 mb-1">Product Image</h5>
                        <p class="text-muted">Add Product main Image.</p>
                        <input class="form-control <?php echo e($errors->get('galleries_id') ? 'is-invalid' : ''); ?>" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg" name="galleries_id">
                        <?php $__currentLoopData = $errors->get('galleries_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                        <h5 class="fs-13 mb-1">Product Gallery</h5>
                        <p class="text-muted">Add Product Gallery Images.</p>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple" name="galleries_id">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <!-- <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-13 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul> -->
                        <!-- end dropzon-preview -->
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publish</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label for="choices-publish-status-input" class="form-label">Status</label>

                        <select class="form-select <?php echo e($errors->get('publish') ? 'is-invalid' : ''); ?>" id="choices-publish-status-input" data-choices data-choices-search-false name="publish">
                            <option value="Published" selected>Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                        <?php $__currentLoopData = $errors->get('publish'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="invalid-feed text-danger">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Categories</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add New</a>Select product category</p>
                    <select class="form-select <?php echo e($errors->get('category_id') ? 'is-invalid' : ''); ?>" name="choices-category-input" data-choices data-choices-search-false name="category_id">
                        <option value="1" selected>All</option>
                        <option value="2">Appliances</option>
                        <option value="3">Fashion</option>
                        <option value="4">Electronics</option>
                        <option value="5">Grocery</option>
                        <option value="6">Home & Furniture</option>
                        <option value="7">Kids</option>
                        <option value="8">Mobiles</option>
                    </select>
                    <?php $__currentLoopData = $errors->get('category_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="invalid-feed text-danger">
                        <?php echo e($msg); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Tags</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1">
                            <input class="form-control <?php echo e($errors->get('tags') ? 'is-invalid' : ''); ?>" data-choices data-choices-multiple-remove="true" placeholder="Enter tags (example: Cotton)" type="text" name="tags">
                            <?php $__currentLoopData = $errors->get('tags'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="invalid-feed text-danger">
                                <?php echo e($msg); ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Short Description</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Add short description for product</p>
                    <textarea class="form-control <?php echo e($errors->get('description') ? 'is-invalid' : ''); ?>" placeholder="Enter short description for product" rows="3" name="description"></textarea>
                    <?php $__currentLoopData = $errors->get('description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="invalid-feed text-danger">
                        <?php echo e($msg); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-success w-sm w-100">Submit</button>
            </div>
        </div>
    </div>
</form>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="assets/libs/@ckeditor/@ckeditor.min.js"></script>

<script src="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.js')); ?>"></script>
<script src="assets/js/pages/ecommerce-product-create.init.js"></script>

<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/admin/product/add.blade.php ENDPATH**/ ?>