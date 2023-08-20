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
                        <h6 class="mb-0">Gelombang</h6>
                    </div>
                    <div class="p-2">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Gelombang</th>
                            <th>Nama Gelombang</th>
                            <th>Status Gelombang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e(++$no); ?></th>
                            <td><?php echo e($item->kode_gelombang); ?></td>
                            <td><?php echo e($item->nama_gelombang); ?></td>
                            <td><?php echo e($item->status_gelombang == 'N' ? 'Tidak Aktif' : 'Aktif'); ?></td>
                            <td>
                                <?php if($item->status_gelombang == 'N'): ?>
                                <a class="btn btn-sm btn-info" href="#"
                                    onclick="event.preventDefault();
                                                        document.getElementById('aktifkan-form<?php echo e($item->id_gelombang); ?>').submit();">Aktifkan</a>
                                <form id="aktifkan-form<?php echo e($item->id_gelombang); ?>"
                                    action="<?php echo e(url('gelombang/aktifkan/' . $item->id_gelombang)); ?>" method="POST"
                                    class="d-none">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="status_gelombang" value="<?php echo e($item->status_gelombang); ?>">
                                </form>
                                <?php else: ?>
                                <a class="btn btn-sm btn-danger" href="#"
                                    onclick="event.preventDefault();
                                                        document.getElementById('nonaktifkan-form<?php echo e($item->id_gelombang); ?>').submit();">Non Aktifkan</a>
                                <form id="nonaktifkan-form<?php echo e($item->id_gelombang); ?>"
                                    action="<?php echo e(url('gelombang/aktifkan/' . $item->id_gelombang)); ?>" method="POST"
                                    class="d-none">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="status_gelombang" value="<?php echo e($item->status_gelombang); ?>">
                                </form>
                                <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/gelombang/index.blade.php ENDPATH**/ ?>