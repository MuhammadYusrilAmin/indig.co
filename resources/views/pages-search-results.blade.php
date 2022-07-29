@extends('layouts.master')
@section('title') @lang('translation.search-results') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Search Results @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-6">
                        <div class="row g-2">
                            <form action="{{ route('search.store') }}" method="POST">
                                @csrf
                                <div class="col mt-3">
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Search here.." name="search" value="{{ $search }}">
                                        <!-- <a class="btn btn-link link-success btn-lg position-absolute end-0 top-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="ri-mic-fill"></i></a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <h5 class="fs-16 fw-semibold text-center mb-0">Showing results for "<span class="text-primary fw-medium fst-italic">{{ $search }}</span> "</h5>
                    </div>
                </div>
                <!--end row-->

                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-body">
                        <button type="button" class="btn-close text-reset float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                            <div class="search-voice">
                                <i class="ri-mic-fill align-middle"></i>
                                <span class="voice-wave"></span>
                                <span class="voice-wave"></span>
                                <span class="voice-wave"></span>
                            </div>
                            <h4>Talk to me, what can I do for you?</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab" aria-selected="false">
                            <i class="ri-search-2-line text-muted align-bottom me-1"></i> All Results
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" id="products-tab" href="#products" role="tab" aria-selected="true">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#cooperatives" role="tab" aria-selected="false">
                            Cooperatives
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="all" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper images-menu mb-3">
                                    <div class="swiper-wrapper">
                                        @foreach ($cooperatives as $data)
                                        <div class="swiper-slide">
                                            <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('assets/images/companies/'.$data->avatar) }}" alt="" width="60" class="rounded" />
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <a href="{{ url('sellers/'.$data->id) }}" class="stretched-link fw-medium">{{ $data->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-light">
                            <div class="row">
                                @foreach ($products as $data)
                                <div class="col-xl-2 col-lg-3 col-sm-5">
                                    <div class="gallery-box card" style="cursor: pointer;">
                                        <div class="gallery-container">
                                            <a href="{{ url('/detail_products?id='.$data->id) }}">
                                                <?php $galleries = App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                                <div class="text-center">
                                                    <img class="gallery-img img-fluid mx-auto" src="{{ $galleries->photo_url }}" alt="" style="height: 150px; object-fit: cover;">
                                                </div>
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">{{ $data->title }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content mt-3">
                                            <div class="flex-grow-1 text-muted">
                                                by <span class="text-body text-truncate">{{ $data->cooperative->name }}</span>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <?php
                                                    $orders = App\Models\OrderDetail::where('product_id', $data->id)->get();

                                                    $totalpurchased = 0;
                                                    foreach ($orders as $result) {
                                                        $totalpurchased += $result->quantity;
                                                    }
                                                    ?>
                                                    <span>{{ $totalpurchased }}x purchased</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="products" role="tabpanel">
                        <div class="gallery-light">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-xl-2 col-lg-3 col-sm-5">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a onclick="event.preventDefault(); document.getElementById('show-detail_{{$data->id}}').submit();">
                                                <?php $galleries = App\Models\ProductGallery::where('product_id', $data->id)->first(); ?>
                                                <div class="text-center">
                                                    <img class="gallery-img img-fluid mx-auto" src="{{ $galleries->photo_url }}" alt="" style="height: 150px; object-fit: cover;">
                                                </div>
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">{{ $data->title }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content mt-3">
                                            <div class="flex-grow-1 text-muted">
                                                by <a href="" class="text-body text-truncate">{{ $data->cooperative->name }}</a>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <?php
                                                    $orders = App\Models\OrderDetail::where('product_id', $data->id)->get();

                                                    $totalpurchased = 0;
                                                    foreach ($orders as $result) {
                                                        $totalpurchased += $result->quantity;
                                                    }
                                                    ?>
                                                    <span>{{ $totalpurchased }}x purchased</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="cooperatives" role="tabpanel">
                        <div class="row">
                            @foreach ($cooperatives as $data)
                            <div class="col-lg-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-sm-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('assets/images/companies/'.$data->avatar) }}" alt="" width="80" class="rounded-1" />
                                            </div>
                                            <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                <ul class="list-inline mb-2">
                                                    <li class="list-inline-item"><span class="badge badge-soft-success fs-11">{{ $data->location }}</span></li>
                                                </ul>
                                                <h5 class="fs-15"><a href="{{ 'sellers/'.$data->id }}">{{ $data->name }}</a></h5>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><i class="lab la-product-hunt text-success align-middle me-1"></i> {{ '2 products' }}</li>
                                                    <li class="list-inline-item"><i class="ri-calendar-2-fill text-success align-middle me-1"></i> Since {{ $data->since_year }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            @endforeach
                        </div>
                        <!--end row-->

                        <div class="mt-4">
                            <ul class="pagination pagination-separated justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a href="javascript:void(0);" class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card -->
    </div>
    <!--end card -->
</div>
<!--end row-->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/glightbox/glightbox.min.js') }}"></script>

<!-- swiper js -->
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js') }}"></script>

<!-- search-result init js -->
<script src="{{ URL::asset('assets/js/pages/search-result.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection