@push('css')
<link href="{{ asset('') }}css/style.css" rel="stylesheet">
@endpush
@extends('layouts.app')
@section('content')
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
                    <h6 class="mb-0">Upload Data dan Berkas Mahasiswa</h6>
                    <form action="{{ route($link . '.store', $data->nik) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <div class="mb-2" id="previewktp"></div>
                                        <label>Upload KTP ( Format jpg, jpeg, png ) Maks 5 Mb</label>
                                        <input type="file" id="d_ktp" onchange="getktpPreview(event)"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('d_ktp') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="d_ktp" value="{{ old('d_ktp') }}">
                                        <small>* Phas Foto 4 x 6</small> <br />
                                        @if ($errors->has('d_ktp'))
                                        <div class="text-danger">
                                            {{ $errors->first('d_ktp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <div class="mb-2" id="previewkk"></div>
                                        <label>Upload KK ( Format jpg, jpeg, png ) Maks 5 Mb</label>
                                        <input type="file" onchange="getkkPreview(event)" id="d_kk"
                                            class="form-control {{ count($errors) > 0 ? ($errors->has('d_kk') ? 'is-invalid' : 'is-valid') : '' }}"
                                            name="d_kk" value="{{ old('d_kk') }}">
                                        <small>* Foto Kartu Keluarga</small> <br />
                                        @if ($errors->has('d_kk'))
                                        <div class="text-danger">
                                            {{ $errors->first('d_kk') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-5">
                                <label>Upload Dokumen Wajib PDF Maks 5 Mb</label>
                                <input type="file" id="dokumen_wajib"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('dokumen_wajib') ? 'is-invalid' : 'is-valid') : '' }}"
                                    name="dokumen_wajib" accept="application/pdf" value="{{ old('dokumen_wajib') }}">
                                @if ($errors->has('dokumen_wajib'))
                                <div class="text-danger">
                                    {{ $errors->first('dokumen_wajib') }}
                                </div>
                                @endif
                                <input type="hidden" value="{{ $data->no_registrasi }}" name="no_registrasi">
                                <small>* Dokumen Wajib Terdiri dari ( KTP, Ijazah, KK, SKL, SKHU, Phas Foto )</small>
                                <br />
                                <small>* Jika mahasiswa pindahan terdiri dari Ijazah SMA, SKHU, KK, KTP, Pas Foto, Surat
                                    Pindah Universitas, Scan Salinan yang disahkan PTS/PTN (IPK Min 3,00 untuk PTS dan
                                    2,75 untuk PTN), Scan Akreditasi Prodi Kampus Asal.</small> <br />
                                <small>* Mahasiswa pindahan terdiri dari Ijazah SMA, SKHU, KK, KTP, Pas Foto, Ijazah
                                    D3/S1, Transkrip Nilai</small><br />
                                <small>* Mahasiswa Pascasarjana (S2) terdiri dari Ijazah SMA, Scan SKHU / Nilai UN
                                    /Surat Keterangan Lulus /Daftar Nilai Ijazah, Scan Kartu Keluarga, Scan Kartu Tanda
                                    Penduduk, Scan Pas Foto Warna (Ukuran 4x6), Scan Ijazah S1, Scan Transkip Nilai S1
                                </small>
                            </div>
                            <div class="form-group mt-5">
                                <label>Upload Dokumen Pendukung PDF Maks 5 Mb</label>
                                <input type="file" id="dokumen_pendukung"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('dokumen_pendukung') ? 'is-invalid' : 'is-valid') : '' }}"
                                    name="dokumen_pendukung" accept="application/pdf"
                                    value="{{ old('dokumen_pendukung') }}">
                                <small>* Dokumen Pendukung terdiri dari Sertifkat, Piagam & Prestasi Lainnya</small>
                                @if ($errors->has('dokumen_pendukung'))
                                <div class="text-danger">
                                    {{ $errors->first('dokumen_pendukung') }}
                                </div>
                                @endif
                                <input type="hidden" value="{{ $data->no_registrasi }}" name="no_registrasi">
                            </div>
                            <div class="form-group mt-3">
                                <label for="status_kelengkapan">Status Kelengkapan Dokumen</label>
                                <select name="status_kelengkapan"
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('status_kelengkapan') ? 'is-invalid' : 'is-valid') : '' }}">
                                    <option value="tidak_lengkap">Tidak Lengkap</option>
                                    <option value="lengkap">Lengkap</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="keterangan">Keterangan</label>
                                <textarea
                                    class="form-control {{ count($errors) > 0 ? ($errors->has('keterangan') ? 'is-invalid' : 'is-valid') : '' }}"
                                    name="keterangan" cols="30" rows="5"></textarea>
                                @if ($errors->has('keterangan'))
                                <div class="text-danger">
                                    {{ $errors->first('keterangan') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <input class="btn btn-success btn-block" type="submit" value="Simpan Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script>
        function getktpPreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('previewktp');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "300";
            imagediv.appendChild(newimg);
        }

        function getkkPreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('previewkk');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "300";
            imagediv.appendChild(newimg);
        }

    </script>
    @endpush
