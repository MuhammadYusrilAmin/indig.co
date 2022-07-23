
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.checkout'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Ecommerce <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Checkout <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body checkout-tab">

                <form action="#">
                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                        <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="false"><i class="ri-truck-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                    Shipping Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false"><i class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                    Payment Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-finish-tab" data-bs-toggle="pill" data-bs-target="#pills-finish" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">
                            <div>
                                <h5 class="mb-1">Shipping Information</h5>
                                <p class="text-muted mb-4">Please fill all information below</p>
                            </div>

                            <div class="mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-14 mb-0">Saved Address</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                            Add Address
                                        </button>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-check card-radio">
                                            <input id="shippingAddress01<?php echo e($address->id); ?>" name="shippingAddress" type="radio" class="form-check-input" checked>
                                            <label class="form-check-label" for="shippingAddress01<?php echo e($address->id); ?>">
                                                <span class="mb-4 fw-semibold d-block text-muted text-uppercase"><?php echo e($address->location); ?></span>
                                                <span class="fs-14 mb-2 d-block"><?php echo e($address->name); ?></span>
                                                <span class="text-muted fw-normal text-wrap mb-1 d-block"><?php echo e($address->address . ', RT ' . $address->rt . 'RW ' . $address->rw); ?></span>
                                                <span class="text-muted fw-normal d-block"><?php echo e($address->phone); ?></span>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#editAddressModal_<?php echo e($address->id); ?>"><i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                    Edit</a>
                                            </div>
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal_<?php echo e($address->id); ?>"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                                <div class="mt-4">
                                    <?php if(count($addresses) == 0): ?>
                                    <?php else: ?>
                                    <h5 class="fs-14 mb-3">Shipping Method</h5>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <div aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                <div class="form-check card-radio">
                                                    <input id="paymentMethod01" name="paymentMethod" onclick="click_jne()" type="radio" class="form-check-input" checked>
                                                    <label class="form-check-label" for="paymentMethod01">
                                                        <span class="fs-16 text-muted me-2"><i class=" ri-truck-fill align-bottom"></i></span>
                                                        <span class="fs-14 text-wrap">JNE</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div aria-expanded="true" aria-controls="paymentmethodCollapse">
                                                <div class="form-check card-radio">
                                                    <input id="paymentMethod02" onclick="click_pos()" name="paymentMethod" type="radio" class="form-check-input">
                                                    <label class="form-check-label" for="paymentMethod02">
                                                        <span class="fs-16 text-muted me-2"><i class=" ri-truck-fill align-bottom"></i></span>
                                                        <span class="fs-14 text-wrap">POS INDONESIA</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6">
                                            <div aria-expanded="false" aria-controls="paymentmethodCollapse">
                                                <div class="form-check card-radio">
                                                    <input id="paymentMethod03" onclick="click_tiki()" name="paymentMethod" type="radio" class="form-check-input">
                                                    <label class="form-check-label" for="paymentMethod03">
                                                        <span class="fs-16 text-muted me-2"><i class=" ri-truck-fill align-bottom"></i></span>
                                                        <span class="fs-14 text-wrap">TIKI</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse show" id="JNE">
                                    <div class="card p-4 border shadow-none mb-0 mt-4">
                                        <div class="row g-4">
                                            <?php
                                            $cek_origin = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                            $cek_destination = App\Models\Address::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                            $carts = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->get();
                                            $weight2 = null;
                                            foreach ($carts as $value) {
                                                $product = App\Models\Product::where('id', $value->product_id)->get();
                                                foreach ($product as $key) {
                                                    $weight2 += $key->weight;
                                                }
                                            }
                                            $data = Rajaongkir::getOngkirCost(
                                                $origin = $cek_origin->cities_id,
                                                $destination = $cek_destination->regencies_id,
                                                $weight = $weight2,
                                                $courier = Dipantry\Rajaongkir\Models\RajaongkirCourier::JNE
                                            );

                                            $konten = json_encode($data);
                                            $data2 = json_decode($konten, true);
                                            ?>
                                            <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php for($a = 0; $a < count($key['costs']); $a++): ?> <div class="col-lg-6">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod01" name="shippingMethod" type="radio" class="form-check-input">
                                                    <label class="form-check-label" for="shippingMethod01">
                                                        <span class="fs-16 float-end mt-2 text-wrap d-block fw-semibold"><?php echo e("Rp " . number_format($key['costs'][$a]['cost'][0]['value'], 2, ",", ".")); ?></span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">JNE <?php echo e($key['costs'][$a]['service']); ?></span>
                                                        <span class="text-muted fw-normal text-wrap d-block"><?php echo e($key['costs'][$a]['description']); ?></span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Expected
                                                            Delivery <?php echo e($key['costs'][$a]['cost'][0]['etd']); ?> Days</span>
                                                    </label>
                                                </div>
                                        </div>
                                        <?php endfor; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="collapse" id="POSINDONESIA">
                                <div class="card p-4 border shadow-none mb-0 mt-4">
                                    <div class="row g-4">
                                        <?php
                                        $cek_origin = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                        $cek_destination = App\Models\Address::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                        $carts = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->get();
                                        $weight2 = null;
                                        foreach ($carts as $value) {
                                            $product = App\Models\Product::where('id', $value->product_id)->get();
                                            foreach ($product as $key) {
                                                $weight2 += $key->weight;
                                            }
                                        }
                                        $data = Rajaongkir::getOngkirCost(
                                            $origin = $cek_origin->cities_id,
                                            $destination = $cek_destination->regencies_id,
                                            $weight = $weight2,
                                            $courier = Dipantry\Rajaongkir\Models\RajaongkirCourier::POS_INDONESIA
                                        );

                                        $konten = json_encode($data);
                                        $data2 = json_decode($konten, true);
                                        ?>
                                        <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php for($a = 0; $a < count($key['costs']); $a++): ?> <div class="col-lg-6">
                                            <div class="form-check card-radio">
                                                <input id="shippingMethod01" name="shippingMethod" type="radio" class="form-check-input">
                                                <label class="form-check-label" for="shippingMethod01">
                                                    <span class="fs-16 float-end mt-2 text-wrap d-block fw-semibold"><?php echo e("Rp " . number_format($key['costs'][$a]['cost'][0]['value'], 2, ",", ".")); ?></span>
                                                    <span class="fs-14 mb-1 text-wrap d-block">POS <?php echo e($key['costs'][$a]['service']); ?></span>
                                                    <span class="text-muted fw-normal text-wrap d-block"><?php echo e($key['costs'][$a]['description']); ?></span>
                                                    <span class="text-muted fw-normal text-wrap d-block">Expected
                                                        Delivery <?php echo e($key['costs'][$a]['cost'][0]['etd']); ?> Days</span>
                                                </label>
                                            </div>
                                    </div>
                                    <?php endfor; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="collapse" id="TIKI">
                        <div class="card p-4 border shadow-none mb-0 mt-4">
                            <div class="row g-4">
                                <?php
                                $cek_origin = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                $cek_destination = App\Models\Address::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->first();
                                $carts = App\Models\Cart::whereRaw('user_id =' . Illuminate\Support\Facades\Auth::user()->id)->orderBy('created_at', 'desc')->get();
                                $weight2 = null;
                                foreach ($carts as $value) {
                                    $product = App\Models\Product::where('id', $value->product_id)->get();
                                    foreach ($product as $key) {
                                        $weight2 += $key->weight;
                                    }
                                }
                                $data = Rajaongkir::getOngkirCost(
                                    $origin = $cek_origin->cities_id,
                                    $destination = $cek_destination->regencies_id,
                                    $weight = $weight2,
                                    $courier = Dipantry\Rajaongkir\Models\RajaongkirCourier::TIKI
                                );

                                $konten = json_encode($data);
                                $data2 = json_decode($konten, true);
                                ?>
                                <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php for($a = 0; $a < count($key['costs']); $a++): ?> <div class="col-lg-6">
                                    <div class="form-check card-radio">
                                        <input id="shippingMethod01" name="shippingMethod" type="radio" class="form-check-input">
                                        <label class="form-check-label" for="shippingMethod01">
                                            <span class="fs-16 float-end mt-2 text-wrap d-block fw-semibold"><?php echo e("Rp " . number_format($key['costs'][$a]['cost'][0]['value'], 2, ",", ".")); ?></span>
                                            <span class="fs-14 mb-1 text-wrap d-block">TIKI <?php echo e($key['costs'][$a]['service']); ?></span>
                                            <span class="text-muted fw-normal text-wrap d-block"><?php echo e($key['costs'][$a]['description']); ?></span>
                                            <span class="text-muted fw-normal text-wrap d-block">Expected
                                                Delivery <?php echo e($key['costs'][$a]['cost'][0]['etd']); ?> Days</span>
                                        </label>
                                    </div>
                            </div>
                            <?php endfor; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
            </div>

            <div class="d-flex align-items-start gap-3 mt-4">
                <?php $address = count($addresses) ?>
                <?php if($address != 0): ?>
                <button type="button" class="btn btn-primary btn-label right ms-auto nexttab" data-nexttab="pills-payment-tab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue to Payment</button>
                <?php else: ?>
                <button type="button" onclick="cek_address()" class="btn btn-primary btn-label right ms-auto nexttab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue to Payment</button>
                <?php endif; ?>
            </div>
        </div>
        <!-- end tab pane -->

        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
            <div>
                <h5 class="mb-1">Payment Selection</h5>
                <p class="text-muted mb-4">Please select and enter your billing
                    information</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show" aria-expanded="false" aria-controls="paymentmethodCollapse">
                        <div class="form-check card-radio">
                            <input id="paymentMethod03" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="paymentMethod03">
                                <span class="fs-16 text-muted me-2"><i class="ri-money-dollar-box-fill align-bottom"></i></span>
                                <span class="fs-14 text-wrap">Cash on
                                    Delivery</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse show" id="paymentmethodCollapse">
                <div class="card p-4 border shadow-none mb-0 mt-4">
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <label for="cc-name" class="form-label">Name on
                                card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="Enter name">
                            <small class="text-muted">Full name as displayed on
                                card</small>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card
                                number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="xxxx xxxx xxxx xxxx">
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY">
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="xxx">
                        </div>
                    </div>
                </div>
                <div class="text-muted mt-2 fst-italic">
                    <i data-feather="lock" class="text-muted icon-xs"></i> Your
                    transaction is secured with SSL encryption
                </div>
            </div>

            <div class="d-flex align-items-start gap-3 mt-4">
                <button type="button" class="btn btn-light btn-label previestab" data-previous="pills-bill-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back to Shipping</button>
                <button type="button" class="btn btn-primary btn-label right ms-auto nexttab" data-nexttab="pills-finish-tab"><i class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                    Order</button>
            </div>
        </div>
        <!-- end tab pane -->

        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
            <div class="text-center py-5">

                <div class="mb-4">
                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:120px;height:120px"></lord-icon>
                </div>
                <h5>Thank you ! Your Order is Completed !</h5>
                <p class="text-muted">You will receive an order confirmation email with details of your order.</p>

                <h3 class="fw-semibold">Order ID: <a href="<?php echo e(url('orders/detail')); ?>" class="text-decoration-underline">VZ2451</a></h3>
            </div>
        </div>
        <!-- end tab pane -->
    </div>
    <!-- end tab content -->
    </form>
</div>
<!-- end card body -->
</div>
<!-- end card -->
</div>
<!-- end col -->

<div class="col-xl-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-0">Order Summary</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table table-borderless align-middle mb-0">
                    <thead class="table-light text-muted">
                        <tr>
                            <th style="width: 90px;" scope="col">Product</th>
                            <th scope="col">Product Info</th>
                            <th scope="col" class="text-end">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="avatar-md bg-light rounded p-1">
                                    <img src="<?php echo e(url($cart->product->galleries[0]->photo_url)); ?>" alt="" class="img-fluid d-block">
                                </div>
                            </td>
                            <td>
                                <h5 class="fs-14"><a href="apps-ecommerce-product-details" class="text-dark"><?php echo e($cart->product->title); ?></a>
                                </h5>
                                <?php $product = \App\Models\Product::where('id', $cart->product_id)->first(); ?>
                                <p class="text-muted mb-0"><?php echo e($product->price . ' x ' . $cart->quantity); ?></p>
                            </td>
                            <td class="text-end"><?php echo e("Rp" . number_format($cart->price * $cart->quantity, 2, ",", ".")); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-semibold" colspan="2">Sub Total :</td>
                            <?php
                            $subTotal = 0;
                            $shippingCharge = 22000;

                            foreach ($carts as $cart) {
                                $subTotal += $cart->price * $cart->quantity;
                            }

                            $discount = $subTotal * 10.1 / 100;
                            $totalPayment = $subTotal + $shippingCharge - $discount;
                            ?>
                            <td class="fw-semibold text-end"><?php echo e("Rp" . number_format($subTotal, 2, ",", ".")); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Discount : </td>
                            <td class="text-end">- <?php echo e("Rp" . number_format($discount, 2, ",", ".")); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Midtrans fee : </td>
                            <td class="text-end text-success"><?php echo e("Rp" . number_format(7000, 2, ",", ".")); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Shipping Charge :</td>
                            <td class="text-end"><?php echo e("Rp" . number_format($shippingCharge, 2, ",", ".")); ?></td>
                        </tr>
                        <tr class="table-active">
                            <th colspan="2">Total Payment (IDR) :</th>
                            <td class="text-end">
                                <span class="fw-semibold">
                                    <?php echo e("Rp" . number_format($totalPayment, 2, ",", ".")); ?>

                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end row -->


<!-- editItemModal -->
<div id="addAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="<?php echo e(route('address.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="state" class="form-label">Your Location</label>
                            <?php $url = Illuminate\Support\Facades\Request::segment(2); ?>
                            <input type="hidden" name="url" value="<?php echo e($url); ?>">
                            <select class="form-select" id="state" name="location" required data-choices data-choices-search-false>
                                <option value="Home Address" selected>Home Address</option>
                                <option value="Office Address">Office Address</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="addaddress-Name" required placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="addaddress-Name" required placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-textarea" class="form-label">Address</label>
                            <textarea class="form-control" id="addaddress-textarea" name="address" required placeholder="Enter address (your street name)" rows="2"></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">RT</label>
                                <input type="text" class="form-control" id="addaddress-Name" name="rt" required placeholder="Enter rt">
                            </div>
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">RW</label>
                                <input type="text" class="form-control" id="addaddress-Name" name="rw" required placeholder="Enter rw">
                            </div>
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="addaddress-Name" name="zip_code" required placeholder="Enter zip code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Province</label>
                                <select class="form-select" name="provinsi" id="provinsi">
                                    <option selected disabled>Choose..</option>
                                    <?php $provinces  = Dipantry\Rajaongkir\Models\ROProvince::all(); ?>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $provinsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($provinsi->id); ?>"><?php echo e($provinsi->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Regency</label>
                                <input type="hidden" id="id_kabupaten" name="id_kabupaten">
                                <select class="form-select" name="kabupaten" id="kabupaten">
                                    <option selected disabled>Choose..</option>
                                </select>
                            </div>

                            <!-- <div class="col">
                                <label class="form-label">District</label>
                                <input type="hidden" id="id_kecamatan" name="id_kecamatan">
                                <select class="form-select" name="kecamatan" id="kecamatan">
                                    <option selected disabled>Choose..</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Village</label>
                                <input type="hidden" id="id_desa" name="id_desa">
                                <select class="form-select" name="desa" id="desa">
                                    <option selected disabled>Choose..</option>
                                </select>
                            </div> -->
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- removeItemModal -->
<?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $id = $address->id; ?>
<div id="removeItemModal_<?php echo e($address->id); ?>" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Address ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                    <form action="<?php echo e(route('address.destroy',$address->id)); ?>" method="POST">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <?php $url = Illuminate\Support\Facades\Request::segment(2); ?>
                        <input type="hidden" name="url" value="<?php echo e($url); ?>">
                        <button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
                    </form>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="editAddressModal_<?php echo e($address->id); ?>" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="<?php echo e(route('address.update',$address->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="state" class="form-label">Your Location</label>
                            <?php $url = Illuminate\Support\Facades\Request::segment(2); ?>
                            <input type="hidden" name="url" value="<?php echo e($url); ?>">
                            <select class="form-select" id="state" name="location" required data-choices data-choices-search-false>
                                <?php if($address->location == 'Home Address'): ?>
                                <option value="Home Address" selected>Home Address</option>
                                <option value="Office Address">Office Address</option>
                                <?php else: ?>
                                <option value="Home Address">Home Address</option>
                                <option value="Office Address" selected>Office Address</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="addaddress-Name" value="<?php echo e($address->name); ?>" required placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="addaddress-Name" value="<?php echo e($address->phone); ?>" required placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-textarea" class="form-label">Address</label>
                            <textarea class="form-control" id="addaddress-textarea" name="address" required placeholder="Enter address (your street name)" rows="2"><?php echo e($address->address); ?></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">RT</label>
                                <input type="text" class="form-control" id="addaddress-Name" value="<?php echo e($address->rt); ?>" name="rt" required placeholder="Enter rt">
                            </div>
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">RW</label>
                                <input type="text" class="form-control" id="addaddress-Name" value="<?php echo e($address->rw); ?>" name="rw" required placeholder="Enter rw">
                            </div>
                            <div class="col">
                                <label for="addaddress-Name" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="addaddress-Name" name="zip_code" value="<?php echo e($address->zip_code); ?>" required placeholder="Enter zip code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Province</label>
                                <select class="form-select" name="provinsi" id="provinsi_<?php echo e($address->id); ?>">
                                    <option selected disabled>Choose..</option>
                                    <?php $provinces  = Dipantry\Rajaongkir\Models\ROProvince::all(); ?>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $provinsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($provinsi->id == $address->province_id): ?>
                                    <option value="<?php echo e($provinsi->id); ?>" selected><?php echo e($provinsi->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($provinsi->id); ?>"><?php echo e($provinsi->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Regency</label>
                                <input type="hidden" id="id_kabupaten_<?php echo e($address->id); ?>" name="id_kabupaten">
                                <select class="form-select" name="kabupaten" id="kabupaten_<?php echo e($address->id); ?>">
                                    <option selected disabled>Choose..</option>
                                    <?php $regencies  = Dipantry\Rajaongkir\Models\ROCity::where('province_id', $address->province_id)->get(); ?>
                                    <?php $__currentLoopData = $regencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($kabupaten->id == $address->regencies_id): ?>
                                    <option value="<?php echo e($kabupaten->id); ?>" selected><?php echo e($kabupaten->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($kabupaten->id); ?>"><?php echo e($kabupaten->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- <div class="col">
                                <label class="form-label">District</label>
                                <input type="hidden" id="id_kecamatan_<?php echo e($address->id); ?>" name="id_kecamatan">
                                <select class="form-select" name="kecamatan" id="kecamatan_<?php echo e($address->id); ?>">
                                    <option selected disabled>Choose..</option>
                                    <?php $district  = \App\Models\District::where('regency_id', $address->regencies_id)->get(); ?>
                                    <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kecamatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($kecamatan->id == $address->district_id): ?>
                                    <option value="<?php echo e($kecamatan->id); ?>" selected><?php echo e($kecamatan->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($kecamatan->id); ?>"><?php echo e($kecamatan->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Village</label>
                                <input type="hidden" id="id_desa_<?php echo e($address->id); ?>" name="id_desa">
                                <select class="form-select" name="desa" id="desa_<?php echo e($address->id); ?>">
                                    <option selected disabled>Choose..</option>
                                    <?php $village  = \App\Models\Village::where('district_id', $address->district_id)->get(); ?>
                                    <?php $__currentLoopData = $village; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $desa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($desa->id == $address->village_id): ?>
                                    <option value="<?php echo e($desa->id); ?>" selected><?php echo e($desa->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($desa->id); ?>"><?php echo e($desa->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div> -->
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#provinsi_<?= $id ?>').on('change', function() {
                let id_provinsi = $('#provinsi_<?= $id ?>').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getkabupaten')); ?>",
                    data: {
                        id_provinsi: id_provinsi,
                    },
                    cache: false,

                    success: function($msg, $id) {
                        $("#kabupaten_<?= $id ?>").html($msg);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });


        $(function() {
            $('#kabupaten_<?= $id ?>').on('change', function() {
                let id_kabupaten = $('#kabupaten_<?= $id ?>').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getkecamatan')); ?>",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function($msg) {
                        $('#kecamatan').html($msg);
                        $('#id_kabupaten').val(id_kabupaten);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });


        $(function() {
            $('#kecamatan_<?= $id ?>').on('change', function() {
                let id_kecamatan = $('#kecamatan_<?= $id ?>').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getdesa')); ?>",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function($msg) {
                        $("#desa_<?= $id ?>").html($msg);
                        $('#id_kecamatan_<?= $id ?>').val(id_kecamatan);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });

        $(function() {
            $('#desa_<?= $id ?>').on('change', function() {
                let id_desa = $('#desa_<?= $id ?>').val();

                $('#id_desa_<?= $id ?>').val(id_desa);
            });
        });
    });
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script type="text/javascript">
    function click_jne() {
        $('#POSINDONESIA').removeClass('show');
        $('#TIKI').removeClass('show');
        $('#JNE').addClass('show');
    }

    function click_pos() {
        $('#POSINDONESIA').addClass('show');
        $('#TIKI').removeClass('show');
        $('#JNE').removeClass('show');

    }

    function click_tiki() {
        $('#POSINDONESIA').removeClass('show');
        $('#TIKI').addClass('show');
        $('#JNE').removeClass('show');
    }

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getkabupaten')); ?>",
                    data: {
                        id_provinsi: id_provinsi,
                    },
                    cache: false,

                    success: function($msg, $id) {
                        $("#kabupaten").html($msg);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });


        $(function() {
            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getkecamatan')); ?>",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function($msg) {
                        $('#kecamatan').html($msg);
                        $('#id_kabupaten').val(id_kabupaten);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });

        $(function() {
            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('getdesa')); ?>",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function($msg) {
                        $("#desa").html($msg);
                        $('#id_kecamatan').val(id_kecamatan);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    }
                })
            });
        });

        $(function() {
            $('#desa').on('change', function() {
                let id_desa = $('#desa').val();

                $('#id_desa').val(id_desa);
            });
        });
    });

    function cek_address() {
        alert('Isi Addreess Terlebih Dahulu');
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/js/pages/ecommerce-product-checkout.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/admin/transaction/checkout.blade.php ENDPATH**/ ?>