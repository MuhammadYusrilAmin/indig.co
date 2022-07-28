@extends('layouts.master')
@section('title') @lang('translation.orders') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Orders @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Order History</h5>
                    <div class="flex-shrink-0">
                        <a href="{{url('export-pdf')}}" type="button" class="btn btn-soft-success"><i class="ri-file-download-line align-bottom me-1"></i> Import</a>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-12 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for order ID, customer, order status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-6" style="display: none;">
                            <div>
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="Select date">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4" style="display: none;">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus" style="display: none;">
                                    <option value="">Status</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4" style="display: none;">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                    <option value="">Select Payment</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4" style="display: none;">
                            <div>
                                <button type="button" class="btn btn-secondary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body pt-0">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom nav-primary mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="false">
                                <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                                @if (count($datas) != 0)
                                <span class="badge bg-primary align-middle ms-1">{{ count($datas) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pending" data-bs-toggle="tab" id="Pending" href="#pending" role="tab" aria-selected="true">
                                <i class="las la-info-circle me-1 align-middle"></i>
                                New Orders
                                @if (count($datas->where('status', 'Pending')) != 0)
                                <span class="badge bg-warning align-middle ms-1">{{ count($datas->where('status', 'Pending')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Inprogress" data-bs-toggle="tab" id="Inprogress" href="#inprogress" role="tab" aria-selected="true">
                                <i class="mdi mdi-progress-clock me-1 align-bottom"></i> Inprogress
                                @if (count($datas->where('status', 'Inprogress')) != 0)
                                <span class="badge bg-warning align-middle ms-1">{{ count($datas->where('status', 'Inprogress')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups" role="tab" aria-selected="false">
                                <i class="ri-truck-line me-1 align-bottom"></i> Pickups
                                @if (count($datas->where('status', 'Pickups')) != 0)
                                <span class="badge bg-secondary align-middle ms-1">{{ count($datas->where('status', 'Pickups')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Received" data-bs-toggle="tab" id="Received" href="#received" role="tab" aria-selected="false">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Received
                                @if (count($datas->where('status', 'Received')) != 0)
                                <span class="badge bg-success align-middle ms-1">{{ count($datas->where('status', 'Received')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns" href="#returns" role="tab" aria-selected="false">
                                <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Returns
                                @if (count($datas->where('status', 'Returns')) != 0)
                                <span class="badge bg-danger align-middle ms-1">{{ count($datas->where('status', 'Returns')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled" href="#cancelled" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Cancelled
                                @if (count($datas->where('status', 'Cancelled')) != 0)
                                <span class="badge bg-danger align-middle ms-1">{{ count($datas->where('status', 'Cancelled')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Rejected" data-bs-toggle="tab" id="Rejected" href="#rejected" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Rejected
                                @if (count($datas->where('status', 'Rejected')) != 0)
                                <span class="badge bg-danger align-middle ms-1">{{ count($datas->where('status', 'Rejected')) }}</span>
                                @endif
                            </a>
                        </li>
                    </ul>

                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="id">Order ID</th>
                                    <th class="sort" data-sort="customer_name">Customer</th>
                                    <th class="sort" data-sort="product_name">Product</th>
                                    <th class="sort" data-sort="date">Order Date</th>
                                    <th class="sort" data-sort="amount">Amount</th>
                                    <th class="sort" data-sort="payment">Sender</th>
                                    <th class="sort" data-sort="status">Delivery Status</th>
                                    <th class="sort" data-sort="city">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($datas as $data) <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td class="id"><a href="{{ url('orders/'.$data->id) }}" class="fw-medium link-primary">{{ $data->order_id }}</a></td>
                                    <td class="customer_name">{{ $data->user->name }}</td>
                                    <td class="product_name">{{ $data->items[0]->product->title }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td class="amount">{{ "Rp" . number_format($data->total_payment, 2, ",", ".") }}</td>
                                    <td class="payment">{{ $data->sender.', '.$data->payment_method }}</td>
                                    <td class="status">
                                        <span class="badge {{ $data->status == 'Pending' ? 'badge-soft-warning' : ($data->status == 'Inprogress' ? 'badge-soft-warning' : ($data->status == 'Delivered' ? 'badge-soft-secondary' : ($data->status == 'Pickups' ? 'badge-soft-info' : ($data->status == 'Return' ? 'badge-soft-primary' : ($data->status == 'Received' ? 'badge-soft-success' : 'badge-soft-danger'))))) }} text-uppercase">{{ $data->status }}</span>
                                    </td>
                                    @if (Auth::user()->role == 'Admin')
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            @if ($data->status == 'Returns' || $data->status == 'Cancelled' || $data->status == 'Rejected')
                                            <li class="list-inline-item">
                                                <p class="text-danger">{{ $data->canceled }}</p>
                                            </li>
                                            @endif
                                            @if ($data->status == 'Pending')
                                            <li class="list-inline-item">
                                                <form action="{{ route('orders.update', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary btn-sm">Accept</button>
                                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#deleteOrder{{ $data->id }}">Reject</a>
                                                </form>
                                            </li>
                                            @endif
                                            @if ($data->status == 'Inprogress')
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Send Order">
                                                <form action="{{ url('send-order', $data->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm" id="delete-record"><i class="ri-truck-line me-1 align-bottom"></i> Send Now</button>
                                                </form>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </td>
                                    @endif
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade flip" id="deleteOrder{{ $data->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ url('reject-order', $data->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f7b84b,secondary:#405189" style="width:70px;height:70px"></lord-icon>
                                                    <h5 class="modal-title" id="CancellOrder{{ $data->id }}Label">Why did you cancel the order?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="canceled" id="radio1{{  $data->id }}" value="Alamat tidak valid" checked>
                                                            <label class="form-check-label" for="radio1{{  $data->id }}">
                                                                Alamat tidak valid
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="canceled" value="Orderan penuh" id="radio2{{ $data->id }}">
                                                            <label class="form-check-label" for="radio2{{ $data->id }}">
                                                                Orderan penuh
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                                @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#25a0e2,secondary:#0ab39c" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted">We've searched more than 150+ Orders We did
                                    not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
<script src="assets/libs/list.js/list.js.min.js"></script>
<script src="assets/libs/list.pagination.js/list.pagination.js.min.js"></script>

<!--ecommerce-customer init js -->
<script src="assets/js/pages/ecommerce-order.init.js"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection