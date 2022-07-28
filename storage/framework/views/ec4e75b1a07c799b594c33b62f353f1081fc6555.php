
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.shopping-cart'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Shopping Cart <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row mb-3">
    <div class="col-xl-8">
        <div class="row align-items-center gy-3 mb-3">
            <div class="col-sm">
                <div>
                    <h5 class="fs-14 mb-0">Your Cart (<?php echo e(count($carts)); ?> items)</h5>
                </div>
            </div>
            <?php if(count($carts) != 0): ?>
            <div class="col-sm-auto">
                <a href="#" class="d-block p-1 px-2 btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove All</a>
            </div>
            <?php endif; ?>
        </div>

        <?php if(count($carts) == 0): ?>
        <div class="text-center mt-5 pt-3">
            <h3>Empty Cart</h3>
            <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-2">Go Shopping</a>
        </div>
        <?php else: ?>
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                            <?php $galleries = \App\Models\ProductGallery::where('product_id', $cart->product_id)->first(); ?>
                            <img src="<?php echo e($galleries->photo_url); ?>" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <?php $product = \App\Models\Product::where('id', $cart->product_id)->first(); ?>
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail" class="text-dark"><?php echo e($product->title); ?></a></h5>
                        <ul class="list-inline text-muted">
                            <li class="list-inline-item">Request : <span class="fw-medium"><?php echo e($cart->request); ?></span></li>
                        </ul>

                        <div class="input-step">
                            <input type="hidden" id="id_cart_<?php echo e($cart->id); ?>" value="<?php echo e($cart->id); ?>">
                            <button type="button" id="minus_<?php echo e($cart->id); ?>" class="minus">–</button>
                            <input type="number" id="quantity_<?php echo e($cart->id); ?>" readonly value="<?php echo e($cart->quantity); ?>" min="0" max="100">
                            <button type="button" id="plus_<?php echo e($cart->id); ?>" class="plus">+</button>
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
                                <a href="<?php echo e(route('cart.destroy',$cart->id)); ?>" onclick="notificationforDelete2(event, this)" class="d-block text-danger p-1 px-2"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove</a>
                            </div>
                            <div>
                                <?php $wishlist = \App\Models\Wishlist::where('product_id', $cart->product_id)->get(); ?>
                                <?php if(count($wishlist) != 0): ?>
                                <button class="d-block text-body p-1 px-2 btn btn-transparent " onclick="event.preventDefault(); document.getElementById('remove-whistlist').submit();"><i class="ri-star-fill text-danger align-bottom me-1"></i> <b class="text-danger" style="font-weight: normal;">Remove Wishlist</b></button>
                                <?php else: ?>
                                <button class="d-block text-body p-1 px-2 btn btn-transparent" onclick="event.preventDefault(); document.getElementById('add-whistlist').submit();"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</button>
                                <?php endif; ?>

                                <?php $url = Illuminate\Support\Facades\Request::segment(1); ?>
                                <form action="<?php echo e(route('whistlist.store')); ?>" method="post" id="add-whistlist" class="d-flex justify-content-center">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($cart->product_id); ?>">
                                    <input type="hidden" name="url" value="<?php echo e($url); ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <div>Total :</div>
                            <h5 class="fs-14 mb-0">
                                <div class="product-line-price" id="total_<?php echo e($cart->id); ?>"><?php echo e("Rp " . number_format($cart->price, 2, ",", ".")); ?></div>
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
                    $('#quantity_<?= $cart->id ?>').on('keyup', function() {
                        let id = $('#quantity_<?= $cart->id ?>').val();
                        if (id >= <?= $product->stock ?>) {
                            $("#quantity_<?= $cart->id ?>").val(<?= $product->stock ?>);
                        } else if (id == '') {
                            $("#quantity_<?= $cart->id ?>").val();
                        }
                    })
                });

                $(function() {
                    $('#minus_<?= $cart->id ?>').on('click', function() {
                        let id_cart = $('#id_cart_<?= $cart->id ?>').val();

                        $.ajax({
                            type: 'POST',
                            url: "<?php echo e(url('minus_quantity')); ?>",
                            data: {
                                id_cart: id_cart
                            },
                            cache: false,

                            success: function(msg) {
                                $("#quantity_<?= $cart->id ?>").val(msg);
                                $("#total_<?= $cart->id ?>").html(formatCurrency(<?= $product->price ?> * msg));
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        })
                    });
                });


                $(function() {
                    $('#plus_<?= $cart->id ?>').on('click', function() {
                        let id_cart = $('#id_cart_<?= $cart->id ?>').val();

                        $.ajax({
                            type: 'POST',
                            url: "<?php echo e(url('plus_quantity')); ?>",
                            data: {
                                id_cart: id_cart
                            },
                            cache: false,

                            success: function(msg) {
                                $("#quantity_<?= $cart->id ?>").val(msg);
                                $("#total_<?= $cart->id ?>").html(formatCurrency(<?= $product->price ?> * msg));
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
        <?php endif; ?>
        <!-- end card -->

        <?php if(count($carts) != 0): ?>
        <div class="text-end mb-4">
            <?php
            $cek_destination = App\Models\Address::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first(); ?>
            <?php if($cek_destination == null): ?>
            <a href="<?php echo e(url('transaction?id=1')); ?>" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
            <?php else: ?>
            <a href="<?php echo e(url('transaction?id='.$cek_destination->regencies_id)); ?>" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- WISHLIST -->
        <div class="mt-5 pt-5">
            <div class="mb-4">
                <h5 class="fs-14 mb-0">Add your favorite product to cart?</h5>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 pb-4">
                <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card" style="height: 450px;">
                        <?php $galleries = \App\Models\ProductGallery::where('product_id', $wishlist->product_id)->first(); ?>
                        <?php if($galleries == null): ?>
                        <?php else: ?>
                        <img class="card-img-top img-fluid" src="<?php echo e($galleries->photo_url); ?>" alt="Card image cap">
                        <div class="card-body">
                            <?php $galleries = \App\Models\ProductGallery::where('product_id', $wishlist->product_id)->first(); ?>
                            <h5 class="card-title mb-2"><a href="<?php echo e(url('products-detail')); ?>" class="link-dark"><?php echo e($product->title); ?></a></h4>
                        </div>
                        <div class="card-footer">
                            <button href="#" class="card-link link-danger btn btn-transparent" onclick="event.preventDefault(); document.getElementById('remove-whistlist').submit();"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove</button>
                            <button onclick="event.preventDefault(); document.getElementById('input-cart_<?php echo e($product->id); ?>').submit();" class="btn btn-transparent card-link link-success">Add to Cart <i class="las la-shopping-cart align-middle ms-1 lh-1"></i></button>

                            <?php $url = Illuminate\Support\Facades\Request::segment(1); ?>
                            <form action="<?php echo e(route('cart.store')); ?>" id="input-cart_<?php echo e($product->id); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="cities_id" value="<?php echo e($product->cooperative->cities_id); ?>">
                                <input type="hidden" name="url" value="<?php echo e($url); ?>">
                                <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                            </form>
                            <form action="<?php echo e(route('whistlist.destroy', $wishlist->id)); ?>" id="remove-whistlist" method="post" class="d-flex justify-content-center">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($wishlist->product_id); ?>">
                                <input type="hidden" name="url" value="<?php echo e($url); ?>">
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="sticky-side-div">

            <div class="card mt-4">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Order Summary</h5>
                </div>
                <div class="card-header bg-soft-light border-bottom-dashed">
                    <div class="text-center">
                        <h6 class="mb-2">Have a <span class="fw-semibold">promo</span> code ?</h6>
                    </div>
                    <div class="hstack gap-3 px-3 mx-n3">
                        <input class="form-control me-auto" type="text" placeholder="Enter coupon code" aria-label="Add Promo Code here...">
                        <button type="button" class="btn btn-success w-xs">Apply</button>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <?php
                                    $subTotal = 0;
                                    $shippingCharge = 22000;

                                    foreach ($carts as $cart) {
                                        $subTotal += $cart->price * $cart->quantity;
                                    }

                                    $discount = $subTotal * 10.1 / 100;
                                    $totalPayment = $subTotal + $shippingCharge - $discount;
                                    ?>
                                    <td class="text-end" id="cart-subtotal"><?php echo e("Rp" . number_format($subTotal, 2, ",", ".")); ?></td>
                                </tr>
                                <tr>
                                    <td>Discount : </td>
                                    <td class="text-end" id="cart-discount">- <?php echo e("Rp" . number_format($discount, 2, ",", ".")); ?></td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td class="text-end" id="cart-shipping"><?php echo e("Rp" . number_format($shippingCharge, 2, ",", ".")); ?></td>
                                </tr>
                                <tr class="table-active">
                                    <th>Total Payment (IDR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold" id="cart-total">
                                            <?php echo e("Rp" . number_format($totalPayment, 2, ",", ".")); ?>

                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
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
                    <a href="<?php echo e(route('cart.edit', Auth::user()->id)); ?>"><button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button></a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/user/transaction/cart.blade.php ENDPATH**/ ?>