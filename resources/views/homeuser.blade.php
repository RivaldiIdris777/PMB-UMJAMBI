@extends('layouts.app')
@section('content')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome {{ Auth::user()->name }} !!</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="container py-2">
            <h2 class="font-weight-light text-center text-primary py-3">Tata Cara Pendaftaran</h2>
            <!-- timeline item 1 -->
            <div class="row">
                <!-- timeline item 1 left dot -->
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-primary">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <!-- timeline item 1 event content -->
                <div class="col py-2">
                    <div class="card radius-15">
                        <div class="card-body">
                            <h4 class="card-title">Masuk Ke Menu "Konfirmasi Pembayaran"</h4>
                            <p class="card-text">* Masukkan data dan bukti transaksi pembayaran pendaftaran.</p>
                            <p class="card-text">* Tunggu sampai di verifikasi dari pihak administrasi atau dapat
                                langsung meminta verifikasi dari front office kampus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
            <!-- timeline item 2 -->
            <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-primary">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card border-primary shadow radius-15">
                        <div class="card-body">
                            <h4 class="card-title">Lengkapi Biodata di Menu "Lengkapi Pendaftaran"</h4>
                            <p class="card-text">* Masukkan biodata untuk calon mahasiswa baru.</p>
                            <p class="card-text">* Tunggu sampai di verifikasi dari pihak administrasi atau dapat
                                langsung meminta verifikasi dari front office kampus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
            <!-- timeline item 3 -->
            <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-primary">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card radius-15">
                        <div class="card-body">
                            <h4 class="card-title">Upload Berkas di menu "Lengkapi Pendaftaran -> Upload Berkas" </h4>
                            <p class="card-text">* Upload Gambar dan File untuk kelengkapan pendaftaran, diantaranya KTP
                                & KK, IJAZAH / Surat Keterangan Lulus , SKHU / NILAI UN, Phas Foto 4x6.</p>
                            <p class="card-text">* Upload KTP & KK Format Gambar JPG, JPEG, PNG .</p>
                            <p class="card-text">* Upload IJAZAH / Surat Keterangan Lulus , SKHU / NILAI UN, Phas Foto
                                4x6 Format Gabung Menjadi Satu File Format PDF .</p>
                            <p class="card-text">* Tunggu sampai di verifikasi dari pihak administrasi atau dapat
                                langsung meminta verifikasi dari front office kampus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
            <!-- timeline item 4 -->
            <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-primary">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card radius-15">
                        <div class="card-body">
                            <h4 class="card-title">Di menu "Lengkapi Pendaftaran" Pilih Menu "Cetak Formulir Pendaftaran"</h4>
                            <p>* Setelah melakukan segala pendaftaran dan telah di verifikasi, Silahkan lakukan cetak formulir pendaftaran pada halaman Lengkapi Pendaftaran di tombol Cetak Formulir Pendaftaran Paling Bawah.</p>
                            <p class="card-text">* Serahkan bukti cetak formulir ke pihak Front Office Kampus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
    </div>
</div>
@endsection
