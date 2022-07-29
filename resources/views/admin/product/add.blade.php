@extends('layouts.master')
@section('title') @lang('translation.create-product') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') INDIGCO @endslot
@slot('title') Tambah Produk @endslot
@endcomponent
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Kode Produk</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" id="id_barang" name="id_barang" autofocus required class="form-control {{ $errors->get('title') ? 'is-invalid' : '' }}" id="product-title-input" placeholder="Enter product code" name="title">
                            </div>
                            <div class="col-2">
                                <button type="button" onclick="random_code()" class="btn btn-success w-100">Kode Acak</button>
                            </div>
                        </div>
                        <script>
                            function random_code() {
                                var random_code = Math.floor(Math.random() * 99999);
                                $('#id_barang').val(random_code);
                            }
                        </script>

                        @foreach ($errors->get('title') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Nama Produk</label>
                        <input type="text" class="form-control {{ $errors->get('title') ? 'is-invalid' : '' }}" id="product-title-input" placeholder="Enter product title" name="title">
                        @foreach ($errors->get('title') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="product-price-input">Harga</label>
                        <input type="number" class="form-control {{ $errors->get('price') ? 'is-invalid' : '' }}" id="product-price-input" placeholder="Enter price" name="price">
                        @foreach ($errors->get('price') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="product-weight-input">Berat</label>
                        <input type="number" class="form-control {{ $errors->get('weight') ? 'is-invalid' : '' }}" id="product-weight-input" placeholder="Enter weight (gram)" name="weight">
                        @foreach ($errors->get('weight') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                    <div>
                        <label class="form-label" for="product-stock-input">Stok</label>
                        <input type="number" class="form-control {{ $errors->get('stock') ? 'is-invalid' : '' }}" id="product-stock-input" placeholder="Enter stock" name="stock">
                        @foreach ($errors->get('stock') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Unggah Foto Produk</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="fs-13 mb-1">Foto Produk Utama</h5>
                        <input class="form-control {{ $errors->get('galleries_id') ? 'is-invalid' : '' }}" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg" name="foto">
                        @foreach ($errors->get('galleries_id') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                    <div>
                        <h5 class="fs-13 mb-1">Galeri Produk</h5>

                        <div class="dropzone">
                            <div class="fallback">
                                <input type="file" multiple name="files[]" type="file">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>
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

                        <select class="form-select {{ $errors->get('publish') ? 'is-invalid' : '' }}" id="choices-publish-status-input" data-choices data-choices-search-false name="publish">
                            <option value="Published" selected>Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                        @foreach ($errors->get('publish') as $msg)
                        <div class="invalid-feed text-danger">
                            {{ $msg }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Kategori Produk</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Select product category</p>
                    <select class="form-select {{ $errors->get('category_id') ? 'is-invalid' : '' }}" id="choices-category-input" data-choices data-choices-search-false name="category_id">
                        @foreach($category as $value)
                        @if($value->name == 'All')
                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                        @endif
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('category_id') as $msg)
                    <div class="invalid-feed text-danger">
                        {{ $msg }}
                    </div>
                    @endforeach
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Catatan</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1">
                            <input class="form-control {{ $errors->get('tags') ? 'is-invalid' : '' }}" data-choices data-choices-multiple-remove="true" placeholder="Enter tags (example: Cotton)" type="text" name="tags">
                            @foreach ($errors->get('tags') as $msg)
                            <div class="invalid-feed text-danger">
                                {{ $msg }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Deskripsi Produk</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Tambahkan deskripsi singkat untuk produk</p>
                    <textarea class="form-control {{ $errors->get('description') ? 'is-invalid' : '' }}" placeholder="Enter short description for product" rows="3" name="description"></textarea>
                    @foreach ($errors->get('description') as $msg)
                    <div class="invalid-feed text-danger">
                        {{ $msg }}
                    </div>
                    @endforeach
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="text-end mb-3">
                <input type="submit" class="btn btn-success w-sm w-100" value="Simpan">
            </div>
        </div>
    </div>
</form>
<!-- end row 
-->
@endsection
@section('script')
<script src="assets/libs/@ckeditor/@ckeditor.min.js"></script>

<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="assets/js/pages/ecommerce-product-create.init.js"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection