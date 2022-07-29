@extends('layouts.master')
@section('title') @lang('translation.order-details') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') INDIGCO @endslot
@slot('title') Detail Pesanan @endslot
@endcomponent
<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Nomor Resi: {{ $show->resi }}</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Detail Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Penilaian</th>
                                <th scope="col" class="text-end">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="{{ url($item->product->galleries[0]->photo_url) }}" alt="" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3 mt-2">
                                            <h5 class="fs-14"><a href="apps-ecommerce-product-details" class="text-body">{{ $item->product->title }}</a></h5>
                                            <p class="text-muted mb-0">Request: <span class="fw-medium">{{ $item->request }}</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ "Rp" . number_format($item->price, 2, ",", ".") }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <?php
                                    $ratings = App\Models\Rating::where('order_detail_id', $item->id)->get();
                                    ?>
                                    @if ($item->order->status == 'Received' && count($ratings) == null)
                                    <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#reviewNow{{$data->id}}">Review Now</button>
                                    @elseif ($item->order->status == 'Received')
                                    <button type="button" class="btn btn-light btn-sm">
                                        <i class="lab las la-star text-warning"></i>
                                        {{ $ratings[0]->rating }}
                                    </button>
                                    @endif
                                </td>
                                <td class="fw-medium text-end">
                                    {{ "Rp" . number_format($item->price, 2, ",", ".") }}
                                </td>
                            </tr>
                            @endforeach
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">{{ "Rp" . number_format($show->sub_total, 2, ",", ".") }}</td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Pengiriman :</td>
                                                <td class="text-end">{{ "Rp" . number_format($show->shipping_charge, 2, ",", ".") }}</td>
                                            </tr>
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row">Total Pembayaran :</th>
                                                <th class="text-end">{{ "Rp" . number_format($show->total_payment, 2, ",", ".") }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Status Pesanan</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="profile-timeline">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingOne">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-success rounded-circle">
                                                <i class="ri-shopping-bag-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-0">Menunggu konfirmasi</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    @if ($show->status == 'Pending')
                                    <span class="fw-normal mb-1">Menunggu pesanan dikonfirmasi oleh admin</span>
                                    @elseif ($show->status == 'Inprogress' || $show->status == 'Pickups' || $show->status == 'Received')
                                    <span class="fw-normal mb-1">Pesanan berhasil dikonfirmasi</span>
                                    @elseif ($show->status == 'Rejected')
                                    <span class="fw-normal mb-1 text-danger">Pesanan ditolak oleh toko</span>
                                    @elseif ($show->status == 'Cancelled')
                                    <span class="fw-normal mb-1 text-danger">Pesanan dibatalkan</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if ($show->status == 'Inprogress' || $show->status == 'Pickups' || $show->status == 'Received')
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingTwo">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-gift-outline"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1">Pesanan dikemas</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    @if ($show->status == 'Inprogress')
                                    <span class="fw-normal mb-1">Pesanan anda masih dikemasi oleh toko</span>
                                    @elseif ($show->status == 'Pickups' || $show->status == 'Received')
                                    <span class="fw-normal mb-1">Pesanan berhasil dikirim</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($show->status == 'Pickups' || $show->status == 'Received')
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingThree">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-success rounded-circle">
                                                <i class="ri-truck-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1">Sedang dikirim</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    <h6 class="fs-14">{{ $show->sender }} - {{ $show->resi }}</h6>
                                    @if ($show->status == 'Received')
                                    <span class="fw-normal mb-1">Pesanan sudah diterima</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($show->status == 'Received')
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingFive">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFile" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-light text-success rounded-circle">
                                                <i class="mdi mdi-package-variant"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-0">Pesanan diterima - <span class="text-muted mb-0">{{ $show->updated_at }}</span></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--end accordion-->
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0"><i class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Detail Logistik</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px"></lord-icon>
                    <h5 class="fs-16 mt-2">{{ $show->sender }}</h5>
                    <p class="text-muted mb-0">No. Resi: {{ $show->resi }}</p>
                    <p class="text-muted mb-0">Kode Pembayaran : {{ $show->midtrans_booking_code }}</p>
                </div>
            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">Detail Pembeli</h5>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ url('assets/images/users/'.$show->user->avatar) }}" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">{{ $show->user->name }}</h6>
                                <p class="text-muted mb-0">{{ $show->user->role }}</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $show->user->email }}</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $show->address->phone }}</li>
                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Tujuan Pengiriman</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14">{{ $show->address->name }}</li>
                    <li>{{ $show->address->phone }}</li>
                    <li>{{ $show->address->address }}</li>
                    <li>{{ 'RT '.$show->address->rt.' / RW '.$show->address->rw.' - '.$show->address->zip_code  }}</li>
                </ul>
            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Detail Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">No. Resi:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $show->resi }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Metode Pembayaran:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">
                            @if ($show->midtrans_booking_code != null)
                            Midtrans
                            @else
                            Tunai
                            @endif
                        </h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Total Pembayaran:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $show->total_payment }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection