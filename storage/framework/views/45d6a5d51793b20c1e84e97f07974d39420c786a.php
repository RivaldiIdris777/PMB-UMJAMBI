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
                <h5>Lengkapi Registrasi Dibawah</h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Proses Pendaftaran</h2>
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
            <div class="col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Lengkapi Biodata Calon Mahasiswa (2)</h2>
                        <div class="clearfix"></div>
                    </div>
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Upload Berkas (3)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $dokumenMahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokumen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="#" class="btn btn-success">Sudah Memasukkan Berkas Persyaratan</a>
                    <a href="<?php echo e(route('dokumenmahasiswa.showdokumen', Auth::user()->nik)); ?>" class="btn btn-success">Cek Validasi
                        Berkas Persyaratan<i class="fa fa-arrow-right"></i></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <a href="#" class="btn btn-warning">Belum Memasukkan Berkas Persyaratan</a>
                    <a href="<?php echo e(route('mahasiswa.createDokumen')); ?>" class="btn btn-warning">Silahkan Upload File Berkas
                        <i class="fa fa-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
                <div class="x_panel text-center">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Cetak Formulir(3)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <a href="#" class="btn btn-success btn-block">Silahkan Cetak Formulir Disini</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/menu/index.blade.php ENDPATH**/ ?>