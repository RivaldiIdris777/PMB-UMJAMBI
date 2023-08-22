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
        <?php if($message = Session::get('Warning')): ?>
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6>Form Ubah Transaksi</h6>
                    <form action="<?php echo e(route('transaksi.updateTransaksi', $transaksi->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="col-md-12 col-sm-12 mb-10">
                            <input name="id_user" type="hidden" value="<?php echo e(Auth::user()->id); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                            <input type="number" name="jumlah_pembayaran" value="<?php echo e(old('jumlah_pembayaran') ?? $transaksi->jumlah_pembayaran); ?>"
                                class="form-control">
                            <?php if($errors->has('jumlah_pembayaran')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('jumlah_pembayaran')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <img class="mb-2" id="outputtf"
                                src="<?php echo e(Storage::url('public/bukti_pembayaran/').$transaksi->berkas); ?>" width="500"
                                height="800">
                            <label for="berkas">Ganti File Bukti Transaksi</label>
                            <input type="file" name="berkas" class="form-control" accept="image/*"
                                onchange="document.getElementById('outputtf').src = window.URL.createObjectURL(this.files[0])">
                            <?php if($errors->has('berkas')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('berkas')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_program_kuliah">Program Kuliah</label>
                            <select name="id_program_kuliah" class="form-control">
                                <option value="<?php echo e(old('id_program_kuliah') ?? $transaksi->id_program_kuliah); ?>">
                                    <?php echo e(old('id_program_kuliah') ?? $transaksi->programkuliah()->first()->nama_program_kuliah); ?> </option>
                                <?php $__currentLoopData = $program_kuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progkul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(old('id_program_kuliah') ?? $progkul->id_program_kuliah); ?>"><?php echo e($progkul->nama_program_kuliah); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('id_program_kuliah')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('id_program_kuliah')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_prodi">Program Studi (Prodi)</label>
                            <select name="id_prodi" class="form-control">
                                <option value="<?php echo e(old('id_prodi') ?? $transaksi->id_prodi); ?>">
                                    <?php echo e(old('id_prodi') ?? $transaksi->programstudi()->first()->nama_prodi); ?></option>
                                <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(old('id_prodi') ?? $pdi->id_prodi); ?>"><?php echo e($pdi->nama_prodi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('id_prodi')): ?>
                            <div class="text-danger">
                                <?php echo e($errors->first('id_prodi')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-success btn-block" type="submit">Simpan Data Transaksi</button>
                        </div>
                    </form>
                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/users/transaksi/edit.blade.php ENDPATH**/ ?>