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
                            <!-- <li class="nav navbar-right panel_toolbox">
                                <?php if(auth()->user()->role == 'user'): ?>
                                    <a href="<?php echo e(route('biodata.edit',Auth::user()->nik)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <?php else: ?>

                                <?php endif; ?>
                            </li> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-3 mail_list_column">
                                    <div class="mail_list text-center">
                                        <img class="mb-3" src="<?php echo e(Storage::url('public/mahasiswas/').$data[0]->gambar); ?>" alt="<?php echo e($data[0]->nama_mahasiswa); ?>" widt="200" height="200">
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nama Mahasiswa
                                            <h3><?php echo e($data[0]->nama_mahasiswa); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Pendaftaran
                                            <h3><?php echo e($data[0]->no_registrasi); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Kependudukan
                                            <h3><?php echo e($data[0]->nik); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Siswa Nasional
                                            <h3><?php echo e($data[0]->nisn); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Tempat, Tanggal Lahir
                                            <h3><?php echo e($data[0]->tempat_lahir ? $data[0]->tempat_lahir . ', ' : '' . $data[0]->tanggal_lahir); ?>

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Jenis Kelamin
                                            <h3><?php echo e($data[0]->tempat_lahir . ', ' . $data[0]->tanggal_lahir); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Agama
                                            <h3><?php echo e(Str::ucfirst(Str::lower($data[0]->agama()->first()->name))); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Alamat
                                            <h3><?php echo e($data[0]->jalan ? 'Jalan ' . $data[0]->jalan : ''); ?>

                                                <?php echo e($data[0]->rt ? 'RT/RW ' . $data[0]->rt : ''); ?>

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
                                            <h3><?php echo e($data[0]->hp); ?></h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Email
                                            <h3><?php echo e($data[0]->email); ?></h3>
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
                                                        <td><?php echo e($data[0]->program_kuliah()->first()->nama_program_kuliah); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Pertama</td>
                                                        <td><?php echo e($data[0]->prodi1()->first()->nama_prodi); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Kedua</td>
                                                        <td><?php echo e($data[0]->prodi2()->first()->nama_prodi); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Orang Tua/Wali</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah/Wali</td>
                                                        <td><?php echo e($data[0]->nama_ayah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu/Wali</td>
                                                        <td><?php echo e($data[0]->nama_ibu); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Orang Tua/Wali</td>
                                                        <td><?php echo e($data[0]->alamat_orangtua); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Asal Sekolah</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Sekolah</td>
                                                        <td><?php echo e($data[0]->nama_sekolah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenjang dan Jurusan Sekolah</td>
                                                        <td><?php echo e($data[0]->jenjang_sekolah()->first()->nama . ' - ' . $data[0]->jurusan_sekolah); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Sekolah</td>
                                                        <td><?php echo e($data[0]->alamat_sekolah); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Lulus</td>
                                                        <td><?php echo e($data[0]->tahun_lulus); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Pekerjaan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Instansi</td>
                                                        <td><?php echo e($data[0]->nama_instansi ? $data[0]->nama_instansi : '-'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td><?php echo e($data[0]->jabatan ? $data[0]->jabatan : '-'); ?></td>
                                                    </tr>
                                                    <?php if(Auth::user()->role == 'user'): ?>
                                                        <th>Status Validasi</th>
                                                        <td><button class="btn <?php echo e($data[0]->status_validasi == 'Y' ? 'btn-success' : 'btn-danger'); ?>"><?php echo e($data[0]->status_validasi == 'Y' ? 'Telah Divalidasi' : 'Belum Divalidasi'); ?></button></td>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/mahasiswa/biodata.blade.php ENDPATH**/ ?>