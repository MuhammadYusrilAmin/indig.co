
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.order-details'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> INDIGCO <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Detail Pesanan <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Nomor Resi: <?php echo e($show->resi); ?></h5>
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
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="<?php echo e(url($item->product->galleries[0]->photo_url)); ?>" alt="" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3 mt-2">
                                            <h5 class="fs-14"><a href="apps-ecommerce-product-details" class="text-body"><?php echo e($item->product->title); ?></a></h5>
                                            <p class="text-muted mb-0">Request: <span class="fw-medium"><?php echo e($item->request); ?></span></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e("Rp" . number_format($item->price, 2, ",", ".")); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td>
                                    <?php
                                    $ratings = App\Models\Rating::where('order_detail_id', $item->id)->get();
                                    ?>
                                    <?php if($item->order->status == 'Received' && count($ratings) == null): ?>
                                    <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#reviewNow<?php echo e($data->id); ?>">Review Now</button>
                                    <?php elseif($item->order->status == 'Received'): ?>
                                    <button type="button" class="btn btn-light btn-sm">
                                        <i class="lab las la-star text-warning"></i>
                                        <?php echo e($ratings[0]->rating); ?>

                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-medium text-end">
                                    <?php echo e("Rp" . number_format($item->price, 2, ",", ".")); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end"><?php echo e("Rp" . number_format($show->sub_total, 2, ",", ".")); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Pengiriman :</td>
                                                <td class="text-end"><?php echo e("Rp" . number_format($show->shipping_charge, 2, ",", ".")); ?></td>
                                            </tr>
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row">Total Pembayaran :</th>
                                                <th class="text-end"><?php echo e("Rp" . number_format($show->total_payment, 2, ",", ".")); ?></th>
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
                                    <?php if($show->status == 'Pending'): ?>
                                    <span class="fw-normal mb-1">Menunggu pesanan dikonfirmasi oleh admin</span>
                                    <?php elseif($show->status == 'Inprogress' || $show->status == 'Pickups' || $show->status == 'Received'): ?>
                                    <span class="fw-normal mb-1">Pesanan berhasil dikonfirmasi</span>
                                    <?php elseif($show->status == 'Rejected'): ?>
                                    <span class="fw-normal mb-1 text-danger">Pesanan ditolak oleh toko</span>
                                    <?php elseif($show->status == 'Cancelled'): ?>
                                    <span class="fw-normal mb-1 text-danger">Pesanan dibatalkan</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if($show->status == 'Inprogress' || $show->status == 'Pickups' || $show->status == 'Received'): ?>
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
                                    <?php if($show->status == 'Inprogress'): ?>
                                    <span class="fw-normal mb-1">Pesanan anda masih dikemasi oleh toko</span>
                                    <?php elseif($show->status == 'Pickups' || $show->status == 'Received'): ?>
                                    <span class="fw-normal mb-1">Pesanan berhasil dikirim</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($show->status == 'Pickups' || $show->status == 'Received'): ?>
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
                                    <h6 class="fs-14"><?php echo e($show->sender); ?> - <?php echo e($show->resi); ?></h6>
                                    <?php if($show->status == 'Received'): ?>
                                    <span class="fw-normal mb-1">Pesanan sudah diterima</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($show->status == 'Received'): ?>
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
                                            <h6 class="fs-14 mb-0">Pesanan diterima - <span class="text-muted mb-0"><?php echo e($show->updated_at); ?></span></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
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
                    <h5 class="fs-16 mt-2"><?php echo e($show->sender); ?></h5>
                    <p class="text-muted mb-0">No. Resi: <?php echo e($show->resi); ?></p>
                    <p class="text-muted mb-0">Kode Pembayaran : <?php echo e($show->midtrans_booking_code); ?></p>
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
                                <img src="<?php echo e(url('assets/images/users/'.$show->user->avatar)); ?>" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1"><?php echo e($show->user->name); ?></h6>
                                <p class="text-muted mb-0"><?php echo e($show->user->role); ?></p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i><?php echo e($show->user->email); ?></li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i><?php echo e($show->address->phone); ?></li>
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
                    <li class="fw-medium fs-14"><?php echo e($show->address->name); ?></li>
                    <li><?php echo e($show->address->phone); ?></li>
                    <li><?php echo e($show->address->address); ?></li>
                    <li><?php echo e('RT '.$show->address->rt.' / RW '.$show->address->rw.' - '.$show->address->zip_code); ?></li>
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
                        <h6 class="mb-0"><?php echo e($show->resi); ?></h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Metode Pembayaran:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">
                            <?php if($show->midtrans_booking_code != null): ?>
                            Midtrans
                            <?php else: ?>
                            Tunai
                            <?php endif; ?>
                        </h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Total Pembayaran:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0"><?php echo e($show->total_payment); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/admin/order/detail.blade.php ENDPATH**/ ?>