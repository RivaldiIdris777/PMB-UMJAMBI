@extends('layouts.app')
@push('styles')
<link href="{{ asset('') }}css/style.css" rel="stylesheet">
@endpush
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Pendaftaran</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route($link . '.storeDokumen') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="height:80px;">
                                            <th style="padding-bottom:30px;">(1)</th>
                                            <th style="padding-bottom:30px; text-align:center;">
                                                KTP (Upload Format JPG, JPEG, PNG) <br>
                                            </th>
                                            <th style="padding-bottom:30px; text-align:right;"><input id="d_ktp" onchange="getktpPreview(event)" type="file" name="d_ktp" value="{{ old('d_ktp') }}"></th>
                                            <th style="text-align:right;"><div class="mb-2" id="previewktp"></div></th>
                                        </tr>
                                    </thead>
                                </table>
                                @if ($errors->has('d_ktp'))
                                    <small class="text-danger">
                                        {{ $errors->first('d_ktp') }}
                                    </small>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="height:80px;">
                                            <th style="padding-bottom:30px;">(2)</th>
                                            <th style="padding-bottom:30px; text-align:center;">
                                                KK (Upload Format JPG, JPEG, PNG) <br>
                                            </th>
                                            <th style="padding-bottom:30px; text-align:right;"><input onchange="getkkPreview(event)" id="d_kk" type="file" name="d_kk" value="{{ old('d_kk') }}"></th>
                                            <th style="text-align:right;"><div class="mb-2" id="previewkk"></div></th>
                                        </tr>
                                    </thead>
                                </table>
                                @if ($errors->has('d_kk'))
                                    <small class="text-danger">
                                        {{ $errors->first('d_kk') }}
                                    </small>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="padding-bottom:30px;">(3)</th>
                                            <th style="padding-bottom:30px; text-align:center;">
                                                Dokumen Wajib (KK, Ijazah/SKL, SKHU)
                                            </th>
                                            <th style="padding-bottom:30px; text-align:right;"><input type="file" name="dokumen_wajib" accept="application/pdf" value="{{ old('dokumen_wajib') }}" ></th>
                                        </tr>
                                    </thead>
                                </table>
                                @if ($errors->has('dokumen_wajib'))
                                    <small class="text-danger">
                                        {{ $errors->first('dokumen_wajib') }}
                                    </small>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="padding-bottom:30px;">(3)</th>
                                            <th style="padding-bottom:30px; text-align:center;">
                                                Dokumen Pendukung (Sertifikat, Piagam, Prestasi)
                                            </th>
                                            <th style="padding-bottom:30px; text-align:right;"><input type="file" name="dokumen_pendukung" accept="application/pdf" value="{{ old('dokumen_pendukung') }}"></th>
                                        </tr>
                                    </thead>
                                </table>
                                @if ($errors->has('dokumen_pendukung'))
                                    <small class="text-danger">
                                        {{ $errors->first('dokumen_pendukung') }}
                                    </small>
                                @endif
                            </div>
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            <input class="btn btn-success btn-block" type="submit" value="Simpan Data">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('js')
<script>
    function getktpPreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('previewktp');
        var newimg = document.createElement('img');
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.width = "80";
        imagediv.appendChild(newimg);
    }

    function getkkPreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('previewkk');
        var newimg = document.createElement('img');
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.width = "80";
        imagediv.appendChild(newimg);
    }

</script>
@endpush
@endsection
