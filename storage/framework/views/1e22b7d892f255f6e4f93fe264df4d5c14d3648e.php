<?php $__env->startSection('content'); ?>
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome <?php echo e(Auth::user()->name); ?> !! Anda memasuki Admin akses</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="ms-3 p-2">
                    <div class="text-white"><?php echo e($message); ?></div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php endif; ?>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6>Form Pengisian Agama</h6>
                    <form action="<?php echo e(route($link . '.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Nama Agama</label>
                            <input type="text" name="name" class="form-control">
                            <?php if($errors->has('name')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('name')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="status">Status Agama</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status Agama --</option>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                            <?php if($errors->has('status')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('status')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-grip gap-2 mt-3">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/agama/add.blade.php ENDPATH**/ ?>