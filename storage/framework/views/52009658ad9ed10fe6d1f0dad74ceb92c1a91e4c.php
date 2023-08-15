<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Mahasiswa</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="title-right">
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Mahasiswa</h2>
                        <li class="nav navbar-right panel_toolbox">
                            <?php if($transaksi->tanggal_validasi == 'N'): ?>
                                <form action="<?php echo e(route('transaksi.validasiadmin', $transaksi->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('put')); ?>

                                    <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> Validasi Sekarang</button>
                                </form>
                            <?php else: ?>

                            <?php endif; ?>
                        </li>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12 mail_view">
                                <div class="inbox-body">
                                    <div class="view-mail">
                                        <table class="table no-margin">
                                            <tbody>
                                                <tr>
                                                    <div class="text-center">
                                                        <img class="center"
                                                            src="<?php echo e(Storage::url('public/bukti_pembayaran/').$transaksi->berkas); ?>"
                                                            alt="<?php echo e($transaksi->berkas); ?>" style="width:500px; height:1000px;>
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
                                                <!-- <tr>
                                                    <td>Operator Validasi</td>
                                                    <td><?php echo e($transaksi->operator_validasi == "" ? 'Tidak ada operator yang memvalidasi' : $transaksi->operatorvalidasi()->first()->email); ?>

                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/menu/showtransaksi.blade.php ENDPATH**/ ?>