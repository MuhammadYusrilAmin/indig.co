
<?php $__env->startSection('title'); ?> Products <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/nouislider/nouislider.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="assets/libs/gridjs/gridjs.min.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Products <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="card">
    <div class="card-header border-0">
        <div class="row g-4">
            <div class="col-sm-auto">
                <div>
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add Product</a>
                </div>
            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <div class="search-box ms-2">
                        <input type="text" class="form-control" placeholder="Search Products...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                            All <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo e(count($datas)); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php $publish = \App\Models\Product::where('status', 'Published')->orderBy('created_at', 'DESC')->get(); ?>
                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
                            Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo e(count($publish)); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php $draft = \App\Models\Product::where('status', 'Draft')->orderBy('created_at', 'DESC')->get(); ?>
                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
                            Draft <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo e(count($draft)); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div id="selection-element">
                    <div class="my-n1 d-flex align-items-center text-muted">
                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card header -->
    <div class="card-body">
        <div class="tab-content text-muted">
            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                <?php
                $count = count($datas);
                $i = 1 ?>
                <?php if($count != 0): ?>
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
                                <th class="sort" data-sort="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php $i = 1 ?>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td>
                                    <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();">
                                        <?php $galleries = \App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                        <img src="<?php echo e($galleries->photo_url); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                    </a>
                                </td>
                                <td>
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
                                <td><?php echo e($data->tanggal); ?></td>
                                <td>
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                            <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();" class="text-primary d-inline-block">
                                                <i class="ri-eye-fill fs-16"></i>
                                            </a>
                                            <form action="<?php echo e(url('detail_products')); ?>" id="show-detail_<?php echo e($data->id); ?>" method="POST" style="display: none;">
                                                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                            <a href="<?php echo e(url('products/'.$data->id.'/edit')); ?>" class="text-secondary d-inline-block edit-item-btn">
                                                <i class="ri-pencil-fill fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#removeItemModal_<?php echo e($data->id); ?>">
                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="py-4 text-center">
                    <div>
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                        </lord-icon>
                    </div>

                    <div class="mt-4">
                        <h5>Sorry! No Result Found</h5>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="productnav-published" role="tabpanel">
                <?php
                $publish = \App\Models\Product::where('status', 'Published')->orderBy('created_at', 'DESC')->get();
                $count = count($publish);
                $i = 1 ?>
                <?php if($count != 0): ?>
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
                                <th class="sort" data-sort="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php $__currentLoopData = $publish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td>
                                    <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();">
                                        <?php $galleries = \App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                        <img src="<?php echo e($galleries->photo_url); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                    </a>
                                </td>
                                <td>
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
                                <td><?php echo e($data->tanggal); ?></td>
                                <td>
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                            <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();" class="text-primary d-inline-block">
                                                <i class="ri-eye-fill fs-16"></i>
                                            </a>
                                            <form action="<?php echo e(url('detail_products')); ?>" id="show-detail_<?php echo e($data->id); ?>" method="POST" style="display: none;">
                                                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                            <a href="<?php echo e(url('products/'.$data->id.'/edit')); ?>" class="text-secondary d-inline-block edit-item-btn">
                                                <i class="ri-pencil-fill fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#removeItemModal_<?php echo e($data->id); ?>">
                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="py-4 text-center">
                    <div>
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                        </lord-icon>
                    </div>

                    <div class="mt-4">
                        <h5>Sorry! No Result Found</h5>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                <?php
                $publish = \App\Models\Product::where('status', 'Draft')->orderBy('created_at', 'DESC')->get();
                $count = count($publish);
                $i = 1 ?>
                <?php if($count != 0): ?>
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
                                <th class="sort" data-sort="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php $__currentLoopData = $publish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td>
                                    <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();">
                                        <?php $galleries = \App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                        <img src="<?php echo e($galleries->photo_url); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                    </a>
                                </td>
                                <td>
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
                                <td><?php echo e($data->tanggal); ?></td>
                                <td>
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                            <a onclick="event.preventDefault(); document.getElementById('show-detail_<?php echo e($data->id); ?>').submit();" class="text-primary d-inline-block">
                                                <i class="ri-eye-fill fs-16"></i>
                                            </a>
                                            <form action="<?php echo e(url('detail_products')); ?>" id="show-detail_<?php echo e($data->id); ?>" method="POST" style="display: none;">
                                                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                            <a href="<?php echo e(url('products/'.$data->id.'/edit')); ?>" class="text-secondary d-inline-block edit-item-btn">
                                                <i class="ri-pencil-fill fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#removeItemModal_<?php echo e($data->id); ?>">
                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="py-4 text-center">
                    <div>
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                        </lord-icon>
                    </div>

                    <div class="mt-4">
                        <h5>Sorry! No Result Found</h5>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->

    </div>
    <!-- end card body -->
</div>
<!-- end card -->

<!-- removeItemModal -->

<?php $publish = \App\Models\Product::orderBy('created_at', 'DESC')->get(); ?>
<?php $__currentLoopData = $publish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="removeItemModal_<?php echo e($value->id); ?>" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Product ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                    <form action="<?php echo e(route('products.show',$value->id)); ?>" method="POST">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
                    </form>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/nouislider/nouislider.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/wnumb/wnumb.min.js')); ?>"></script>
<script src="assets/libs/gridjs/gridjs.min.js"></script>
<script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>


<!-- <script src="<?php echo e(URL::asset('assets/js/pages/ecommerce-product-list.init.js')); ?>"></script> -->
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/admin/product/index.blade.php ENDPATH**/ ?>