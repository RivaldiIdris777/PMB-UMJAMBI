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
                            <a href="<?php echo e(route('dokumenmahasiswa.edit', $tambah->id)); ?>"
                                class="btn btn-sm btn-warning">Ubah Dokumen</a>
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
                    <div class="p-2">
                        <form action="<?php echo e(route('dokumenmahasiswa.validasiktp', $dokumen[0]->nik)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                Validasi Sekarang</button>
                        </form>
                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasiktp', $dokumen[0]->nik)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                Tolak Validasi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <img src="<?php echo e(Storage::url('public/ktp/').$dokumen[0]->d_ktp); ?>" id="imgktp"
                        style="width:700px; height:500px;">
                        <div class="d-flex justify-content-between">
                            <div class="p-2">
                                <button class="btn btn-primary" id="leftktp">Putar Kiri</button>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary" id="rightktp">Putar Kanan</button>
                            </div>
                        </div>
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
                    <div class="p-2">
                        <form action="<?php echo e(route('dokumenmahasiswa.validasikk', $dokumen[0]->nik)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                Validasi Sekarang</button>
                        </form>
                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasikk', $dokumen[0]->nik)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                Tolak Validasi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="text-center">
                    <img src="<?php echo e(Storage::url('public/kk/').$dokumen[0]->d_kk); ?>" id="imgkk"
                        style="width:700px; height:500px; horizontal-align:middle;">
                        <div class="d-flex justify-content-between">
                            <div class="p-2">
                                <button class="btn btn-primary" id="leftkk">Putar Kiri</button>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary" id="rightkk">Putar Kanan</button>
                            </div>
                        </div>
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
                    <div class="p-2">
                        <form action="<?php echo e(route('dokumenmahasiswa.validasidokumenwajib', $dokumen[0]->nik)); ?>"
                            method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                Validasi Sekarang</button>
                        </form>
                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasiwajib', $dokumen[0]->nik)); ?>"
                            method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                Tolak Validasi</button>
                        </form>
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
                    <div class="p-2">
                        <form action="<?php echo e(route('dokumenmahasiswa.validasidokumenpendukung', $dokumen[0]->nik)); ?>"
                            method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                Validasi Sekarang</button>
                        </form>
                        <form action="<?php echo e(route('dokumenmahasiswa.tolakvalidasipendukung', $dokumen[0]->nik)); ?>"
                            method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                Tolak Validasi</button>
                        </form>
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
            <div class="card-header">
                <h5>Silahkan Konfirmasi Final Untuk Kelengkapan Berkas Diterima atau Belum Diterima</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('dokumenmahasiswa.validasikonfirmasiditerima', $dokumen[0]->id)); ?>"
                    method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                        Konfirmasi Semua Berkas Diterima</button>
                </form>
                <form action="<?php echo e(route('dokumenmahasiswa.validasikonfirmasibelumditerima', $dokumen[0]->id)); ?>"
                    method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                        Konfirmasi Semua Berkas Belum Diterima</button>
                </form>
            </div>
            <div class="card-footer">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Status diterima : <button class="btn <?php echo e($dokumen[0]->status_dokumen_final == 'belum_diterima' ? 'btn-danger' : 'btn-success'); ?> "><?php echo e($dokumen[0]->status_dokumen_final); ?></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h4>Keterangan dari Staff Pemvalidasi</h4>
                <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $validasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <form action="<?php echo e(route('dokumenmahasiswa.updateketerangan', $validasi->nik)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <div class="form-group">
                        <label for="keterangan">Berikan Keterangan Untuk Kelengkapan Berkas</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30"
                            rows="10"><?php echo e($validasi->keterangan == '' ? '' : $validasi[0]->keterangan); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Simpan Keterangan Validasi <i
                            class="fa fa-row-left"></i></button>
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        const imgktp = document.getElementById("imgktp");
        const leftktp = document.getElementById("leftktp");
        const rightktp = document.getElementById("rightktp");

        let ktpkiri = 0;
        let ktpkanan = 0;
        leftktp.addEventListener("click", () => {
            ktpkiri = ktpkiri + -90;
            imgktp.style.transform = `rotate(${ktpkiri}deg)`;
        });

        rightktp.addEventListener("click", () => {
            ktpkanan = ktpkanan + 90;
            imgktp.style.transform = `rotate(${ktpkanan}deg)`;
        });
    </script>
    <script>
        const imgkk = document.getElementById("imgkk");
        const leftkk = document.getElementById("leftkk");
        const rightkk = document.getElementById("rightkk");

        let kkkiri = 0;
        let kkkanan = 0;
        leftkk.addEventListener("click", () => {
            kkkiri = kkkiri + -90;
            imgkk.style.transform = `rotate(${kkkiri}deg)`;
        });

        rightkk.addEventListener("click", () => {
            kkkanan = kkkanan + 90;
            imgkk.style.transform = `rotate(${kkkanan}deg)`;
        });
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/dokumenMahasiswa/show.blade.php ENDPATH**/ ?>