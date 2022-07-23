

<?php $__env->startSection('subcontainer'); ?>

<h4 class="fw-bold header-nav">Dashboard Overview</h4>

<div class="mx-2">
    <h5 class="fw-bold mt-3">Overview</h5>

    <div class="row">
        <!-- MATA PELAJARAN -->
        <div class="col">
            <div class="card mt-2 p-3">
                <h6>Mata Pelajaran yang saya ikuti</h6>

                <!-- JIKA MATA PELAJARAN KOSONG -->
                <img src="<?php echo e('img/img_matpel_null.png'); ?>" class="img-fluid mx-auto d-block mt-2" alt="...">

                <small class="text-center mt-4">Oopss!! sepertinya mata pelajaranmu kosong, pasti kamu belum membeli paket belajar ya?
                    <br>
                    Tenang, kamu dapat membelinya sesuai dengan kebutuhanmu!
                    <br>
                    <a href="#" class="btn btn-danger btn-sm mt-3">LIHAT PAKET BELAJAR</a>
                </small>

                <!-- JIKA MATA PELAJARAN ADA (HAPUS KOMENTAR UNTUK DEMO) -->
                <!-- <?php for($i = 0; $i < 5; $i++): ?> <hr class="mt-2">

                    <h6>SKD</h6>
                    <img src="<?php echo e('img/img_matpel.png'); ?>" class="img-fluid mx-auto d-block mt-2" alt="...">

                    <h6>TWK</h6>
                    <small>Kelas</small>

                    <small class="my-3"><i class="bi bi-clock-fill text-danger"></i> Waktu Akses</small>
                    <?php endfor; ?> -->
            </div>
        </div>

        <!-- MATERI -->
        <div class="col">
            <div class="card mt-2 p-3">
                <h6>Materi</h6>

                <?php for($i = 0; $i < 5; $i++): ?> <hr class="mt-2">

                    <h6>Materi Matematika</h6>
                    <small class="fst-italic">Materi akan di lock jika pertemuan zoom belum berlangsung dan akan dibuka 3 hari sebelum pertemuan zoom berlangsung.</small>

                    <div class="row mt-2">
                        <small class="col">Nama Materi</small>
                        <small class="col d-flex justify-content-end text-primary">
                            <a href="#">
                                Baca materi
                            </a>
                        </small>
                    </div>

                    <img src="<?php echo e('img/img_materi_lock.png'); ?>" class="img-fluid mx-auto d-block cursor-x mt-2" alt="...">
                    <img src="<?php echo e('img/img_materi_lock.png'); ?>" class="img-fluid mx-auto d-block cursor-x" alt="...">
                    <img src="<?php echo e('img/img_materi_lock.png'); ?>" class="img-fluid mx-auto d-block cursor-x" alt="...">
                    <img src="<?php echo e('img/img_materi_lock.png'); ?>" class="img-fluid mx-auto d-block cursor-x" alt="...">

                    <span class="my-3 text-center text-primary">
                        <a href="#">
                            Lihat Semua Materi Matematika
                        </a>
                    </span>
                    <?php endfor; ?>
            </div>

            <div class="card mt-5 p-3">
                <h6>Recently Pretest</h6>

                <!-- JIKA RECENTLY ADA -->
                <hr class="mt-2">
                <img src="<?php echo e('img/img_recently_null.png'); ?>" class="img-fluid mx-auto d-block mt-2" alt="...">

                <small class="text-center mt-4">Lorep imsun sir dolor amet
                    <br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    <br>
                    <a href="#" class="btn btn-danger btn-sm mt-3">LIHAT PAKET BELAJAR</a>
                </small>

                <!-- JIKA RECENTLY ADA (HAPUS KOMENTAR UNTUK DEMO) -->
                <!-- <?php for($i = 0; $i < 5; $i++): ?> <hr class="mt-2">

                    <h6>Pretest SKD</h6>

                    <div class="card text-dark bg-warning mb-3">
                        <p class="card-header">Dibuka pada 20 September 2022 Pukul 07:00 WIB</p>
                        <div class="card-body">
                            <h5 class="card-title">Judul Pretest</h5>
                            <p class="card-text">Pada pretest kali ini akan membahas seputar materi yang akan kita pelajari nanti di pertemuan, kerjakan dengan...</p>
                            <small>
                                <span><i class="bi bi-clock"></i> 15 menit</span>
                                &nbsp
                                <span><i class="bi bi-bookmark"></i> 100 pts</span>
                                &nbsp
                                <span><i class="bi bi-tag"></i> Quiziz</span>
                            </small>

                            <button type="button" class="btn btn-light bg-light btn-sm mt-3 w-100">Kerjakan Pretest</button>
                        </div>
                    </div>
                    <?php endfor; ?> -->
            </div>
        </div>

        <!-- JAM PELAKSANAAN -->
        <div class="col">
            <div class="card mt-2 p-3">
                <h6>Jam Pelaksanaan Bimbel SKD dan Matematika</h6>

                <hr class="mt-2">

                <h6>Bulan September 2022</h6>

                <?php

                $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];

                ?>

                <?php for($i = 0; $i < 7; $i++): ?> <div class="list-group-item list-group-item-action">

                    <div class="badge bg-success fw-normal mb-2">
                        SKD
                    </div>
                    <div class="badge bg-primary fw-normal mb-2">
                        <small>Zoom dimulai</small>
                    </div>
                    <h6>
                        <?= $day[$i] ?>, <?php echo e($i+1); ?>-07-2022
                    </h6>

                    <div class="row">
                        <div class="col-3">
                            <img src="<?php echo e(('img/ic_skd.png')); ?>" alt="" width="100%">
                        </div>
                        <div class="col">
                            <span class="fs-5 fw-bold">TKP</span>
                            <br>
                            <small>09:00 ~ 10:00 WIB</small>
                        </div>
                    </div>
            </div>
            <?php endfor; ?>

            <div class="list-group-item list-group-item-action text-center">
                <a href="#" class="">Lihat Jadwal Lebih Lengkap</a>
            </div>
        </div>

        <div class="card mt-5 p-3">
            <h6>Recently Posttest</h6>

            <!-- JIKA RECENTLY ADA (HAPUS KOMENTAR UNTUK DEMO) -->
            <!-- <hr class="mt-2">
            <img src="<?php echo e('img/img_recently_null.png'); ?>" class="img-fluid mx-auto d-block mt-2" alt="...">

            <small class="text-center mt-4">Lorep imsun sir dolor amet
                <br>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                <br>
                <a href="#" class="btn btn-danger btn-sm mt-3">LIHAT PAKET BELAJAR</a>
            </small> -->

            <!-- JIKA RECENTLY ADA -->
            <?php for($i = 0; $i < 5; $i++): ?> <hr class="mt-2">

                <h6>Posttest SKD</h6>

                <div class="card text-dark bg-warning mb-3">
                    <p class="card-header">Dibuka pada 20 September 2022 Pukul 07:00 WIB</p>
                    <div class="card-body">
                        <h5 class="card-title">Judul Pretest</h5>
                        <p class="card-text">Pada pretest kali ini akan membahas seputar materi yang akan kita pelajari nanti di pertemuan, kerjakan dengan...</p>
                        <small>
                            <span><i class="bi bi-clock"></i> 15 menit</span>
                            &nbsp
                            <span><i class="bi bi-bookmark"></i> 100 pts</span>
                            &nbsp
                            <span><i class="bi bi-tag"></i> Quiziz</span>
                        </small>

                        <button type="button" class="btn btn-light bg-light btn-sm mt-3 w-100">Kerjakan Pretest</button>
                    </div>
                </div>
                <?php endfor; ?>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.super-admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\saas\resources\views/super-admin/dashboard.blade.php ENDPATH**/ ?>