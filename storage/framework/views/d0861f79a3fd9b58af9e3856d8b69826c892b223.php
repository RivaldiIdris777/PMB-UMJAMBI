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
                        <h4 class="mb-0">Detail Upload dan Validasi Calon Mahasiswa</h4>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tambah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="p-2">
                            <li class="nav navbar-right panel_toolbox">
                                <a href="<?php echo e(route('dokumenmahasiswa.editDokumen', $tambah->nik)); ?>" class="btn btn-sm btn-warning">Ubah Dokumen</a>
                            </li>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="p-2">
                            <li class="nav navbar-right panel_toolbox">
                                <a href="<?php echo e(route('dokumenmahasiswa.createDokumen', $tambah->nik)); ?>"
                                    class="btn btn-sm btn-success">Masukkan Dokumen
                                </a>
                            </li>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>KTP</h4>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <img src="<?php echo e(Storage::url('public/ktp/').$dokumen[0]->d_ktp); ?>" alt=""
                        style="width:700px; height:500px;">
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : <?php echo e(tanggal_indonesia($ktp->tgl_upload_ktp)); ?> </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn <?php echo e($ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($ktp->ktp_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'); ?>

                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <button class="btn btn-danger">KTP Belum Di Upload</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Kartu Keluarga (KK) </h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <img src="<?php echo e(Storage::url('public/kk/').$dokumen[0]->d_kk); ?>" alt=""
                        style="width:700px; height:500px; horizontal-align:middle;">
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : <?php echo e(tanggal_indonesia($kk->tgl_upload_kk)); ?> </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn <?php echo e($kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($kk->kk_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'); ?>

                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <button class="btn btn-danger">KK Belum Di Upload</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Dokumen Wajib</h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <a href="<?php echo e(Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib); ?>" target="_blank"
                        class="btn btn-sm">
                        <img src="<?php echo e(asset('')); ?>pdf-icon.png" alt=""
                            style="width:500px; height:500px; horizontal-align:middle;">
                    </a>
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : <?php echo e(tanggal_indonesia($wajib->tgl_upload_dokumen_wajib)); ?> </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn <?php echo e($wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($wajib->dokumen_wajib_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'); ?>

                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <button class="btn btn-danger">Dokumen Wajib Belum Di Upload</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Dokumen Pendukung</h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendukung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <a href="<?php echo e(Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_wajib); ?>" target="_blank"
                        class="btn btn-sm">
                        <img src="<?php echo e(asset('')); ?>pdf-icon.png" alt=""
                            style="width:500px; height:500px; horizontal-align:middle;">
                    </a>
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : <?php echo e(tanggal_indonesia($pendukung->tgl_upload_dokumen_wajib)); ?>

                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn <?php echo e($pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($pendukung->dokumen_pendukung_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'); ?>

                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <button class="btn btn-danger">Dokumen Pendukung Belum Di Upload</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h4>Keterangan dari Staff Pemvalidasi</h4>
                <p>
                    "
                    <?php echo e($dokumen[0]->keterangan == '' ? 'Belum ada keterangan dari pemvalidasi' : $dokumen[0]->keterangan); ?>

                    "
                </p>
            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/dokumenMahasiswa/show.blade.php ENDPATH**/ ?>