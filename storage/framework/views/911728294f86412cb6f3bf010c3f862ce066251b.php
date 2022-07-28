<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <title> Laravel 8 PDF </title>
    <! - Bootstrap5 CSS ->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <style>
            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                border-color: #96D4D4;

            }

            .col1 {
                width: 100px;
            }

            .col2 {
                width: 500px;
                ;
            }
        </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2> Product list </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption> Product list </caption>
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nomer Resi</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Product</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Pengirim</th>
                            <th scope="col">Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"> <?php echo e($no++); ?> </th>
                            <td> <?php echo e($orders-> resi); ?> </td>
                            <?php $customer = \App\Models\User::where('id', $orders->user_id)->first(); ?>
                            <th scope="row"> <?php echo e($customer->name); ?> </th>
                            <?php $product = \App\Models\Product::where('id', $orders->product_id)->first(); ?>
                            <th scope="row"> <?php echo e($product->name); ?> </th>
                            <td> <?php echo e($orders->created_at); ?> </td>
                            <td> <?php echo e($orders->total_payment); ?> </td>
                            <td> <?php echo e($orders->sender); ?> </td>
                            <td> <?php echo e($orders->status); ?> </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><?php /**PATH D:\KMIPN PROJECT\indigco5\resources\views/admin/order/export-pdf.blade.php ENDPATH**/ ?>