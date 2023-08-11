

<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Detail Mahasiswa</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detail Mahasiswa</h2>
                            <li class="nav navbar-right panel_toolbox">
                                <?php if(auth()->user()->role == 'admin'): ?>
                                    <a target="__blank" href="<?php echo e(url('mahasiswa/print/' . $data->id)); ?>"
                                        class="btn btn-sm btn-warning" data-placement="top" data-toggle="tooltip"
                                        data-original-title="Print"><i class="fa fa-print"></i></a>

                                        
                                        <form action="<?php echo e(route('mahasiswa.destroy', $data->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" data-placement="top"
                                                data-toggle="tooltip"><i class="fa fa-trash"></i></button>
                                        </form>
                                    <?php else: ?>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i></a>
                                    <?php endif; ?>
                            </li>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-3 mail_list_column">
                                    <div class="mail_list text-center">
                                        <img class="mb-3" src="<?php echo e(Storage::url('public/mahasiswas/').$data->gambar); ?>" alt="<?php echo e($data->nama_mahasiswa); ?>" widt="200" height="200">
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nama Mahasiswa
                                            <h3><?php echo e($data->nama_mahasiswa); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Pendaftaran
                                            <h3><?php echo e($data->no_registrasi); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Kependudukan
                                            <h3><?php echo e($data->nik); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Siswa Nasional
                                            <h3><?php echo e($data->nisn); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Tempat, Tanggal Lahir
                                            <h3><?php echo e($data->tempat_lahir ? $data->tempat_lahir . ', ' : '' . $data->tanggal_lahir); ?>

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Jenis Kelamin
                                            <h3><?php echo e($data->tempat_lahir . ', ' . $data->tanggal_lahir); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Agama
                                            <h3><?php echo e(Str::ucfirst(Str::lower($data->agama()->first()->name))); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Alamat
                                            <h3><?php echo e($data->jalan ? 'Jalan ' . $data->jalan : ''); ?>

                                                <?php echo e($data->rt ? 'RT/RW ' . $data->rt : ''); ?>

                                                <?php echo e($default['kel'] ? 'Kelurahan ' . $default['kel'] : ''); ?>

                                                <?php echo e($default['kec'] ? 'Kecamatan ' . $default['kec'] : ''); ?>

                                                <br>
                                                <?php echo e($default['kab'] ? Str::title((Str::lower($default['kab'])))  : ''); ?>

                                                <?php echo e($default['prov'] ? ', ' . Str::title(Str::lower($default['prov']))  : ''); ?>

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor WhatsApp
                                            <h3><?php echo e($data->hp); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Email
                                            <h3><?php echo e($data->email); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 mail_view">
                                    <div class="inbox-body">
                                        <div class="view-mail">
                                            <table class="table  no-margin">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Perkuliahan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program kuliah</td>
                                                        <td><?php echo e($data->program_kuliah()->first()->nama_program_kuliah); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Pertama</td>
                                                        <td><?php echo e($data->prodi1()->first()->nama_prodi); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Kedua</td>
                                                        <td><?php echo e($data->prodi2()->first()->nama_prodi); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Orang Tua/Wali</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah/Wali</td>
                                                        <td><?php echo e($data->nama_ayah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu/Wali</td>
                                                        <td><?php echo e($data->nama_ibu); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Orang Tua/Wali</td>
                                                        <td><?php echo e($data->alamat_orangtua); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Asal Sekolah</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Sekolah</td>
                                                        <td><?php echo e($data->nama_sekolah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenjang dan Jurusan Sekolah</td>
                                                        <td><?php echo e($data->jenjang_sekolah()->first()->nama . ' - ' . $data->jurusan_sekolah); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Sekolah</td>
                                                        <td><?php echo e($data->alamat_sekolah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Lulus</td>
                                                        <td><?php echo e($data->tahun_lulus); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Pekerjaan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Instansi</td>
                                                        <td><?php echo e($data->nama_instansi ? $data->nama_instansi : '-'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td><?php echo e($data->jabatan ? $data->jabatan : '-'); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_content">
                            <form action="<?php echo e(route('mahasiswa.validasimahasiswa', $data->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('put')); ?>

                                <button type="submit" class="btn btn-success btn-block">Validasi Data</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/mahasiswa/show.blade.php ENDPATH**/ ?>