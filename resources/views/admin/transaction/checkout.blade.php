@extends('layouts.master')
@section('title') @lang('translation.checkout') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Checkout @endslot
@endcomponent
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
                                    @foreach ($addresses as $address)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-check card-radio">
                                            <input id="shippingAddress01{{ $address->id }}" name="shippingAddress" type="radio" class="form-check-input" checked>
                                            <label class="form-check-label" for="shippingAddress01{{ $address->id }}">
                                                <span class="mb-4 fw-semibold d-block text-muted text-uppercase">{{ $address->location }}</span>
                                                <span class="fs-14 mb-2 d-block">{{ $address->name }}</span>
                                                <span class="text-muted fw-normal text-wrap mb-1 d-block">{{ $address->address . ', RT ' . $address->rt . 'RW ' . $address->rw }}</span>
                                                <span class="text-muted fw-normal d-block">{{ $address->phone }}</span>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                    Edit</a>
                                            </div>
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="mt-4">
                                    <h5 class="fs-14 mb-3">Shipping Method</h5>

                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-check card-radio">
                                                <input id="shippingMethod01" name="shippingMethod" type="radio" class="form-check-input" checked>
                                                <label class="form-check-label" for="shippingMethod01">
                                                    <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Free</span>
                                                    <span class="fs-14 mb-1 text-wrap d-block">Free
                                                        Delivery</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">Expected
                                                        Delivery 3 to 5 Days</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check card-radio">
                                                <input id="shippingMethod02" name="shippingMethod" type="radio" class="form-check-input" checked>
                                                <label class="form-check-label" for="shippingMethod02">
                                                    <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">$24.99</span>
                                                    <span class="fs-14 mb-1 text-wrap d-block">Express
                                                        Delivery</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">Delivery
                                                        within 24hrs.</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-primary btn-label right ms-auto nexttab" data-nexttab="pills-payment-tab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue to Payment</button>
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
                                            <input id="paymentMethod01" name="paymentMethod" type="radio" class="form-check-input">
                                            <label class="form-check-label" for="paymentMethod01">
                                                <span class="fs-16 text-muted me-2"><i class="ri-paypal-fill align-bottom"></i></span>
                                                <span class="fs-14 text-wrap">Paypal</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse" aria-expanded="true" aria-controls="paymentmethodCollapse">
                                        <div class="form-check card-radio">
                                            <input id="paymentMethod02" name="paymentMethod" type="radio" class="form-check-input" checked>
                                            <label class="form-check-label" for="paymentMethod02">
                                                <span class="fs-16 text-muted me-2"><i class="ri-bank-card-fill align-bottom"></i></span>
                                                <span class="fs-14 text-wrap">Credit / Debit
                                                    Card</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

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

                                <h3 class="fw-semibold">Order ID: <a href="{{ url('orders/detail') }}" class="text-decoration-underline">VZ2451</a></h3>
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
                            @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <div class="avatar-md bg-light rounded p-1">
                                        <img src="{{ $cart->product->galleries[0]->photo_url }}" alt="" class="img-fluid d-block">
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fs-14"><a href="apps-ecommerce-product-details" class="text-dark">{{ $cart->product->title }}</a>
                                    </h5>
                                    <p class="text-muted mb-0">{{ $cart->price . ' x ' . $cart->quantity }}</p>
                                </td>
                                <td class="text-end">{{ "Rp" . number_format($cart->price * $cart->quantity, 2, ",", ".") }}</td>
                            </tr>
                            @endforeach
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
                                <td class="fw-semibold text-end">{{ "Rp" . number_format($subTotal, 2, ",", ".") }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Discount : </td>
                                <td class="text-end">- {{ "Rp" . number_format($discount, 2, ",", ".") }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Shipping Charge :</td>
                                <td class="text-end">{{ "Rp" . number_format($shippingCharge, 2, ",", ".") }}</td>
                            </tr>
                            <tr class="table-active">
                                <th colspan="2">Total Payment (IDR) :</th>
                                <td class="text-end">
                                    <span class="fw-semibold">
                                        {{ "Rp" . number_format($totalPayment, 2, ",", ".") }}
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

<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                    <button type="button" class="btn w-sm btn-danger ">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                    <div class="mb-3">
                        <label for="addaddress-Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter name">
                    </div>

                    <div class="mb-3">
                        <label for="addaddress-Name" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter phone number">
                    </div>

                    <div class="mb-3">
                        <label for="addaddress-textarea" class="form-label">Address</label>
                        <textarea class="form-control" id="addaddress-textarea" placeholder="Enter address (your street name)" rows="2"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="addaddress-Name" class="form-label">RT</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter rt">
                        </div>
                        <div class="col">
                            <label for="addaddress-Name" class="form-label">RW</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter rw">
                        </div>
                        <div class="col">
                            <label for="addaddress-Name" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter zip code">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="state" class="form-label">Province</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option selected disabled>Choose..</option>
                                <option value="aaaaa">aaaaa</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="state" class="form-label">Regency</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option selected disabled>Choose..</option>
                                <option value="aaaaa">aaaaa</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="state" class="form-label">District</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option selected disabled>Choose..</option>
                                <option value="aaaaa">aaaaa</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="state" class="form-label">Village</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option selected disabled>Choose..</option>
                                <option value="aaaaa">aaaaa</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
@section('script')
<script src="{{ URL::asset('assets/js/pages/ecommerce-product-checkout.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection