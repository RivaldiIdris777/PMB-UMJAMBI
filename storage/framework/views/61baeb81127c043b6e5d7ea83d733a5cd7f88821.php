<?php $__env->startPush('css'); ?>

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
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-body">
                <h6 class="mb-0">List Dokumen</h6>

                <li class="nav navbar-right panel_toolbox">
                            <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <form action="<?php echo e(route('dokumenmahasiswa.destroy', $dokumen[0]->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" data-placement="top"
                                    data-toggle="tooltip"><i class="fa fa-trash"></i> Hapus Dokumen Mahasiswa
                                    <?php echo e($data->nama_mahasiswa); ?></button>
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                        </li>
                        <div class="clearfix"></div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(Storage::url('public/ktp/').$dokumen[0]->d_ktp); ?>" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td><?php echo e($ktp->tgl_upload_ktp); ?></td>
                                    <td><?php echo e($ktp->tgl_validasi_ktp); ?></td>
                                    <td><button class="btn <?php echo e($ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($ktp->ktp_status); ?></button></td>
                                    <td><?php echo e($ktp->admin()->first()->name); ?></td>
                                    <td style="text-align:right;">
                                        <form action="<?php echo e(route('dokumenmahasiswa.validasiktp', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasiktp', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KK</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
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
                                    <td><?php echo e($kk->tgl_validasi_kk); ?></td>
                                    <td><button class="btn <?php echo e($kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($kk->kk_status); ?></button></td>
                                    <td><?php echo e($ktp->admin()->first()->name); ?></td>
                                    <td style="text-align:right;">
                                        <form action="<?php echo e(route('dokumenmahasiswa.validasikk', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasikk', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Wajib</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib); ?>"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen ||
                                        <?php echo e($dokumen[0]->dokumen_wajib); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($wajib->tgl_upload_dokumen_wajib); ?></td>
                                    <td><?php echo e($wajib->tgl_validasi_dokumen_wajib); ?></td>
                                    <td><button class="btn <?php echo e($wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($wajib->dokumen_wajib_status); ?></button></td>
                                    <td><?php echo e($ktp->admin()->first()->name); ?></td>
                                    <td style="text-align:right;">
                                        <form action="<?php echo e(route('dokumenmahasiswa.validasidokumenwajib', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasiwajib', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Pendukung</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendukung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_pendukung); ?>"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen ||
                                        <?php echo e($dokumen[0]->dokumen_pendukung); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($wajib->tgl_upload_dokumen_pendukung); ?></td>
                                    <td><?php echo e($pendukung->tgl_validasi_dokumen_pendukung); ?></td>
                                    <td><button class="btn <?php echo e($pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($pendukung->dokumen_pendukung_status); ?></button></td>
                                    <td><?php echo e($ktp->admin()->first()->name); ?></td>
                                    <td style="text-align:right;">
                                        <form action="<?php echo e(route('dokumenmahasiswa.validasidokumenpendukung', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasipendukung', $dokumen[0]->nik)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('put')); ?>

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $validasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <form action="<?php echo e(route('dokumenmahasiswa.updateketerangan', $validasi[0]->nik)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('put')); ?>

                                <div class="form-group">
                                    <label for="keterangan">Berikan Keterangan Untuk Kelengkapan Berkas</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10"><?php echo e($validasi[0]->keterangan == '' ? '' : $validasi[0]->keterangan); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan Keterangan Validasi <i class="fa fa-row-left"></i></button>
                            </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/dokumenMahasiswa/show2.blade.php ENDPATH**/ ?>