<?php $__env->startPush('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome <?php echo e(Auth::user()->name); ?> !! Anda memasuki admin akses</div>
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
                        <h6>Detail Transaksi</h6>
                    </div>
                    <div class="p-2">
                        <form action="<?php echo e(route('transaksi.validasiadmin', $transaksi->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                                <button type="submit" class="btn btn-success"><i
                                    class="fa fa-check"></i> Validasi Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <table class="table no-margin">
                        <tbody>
                            <tr>
                                <div class="text-center">
                                    <img class="center"
                                        src="<?php echo e(Storage::url('public/bukti_pembayaran/').$transaksi->berkas); ?>"
                                        alt="<?php echo e($transaksi->berkas); ?>"
                                        style="width:500px; height:500px; object-fit:cover;">
                                </div>
                                <td>Gambar Bukti Transaksi</td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Data Transaksi</strong></td>
                            </tr>
                            <tr>
                                <td>Program kuliah</td>
                                <td><?php echo e($transaksi->programkuliah()->first()->nama_program_kuliah); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td><?php echo e($transaksi->programstudi()->first()->nama_prodi); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td><?php echo e($transaksi->programstudi()->first()->nama_prodi); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Upload</td>
                                <td><?php echo e($transaksi->tanggal_upload == "" ? 'Belum ada tanggal upload' : date('d-m-Y', strtotime($transaksi->tanggal_upload))); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Pembayaran</td>
                                <td>Rp.<?php echo e(format_uang($transaksi->jumlah_pembayaran)); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Terbilang</td>
                                <td>Rp.<?php echo e(strtoupper(terbilang($transaksi->jumlah_pembayaran))); ?>

                                    RUPIAH
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Validasi</td>
                                <td><?php echo e($transaksi->tanggal_validasi == "" ? 'Belum ada tanggal validasi oleh admin' : date('d-m-Y', strtotime($transaksi->tanggal_validasi))); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Status Validasi</td>
                                <td>
                                    <button
                                        class="btn <?php echo e($transaksi->status_validasi == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($transaksi->status_validasi); ?></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Operator Validasi</td>
                                <td><?php echo e($transaksi->operator_validasi == "" ? 'Tidak ada operator yang memvalidasi' : $transaksi->operatorvalidasi()->first()->email); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/transaksi/show.blade.php ENDPATH**/ ?>