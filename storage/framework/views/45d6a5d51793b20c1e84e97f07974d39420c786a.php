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
                        <h4 class="mb-0">Proses Pendaftaran</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Lengkapi Biodata Calon Mahasiswa</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="#" class="btn btn-success">Sudah Memasukkan Data Calon Mahasiswa</a>
                <a href="<?php echo e(route('mahasiswa.showMahasiswa', $siswa->id)); ?>" class="btn btn-success">Cek validasi Data
                    Mahasiswa <i class="fa fa-arrow-right"></i></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a href="#" class="btn btn-warning">Belum Memasukkan Data Calon Mahasiswa</a>
                <a href="<?php echo e(route('mahasiswa.createMahasiswa')); ?>" class="btn btn-warning">Silahkan Daftar Disini <i
                        class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Upload Berkas Calon Mahasiswa</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $dokumenMahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokumen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="#" class="btn btn-success">Sudah Memasukkan Berkas Persyaratan</a>
                <a href="<?php echo e(route('dokumenmahasiswa.showdokumen', Auth::user()->nik)); ?>" class="btn btn-success">Cek
                    Validasi
                    Berkas Persyaratan<i class="fa fa-arrow-right"></i></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a href="#" class="btn btn-warning">Belum Memasukkan Berkas Persyaratan</a>
                <a href="<?php echo e(route('mahasiswa.createDokumen')); ?>" class="btn btn-warning">Silahkan Upload File Berkas
                    <i class="fa fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <?php if($dokumenMahasiswa[0]->status_dokumen_final == 'diterima'): ?>
        <div class="card radius-10">
            <div class="card-header">
                <h6>Cetak Formulir</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-success btn-block">Silahkan Cetak Formulir Disini</a>
            </div>
        </div>
        <?php else: ?>

        <?php endif; ?>

    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/menu/index.blade.php ENDPATH**/ ?>