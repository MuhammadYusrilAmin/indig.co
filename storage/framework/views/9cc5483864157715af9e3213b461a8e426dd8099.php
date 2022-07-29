
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.orders'); ?> <?php $__env->stopSection(); ?>
<style>
    /* Style untuk rating star */
    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    /* CSS untuk hover nya */
    .rating>input:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover untuk star sebelumnya  */
    .rating>input:checked+label:hover,
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> INDIGCO <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Pesanan Anda <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Pesanan Anda</h5>
                    <div class="flex-shrink-0">
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-12 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Cari pesanan...">
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
                                <i class="ri-store-2-fill me-1 align-bottom"></i> Semua Pesanan
                                <?php if(count($datas->where('user_id', Auth::user()->id)) != 0): ?>
                                <span class="badge bg-primary align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pending" data-bs-toggle="tab" id="Pending" href="#pending" role="tab" aria-selected="true">
                                <i class="las la-info-circle me-1 align-middle"></i>
                                Menunggu Konfirmasi
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Pending')) != 0): ?>
                                <span class="badge bg-warning align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Pending'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Inprogress" data-bs-toggle="tab" id="Inprogress" href="#inprogress" role="tab" aria-selected="true">
                                <i class="mdi mdi-progress-clock me-1 align-bottom"></i> Dikemas
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Inprogress')) != 0): ?>
                                <span class="badge bg-warning align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Inprogress'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups" role="tab" aria-selected="false">
                                <i class="ri-truck-line me-1 align-bottom"></i> Dikirim
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Pickups')) != 0): ?>
                                <span class="badge bg-secondary align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Pickups'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Received" data-bs-toggle="tab" id="Received" href="#received" role="tab" aria-selected="false">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Diterima
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Received')) != 0): ?>
                                <span class="badge bg-success align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Received'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns" href="#returns" role="tab" aria-selected="false">
                                <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Dikembalikan
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Returns')) != 0): ?>
                                <span class="badge bg-danger align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Returns'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled" href="#cancelled" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Dibatalkan
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Cancelled')) != 0): ?>
                                <span class="badge bg-danger align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Cancelled'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Rejected" data-bs-toggle="tab" id="Rejected" href="#rejected" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Ditolak
                                <?php if(count($datas->where('user_id', Auth::user()->id)->where('status', 'Rejected')) != 0): ?>
                                <span class="badge bg-danger align-middle ms-1"><?php echo e(count($datas->where('user_id', Auth::user()->id)->where('status', 'Rejected'))); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>

                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle fs-6" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="id">No. Resi</th>
                                    <th class="sort" data-sort="product_name">Produk</th>
                                    <th class="sort" data-sort="date">Tanggal Pesan</th>
                                    <th class="sort" data-sort="amount">Total Bayar</th>
                                    <th class="sort" data-sort="payment">Metode Pengiriman</th>
                                    <th class="sort" data-sort="status">Status Pengiriman</th>
                                    <th class="sort" data-sort="customer_name">Penilaian</th>
                                    <th class="sort" data-sort="city">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $__currentLoopData = $datas->where('user_id', Auth::user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <?php $items = App\Models\OrderDetail::all(); ?>
                                    <td class="id">
                                        <?php if($data->resi != null): ?>
                                        <a href="<?php echo e(url('orders/'.$data->id)); ?>" class="fw-medium link-primary"><?php echo e($data->resi); ?></a>
                                        <?php else: ?>
                                        Belum dikirim
                                        <?php endif; ?>
                                    </td>
                                    <td class="product_name"><?php echo e($data->items[0]->product->title); ?></td>
                                    <td><?php echo e($data->created_at); ?></td>
                                    <td class="amount"><?php echo e("Rp" . number_format($data->total_payment, 2, ",", ".")); ?></td>
                                    <td class="payment"><?php echo e($data->sender); ?></td>
                                    <td class="status">
                                        <span class="badge <?php echo e($data->status == 'Pending' ? 'badge-soft-warning' : ($data->status == 'Inprogress' ? 'badge-soft-warning' : ($data->status == 'Delivered' ? 'badge-soft-secondary' : ($data->status == 'Pickups' ? 'badge-soft-info' : ($data->status == 'Return' ? 'badge-soft-primary' : ($data->status == 'Received' ? 'badge-soft-success' : 'badge-soft-danger')))))); ?> text-uppercase"><?php echo e($data->status); ?></span>
                                    </td>
                                    <td class="customer_name">
                                        <?php
                                        $items = App\Models\OrderDetail::all();
                                        $ratings = App\Models\Rating::where('order_id', $data->items[0]->id)->get();
                                        $rating2 = \App\Models\Rating::where('order_id', $data->items[0]->id)->sum('rating');
                                        $bintang = 0;
                                        if (count($ratings) != 0) {
                                            $bintang = count($ratings);
                                        } else {
                                            $bintang += 1;
                                        }

                                        $rata2rating = round($rating2 / $bintang, 1);
                                        ?>
                                        <?php if($data->status == 'Received' && count($ratings) == null): ?>
                                        <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#reviewNow<?php echo e($data->id); ?>">Beri Ulasan</button>
                                        <?php elseif($data->status == 'Received'): ?>
                                        <button type="button" class="btn btn-light btn-sm">
                                            <i class="lab las la-star text-warning"></i>
                                            <?php echo e($rata2rating); ?>

                                        </button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <?php if($data->status == 'Delivered'): ?>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                                <button type="button" data-bs-toggle="modal" class="btn btn-success btn-sm" disabled>
                                                    <i class="ri-checkbox-circle-line align-bottom me-1"></i> Diterima
                                                </button>
                                            </li>
                                            <?php elseif($data->status == 'Pickups'): ?>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                                <a href="#acceptOrder<?php echo e($data->id); ?>" data-bs-toggle="modal" class="btn btn-success btn-sm">
                                                    <i class="ri-checkbox-circle-line align-bottom me-1"></i> Diterima
                                                </a>
                                            </li>
                                            <?php elseif($data->status == 'Pending'): ?>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#CancellOrder<?php echo e($data->id); ?>">
                                                    <i class="ri-close-line align-middle me-1"></i> Batalkan
                                                </button>
                                            </li>
                                            <?php endif; ?>
                                            <?php if($data->status == 'Returns' || $data->status == 'Cancelled' || $data->status == 'Rejected'): ?>
                                            <li class="list-inline-item">
                                                <p class="text-danger"><?php echo e($data->canceled); ?></p>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>

                                <!-- Cancel Modal -->
                                <div class="modal fade fadeFlip" id="CancellOrder<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="CancellOrder<?php echo e($data->id); ?>Label" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="<?php echo e(url('cancell-order', $data->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-header">
                                                    <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f7b84b,secondary:#405189" style="width:70px;height:70px"></lord-icon>
                                                    <h5 class="modal-title" id="CancellOrder<?php echo e($data->id); ?>Label">Kenapa anda membatalkan pesanan?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="canceled" id="radio1<?php echo e($data->id); ?>" value="Ingin Mengganti Alamat Tujuan" checked>
                                                            <label class="form-check-label" for="radio1<?php echo e($data->id); ?>">
                                                                Ingin Mengganti Alamat Tujuan
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="canceled" value="Salah Memilih Produk" id="radio2<?php echo e($data->id); ?>">
                                                            <label class="form-check-label" for="radio2<?php echo e($data->id); ?>">
                                                                Salah Memilih Produk
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accepted Modal -->
                                <div class="modal fade flip" id="acceptOrder<?php echo e($data->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px"></lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>Pesanan sudah anda terima?</h4>
                                                    <div class="hstack gap-2 justify-content-center mt-4">
                                                        <form action="<?php echo e(url('accept-order', $data->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="button" class="btn btn-link link-primary fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Belum</button>
                                                            <button type="submit" data-bs-toggle="modal" class="btn btn-success">
                                                                <i class="ri-checkbox-circle-line align-bottom me-1"></i> Sudah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating Modal -->
                                <div class="modal fade" id="reviewNow<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addCategoryLabel">Beri Ulasan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php $i = 1 ?>
                                            <form class="" style="margin-right: 28%;" method="POST" id="give-rating<?php echo e($data->id); ?>" action="<?php echo e(route('ratings.store')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <?php $id =0 ?>
                                                    <?php $__currentLoopData = $items->where('order_id', $data->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <h6><?php echo e($i++.'. '.$item->product->title); ?></h6>
                                                    <div class="rating fs-3">
                                                        <input type="radio" id="star5<?php echo e($data->id.$item->id); ?>" name="<?php echo e($item->id); ?>" value="5">
                                                        <label class="full" for="star5<?php echo e($data->id.$item->id); ?>"></label>

                                                        <input type="radio" id="star4<?php echo e($data->id.$item->id); ?>" name="<?php echo e($item->id); ?>" value="4">
                                                        <label class="full" for="star4<?php echo e($data->id.$item->id); ?>"></label>

                                                        <input type="radio" id="star3<?php echo e($data->id.$item->id); ?>" name="<?php echo e($item->id); ?>" value="3">
                                                        <label class="full" for="star3<?php echo e($data->id.$item->id); ?>"></label>

                                                        <input type="radio" id="star2<?php echo e($data->id.$item->id); ?>" name="<?php echo e($item->id); ?>" value="2">
                                                        <label class="full" for="star2<?php echo e($data->id.$item->id); ?>"></label>

                                                        <input type="radio" id="star1<?php echo e($data->id.$item->id); ?>" name="<?php echo e($item->id); ?>" value="1">
                                                        <label class="full" for="star1<?php echo e($data->id.$item->id); ?>"></label>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo e($item->order_id); ?>">
                                                    <textarea class="form-control mb-3" placeholder="Leave your review" rows="3" name="deskripsi<?php echo e($item->id); ?>"></textarea>
                                                    <?php $id++ ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link link-primary fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Cancel</button>
                                            <button type="button" onclick="event.preventDefault(); document.getElementById('give-rating<?= $data->id ?>').submit();" class="btn btn-success">
                                                <i class="ri-checkbox-circle-line align-bottom me-1"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="assets/libs/list.js/list.js.min.js"></script>
<script src="assets/libs/list.pagination.js/list.pagination.js.min.js"></script>

<!--ecommerce-customer init js -->
<script src="assets/js/pages/ecommerce-order.init.js"></script>

<script src="assets/js/app.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KMIPN PROJECT\indigco7\resources\views/admin/order/index.blade.php ENDPATH**/ ?>