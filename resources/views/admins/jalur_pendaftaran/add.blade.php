@extends('layouts.app')
@push('css')
    <link href="{{ asset('') }}vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('') }}vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('') }}vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('') }}vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('') }}vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('') }}vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('') }}vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('') }}vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('') }}vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('') }}vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('') }}vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="{{ asset('') }}vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="{{ asset('') }}vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('') }}vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="{{ asset('') }}vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('') }}vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="{{ asset('') }}vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="{{ asset('') }}vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('') }}vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="{{ asset('') }}vendors/starrr/dist/starrr.js"></script>
@endpush
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Gelombang</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div>
                                <form action="{{ route('gelombang.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Gelombang</label>
                                            <input type="text"
                                                class="form-control  {{ count($errors)>0 ? ($errors->has('kode_gelombang') ? 'is-invalid' : 'is-valid') :'' }}"
                                                placeholder="Kode Gelombang" name="kode_gelombang"
                                                value="{{ old('kode_gelombang') }}">
                                            @if ($errors->has('kode_gelombang'))
                                                <div class="text-danger">
                                                    {{ $errors->first('kode_gelombang') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Gelombang</label>
                                            <input type="text"
                                                class="form-control {{ count($errors)>0 ? ($errors->has('nama_gelombang') ? 'is-invalid' : 'is-valid') :'' }}"
                                                placeholder="Nama Gelombang" name="nama_gelombang"
                                                value="{{ old('nama_gelombang') }}">
                                            @if ($errors->has('nama_gelombang'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nama_gelombang') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Jalur Pendaftaran</label>
                                    <select class="form-control select2" style="width: 100%;" name="jalur_pendaftaran">
                                        <option value="">Pilih Jalur Pendaftaran</option>
                                        <option value="1">Jalur Reguler</option>
                                        <option value="2">Jalur Alur Jenjang</option>
                                        <option value="3">Jalur Pretasi Akademik</option>
                                        <option value="4">Jalur Pretasi Non Akademik
                                        </option>
                                        <option value="5">Jalur Kader Persyarikatan
                                            Muhammadiyah</option>
                                        <option value="6">Jalur Hafidz Qur&#039;an</option>
                                        <option value="7">Jalur Beasiswa (KIP-K)</option>
                                        <option value="8">Jalur Transfer</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Induk Kepndudukan (NIK) </label>
                                            <input type="text" class="form-control is-invalid"
                                                placeholder="Nomor Induk Kepndudukan (NIK)" name="nik" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Induk Siswa Nasional (NISN) </label>
                                            <input type="text" class="form-control is-valid"
                                                placeholder="Nomor Induk Siswa Nasional (NISN)" name="nisn"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap </label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Nama Lengkap Sesuai Ijazah" value="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                placeholder="Tempat Lahir" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="tanggal_lahir" class="form-control datemask"
                                                    data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                    data-mask value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin
                                                </option>
                                                <option value="1">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Agama </label>
                                            <select name="agama" class="form-control">
                                                <option value="">Pilih Agama</option>
                                                <option value="1">ISLAM</option>
                                                <option value="2">PROTESTAN</option>
                                                <option value="3">KATHOLIK</option>
                                                <option value="4">HINDU</option>
                                                <option value="5">BUDHA</option>
                                                <option value="6">KHONG HU CU</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select name="provinsi" class="form-control select2" style="width: 100%"
                                                id="provinsi">
                                                <option value="">==Pilih Salah Satu==
                                                </option>
                                                <option value="1">ACEH</option>
                                                <option value="2">SUMATERA UTARA</option>
                                                <option value="3">SUMATERA BARAT</option>
                                                <option value="4">RIAU</option>
                                                <option value="5">JAMBI</option>
                                                <option value="6">SUMATERA SELATAN
                                                </option>
                                                <option value="7">BENGKULU</option>
                                                <option value="8">LAMPUNG</option>
                                                <option value="9">KEPULAUAN BANGKA
                                                    BELITUNG</option>
                                                <option value="10">KEPULAUAN RIAU</option>
                                                <option value="11">DKI JAKARTA</option>
                                                <option value="12">JAWA BARAT</option>
                                                <option value="13">JAWA TENGAH</option>
                                                <option value="14">DAERAH ISTIMEWA
                                                    YOGYAKARTA</option>
                                                <option value="15">JAWA TIMUR</option>
                                                <option value="16">BANTEN</option>
                                                <option value="17">BALI</option>
                                                <option value="18">NUSA TENGGARA BARAT
                                                </option>
                                                <option value="19">NUSA TENGGARA TIMUR
                                                </option>
                                                <option value="20">KALIMANTAN BARAT
                                                </option>
                                                <option value="21">KALIMANTAN TENGAH
                                                </option>
                                                <option value="22">KALIMANTAN SELATAN
                                                </option>
                                                <option value="23">KALIMANTAN TIMUR
                                                </option>
                                                <option value="24">KALIMANTAN UTARA
                                                </option>
                                                <option value="25">SULAWESI UTARA</option>
                                                <option value="26">SULAWESI TENGAH</option>
                                                <option value="27">SULAWESI SELATAN
                                                </option>
                                                <option value="28">SULAWESI TENGGARA
                                                </option>
                                                <option value="29">GORONTALO</option>
                                                <option value="30">SULAWESI BARAT</option>
                                                <option value="31">MALUKU</option>
                                                <option value="32">MALUKU UTARA</option>
                                                <option value="33">PAPUA</option>
                                                <option value="34">PAPUA BARAT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kota/Kabupaten </label>
                                            <select class="form-control select2" name="kota" id="kota">
                                                <option value="">==Pilih Salah Satu==
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <select class="form-control select2" name="kecamatan" id="kecamatan">
                                                <option value="">==Pilih Salah Satu==
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Desa/Kelurahan </label>
                                            <select class="form-control select2" name="desa" id="desa">
                                                <option value="">==Pilih Salah Satu==
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>RT/RW</label>
                                            <input type="text" class="form-control" name="rt"
                                                placeholder="RT/RW" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jalan</label>
                                            <input type="text" class="form-control" name="jalan"
                                                placeholder="Jalan" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Handphone/WhatsApp</label>
                                            <input type="text" class="form-control" name="hp"
                                                placeholder="Nomor Handphone/WhatsApp Aktif" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Alamat Email Aktif" value="">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenjang Pendidikan</label>
                                            <select name="jenis_sekolah" class="form-control">
                                                <option value="">Pilih Jenis Sekolah
                                                </option>
                                                <option value="1">SMA</option>
                                                <option value="2">SMK</option>
                                                <option value="3">MA</option>
                                                <option value="4">D3/D4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Asal Sekolah</label>
                                            <input type="text" class="form-control" name="asal_sekolah"
                                                placeholder="Nama Sekolah" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <input type="text" class="form-control" value="" name="jurusan"
                                                placeholder="Jurusan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun Lulus</label>
                                            <input type="text" class="form-control" value="" name="tahun_lulus"
                                                placeholder="Tahun Lulus">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Sekolah</label>
                                    <textarea class="form-control" name="alamat_sekolah"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Program Perkuliahan</label>
                                    <select class="form-control select2" name="id_program_kuliah">
                                        <option value="">Pilih Program Kuliah</option>
                                        <option value="1">Reguler Pagi</option>
                                        <option value="2">Reguler Malam</option>
                                        <option value="3">Reguler Pekerja</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Program Studi Pilihan 1</label>
                                            <select name="prodi1" class="form-control">
                                                <option value="">Pilih Program Studi
                                                    Pertama</option>
                                                <option value="55201">S1 - Informatika
                                                </option>
                                                <option value="57201">S1 - Sistem Informasi
                                                </option>
                                                <option value="60201">S1 - Ekonomi Pembangunan
                                                </option>
                                                <option value="61201">S1 - Manajemen</option>
                                                <option value="554251">S1 - Kehutanan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Program Studi Pilihan 2</label>
                                            <select name="prodi2" class="form-control">
                                                <option value="">Pilih Program Studi
                                                    Kedua</option>
                                                <option value="55201">S1 - Informatika
                                                </option>
                                                <option value="57201">S1 - Sistem Informasi
                                                </option>
                                                <option value="60201">S1 - Ekonomi Pembangunan
                                                </option>
                                                <option value="61201">S1 - Manajemen</option>
                                                <option value="554251">S1 - Kehutanan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Instansi </label>
                                            <input type="text" class="form-control" name="pekerjaan"
                                                placeholder="Nama Instansi" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jabatan </label>
                                            <input type="text" class="form-control" name="jabatan"
                                                placeholder="Jabatan" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Ayah/Wali</label>
                                            <input type="text" class="form-control" name="ayah"
                                                placeholder="Nama Ayah/Wali" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Ibu/Wali </label>
                                            <input type="text" class="form-control" name="ibu"
                                                placeholder="Nama Ibu" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Orang Tua / Wali</label>
                                    <textarea name="alamat_ortu" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Informasi Kuliah di UM Jambi</label>
                                    <select name="informasi_kuliah" class="form-control" id="informasi_kuliah">
                                        <option value="">Pilih Informasi Kuliah di UM
                                            Jambi</option>
                                        <option value="1">Website</option>
                                        <option value="2">Sosial Media</option>
                                        <option value="3">Keluarga</option>
                                        <option value="4">Tim Promosi UM Jambi</option>
                                        <option value="5">Baliho, Spanduk, Billboard
                                        </option>
                                        <option value="6">Dosen UM Jambi</option>
                                        <option value="7">Karyawan UM Jambi</option>
                                        <option value="8">Teman Kuliah di UM Jambi
                                        </option>
                                        <option value="9">Lainnya</option>
                                    </select>
                                </div>
                            </div> --}}
                            <!-- start form for validation -->
                            {{-- <form id="demo-form" data-parsley-validate>
                                <label for="fullname">Nama Lengkap *</label>
                                <input type="text" id="fullname" class="form-control" name="fullname" required />

                                <label for="email">Alamat Email *</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    data-parsley-trigger="change" required />

                                <label>Gender *:</label>
                                <p>
                                    M:
                                    <input type="radio" class="flat" name="gender" id="genderM" value="M"
                                        checked="" required /> F:
                                    <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                                </p>

                                <label>Hobbies (2 minimum):</label>
                                <p style="padding: 5px;">
                                    <input type="checkbox" name="hobbies[]" id="hobby1" value="ski"
                                        data-parsley-mincheck="2" required class="flat" /> Skiing
                                    <br />

                                    <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" />
                                    Running
                                    <br />

                                    <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" />
                                    Eating
                                    <br />

                                    <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat" />
                                    Sleeping
                                    <br />
                                <p>

                                    <label for="heard">Heard us by *:</label>
                                    <select id="heard" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="press">Press</option>
                                        <option value="net">Internet</option>
                                        <option value="mouth">Word of mouth</option>
                                    </select>

                                    <label for="message">Message (20 chars min, 100 max) :</label>
                                    <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup"
                                        data-parsley-minlength="20" data-parsley-maxlength="100"
                                        data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                        data-parsley-validation-threshold="10"></textarea>

                                    <br />
                                    <span class="btn btn-primary">Validate form</span>

                            </form> --}}
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->
@endsection
