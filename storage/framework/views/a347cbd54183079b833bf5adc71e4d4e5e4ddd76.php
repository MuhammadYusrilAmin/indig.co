
<?php $__env->startSection('title'); ?> Employees <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> INDIGCO <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Data Karyawan <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">

                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div>
                            <h5 class="card-title mb-0">Data Karyawan <span class="badge bg-secondary align-middle ms-1"><?php echo e(count($datas)); ?></span></h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="ri-add-line align-bottom me-1"></i> Tambah Karyawan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-bottom-dashed border-bottom">
                <form>
                    <div class="row g-3">
                        <div class="col-xl-12">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Cari nama karyawan">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table align-middle" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>

                                    <th class="sort" data-sort="">Foto</th>
                                    <th class="sort" data-sort="customer_name">Nama</th>
                                    <th class="sort" data-sort="email">Email</th>
                                    <th class="sort" data-sort="phone">No. Telepon</th>
                                    <th class="sort" data-sort="date">Tanggal Bergabung</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td>
                                        <a href="<?php echo e(url('assets/images/users/' . $data->avatar)); ?>" target="_blank">
                                            <img src="<?php echo e('assets/images/users/' . $data->avatar); ?>" alt="<?php echo e($data->title); ?>" width="60">
                                        </a>
                                    </td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary"><?php echo e($data->id); ?></a></td>
                                    <td class="customer_name"><?php echo e($data->name); ?></td>
                                    <td class="email"><?php echo e($data->email); ?></td>
                                    <td class="phone"><?php echo e($data->phone); ?></td>
                                    <td class="date"><?php echo e($data->created_at); ?></td>
                                    <td class="status"><span class="badge <?php echo e($data->status == 'Active' ? 'badge-soft-success' : 'badge-soft-danger'); ?> text-uppercase"><?php echo e($data->status); ?></span>
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($data->id); ?>" class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                <a class="text-secondary d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal<?php echo e($data->id); ?>">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <!-- Edit Employee Modal -->
                                <div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($data->id); ?>" aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo e($data->id); ?>">Perbarui Data Karyawan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('employees.update', $data->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-body">
                                                    <div class="mb-3" style="display: none;">
                                                        <label for="id-field" class="form-label">ID</label>
                                                        <input type="text" id="id-field" class="form-control" placeholder="Masukkan id" required name="cooperative_id" value="<?php echo e(Auth::user()->cooperative_id); ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Nama Karyawan</label>
                                                        <input type="text" id="customername-field" class="form-control" placeholder="Masukkan nama karyawan" required name="name" value="<?php echo e($data->name); ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email-field" class="form-label">Email</label>
                                                        <input type="email" id="email-field" class="form-control" placeholder="Masukkan email" required name="email" value="<?php echo e($data->email); ?>">
                                                        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="invalid-feed text-danger">
                                                            <?php echo e($msg); ?>

                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone-field" class="form-label">No. Telepon</label>
                                                        <input type="number" id="phone-field" class="form-control" placeholder="Masukkan nomor telepon" required name="phone" value="<?php echo e($data->phone); ?>"">
                                                    </div>

                                                    <div class=" mb-3">
                                                        <label for="address-field" class="form-label">Alamat Lengkap</label>
                                                        <input type="text" id="address-field" class="form-control" placeholder="Masukkan alamat lengkap" required name="address" value="<?php echo e($data->address); ?>"">
                                                    </div>

                                                    <div class=" mb-3">
                                                        <label for="status-field" class="form-label">Status</label>
                                                        <select class="form-control" name="status" id="status-field">
                                                            <?php if($data->status == 'Active'): ?>
                                                            <option value="Active" selected>Active</option>
                                                            <option value="Block">Block</option>
                                                            <?php elseif($data->status == 'Block'): ?>
                                                            <option value="Active">Active</option>
                                                            <option value="Block" selected>Block</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label for="photo" class="form-label">Unggah Foto Profil</label>
                                                        <input type="file" class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="avatar" value="<?php echo e(old('photo')); ?>" id="photo">
                                                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Unggah foto profilmu
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" id="add-btn">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade zoomIn" id="deleteRecordModal<?php echo e($data->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-2 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:100px;height:100px"></lord-icon>
                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                        <h4>Apakah kamu yakin?</h4>
                                                        <p class="text-muted mx-4 mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Tidak</button>
                                                    <form action="<?php echo e(route('employees.destroy', $data->id)); ?>" method="POST">
                                                        <?php echo method_field('delete'); ?>
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn w-sm btn-danger " id="delete-product">Ya, hapus sekarang!</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ employees We did not find any employees for you search.</p>
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

                <!-- Add Employee Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-modal="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Karyawan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo e(route('employees.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="mb-3" style="display: none;">
                                        <label for="id-field" class="form-label">ID</label>
                                        <input type="text" id="id-field" class="form-control" placeholder="Masukkan id" required name="cooperative_id" value="<?php echo e(Auth::user()->cooperative_id); ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Nama Karyawan</label>
                                        <input type="text" id="customername-field" class="form-control" placeholder="Masukkan nama karyawan" required name="name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email-field" class="form-label">Email</label>
                                        <input type="email" id="email-field" class="form-control" placeholder="Masukkan email" required name="email" />
                                        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="invalid-feed text-danger">
                                            <?php echo e($msg); ?>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone-field" class="form-label">No. Telepon</label>
                                        <input type="number" id="phone-field" class="form-control" placeholder="Masukkan nomor telepon" required name="phone" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address-field" class="form-label">Alamat Lengkap</label>
                                        <input type="text" id="address-field" class="form-control" placeholder="Masukkan alamat lengkap" required name="address" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="status-field" class="form-label">Status</label>
                                        <select class="form-control" name="status" id="status-field">
                                            <option value="Active" selected>Active</option>
                                            <option value="Block">Block</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="photo" class="form-label">Unggah Foto Profil</label>
                                        <input type="file" class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="avatar" value="<?php echo e(old('photo')); ?>" id="photo" required>
                                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="invalid-feedback">
                                            Unggah foto profilmu
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" id="add-btn">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end modal -->
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
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/admin/employee/index.blade.php ENDPATH**/ ?>