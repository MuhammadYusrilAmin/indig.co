@extends('layouts.master')
@section('title') @lang('translation.shopping-cart') @endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Shopping Cart @endslot
@endcomponent
<div class="row mb-3">
    <div class="col-xl-8">
        <div class="row align-items-center gy-3 mb-3">
            <div class="col-sm">
                <div>
                    <h5 class="fs-14 mb-0">Your Cart ({{ count($carts) }} items)</h5>
                </div>
            </div>
            <div class="col-sm-auto">
                <a href="#" class="d-block p-1 px-2 btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove All</a>
            </div>
        </div>

        @foreach ($carts as $cart)
        <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                            <?php $galleries = \App\Models\ProductGallery::where('product_id', $cart->product_id)->first(); ?>
                            <img src="{{ $galleries->photo_url }}" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <?php $product = \App\Models\Product::where('id', $cart->product_id)->first(); ?>
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail" class="text-dark">{{ $product->title }}</a></h5>
                        <ul class="list-inline text-muted">
                            <li class="list-inline-item">Request : <span class="fw-medium">{{ $cart->request }}</span></li>
                        </ul>

                        <div class="input-step">
                            <button type="button" class="minus">–</button>
                            <input type="number" class="product-quantity" value="{{ $cart->quantity }}" min="0" max="100">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="text-lg-end">
                            <p class="text-muted mb-1">Item Price:</p>
                            <h5 class="fs-14"><span id="ticket_price" class="product-price">{{ "Rp" . number_format($cart->price, 2, ",", ".") }}</span></h5>
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
                                <a href="#" class="d-block text-danger p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove</a>
                            </div>
                            <div>
                                <a href="#" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <div>Total :</div>
                            <h5 class="fs-14 mb-0"><span class="product-line-price">{{ "Rp" . number_format($cart->price*$cart->quantity, 2, ",", ".") }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
        @endforeach
        <!-- end card -->

        <div class="text-end mb-4">
            <a href="{{ url('transaction/create') }}" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
        </div>

        <!-- WISHLIST -->
        <div class="mt-5 pt-5">
            <div class="mb-4">
                <h5 class="fs-14 mb-0">Add your favorite product to cart?</h5>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 pb-4">
                @foreach ($wishlists as $wishlist)
                <div class="col">
                    <div class="card" style="height: 450px;">
                        <?php $galleries = \App\Models\ProductGallery::where('product_id', $wishlist->product_id)->first(); ?>
                        <img class="card-img-top img-fluid" src="src=" {{ $galleries->photo_url }}" alt="Card image cap">
                        <div class="card-body">
                            <?php $galleries = \App\Models\ProductGallery::where('product_id', $wishlist->product_id)->first(); ?>
                            <h5 class="card-title mb-2"><a href="{{ url('products-detail') }}" class="link-dark">{{ $product->title }}</a></h4>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link link-danger" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-1"></i> Remove</a>
                            <a href="{{ url('transaction') }}" class="card-link link-success">Add to Cart <i class="las la-shopping-cart align-middle ms-1 lh-1"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end card -->
        </div>
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
                        <input class="form-control me-auto" type="text" placeholder="Enter item code" aria-label="Add product here...">
                        <button type="button" class="btn btn-success w-xs">Add</button>
                    </div>
                </div>
            </div>

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
                                    <td class="text-end" id="cart-subtotal">{{ "Rp" . number_format($subTotal, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <td>Discount : </td>
                                    <td class="text-end" id="cart-discount">- {{ "Rp" . number_format($discount, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td class="text-end" id="cart-shipping">{{ "Rp" . number_format($shippingCharge, 2, ",", ".") }}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Total Payment (IDR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold" id="cart-total">
                                            {{ "Rp" . number_format($totalPayment, 2, ",", ".") }}
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
                    <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
<script src="{{ URL::asset('assets/js/pages/form-input-spin.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection