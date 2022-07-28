
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Kasir-Koprasi'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Kasir Koprasi <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row mb-3">
    <div class="col-xl-8">
        <div class="row align-items-center gy-3 mb-3">
            <?php if(count($kasir) != 0): ?>
            <div class="col-sm-auto">
                <a href="#" class="d-block p-1 px-2 btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove All</a>
            </div>
            <?php endif; ?>
        </div>
        <?php $__currentLoopData = $kasir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kasirs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                            <?php $galleries = \App\Models\ProductGallery::where('product_id', $kasirs->product_id)->first(); ?>
                            <img src="<?php echo e($galleries->photo_url); ?>" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <?php $product = \App\Models\Product::where('id', $kasirs->product_id)->first(); ?>
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail" class="text-dark"><?php echo e($product->title); ?></a></h5>
                        <ul class="list-inline text-muted">
                            <li class="list-inline-item">Request : <span class="fw-medium"><?php echo e($kasirs->request); ?></span></li>
                        </ul>

                        <div class="input-step">
                            <input type="hidden" id="id_kasirs_<?php echo e($kasirs->id); ?>" value="<?php echo e($kasirs->id); ?>">
                            <button type="button" id="minus_<?php echo e($kasirs->id); ?>" class="minus">–</button>
                            <input type="number" id="quantity_<?php echo e($kasirs->id); ?>" readonly value="<?php echo e($kasirs->quantity); ?>" min="0" max="100">
                            <button type="button" id="plus_<?php echo e($kasirs->id); ?>" class="plus">+</button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="text-lg-end">
                            <p class="text-muted mb-1">Item Price:</p>
                            <h5 class="fs-14"><span id="ticket_price" class="product-price"><?php echo e("Rp " . number_format( $product->price, 2, ",", ".")); ?></span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-footer">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <div class="d-flex flex-wrap my-n1">
                            <div>
                                <a href="<?php echo e(route('kasir.destroy',$kasirs->id)); ?>" onclick="notificationforDelete2(event, this)" class="d-block text-danger p-1 px-2"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <div>Total :</div>
                            <h5 class="fs-14 mb-0">
                                <div class="product-line-price" id="total_<?php echo e($kasirs->id); ?>"><?php echo e("Rp " . number_format($kasirs->price, 2, ",", ".")); ?></div>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
        <script type="text/javascript">
            function notificationforDelete2(event, el) {
                event.preventDefault();
                $("#delete-form2").attr('action', $(el).attr('href'));
                $("#delete-form2").submit();
            }

            function formatCurrency(num) {

                num = num.toString().replace(/\Rp|/g, '');
                if (isNaN(num))
                    num = "0";
                sign = (num == (num = Math.abs(num)));
                num = Math.floor(num * 100 + 0.50000000001);
                cents = num % 100;
                num = Math.floor(num / 100).toString();
                if (cents < 10)
                    cents = "0" + cents;
                for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                    num = num.substring(0, num.length - (4 * i + 3)) + '.' +
                    num.substring(num.length - (4 * i + 3));
                return (((sign) ? '' : '-') + 'Rp ' + num + ',' + cents);

            }

            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(function() {
                    $('#quantity_<?= $kasirs->id ?>').on('keyup', function() {
                        let id = $('#quantity_<?= $kasirs->id ?>').val();
                        if (id >= <?= $product->stock ?>) {
                            $("#quantity_<?= $kasirs->id ?>").val(<?= $product->stock ?>);
                        } else if (id == '') {
                            $("#quantity_<?= $kasirs->id ?>").val();
                        }
                    })
                });

                $(function() {
                    $('#minus_<?= $kasirs->id ?>').on('click', function() {
                        let id_kasirs = $('#id_kasirs_<?= $kasirs->id ?>').val();

                        $.ajax({
                            type: 'POST',
                            url: "<?php echo e(url('kasir_minus_quantity')); ?>",
                            data: {
                                id_kasirs: id_kasirs
                            },
                            cache: false,

                            success: function(msg) {
                                $("#quantity_<?= $kasirs->id ?>").val(msg);
                                $("#total_<?= $kasirs->id ?>").html(formatCurrency(<?= $product->price ?> * msg));
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        })
                    });
                });


                $(function() {
                    $('#plus_<?= $kasirs->id ?>').on('click', function() {
                        let id_kasirs = $('#id_kasirs_<?= $kasirs->id ?>').val();

                        $.ajax({
                            type: 'POST',
                            url: "<?php echo e(url('kasir_plus_quantity')); ?>",
                            data: {
                                id_kasirs: id_kasirs
                            },
                            cache: false,

                            success: function(msg) {
                                $("#quantity_<?= $kasirs->id ?>").val(msg);
                                $("#total_<?= $kasirs->id ?>").html(formatCurrency(<?= $product->price ?> * msg));
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        })
                    });
                });
            });
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- end card -->

        <?php if(count($kasir) != 0): ?>
        <div class="text-end mb-4">
            <?php
            $cek_destination = App\Models\Address::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first(); ?>
            <?php if($cek_destination == null): ?>
            <a href="<?php echo e(url('/export-printer')); ?>" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Cetak</a>
            <?php else: ?>
            <a href="<?php echo e(url('/export-printer')); ?>" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Cetak</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Add another product</h5>
                </div>
                <div class="card-header bg-soft-light border-bottom-dashed">
                    <div class="text-center">
                        <h6 class="mb-2">Scan the product or enter the item code</h6>
                    </div>
                    <div class="hstack gap-3 px-3 mx-n3">
                        <form action="<?php echo e(route('kasir.store')); ?>" method="POST">
                            <div class="row ms-4">
                                <div class="col-11">
                                    <input id="id_barang" name='id' class="form-control me-auto" autofocus type="text" placeholder="Enter item code" aria-label="Add product here..." required>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-success w-xs">Add</button>
                                </div>
                            </div>
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end stickey -->
    </div>
</div>
<!-- end row -->

<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
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
                    <a href="<?php echo e(route('kasir.edit', Auth::user()->id)); ?>"><button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button></a>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<form action="" id="delete-form2" method="POST">
    <?php echo method_field('delete'); ?>
    <?php echo csrf_field(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco5\resources\views/admin/transaction/kasir.blade.php ENDPATH**/ ?>