<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title><?php echo e($title); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins&display=swap" rel="stylesheet">

    <!-- CSS Local -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body>
    <!-- awal navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container-fluid mx-3">
            <!-- <button onclick="openNav()" type="button" class="btn btn-white"><i class="bi bi-list fs-2 text-dark"></i></button> -->

            <a class="navbar-brand" href="#">
                <img src="<?php echo e(('img/LogoCSW.png')); ?>" alt="" width="60">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark-grey fw-bold fs-5">Civil Servant Warrior</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <div class="dropdown mx-2 mt-2">
                        <a class="text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo e(('img/img_about_6.png')); ?>" class="circle" alt="" width="50" id="dropdownMenuButton1">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end" style="border-radius: 10px;" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <div class="dropdown-item d-flex mb-2">
                                    <label class="form-check-label me-3 text-dark-grey" for="switchTheme">
                                        <img src="<?php echo e(('img/img_about_6.png')); ?>" class="circle" alt="" width="50" id="dropdownMenuButton1">
                                        Login as Username
                                    </label>
                                </div>
                            </li>

                            <hr style="margin: 0;">

                            <li>
                                <div class="dropdown-item d-flex mt-2">
                                    <label class="form-check-label me-3 text-dark-grey" for="switchTheme">
                                        <i class="bi bi-person-circle"></i>
                                        <span class="mx-2">Profile Anda</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-item d-flex my-2">
                                    <label class="form-check-label me-3 text-dark-grey" for="switchTheme">
                                        <img src="<?php echo e(('img/LogoCSW.png')); ?>" alt="" width="20">
                                        <span class="mx-1">Civil Servant Warrior</span>
                                    </label>
                                </div>
                            </li>

                            <hr style="margin: 0;">

                            <li>
                                <div class="dropdown-item d-flex mt-2">
                                    <label class="form-check-label me-3 text-dark-grey" for="switchTheme">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span class="mx-2">Logout</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- akhir navigasi -->

    <?php echo $__env->yieldContent('container'); ?>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $(document).ready(function() {
            $('#myTable2').DataTable();
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function complete() {
            swal({
                title: "Berhasil",
                icon: "success",
                button: true
            });
        }

        function error() {
            swal({
                title: "Gagal!",
                text: "Silahkan coba lagi dalam beberapa saat",
                icon: "error",
                button: true
            });
        }
    </script>
</body>

</html><?php /**PATH D:\laragon\www\saas\resources\views/layouts/super-admin/master.blade.php ENDPATH**/ ?>