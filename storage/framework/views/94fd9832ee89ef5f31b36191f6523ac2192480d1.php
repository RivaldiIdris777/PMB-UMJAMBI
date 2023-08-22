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
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Agama</h6>
                    </div>
                    <div class="p-2">
                        <li class="nav navbar-right panel_toolbox"><a href="<?php echo e(route('agama.create')); ?>"
                                class="btn btn-sm btn-success">Tambah Data</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Agama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e(++$no); ?></th>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->status == 'N' ? 'Tidak Aktif' : 'Aktif'); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('agama.destroy', $item->id)); ?>" class="form-inline" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <a href="<?php echo e(route('agama.edit', $item->id)); ?>" class="btn btn-warning">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bx bx-trash-alt" onclick="return confirm('Apa anda yaking ingin menghapus ?')"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/agama/index.blade.php ENDPATH**/ ?>