<?php $__env->startSection('content'); ?>
<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('')); ?>css/style.css" rel="stylesheet">
<?php $__env->stopPush(); ?>
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
                <div>
                    <h6>Cari Berdasarkan Gelombang</h6>

                    <form action="<?php echo e(route($link . '.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 col-sm-12 mb-10">
                            <div class="container text-center">
                                <h4>Upload Gambar Phas Foto (1)</h4>
                                <div class="imgwrapper">
                                    <div class="image">
                                        <img class="img-phasfoto" src="<?php echo e(old('image')); ?>" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">
                                            4 x
                                        </div>
                                    </div>
                                    <div id="cancel-btn">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                    <div class="file-name">
                                        File name here
                                    </div>
                                </div>
                                <label onClick="defaultBtnActive()" id="custom-btn">Upload Phas Foto</label>
                                <input name="image" id="default-btn" type="file" hidden>
                                <?php if($errors->has('image')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('image')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Jalur Pendaftaran (2)</label>
                                <select
                                    class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('jalur_pendaftaran') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                    style="width: 100%;" name="jalur_pendaftaran">
                                    <option value="">==Pilih Jalur Pendaftaran==</option>
                                    <?php $__currentLoopData = $jalur_pendaftaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id_jalur_pendaftaran); ?>"
                                        <?php echo e($item->id_jalur_pendaftaran == old('jalur_pendaftaran') ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama_jalur_pendaftaran); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('jalur_pendaftaran')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('jalur_pendaftaran')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Kepndudukan (NIK) (3) </label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('nik') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            placeholder="Nomor Induk Kepndudukan (NIK)" id='nik' name="nik"
                                            value="<?php echo e(Auth::user()->role == 'user' ? Auth::user()->nik : old('nik')); ?>"
                                            <?php echo e(Auth::user()->role == 'user' ? 'readonly' : ''); ?>>
                                        <?php if($errors->has('nik')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('nik')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Siswa Nasional (NISN) (3) </label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('nisn') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            placeholder="Nomor Induk Siswa Nasional (NISN)" name="nisn"
                                            value="<?php echo e(old('nisn')); ?>">
                                        <?php if($errors->has('nisn')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('nisn')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap (4)</label>
                                <input type="text" name="nama"
                                    class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('nama') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                    placeholder="Nama Lengkap Sesuai Ijazah" value="<?php echo e(old('nama')); ?>">
                                <?php if($errors->has('nama')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('nama')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir (5)</label>
                                        <input type="text" name="tempat_lahir"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('tempat_lahir') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            placeholder="Tempat Lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                                        <?php if($errors->has('tempat_lahir')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('tempat_lahir')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir (6)</label>
                                        <input id="birthday"
                                            class="date-picker form-control <?php echo e(count($errors) > 0 ? ($errors->has('tanggal_lahir') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="tanggal_lahir" placeholder="dd-mm-yyyy" type="text" type="text"
                                            onfocus="this.type='date'" onmouseover="this.type='date'"
                                            onclick="this.type='date'" onblur="this.type='text'"
                                            onmouseout="timeFunctionLong(this)" value="<?php echo e(old('tanggal_lahir')); ?>">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }

                                        </script>
                                        <?php if($errors->has('tanggal_lahir')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('tanggal_lahir')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin (7)</label>
                                        <select name="jenis_kelamin"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('jenis_kelamin') ? 'is-invalid' : 'is-valid') : ''); ?>">
                                            <option value="">==Pilih Jenis Kelamin==</option>
                                            <?php $__currentLoopData = $jenis_kelamin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e($item->id == old('jenis_kelamin') ? 'selected' : ''); ?>>
                                                <?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('jenis_kelamin')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('jenis_kelamin')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama (8)</label>
                                        <select name="agama"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('agama') ? 'is-invalid' : 'is-valid') : ''); ?>">
                                            <option value="">==Pilih Agama==</option>
                                            <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e(old('agama') == $item->id ? 'selected' : ''); ?>>
                                                <?php echo e(Str::ucfirst(Str::lower($item->name))); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('agama')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('agama')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi (9)</label>
                                        <select name="provinsi"
                                            class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('provinsi') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            style="width: 100%" id="provinsi_id">
                                            <option value="">==Pilih Salah Satu==</option>
                                            <?php $__currentLoopData = $provinsi->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e($item->id == old('provinsi') ? 'selected' : ''); ?>>
                                                <?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('provinsi')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('provinsi')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten (10)</label>
                                        <select
                                            class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('kota') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="kota" id="kabupaten_id">
                                            <option value="">==Pilih Salah Satu==
                                            </option>
                                        </select>
                                        <?php if($errors->has('kota')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('kota')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan (11)</label>
                                        <select
                                            class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('kecamatan') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="kecamatan" id="kecamatan_id">
                                            <option value="">==Pilih Salah Satu==
                                            </option>
                                        </select>
                                        <?php if($errors->has('kecamatan')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('kecamatan')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desa/Kelurahan (12)</label>
                                        <select
                                            class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('kelurahan') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="kelurahan" id="kelurahan_id">
                                            <option value="">==Pilih Salah Satu==
                                            </option>
                                        </select>
                                        <?php if($errors->has('kelurahan')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('kelurahan')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RT/RW (13)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('rt') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="rt" placeholder="RT/RW" value="<?php echo e(old('rt')); ?>">
                                        <?php if($errors->has('rt')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('rt')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jalan (14)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('jalan') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="jalan" placeholder="Jalan" value="<?php echo e(old('jalan')); ?>">
                                        <?php if($errors->has('jalan')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('jalan')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Handphone/WhatsApp (15)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('hp') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="hp" placeholder="Nomor Handphone/WhatsApp Aktif"
                                            value="<?php echo e(old('hp')); ?>">
                                        <?php if($errors->has('hp')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('hp')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email (16)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('email') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="email" placeholder="Alamat Email Aktif"
                                            value="<?php echo e(Auth::user()->role == 'user' ? Auth::user()->email : old('email')); ?>"
                                            <?php echo e(Auth::user()->role == 'user' ? 'readonly' : ''); ?>>
                                        <?php if($errors->has('email')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Ayah/Wali (17)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('ayah') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="ayah" placeholder="Nama Ayah/Wali" value="<?php echo e(old('ayah')); ?>">
                                        <?php if($errors->has('ayah')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('ayah')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Ibu/Wali (18)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('ibu') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="ibu" placeholder="Nama Ibu" value="<?php echo e(old('ibu')); ?>">
                                        <?php if($errors->has('ibu')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('ibu')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Orang Tua / Wali (19)</label>
                                <textarea name="alamat_ortu"
                                    class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('alamat_ortu') ? 'is-invalid' : 'is-valid') : ''); ?>"><?php echo e(old('alamat_ortu')); ?></textarea>
                                <?php if($errors->has('alamat_ortu')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('alamat_ortu')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan (20)</label>
                                        <select name="jenis_sekolah"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('jenis_sekolah') ? 'is-invalid' : 'is-valid') : ''); ?>">
                                            <option value="">==Pilih Jenjang Sekolah==
                                            </option>
                                            <?php $__currentLoopData = $jenjangSekolah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e(old('jenis_sekolah') == $item->id ? 'selected' : ''); ?>>
                                                <?php echo e($item->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('jenis_sekolah')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('jenis_sekolah')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Asal Sekolah (21)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('asal_sekolah') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            name="asal_sekolah" placeholder="Nama Sekolah"
                                            value="<?php echo e(old('asal_sekolah')); ?>">
                                        <?php if($errors->has('asal_sekolah')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('asal_sekolah')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jurusan (22)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('jurusan') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            value="<?php echo e(old('jurusan')); ?>" name="jurusan" placeholder="Jurusan">
                                        <?php if($errors->has('jurusan')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('jurusan')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Lulus (24)</label>
                                        <input type="text"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('tahun_lulus') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                            value="<?php echo e(old('tahun_lulus')); ?>" name="tahun_lulus"
                                            placeholder="Tahun Lulus">
                                        <?php if($errors->has('tahun_lulus')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('tahun_lulus')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekolah (26)</label>
                                <textarea
                                    class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('alamat_sekolah') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                    name="alamat_sekolah"><?php echo e(old('alamat_sekolah')); ?></textarea>
                                <?php if($errors->has('alamat_sekolah')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('alamat_sekolah')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Program Perkuliahan (27)</label>
                                <select
                                    class="form-control select2 <?php echo e(count($errors) > 0 ? ($errors->has('id_program_kuliah') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                    name="id_program_kuliah">
                                    <option value="">==Pilih Program Kuliah==</option>
                                    <?php $__currentLoopData = $programKuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id_program_kuliah); ?>"
                                        <?php echo e($item->id_program_kuliah == old('id_program_kuliah') ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama_program_kuliah); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('id_program_kuliah')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('id_program_kuliah')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Studi Pilihan 1 (28)</label>
                                        <select name="prodi1"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('prodi1') ? 'is-invalid' : 'is-valid') : ''); ?>">
                                            <option value="">==Pilih Program Studi
                                                Pertama==</option>
                                            <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id_prodi); ?>"
                                                <?php echo e($item->id_prodi == old('prodi1') ? 'selected' : ''); ?>>
                                                <?php echo e($item->nama_prodi); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('prodi1')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('prodi1')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Studi Pilihan 2 (29)</label>
                                        <select name="prodi2"
                                            class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('prodi2') ? 'is-invalid' : 'is-valid') : ''); ?>">
                                            <option value="">==Pilih Program Studi
                                                Kedua==</option>
                                            <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id_prodi); ?>"
                                                <?php echo e($item->id_prodi == old('prodi2') ? 'selected' : ''); ?>>
                                                <?php echo e($item->nama_prodi); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('prodi2')): ?>
                                        <div class="text-danger">
                                            <?php echo e($errors->first('prodi2')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Instansi (30)</label>
                                        <input type="text" class="form-control" name="pekerjaan"
                                            placeholder="Nama Instansi" value="<?php echo e(old('pekerjaan')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan (31)</label>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan"
                                            value="<?php echo e(old('jabatan')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Dari Mana Mendapatkan Informasi Kuliah di UM Jambi (31)</label>
                                <select name="info_kuliah"
                                    class="form-control <?php echo e(count($errors) > 0 ? ($errors->has('info_kuliah') ? 'is-invalid' : 'is-valid') : ''); ?>"
                                    id="informasi_kuliah">
                                    <option value="">Pilih Informasi Kuliah di UM
                                        Jambi</option>
                                    <?php $__currentLoopData = $info_kuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e($item->id == old('info_kuliah') ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('info_kuliah')): ?>
                                <div class="text-danger">
                                    <?php echo e($errors->first('info_kuliah')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-success mt-2" type="submit" value="Simpan Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        const provinsi_id = document.getElementById("provinsi_id").value;
        const kabupaten_id = document.getElementById("kabupaten_id").value;
        if (provinsi_id != '') {
            document.getElementById("kabupaten_id").setAttribute("id_kab", "<?php echo e(old('kota') ? old('kota') : '0'); ?>");
            const element_kab = document.getElementById("kabupaten_id");
            let id_kab = element_kab.getAttribute("id_kab");

            $.ajax({
                url: "<?php echo e(url('kabupaten')); ?>",
                method: 'post',
                data: {
                    id: provinsi_id,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                dataType: 'json',
                success: function (response) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').html(
                        '<option value="">==Pilih Kota/Kabupaten==</option>');
                    response.data.forEach(element => {
                        if (id_kab == element.id) {
                            $("#kabupaten_id").append('<option value="' + element
                                .id + '" selected>' + element.name + '</option>');

                        } else {
                            $("#kabupaten_id").append('<option value="' + element
                                .id + '">' + element.name + '</option>');
                        }
                    });

                    if (id_kab != '') {
                        document.getElementById("kecamatan_id").setAttribute("id_kec",
                            "<?php echo e(old('kecamatan') ? old('kecamatan') : '0'); ?>");
                        const element_kec = document.getElementById("kecamatan_id");
                        let id_kec = element_kec.getAttribute("id_kec");

                        $.ajax({
                            url: "<?php echo e(url('kecamatan')); ?>",
                            method: 'post',
                            data: {
                                id: id_kab,
                                _token: '<?php echo e(csrf_token()); ?>',
                            },
                            dataType: 'json',
                            success: function (response) {
                                $('#kecamatan_id').empty();
                                $('#kecamatan_id').html(
                                    '<option value="">==Pilih Kecamatan==</option>');
                                response.data.forEach(element => {
                                    if (id_kec == element.id) {
                                        $("#kecamatan_id").append('<option value="' +
                                            element
                                            .id + '" selected>' + element.name
                                            .toUpperCase() +
                                            '</option>');

                                    } else {
                                        $("#kecamatan_id").append('<option value="' +
                                            element
                                            .id + '">' + element.name
                                            .toUpperCase() +
                                            '</option>');
                                    }
                                });
                            }
                        })
                        if (id_kec != '') {
                            document.getElementById("kelurahan_id").setAttribute("id_kel",
                                "<?php echo e(old('kelurahan') ? old('kelurahan') : '0'); ?>");
                            const element_kec = document.getElementById("kelurahan_id");
                            let id_kel = element_kec.getAttribute("id_kel");
                            $.ajax({
                                url: "<?php echo e(url('kelurahan')); ?>",
                                method: 'post',
                                data: {
                                    id: id_kec,
                                    _token: '<?php echo e(csrf_token()); ?>',
                                },
                                dataType: 'json',
                                success: function (response) {
                                    $('#kelurahan_id').empty();
                                    $('#kelurahan_id').html(
                                        '<option value="">==Pilih Desa/Kelurahan==</option>'
                                    );
                                    response.data.forEach(element => {
                                        if (id_kel == element.id) {
                                            $("#kelurahan_id").append(
                                                '<option value="' +
                                                element
                                                .id + '" selected>' + element.name
                                                .toUpperCase() +
                                                '</option>');

                                        } else {
                                            $("#kelurahan_id").append(
                                                '<option value="' +
                                                element
                                                .id + '">' + element.name
                                                .toUpperCase() +
                                                '</option>');
                                        }
                                    });
                                }
                            })
                        }
                    }
                }
            })
        }

        $(function () {
            $('#provinsi_id').on('change', function () {
                $.ajax({
                    url: "<?php echo e(url('kabupaten')); ?>",
                    method: 'post',
                    data: {
                        id: $(this).val(),
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#kabupaten_id').empty();
                        $('#kabupaten_id').html(
                            '<option value="">==Pilih Kota/Kabupaten==</option>');
                        $.each(response.data, function (key, value) {
                            $("#kabupaten_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#kecamatan_id').html(
                            '<option value="">==Pilih Kecamatan==</option>');
                    }
                })
            });

            $('#kabupaten_id').on('change', function () {
                $.ajax({
                    url: "<?php echo e(url('kecamatan')); ?>",
                    method: 'post',
                    data: {
                        id: $(this).val(),
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#kecamatan_id').empty();
                        $('#kecamatan_id').html(
                            '<option value="">==Pilih Kecamatan==</option>');
                        $.each(response.data, function (key, value) {
                            $("#kecamatan_id").append('<option value="' + value
                                .id + '">' + value.name.toUpperCase() +
                                '</option>');
                        });
                        $('#Kelurahan_id').html(
                            '<option value="">==Pilih Kelurahan==</option>');
                        console.log(response.data);
                    }
                })
            });

            $('#kecamatan_id').on('change', function () {
                $.ajax({
                    url: "<?php echo e(url('kelurahan')); ?>",
                    method: 'post',
                    data: {
                        id: $(this).val(),
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#kelurahan_id').empty();
                        $('#kelurahan_id').html(
                            '<option value="">==Pilih Desa/Kelurahan==</option>');
                        $.each(response.data, function (key, value) {
                            $("#kelurahan_id").append('<option value="' + value
                                .id + '">' + value.name.toUpperCase() +
                                '</option>');
                        });
                    }
                })
            });
        });

    </script>
    <script>
        // View image file before upload
        const wrapper = document.querySelector(".imgwrapper");
        const fileName = document.querySelector(".file-name");
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");
        const cancelBtn = document.querySelector("#cancel-btn i");
        const img = document.querySelector(".img-phasfoto");
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

        function defaultBtnActive() {
            defaultBtn.click();
        }
        defaultBtn.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    const result = reader.result;
                    img.src = result;
                    wrapper.classList.add("active");
                }
                cancelBtn.addEventListener("click", function () {
                    img.src = "";
                    wrapper.classList.remove("active");
                })
                reader.readAsDataURL(file);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                fileName.textContent = valueStore;
            }
        });

    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/mahasiswa/add.blade.php ENDPATH**/ ?>