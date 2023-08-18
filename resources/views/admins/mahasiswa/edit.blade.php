@extends('layouts.app')
@section('content')
@push('styles')
<link href="{{ asset('') }}css/style.css" rel="stylesheet">
@endpush
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome {{ Auth::user()->name }} !! Anda memasuki admin akses</div>
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

                    <form action="{{ route($link . '.update',$data->nik) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 col-sm-12 mb-10">
                            <div class="container text-center">
                                <h4>Upload Gambar Phas Foto (1)</h4>
                                <div class="wrapper">
                                    <div class="image">
                                        <img class="img-phasfoto"
                                            src="{{ Storage::url('public/mahasiswas/').$data->gambar }}"
                                            style=" height: 40%; width: 40%;" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">
                                            4 x 6 | 200 Kb
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
                                @if ($errors->has('gambar'))
                                <div class="text-danger">
                                    {{ $errors->first('gambar') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Jalur Pendaftaran</label>
                                <select
                                    class="form-control select2 {{ count($errors) > 0 ? ($errors->has('jalur_pendaftaran') ? 'is-invalid' : 'is-valid') : '' }}"
                                    style="width: 100%;" name="jalur_pendaftaran">
                                    <option value="{{ $data->jalurpendaftaran->nama_jalur_pendaftaran }}">
                                        {{ $data->jalurpendaftaran->nama_jalur_pendaftaran }}</option>
                                    @foreach ($jalur_pendaftaran as $item)
                                    <option value="{{ $item->id_jalur_pendaftaran }}"
                                        {{ $item->id_jalur_pendaftaran == old('jalur_pendaftaran') ? 'selected' : '' }}>
                                        {{ $item->nama_jalur_pendaftaran }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jalur_pendaftaran'))
                                <div class="text-danger">
                                    {{ $errors->first('jalur_pendaftaran') }}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Kepndudukan (NIK) </label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('nik') ? 'is-invalid' : 'is-valid') : '' }}"
                                            placeholder="Nomor Induk Kepndudukan (NIK)" id='nik' name="nik"
                                            value="{{ $data->nik }}"
                                            {{ Auth::user()->role == 'user' ? 'readonly' : '' }}>
                                        @if ($errors->has('nik'))
                                        <div class="text-danger">
                                            {{ $errors->first('nik') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Siswa Nasional (NISN) </label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('nisn') ? 'is-invalid' : 'is-valid') : '' }}"
                                            placeholder="Nomor Induk Siswa Nasional (NISN)" name="nisn"
                                            value="{{ $data->nisn }}">
                                        @if ($errors->has('nisn'))
                                        <div class="text-danger">
                                            {{ $errors->first('nisn') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap </label>
                                <input type="text" name="nama"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('nama') ? 'is-invalid' : 'is-valid') : '' }}"
                                    placeholder="Nama Lengkap Sesuai Ijazah"
                                    value="{{ old('nama') ?? $data->nama_mahasiswa}}">
                                @if ($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('tempat_lahir') ? 'is-invalid' : 'is-valid') : '' }}"
                                            placeholder="Tempat Lahir"
                                            value="{{ old('tempat_lahir') ?? $data->tempat_lahir }}">
                                        @if ($errors->has('tempat_lahir'))
                                        <div class="text-danger">
                                            {{ $errors->first('tempat_lahir') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input id="birthday"
                                            class="date-picker form-control {{ count($errors) > 0 ? ($errors->has('tanggal_lahir') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="tanggal_lahir" placeholder="dd-mm-yyyy" type="text" type="text"
                                            onfocus="this.type='date'" onmouseover="this.type='date'"
                                            onclick="this.type='date'" onblur="this.type='text'"
                                            onmouseout="timeFunctionLong(this)"
                                            value="{{ old('tanggal_lahir') ?? $data->tanggal_lahir }}">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }

                                        </script>
                                        @if ($errors->has('tanggal_lahir'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggal_lahir') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('jenis_kelamin') ? 'is-invalid' : 'is-valid') : '' }}">
                                            <option value="{{ $data->jeniskelamin->id }}">
                                                {{ $data->jeniskelamin->name }}
                                            </option>
                                            @foreach ($jenis_kelamin as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == old('jenis_kelamin') ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('jenis_kelamin'))
                                        <div class="text-danger">
                                            {{ $errors->first('jenis_kelamin') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama </label>
                                        <select name="agama"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('agama') ? 'is-invalid' : 'is-valid') : '' }}">
                                            <option value="{{ $data->agama()->first()->id }}">
                                                {{ $data->agama()->first()->name }}</option>
                                            @foreach ($agama as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('agama') == $item->id ? 'selected' : '' }}>
                                                {{ Str::ucfirst(Str::lower($item->name)) }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('agama'))
                                        <div class="text-danger">
                                            {{ $errors->first('agama') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select name="provinsi"
                                            class="form-control select2 {{ count($errors) > 0 ? ($errors->has('provinsi') ? 'is-invalid' : 'is-valid') : '' }}"
                                            style="width: 100%" id="provinsi_id">
                                            <option value="{{ $data->id_provinsi }}">{{ $default['prov'] }}</option>
                                            @foreach ($provinsi->data as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == old('provinsi') ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('provinsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('provinsi') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten </label>
                                        <select
                                            class="form-control select2 {{ count($errors) > 0 ? ($errors->has('kota') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="kota" id="kabupaten_id">
                                            <option value="{{ $data->id_kabupaten }}">{{ $default['kab'] }}
                                            </option>
                                        </select>
                                        @if ($errors->has('kota'))
                                        <div class="text-danger">
                                            {{ $errors->first('kota') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select
                                            class="form-control select2 {{ count($errors) > 0 ? ($errors->has('kecamatan') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="kecamatan" id="kecamatan_id">
                                            <option value="{{ $data->id_kecamatan }}">{{ $default['kec'] }}
                                            </option>
                                        </select>
                                        @if ($errors->has('kecamatan'))
                                        <div class="text-danger">
                                            {{ $errors->first('kecamatan') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desa/Kelurahan </label>
                                        <select
                                            class="form-control select2 {{ count($errors) > 0 ? ($errors->has('kelurahan') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="kelurahan" id="kelurahan_id">
                                            <option value="{{ $data->id_keluarahan }}">{{ $default['kel'] }}
                                            </option>
                                        </select>
                                        @if ($errors->has('kelurahan'))
                                        <div class="text-danger">
                                            {{ $errors->first('kelurahan') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RT/RW</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('rt') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="rt" placeholder="RT/RW" value="{{ old('rt') ?? $data->rt }}">
                                        @if ($errors->has('rt'))
                                        <div class="text-danger">
                                            {{ $errors->first('rt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jalan</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('jalan') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="jalan" placeholder="Jalan" value="{{ old('jalan') ?? $data->jalan }}">
                                        @if ($errors->has('jalan'))
                                        <div class="text-danger">
                                            {{ $errors->first('jalan') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Handphone/WhatsApp</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('hp') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="hp" placeholder="Nomor Handphone/WhatsApp Aktif"
                                            value="{{ old('hp') ?? $data->hp }}">
                                        @if ($errors->has('hp'))
                                        <div class="text-danger">
                                            {{ $errors->first('hp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('email') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="email" placeholder="Alamat Email Aktif"
                                            value="{{ Auth::user()->role == 'user' ? Auth::user()->email : old('email') ?? $data->email }}"
                                            {{ Auth::user()->role == 'user' ? 'readonly' : '' }}>
                                        @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Ayah/Wali</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('ayah') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="ayah" placeholder="Nama Ayah/Wali"
                                            value="{{ old('ayah') ?? $data->nama_ayah }}">
                                        @if ($errors->has('ayah'))
                                        <div class="text-danger">
                                            {{ $errors->first('ayah') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Ibu/Wali </label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('ibu') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="ibu" placeholder="Nama Ibu"
                                            value="{{ old('ibu') ?? $data->nama_ibu }}">
                                        @if ($errors->has('ibu'))
                                        <div class="text-danger">
                                            {{ $errors->first('ibu') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Orang Tua / Wali</label>
                                <textarea name="alamat_ortu"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('alamat_ortu') ? 'is-invalid' : 'is-valid') : '' }}">{{ old('alamat_ortu') ?? $data->alamat_orangtua }}</textarea>
                                @if ($errors->has('alamat_ortu'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat_ortu') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan</label>
                                        <select name="jenis_sekolah"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('jenis_sekolah') ? 'is-invalid' : 'is-valid') : '' }}">
                                            <option value="{{ $data->jurusan_sekolah }}">
                                                {{ $data->jurusan_sekolah }}
                                            </option>
                                            @foreach ($jenjangSekolah as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('jenis_sekolah') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('jenis_sekolah'))
                                        <div class="text-danger">
                                            {{ $errors->first('jenis_sekolah') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Asal Sekolah</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('asal_sekolah') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="asal_sekolah" placeholder="Nama Sekolah"
                                            value="{{ old('asal_sekolah') ?? $data->nama_sekolah }}">
                                        @if ($errors->has('asal_sekolah'))
                                        <div class="text-danger">
                                            {{ $errors->first('asal_sekolah') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('jurusan') ? 'is-invalid' : 'is-valid') : '' }}"
                                            value="{{ old('jurusan') ?? $data->jurusan_sekolah }}" name="jurusan"
                                            placeholder="Jurusan">
                                        @if ($errors->has('jurusan'))
                                        <div class="text-danger">
                                            {{ $errors->first('jurusan') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Lulus</label>
                                        <input type="text"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('tahun_lulus') ? 'is-invalid' : 'is-valid') : '' }}"
                                            value="{{ old('tahun_lulus') ?? $data->tahun_lulus }}" name="tahun_lulus"
                                            placeholder="Tahun Lulus">
                                        @if ($errors->has('tahun_lulus'))
                                        <div class="text-danger">
                                            {{ $errors->first('tahun_lulus') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekolah</label>
                                <textarea
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('alamat_sekolah') ? 'is-invalid' : 'is-valid') : '' }}"
                                    name="alamat_sekolah">{{ old('alamat_sekolah') ?? $data->alamat_sekolah }}</textarea>
                                @if ($errors->has('alamat_sekolah'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat_sekolah') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Program Perkuliahan</label>
                                <select
                                    class="form-control select2 {{ count($errors) > 0 ? ($errors->has('id_program_kuliah') ? 'is-invalid' : 'is-valid') : '' }}"
                                    name="id_program_kuliah">
                                    <option value="{{ $data->program_kuliah->id_program_kuliah }}">
                                        {{ $data->program_kuliah->nama_program_kuliah }}</option>
                                    @foreach ($programKuliah as $item)
                                    <option value="{{ $item->id_program_kuliah }}"
                                        {{ $item->id_program_kuliah == old('id_program_kuliah') ? 'selected' : '' }}>
                                        {{ $item->nama_program_kuliah }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_program_kuliah'))
                                <div class="text-danger">
                                    {{ $errors->first('id_program_kuliah') }}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Studi Pilihan 1</label>
                                        <select name="prodi1"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('prodi1') ? 'is-invalid' : 'is-valid') : '' }}">
                                            <option value="{{ $data->prodi1()->first()->nama_prodi }}">
                                                {{ $data->prodi1()->first()->nama_prodi }}</option>
                                            @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}"
                                                {{ $item->id_prodi == old('prodi1') ? 'selected' : '' }}>
                                                {{ $item->nama_prodi }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('prodi1'))
                                        <div class="text-danger">
                                            {{ $errors->first('prodi1') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Studi Pilihan 2</label>
                                        <select name="prodi2"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('prodi2') ? 'is-invalid' : 'is-valid') : '' }}">
                                            <option value="{{ $data->prodi2 }}">
                                                {{ $data->prodi2()->first()->nama_prodi }}
                                            </option>
                                            @foreach ($prodi as $item)
                                            <option value="{{ $item->id_prodi }}"
                                                {{ $item->id_prodi == old('prodi2') ? 'selected' : '' }}>
                                                {{ $item->nama_prodi }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('prodi2'))
                                        <div class="text-danger">
                                            {{ $errors->first('prodi2') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Instansi </label>
                                        <input type="text" class="form-control" name="pekerjaan"
                                            placeholder="Nama Instansi"
                                            value="{{ old('pekerjaan') ?? $data->nama_instansi }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan </label>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan"
                                            value="{{ old('jabatan') ?? $data->jabatan }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Informasi Kuliah di UM Jambi</label>
                                <select name="info_kuliah"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('info_kuliah') ? 'is-invalid' : 'is-valid') : '' }}"
                                    id="informasi_kuliah">
                                    <option value="{{ $data->informasi_kuliah }}">
                                        {{ $data->informasikuliah()->first()->nama }}</option>
                                    @foreach ($info_kuliah as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == old('info_kuliah') ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('info_kuliah'))
                                <div class="text-danger">
                                    {{ $errors->first('info_kuliah') }}
                                </div>
                                @endif
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
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
    const provinsi_id = document.getElementById("provinsi_id").value;
    const kabupaten_id = document.getElementById("kabupaten_id").value;
    if (provinsi_id != '') {
        document.getElementById("kabupaten_id").setAttribute("id_kab", "{{ old('kota') ? old('kota') : $default['kab'] }}");
        const element_kab = document.getElementById("kabupaten_id");
        let id_kab = element_kab.getAttribute("id_kab");

        $.ajax({
            url: "{{ url('kabupaten') }}",
            method: 'post',
            data: {
                id: provinsi_id,
                _token: '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (response) {
                $('#kabupaten_id').empty();
                $('#kabupaten_id').html(
                    '<option value="">{{ $default['kab'] }}</option><option value="">==Pilih Kota/Kabupaten==</option>');
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
                        "{{ old('kecamatan') ? old('kecamatan') : $default['kec'] }}");
                    const element_kec = document.getElementById("kecamatan_id");
                    let id_kec = element_kec.getAttribute("id_kec");

                    $.ajax({
                        url: "{{ url('kecamatan') }}",
                        method: 'post',
                        data: {
                            id: id_kab,
                            _token: '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#kecamatan_id').empty();
                            $('#kecamatan_id').html(
                                '<option value="">{{ $default['kec'] }}</option> <option value="">==Pilih Kecamatan==</option>'
                            );
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
                                        .id + '">' + element.name.toUpperCase() +
                                        '</option>');
                                }
                            });
                        }
                    })
                    if (id_kec != '') {
                        document.getElementById("kelurahan_id").setAttribute("id_kel",
                            "{{ old('kelurahan') ? old('kelurahan') : $default['kel'] }}");
                        const element_kec = document.getElementById("kelurahan_id");
                        let id_kel = element_kec.getAttribute("id_kel");
                        $.ajax({
                            url: "{{ url('kelurahan') }}",
                            method: 'post',
                            data: {
                                id: id_kec,
                                _token: '{{ csrf_token() }}',
                            },
                            dataType: 'json',
                            success: function (response) {
                                $('#kelurahan_id').empty();
                                $('#kelurahan_id').html(
                                    '<option value="">{{ $default['kel']}}</option><option value="">==Pilih Desa/Kelurahan==</option>');
                                response.data.forEach(element => {
                                    if (id_kel == element.id) {
                                        $("#kelurahan_id").append('<option value="' +
                                            element
                                            .id + '" selected>' + element.name
                                            .toUpperCase() +
                                            '</option>');

                                    } else {
                                        $("#kelurahan_id").append('<option value="' +
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
                url: "{{ url('kabupaten') }}",
                method: 'post',
                data: {
                    id: $(this).val(),
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function (response) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').html(
                        '<option value="">{{ $data['kab'] }}</option><option value="">==Pilih Kota/Kabupaten==</option>');
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
                url: "{{ url('kecamatan') }}",
                method: 'post',
                data: {
                    id: $(this).val(),
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function (response) {
                    $('#kecamatan_id').empty();
                    $('#kecamatan_id').html(
                        '<option value="">==Pilih Kecamatan==</option>');
                    $.each(response.data, function (key, value) {
                        $("#kecamatan_id").append('<option value="' + value
                            .id + '">' + value.name.toUpperCase() + '</option>');
                    });
                    $('#Kelurahan_id').html(
                        '<option value="">==Pilih Kelurahan==</option>');
                    console.log(response.data);
                }
            })
        });

        $('#kecamatan_id').on('change', function () {
            $.ajax({
                url: "{{ url('kelurahan') }}",
                method: 'post',
                data: {
                    id: $(this).val(),
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function (response) {
                    $('#kelurahan_id').empty();
                    $('#kelurahan_id').html(
                        '<option value="">==Pilih Desa/Kelurahan==</option>');
                    $.each(response.data, function (key, value) {
                        $("#kelurahan_id").append('<option value="' + value
                            .id + '">' + value.name.toUpperCase() + '</option>');
                    });
                }
            })
        });
    });

</script>
<script>
    // View image file before upload
    const wrapper = document.querySelector(".wrapper");
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
    @endpush
