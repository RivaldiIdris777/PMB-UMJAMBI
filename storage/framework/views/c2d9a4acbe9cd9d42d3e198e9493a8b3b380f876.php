<?php $__env->startSection('content'); ?>
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white"><?php echo e(Auth::user()->name); ?> !! <?php echo e($title); ?></div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4 class="mb-0">Bukti Biaya Pendaftaran</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Masukkan Bukti Pembayaran</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah Memasukkan Data Transaksi</a>
                <a href="<?php echo e(route('transaksi.showTransaksi', $tf->id)); ?>" class="btn btn-success">Cek Data Transaksi <i
                        class="fa fa-arrow-right"></i></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a href="#" class="btn btn-warning">Belum Memasukkan Data Transaksi</a>
                <a href="<?php echo e(route('transaksi.createByUser')); ?>" class="btn btn-warning">Silahkan Masukkan Bukti
                    Transaksi Disini <i class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/transaksi/index.blade.php ENDPATH**/ ?>