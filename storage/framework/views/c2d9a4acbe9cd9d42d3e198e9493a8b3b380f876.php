<?php $__env->startPush('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="<?php echo e(asset('')); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(asset('')); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h5><?php echo e($title); ?></h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pilih Konfirmasi Pembayaran dibawah ini </h2>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-4 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Masukkan Bukti Pembayaran (1)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah Memasukkan Data Transaksi</a>
                        <a href="<?php echo e(route('transaksi.showTransaksi', $tf->id)); ?>" class="btn btn-success">Cek Data Transaksi <i class="fa fa-arrow-right"></i></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <a href="#" class="btn btn-warning">Belum Memasukkan Data Transaksi</a>
                            <a href="<?php echo e(route('transaksi.createByUser')); ?>" class="btn btn-warning">Silahkan Masukkan Bukti Transaksi Disini <i class="fa fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('')); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('')); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/transaksi/index.blade.php ENDPATH**/ ?>