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

                <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <?php $url = Illuminate\Support\Facades\Request::segment(2); ?>
                    <input type="hidden" name="url" value="{{$url}}">
                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                        <!-- <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
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
                        </ul> -->
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
                                    <?php $url = Illuminate\Support\Facades\Request::segment(2);
                                    $id = $_GET['id'] ?>
                                    @if($address->regencies_id == $id)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-check card-radio">
                                            <input type="hidden" id value="{{ $id }}" name="address_id">
                                            <input id="shippingAddress_{{$address->id}}" name="shippingAddress" value="{{ $address->regencies_id }}" type="radio" class="form-check-input" checked>
                                            <label class="form-check-label" for="shippingAddress_{{$address->id}}">
                                                <span class="mb-4 fw-semibold d-block text-muted text-uppercase">{{ $address->location }}</span>
                                                <span class="fs-14 mb-2 d-block">{{ $address->name }}</span>
                                                <span class="text-muted fw-normal text-wrap mb-1 d-block">{{ $address->address . ', RT ' . $address->rt . 'RW ' . $address->rw }}</span>
                                                <span class="text-muted fw-normal d-block">{{ $address->phone }}</span>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#editAddressModal_{{ $address->id }}"><i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                    Edit</a>
                                            </div>
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal_{{ $address->id }}"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-check card-radio">
                                            <input type="hidden" id value="{{ $id }}" name="address_id">
                                            <input id="shippingAddress_{{$address->id}}" name="shippingAddress" value="{{ $address->regencies_id }}" type="radio" class="form-check-input">
                                            <label class="form-check-label" for="shippingAddress_{{$address->id}}">
                                                <span class="mb-4 fw-semibold d-block text-muted text-uppercase">{{ $address->location }}</span>
                                                <span class="fs-14 mb-2 d-block">{{ $address->name }}</span>
                                                <span class="text-muted fw-normal text-wrap mb-1 d-block">{{ $address->address . ', RT ' . $address->rt . 'RW ' . $address->rw }}</span>
                                                <span class="text-muted fw-normal d-block">{{ $address->phone }}</span>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#editAddressModal_{{ $address->id }}"><i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                    Edit</a>
                                            </div>
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal_{{ $address->id }}"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                    Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('input:radio[name=shippingAddress]').click(function() {
                                                var data = $(this).val();
                                                window.location.replace('<?= url('transaction?id=') ?>' + data);
                                            });
                                        });
                                    </script>
                                    @endforeach
                                </div>


                                <div class="mt-4">
                                    @if (count($addresses) == 0)
                                    @php $harga = 0; @endphp
                                    @else
                                    <h5 class="fs-14 mb-3">Shipping Method</h5>
                                    <div class="row g-4">
                                        @foreach ($data2 as $key)
                                        @php $harga = $key['costs'][0]['cost'][0]['value']; @endphp
                                        @for ($a = 0; $a < count($key['costs']); $a++) <div class="col-lg-6">
                                            @if( $key['costs'][$a]['service'] == "OKE")
                                            <div class="form-check card-radio">
                                                <input id="shippingMethod_{{ $key['costs'][$a]['service']}}" value="{{$key['costs'][$a]['service']}}-{{$key['costs'][$a]['cost'][0]['value']}}" name="shippingMethod" type="radio" checked class="form-check-input">
                                                <label class="form-check-label" for="shippingMethod_{{ $key['costs'][$a]['service']}}">
                                                    <input type="radio" class="d-none" name="sender" value="JNE {{ $key['costs'][$a]['service']}}" checked>
                                                    <span class="fs-16 float-end mt-2 text-wrap d-block fw-semibold">{{"Rp " . number_format($key['costs'][$a]['cost'][0]['value'], 2, ",", ".")}}</span>
                                                    <span class="fs-14 mb-1 text-wrap d-block">JNE {{ $key['costs'][$a]['service']}}</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">{{$key['costs'][$a]['description']}}</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">Expected
                                                        Delivery {{ $key['costs'][$a]['cost'][0]['etd']}} Days</span>
                                                </label>
                                            </div>
                                            @else
                                            <div class="form-check card-radio">
                                                <input id="shippingMethod_{{ $key['costs'][$a]['service']}}" value="{{$key['costs'][$a]['service']}}-{{$key['costs'][$a]['cost'][0]['value']}}" name="shippingMethod" type="radio" class="form-check-input">
                                                <label class="form-check-label" for="shippingMethod_{{ $key['costs'][$a]['service']}}">
                                                    <input type="radio" class="d-none" name="sender" value="JNE {{ $key['costs'][$a]['service']}}">
                                                    <span class="fs-16 float-end mt-2 text-wrap d-block fw-semibold">{{"Rp " . number_format($key['costs'][$a]['cost'][0]['value'], 2, ",", ".")}}</span>
                                                    <span class="fs-14 mb-1 text-wrap d-block">JNE {{ $key['costs'][$a]['service']}}</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">{{$key['costs'][$a]['description']}}</span>
                                                    <span class="text-muted fw-normal text-wrap d-block">Expected
                                                        Delivery {{ $key['costs'][$a]['cost'][0]['etd']}} Days</span>
                                                </label>
                                            </div>
                                            @endif
                                    </div>
                                    @endfor
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mt-4">
                            <?php $address = count($addresses) ?>
                            @if($address != 0)
                            <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab" data-nexttab="pills-payment-tab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue to Payment</button>
                            @else
                            <button type="button" onclick="cek_address()" class="btn btn-primary btn-label right ms-auto nexttab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue to Payment</button>
                            @endif
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

                            <h3 class="fw-semibold">Order ID: <a href="{{ url('orders/detail') }}" class="text-decoration-underline">VZ2451</a></h3>
                        </div>
                    </div>
                    <!-- end tab pane -->
            </div>
            <!-- end tab content -->
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
                                    <img src="{{ url($cart->product->galleries[0]->photo_url) }}" alt="" class="img-fluid d-block">
                                </div>
                            </td>
                            <td>
                                <h5 class="fs-14"><a href="apps-ecommerce-product-details" class="text-dark">{{ $cart->product->title }}</a>
                                </h5>
                                <?php $product = \App\Models\Product::where('id', $cart->product_id)->first(); ?>
                                <p class="text-muted mb-0">{{ $product->price . ' x ' . $cart->quantity }}</p>
                            </td>
                            <td class="text-end">{{ "Rp" . number_format($cart->price * $cart->quantity, 2, ",", ".") }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="fw-semibold" colspan="2">Sub Total :</td>
                            <?php
                            $subTotal = 0;

                            foreach ($carts as $cart) {
                                $subTotal += $cart->price;
                            }

                            $discount = $subTotal * 10.1 / 100;

                            $totalPayment = $subTotal + $harga + 7000 - $discount;
                            ?>
                            <input type="hidden" name="sub_total" value="{{$subTotal}}">
                            <td class="fw-semibold text-end">{{ "Rp" . number_format($subTotal, 2, ",", ".") }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Discount : </td>
                            <input type="hidden" name="discount_id" value="">
                            <td class="text-end">- {{ "Rp" . number_format($discount, 2, ",", ".") }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Midtrans fee : </td>
                            <td class="text-end text-success">{{ "Rp" . number_format(7000, 2, ",", ".") }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Shipping Charge :</td>
                            <input type="hidden" id="shipping-charge2" name="shipping_charge" value="{{$harga}}">
                            <td class="text-end" id="shipping-charge">{{ "Rp" . number_format($harga, 2, ",", ".") }}</td>
                        </tr>
                        <tr class="table-active">
                            <th colspan="2">Total Payment (IDR) :</th>
                            <td class="text-end">
                                <input type="hidden" id="total_payment2" name="total_payment" value="{{$totalPayment}}">
                                <span class="fw-semibold" id="total_payment">
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
</form>
<!-- end row -->

@foreach ($data2 as $key)
@for ($a = 0; $a < count($key['costs']); $a++) <script type="text/javascript">

    $('#shippingMethod_<?= $key['costs'][$a]['service'] ?>').on('click', function() {
    let id_provinsi = $('#provinsi').val();
    });
    </script>
    @endfor
    @endforeach
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
                        <form action="{{route('address.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="state" class="form-label">Your Location</label>
                                <?php $url = Illuminate\Support\Facades\Request::segment(2); ?>
                                <input type="hidden" name="url" value="{{$url}}">
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
                                        @foreach($provinces as $key => $provinsi)
                                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label class="form-label">Regency</label>
                                    <input type="hidden" id="id_kabupaten" name="id_kabupaten">
                                    <select class="form-select" name="kabupaten" id="kabupaten">
                                        <option selected disabled>Choose..</option>
                                    </select>
                                </div>
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
    @foreach ($addresses as $address)
    @php $id = $address->id; @endphp
    <div id="removeItemModal_{{ $address->id }}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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

                        <form action="{{route('address.destroy',$address->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="url" value="{{$url}}">
                            <button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
                        </form>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="editAddressModal_{{ $address->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{route('address.update',$address->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="state" class="form-label">Your Location</label>
                                <input type="hidden" name="url" value="{{$url}}">
                                <select class="form-select" id="state" name="location" required data-choices data-choices-search-false>
                                    @if($address->location == 'Home Address')
                                    <option value="Home Address" selected>Home Address</option>
                                    <option value="Office Address">Office Address</option>
                                    @else
                                    <option value="Home Address">Home Address</option>
                                    <option value="Office Address" selected>Office Address</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="addaddress-Name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="addaddress-Name" value="{{$address->name}}" required placeholder="Enter name">
                            </div>

                            <div class="mb-3">
                                <label for="addaddress-Name" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="addaddress-Name" value="{{$address->phone}}" required placeholder="Enter phone number">
                            </div>

                            <div class="mb-3">
                                <label for="addaddress-textarea" class="form-label">Address</label>
                                <textarea class="form-control" id="addaddress-textarea" name="address" required placeholder="Enter address (your street name)" rows="2">{{$address->address}}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="addaddress-Name" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="addaddress-Name" value="{{$address->rt}}" name="rt" required placeholder="Enter rt">
                                </div>
                                <div class="col">
                                    <label for="addaddress-Name" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="addaddress-Name" value="{{$address->rw}}" name="rw" required placeholder="Enter rw">
                                </div>
                                <div class="col">
                                    <label for="addaddress-Name" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="addaddress-Name" name="zip_code" value="{{$address->zip_code}}" required placeholder="Enter zip code">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Province</label>
                                    <select class="form-select" name="provinsi" id="provinsi_{{$address->id}}">
                                        <option selected disabled>Choose..</option>
                                        @foreach($provinces as $key => $provinsi)
                                        @if($provinsi->id == $address->province_id)
                                        <option value="{{$provinsi->id}}" selected>{{$provinsi->name}}</option>
                                        @else
                                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label class="form-label">Regency</label>
                                    <select class="form-select" name="kabupaten" id="kabupaten_{{$address->id}}">
                                        <option selected disabled>Choose..</option>
                                        <?php $regencies  = Dipantry\Rajaongkir\Models\ROCity::where('province_id', $address->province_id)->get(); ?>
                                        @foreach($regencies as $key => $kabupaten)
                                        @if($kabupaten->id == $address->regencies_id)
                                        <option value="{{$kabupaten->id}}" selected>{{$kabupaten->name}}</option>
                                        @else
                                        <option value="{{$kabupaten->id}}">{{$kabupaten->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
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
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{url('getkabupaten')}}",
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

                $('#provinsi_<?= $id ?>').on('change', function() {
                    let id_provinsi = $('#provinsi_<?= $id ?>').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{url('getkabupaten')}}",
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
        });
    </script>
    @endforeach

    <script type="text/javascript">
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
                        url: "{{url('getkabupaten')}}",
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
        });

        function cek_address() {
            alert('Isi Addreess Terlebih Dahulu');
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
            return (((sign) ? '' : '-') + 'Rp' + num + ',' + cents);

        }
    </script>



    @foreach ($data2 as $key)
    @for ($a = 0; $a < count($key['costs']); $a++) <script type="text/javascript">
        $(document).ready(function() {
        $('input:radio[name=shippingMethod]').click(function() {
        let data=$(this).val();
        let price = data.split("-");
        let totalPayment = parseInt(<?= $subTotal ?>) + parseInt(price[1]) + parseInt(7000) - parseInt(<?= $discount ?>);
        $('#shipping-charge').html(formatCurrency(price[1]));
        $('#total_payment').html(formatCurrency(totalPayment));
        $('#shipping-charge2').val(price[1]);
        $('#total_payment2').val(totalPayment);

        });
        });
        </script>
        @endfor
        @endforeach
        @endsection
        @section('script')
        <script src="{{ URL::asset('assets/js/pages/ecommerce-product-checkout.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
        @endsection