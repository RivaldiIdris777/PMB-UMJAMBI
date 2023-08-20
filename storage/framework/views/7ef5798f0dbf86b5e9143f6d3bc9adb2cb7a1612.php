<?php $__env->startPush('css'); ?>
<link href="<?php echo e(asset('')); ?>css/style.css" rel="stylesheet">
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
<div class="col-12">
    <?php if($message = Session::get('error')): ?>
    <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="ms-3 p-2">
                <div class="text-white"><?php echo e($message); ?></div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
    </div>
    <form action="<?php echo e(route($link . '.update', $data->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="col-md-8 mx-auto">
            <div class="card radius-10">
                <div class="card-header">
                    <h4>Upload File KTP Disini</h4>
                </div>
                <div class="card-body">
                    <div class="mb-2 text-center" id="previewktp"></div>
                    <div class="form-group">
                        <label for="d_ktp"></label>
                        <input type="file" name="d_ktp" class="form-control" onchange="getktpPreview(event)">
                        <div class="text-danger">
                            <?php echo e($errors->first('d_ktp')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="card radius-10">
                <div class="card-header">
                    <h4>Upload File KK Disini</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="mb-2 text-center" id="previewkk"></div>
                        <label for="d_kk"></label>
                        <input type="file" name="d_kk" class="form-control" onchange="getkkPreview(event)" id="d_kk">
                        <div class="text-danger">
                            <?php echo e($errors->first('d_kk')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="card radius-10">
                <div class="card-header">
                    <h4>Upload File Dokumen Wajib Disini</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="dokumen_wajib"></label>
                        <input type="file" name="dokumen_wajib" class="form-control">
                        <div class="text-danger">
                            <?php echo e($errors->first('dokumen_wajib')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="card radius-10">
                <div class="card-header">
                    <h4>Upload File Dokumen Pendukung Disini</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="dokumen_pendukung"></label>
                        <input type="file" name="dokumen_pendukung" class="form-control">
                        <div class="text-danger">
                            <?php echo e($errors->first('dokumen_pendukung')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="d-grid gap-2 mt-2">
                <input class="btn btn-success btn-block" type="submit" value="Simpan Data">
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
    function getktpPreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('previewktp');
        var newimg = document.createElement('img');
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.width = "300";
        imagediv.appendChild(newimg);
    }

    function getkkPreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('previewkk');
        var newimg = document.createElement('img');
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.width = "300";
        imagediv.appendChild(newimg);
    }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/dokumenMahasiswa/edit.blade.php ENDPATH**/ ?>