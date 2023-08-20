<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\JalurPendaftaranController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DokumenMahasiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\ResetPController;
use App\Http\Controllers\ExcelController;
use Doctrine\DBAL\FetchMode;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Array_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);

Route::post('/register2', [App\Http\Controllers\Auth\RegisterController::class, 'register2'])->name('register2');
Route::get('/user/verifyemail/{email}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyEmail'])->name('user.verify');

Route::get('/resetPage', [App\Http\Controllers\Auth\ResetPController::class, 'resetPage']);
Route::post('/reset', [App\Http\Controllers\Auth\ResetPController::class, 'resetChange'])->name('reset.send');
Route::get('/reset/{email}', [App\Http\Controllers\Auth\ResetPController::class, 'resetChange']);
Route::get('/resetpassword/{email}', [App\Http\Controllers\Auth\ResetPController::class, 'resetPasswordPage']);
Route::put('/password/{email}', [App\Http\Controllers\Auth\ResetPController::class, 'changePassword'])->name('changePassword');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/kabupaten', [App\Http\Controllers\WilayahController::class, 'kabupaten']);
    Route::post('/kecamatan', [App\Http\Controllers\WilayahController::class, 'kecamatan']);
    Route::post('/kelurahan', [App\Http\Controllers\WilayahController::class, 'kelurahan']);
});
Route::middleware(['auth', 'verified', 'checkRole:admin'])->group(function () {
    Route::resource('gelombang', GelombangController::class);
    Route::post('/gelombang/aktifkan/{id}', [GelombangController::class, 'aktifkan']);
    Route::resource('agama', AgamaController::class);
    Route::resource('jalur-pendaftaran', JalurPendaftaranController::class);
    // Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::put('mahasiswa/validasimahasiswa/{id}', [MahasiswaController::class, 'validasiMahasiswa'])->name('mahasiswa.validasimahasiswa');
    // Transaksi
    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaski/belum_validasi', [TransaksiController::class, 'belumvalidasi'])->name('transaksi.belumvalidasi');
    Route::put('validasitransaksi/{id}', [TransaksiController::class, 'validateadmin'])->name('transaksi.validasiadmin');
    // Dokumen Mahasiswa
    Route::resource('dokumenmahasiswa', DokumenMahasiswaController::class);
    Route::get('createDokumenMahasiswa/{id}', [DokumenMahasiswaController::class, 'createDokumen'])->name('dokumenmahasiswa.createDokumen');
    Route::get('dokumenpendukung/{id}', [DokumenMahasiswaController::class, 'dokumenPendukung'])->name('dokumenpendukung.view');
    // Dokumen Mahasiswa Validasi
    Route::put('dokumenmahasiswa/validasiktp/{id}', [DokumenMahasiswaController::class, 'validasiKTP'])->name('dokumenmahasiswa.validasiktp');
    Route::put('dokumenmahasiswa/validasikk/{id}', [DokumenMahasiswaController::class, 'validasiKK'])->name('dokumenmahasiswa.validasikk');
    Route::put('dokumenmahasiswa/validasidokumenwajib/{id}', [DokumenMahasiswaController::class, 'validasiDokumenWajib'])->name('dokumenmahasiswa.validasidokumenwajib');
    Route::put('dokumenmahasiswa/validasidokumenpendukung/{id}', [DokumenMahasiswaController::class, 'validasiDokumenPendukung'])->name('dokumenmahasiswa.validasidokumenpendukung');
    Route::put('dokumenmahasiswa/validasiketerangan/{id}', [DokumenMahasiswaController::class, 'updateKeterangan'])->name('dokumenmahasiswa.updateketerangan');
    // Dokumen Mahasiswa Tolak Validasi
    Route::put('dokumenmahasiswa/tolakvalidasiktp/{id}', [DokumenMahasiswaController::class, 'tolakValidasiKtp'])->name('dokumenmahasiswa.tolakvalidasiktp');
    Route::put('dokumenmahasiswa/tolakvalidasikk/{id}', [DokumenMahasiswaController::class, 'tolakValidasiKK'])->name('dokumenmahasiswa.tolakvalidasikk');
    Route::put('dokumenmahasiswa/tolakvalidasiwajib/{id}', [DokumenMahasiswaController::class, 'tolakValidasiWajib'])->name('dokumenmahasiswa.tolakvalidasiwajib');
    Route::put('dokumenmahasiswa/tolakvalidasipendukung/{id}', [DokumenMahasiswaController::class, 'tolakValidasiPendukung'])->name('dokumenmahasiswa.tolakvalidasipendukung');
    Route::put('dokumenmahasiswa/validasikonfirmasiditerima/{id}', [DokumenMahasiswaController::class, 'validasikonfirmasiditerima'])->name('dokumenmahasiswa.validasikonfirmasiditerima');
    Route::put('dokumenmahasiswa/validasikonfirmasibelumditerima/{id}', [DokumenMahasiswaController::class, 'validasikonfirmasibelumditerima'])->name('dokumenmahasiswa.validasikonfirmasibelumditerima');

    // Cetak Formulir Pendaftaran
    Route::get('/mahasiswa/print/{id}', [MahasiswaController::class, 'print']);
    // Export Excel
    Route::get('excel', [ExcelController::class, 'index'])->name('excel.mahasiswa');
    Route::get('export_excel', [ExcelController::class, 'export']);
    Route::get('export_gelombang1', [ExcelController::class, 'export_gelombang1']);
    Route::get('export_gelombang2', [ExcelController::class, 'export_gelombang2']);
    Route::get('export_gelombang3', [ExcelController::class, 'export_gelombang3']);
    Route::get('export_gelombang4', [ExcelController::class, 'export_gelombang4']);
    Route::get('export_gelombang5', [ExcelController::class, 'export_gelombang5']);
    Route::get('export_program_pagi', [ExcelController::class, 'program_pagi']);
    Route::get('export_program_malam', [ExcelController::class, 'program_malam']);
    Route::get('export_program_pekerja', [ExcelController::class, 'program_pekerja']);
    Route::post('filtertanggal', [ExcelController::class, 'filterTanggal']);
    Route::get('export_prodi_informatika', [ExcelController::class, 'prodiInformatika']);
    Route::get('export_prodi_sistem_informasi', [ExcelController::class, 'prodiSistemInformasi']);
    Route::get('export_prodi_ekonomi_pembangunan', [ExcelController::class, 'prodiEkonomiPembangunan']);
    Route::get('export_prodi_manajemen', [ExcelController::class, 'prodiManajemen']);
    Route::get('export_prodi_kehutanan', [ExcelController::class, 'prodiKehutanan']);
});

Route::middleware(['auth', 'verified', 'checkRole:user'])->group(function () {
    Route::resource('biodata', MahasiswaController::class);
    Route::get('showbymahasiswa', [MahasiswaController::class, 'showbymahasiswa'])->name('showbymahasiswa.biodata');
    Route::get('/biodata/print/{id}', [MahasiswaController::class, 'print']);
    Route::get('usermenu', [MenuUserController::class, 'MenuRegistrasi'])->name('usermenu.index');
    // Transaksi
    Route::get('showTransaksi/{id}', [MenuUserController::class, 'showTransaksi'])->name('transaksi.showTransaksi');
    Route::get('viewTransaksi', [MenuUserController::class, 'viewTransaksi'])->name('transaksi.viewTransaksi');
    Route::get('createTransaksiUser', [TransaksiController::class, 'createByUser'])->name('transaksi.createByUser');
    Route::post('storebymahasiswa', [TransaksiController::class, 'storebymahasiswa'])->name('transaksi.storebymahasiswa');
    // Mahasiswa
    Route::get('createMahasiswa', [MenuUserController::class, 'createMahasiswa'])->name('mahasiswa.createMahasiswa');
    Route::post('storeMahasiswa', [MenuUserController::class, 'storeMahasiswa'])->name('mahasiswa.storeMahasiswa');
    Route::get('showmahasiswa/{id}', [MenuUserController::class, 'showMahasiswa'])->name('mahasiswa.showMahasiswa');
    // DokumenMahasiswa
    Route::get('createDokumen', [MenuUserController::class, 'createDokumen'])->name('mahasiswa.createDokumen');
    Route::post('storeDokumen', [MenuUserController::class, 'storeDokumen'])->name('mahasiswa.storeDokumen');
    Route::get('showdokumen/{id}', [MenuUserController::class, 'showDokumen'])->name('dokumenmahasiswa.showdokumen');
    Route::get('editdokumen/{id}', [MenuUserController::class, 'editDokumen'])->name('dokumenmahasiswa.editDokumen');
    Route::put('updatedokumenbyuser/{id}', [MenuUserController::class, 'updateDokumenByUser'])->name('dokumenmahasiswa.updateDokumenByUser');

});
