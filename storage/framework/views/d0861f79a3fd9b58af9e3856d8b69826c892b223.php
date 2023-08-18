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
                <h5>Dokumen <?php echo e($data->nama_mahasiswa); ?> | <?php echo e($data->nik); ?></h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Dokumen</h2>
                        <li class="nav navbar-right panel_toolbox">
                            <a href="<?php echo e(route('dokumenmahasiswa.createDokumen', $data->nik)); ?>"
                                class="btn btn-sm btn-success">Masukkan Dokumen
                            </a>
                        </li>
                        <div class="clearfix"></div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th style="text-align:right;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(Storage::url('public/ktp/').$dokumen[0]->d_ktp); ?>" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td style="text-align:right;"><?php echo e($ktp->tgl_upload_ktp); ?></td>
                                    <td style="text-align:center;"><button class="btn <?php echo e($ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($ktp->ktp_status); ?></button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KK</th>
                                    <th style="text-align:right;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(Storage::url('public/kk/').$dokumen[0]->d_kk); ?>" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td><?php echo e($kk->tgl_upload_kk); ?></td>
                                    <td style="text-align:center;"><button class="btn <?php echo e($kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($kk->kk_status); ?></button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Wajib</th>
                                    <th style="text-align:center;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib); ?>"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen || PDF
                                        </a>
                                    </td>
                                    <td><?php echo e($wajib->tgl_upload_dokumen_wajib); ?></td>
                                    <td><button class="btn <?php echo e($wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($wajib->dokumen_wajib_status); ?></button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Pendukung</th>
                                    <th style="text-align:center;">Tanggal Upload</th>
                                    <th>Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendukung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_pendukung); ?>"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen || PDF
                                        </a>
                                    </td>
                                    <td><?php echo e($wajib->tgl_upload_dokumen_pendukung); ?></td>
                                    <td><button class="btn <?php echo e($pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($pendukung->dokumen_pendukung_status); ?></button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="keterangan">Keterangan Dalam Validasi</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10"><?php echo e($dokumen[0]->keterangan == '' ? '' : $dokumen[0]->keterangan); ?></textarea>
                        </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/dokumenMahasiswa/show.blade.php ENDPATH**/ ?>