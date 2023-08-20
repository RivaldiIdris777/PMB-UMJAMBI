<?php $__env->startSection('content'); ?>
<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('')); ?>css/style.css" rel="stylesheet">
<?php $__env->stopPush(); ?>
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white"><?php echo e(Auth::user()->name); ?>, <?php echo e($title); ?></div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-header">
                <h6>Upload Berkas Calon Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route($link . '.storeDokumen')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr style="height:80px;">
                                    <th style="padding-bottom:30px;">(1)</th>
                                    <th style="padding-bottom:30px; text-align:center;">
                                        KTP (Upload Format JPG, JPEG, PNG) <br>
                                    </th>
                                    <th style="padding-bottom:30px; text-align:right;"><input id="d_ktp"
                                            onchange="getktpPreview(event)" type="file" name="d_ktp"
                                            value="<?php echo e(old('d_ktp')); ?>"></th>
                                    <th style="text-align:right;">
                                        <div class="mb-2" id="previewktp"></div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <?php if($errors->has('d_ktp')): ?>
                        <small class="text-danger">
                            <?php echo e($errors->first('d_ktp')); ?>

                        </small>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                                <tr style="height:80px;">
                                    <th style="padding-bottom:30px;">(2)</th>
                                    <th style="padding-bottom:30px; text-align:center;">
                                        KK (Upload Format JPG, JPEG, PNG) <br>
                                    </th>
                                    <th style="padding-bottom:30px; text-align:right;"><input
                                            onchange="getkkPreview(event)" id="d_kk" type="file" name="d_kk"
                                            value="<?php echo e(old('d_kk')); ?>"></th>
                                    <th style="text-align:right;">
                                        <div class="mb-2" id="previewkk"></div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <?php if($errors->has('d_kk')): ?>
                        <small class="text-danger">
                            <?php echo e($errors->first('d_kk')); ?>

                        </small>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="padding-bottom:30px;">(3)</th>
                                    <th style="padding-bottom:30px; text-align:center;">
                                        Dokumen Wajib (KK, Ijazah/SKL, SKHU)
                                    </th>
                                    <th style="padding-bottom:30px; text-align:right;"><input type="file"
                                            name="dokumen_wajib" accept="application/pdf"
                                            value="<?php echo e(old('dokumen_wajib')); ?>"></th>
                                </tr>
                            </thead>
                        </table>
                        <?php if($errors->has('dokumen_wajib')): ?>
                        <small class="text-danger">
                            <?php echo e($errors->first('dokumen_wajib')); ?>

                        </small>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="padding-bottom:30px;">(3)</th>
                                    <th style="padding-bottom:30px; text-align:center;">
                                        Dokumen Pendukung (Sertifikat, Piagam, Prestasi)
                                    </th>
                                    <th style="padding-bottom:30px; text-align:right;"><input type="file"
                                            name="dokumen_pendukung" accept="application/pdf"
                                            value="<?php echo e(old('dokumen_pendukung')); ?>"></th>
                                </tr>
                            </thead>
                        </table>
                        <?php if($errors->has('dokumen_pendukung')): ?>
                        <small class="text-danger">
                            <?php echo e($errors->first('dokumen_pendukung')); ?>

                        </small>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                    <input class="btn btn-success btn-block" type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        function getktpPreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('previewktp');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "80";
            imagediv.appendChild(newimg);
        }

        function getkkPreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('previewkk');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "80";
            imagediv.appendChild(newimg);
        }

    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/dokumenmahasiswa/add.blade.php ENDPATH**/ ?>