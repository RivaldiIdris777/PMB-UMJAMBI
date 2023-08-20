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
                        <h6 class="mb-0">Bukti Pembayaran</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table no-margin">
                    <tbody>
                        <tr>
                            <div class="text-center">
                                <img class="center"
                                    src="<?php echo e(Storage::url('public/bukti_pembayaran/').$transaksi->berkas); ?>"
                                    alt="<?php echo e($transaksi->berkas); ?>" style="width:500px; height:1000px;">
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
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/menu/showtransaksi.blade.php ENDPATH**/ ?>