<!DOCTYPE html>
{{-- @dd($data->no_registrasi) --}}
<html>

<head>
    <title>{{ $data->no_registrasi }}</title>
    <style type="text/css">
        @page {
            margin-top: 1em;
        }
    </style>
</head>

<body>

    <table border="0"
        style="width:100%; text-align:center; border-spacing: 0px; cellspacing: 0px; border-bottom: 3px solid black;">
        <tr>
            <td><img src="data:image/png;base64, {{ $default['logo_um'] }}" width="70px"></td>
            <td style="font-weight: bold; vertical-align: bottom; "><span style="font-size: 20px">MAJELIS DIKTILITBANG
                    MUHAMMADIYAH</span><br><span style="font-size: 26px">UNIVERSITAS MUHAMMADIYAH JAMBI </span><br>Jl.
                Kapt. Pattimura Simpang IV Sipin, Jambi - Telp. 0741 60825</td>
            {{-- <td><img src="data:image/png;base64, {{ $default['logo_km'] }} width="75px"></td> --}}
            <td><img src="data:image/png;base64, {{ $default['logo_pmb'] }}" width="85px"></td>
        </tr>
    </table>
    <table align="center" style="padding-top: 20px;">
        <tr>
            <td colspan="4" align="center" style="font-size: 20px;"><strong>FORMULIR PENDAFTARAN 2023/2024</strong>
            </td>
        </tr>
    </table>
    <table border="0"
        style="border:2px solid black ;width:100%; text-align:left; border-spacing: 0px; font-size:13px ">
        <tr>
            <td>1.</td>
            <td>NOMOR PENDAFTARAN</td>
            <td>:</td>
            <td><b>{{ $data->no_registrasi }} </b></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>JALUR MASUK</td>
            <td>:</td>
            <td>{{ Str::ucfirst(Str::lower($data->jalurmasuk()->first()->nama_jalur_pendaftaran)) }}</td>
        </tr>
        <tr>
            <td style="border-top:2px solid black" colspan="4"><strong>DATA PRIBADI</strong></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data->nik }} </td>
        </tr>
        <tr>
            <td>4.</td>
            <td>NAMA LENGKAP (SESUAI IJAZAH)</td>
            <td>:</td>
            <td>{{ $data->nama_mahasiswa }} </td>
        </tr>
        <tr>
            <td>5.</td>
            <td>TEMPAT, TANGGAL LAHIR</td>
            <td>:</td>
            <td>{{ $data->tempat_lahir }} </td>
        </tr>
        <tr>
            <td>6.</td>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td>{{ $data->jenis_kelamin == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>AGAMA</td>
            <td>:</td>
            <td>{{ Str::ucfirst(Str::lower($data->agama()->first()->name)) }}</td>
        </tr>
        <tr style="vertical-align: top;">
            <td valign='top'>8.</td>
            <td valign='top'>ALAMAT</td>
            <td valign='top'>:</td>
            <td>{{ $data->jalan ? 'Jalan ' . $data->jalan : '' }}
                {{ $data->rt ? 'RT/RW ' . $data->rt : '' }}
                {{ $default['kel'] ? 'Kelurahan ' . $default['kel'] : '' }}
                {{ $default['kec'] ? 'Kecamatan ' . $default['kec'] : '' }}
                <br>
                {{ $default['kab'] ? Str::title((Str::lower($default['kab'])))  : '' }}
                {{ $default['prov'] ? ', ' . Str::title(Str::lower($default['prov']))  : '' }}</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>NOMOR WHATSAPP</td>
            <td>:</td>
            <td>{{ $data->hp }} </td>
        </tr>
        <tr>
            <td>10.</td>
            <td>EMAIL AKTIF</td>
            <td>:</td>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <td style="border-top:2px solid black" colspan="4"><strong>DATA PEKERJAAN <span>( Kosongkan Jika Belum
                        Bekerja )</strong></span></td>
        </tr>
        <tr>
            <td>11.</td>
            <td>NAMA INSTANSI</td>
            <td>:</td>
            <td>{{ $data->nama_instansi }} </td>
        </tr>
        <tr>
            <td>12.</td>
            <td>JABATAN</td>
            <td>:</td>
            <td>{{ $data->jabatan }} </td>
        </tr>
        <tr>
            <td style="border-top:2px solid black" colspan="4"><strong>DATA ORANG TUA</strong></td>
        </tr>
        <tr>
            <td>13.</td>
            <td>NAMA AYAH/WALI</td>
            <td>:</td>
            <td>{{ $data->nama_ayah }} </td>
        </tr>
        <tr>
            <td>14.</td>
            <td>NAMA IBU/WALI</td>
            <td>:</td>
            <td>{{ $data->nama_ibu }} </td>
        </tr>
        <tr>
            <td>15.</td>
            <td>ALAMAT ORANGTUA/WALI</td>
            <td>:</td>
            <td>{{ $data->alamat_orangtua }} </td>
        </tr>
        <tr>
            <td style="border-top:2px solid black" colspan="4"><strong>DATA ASAL SEKOLAH</strong></td>
        </tr>
        <tr>
            <td>17.</td>
            <td>JENJANG PENDIDIKAN</td>
            <td>:</td>
            <td><span
                    style="border: 1px solid black; border-radius:2px ; padding: 0px 5px 0px 5px; margin-right: 15px">{{ $data->id_asal_sekolah }}</span>
                1. SMA 2. SMK 3. MA 4. DI 5. DIII 6. Transfer </td>
        </tr>
        <tr>
            <td>18.</td>
            <td>NAMA SEKOLAH</td>
            <td>:</td>
            <td>{{ $data->nama_sekolah }} </td>
        </tr>
        <tr>
            <td valign='top'>19.</td>
            <td valign='top'>ALAMAT SEKOLAH/PT</td>
            <td valign='top'>:</td>
            <td>{{ $data->alamat_sekolah }} </td>
        </tr>
        <tr>
            <td>20.</td>
            <td>JURUSAN</td>
            <td>:</td>
            <td>{{ $data->jurusan_sekolah }} </td>
        </tr>
        <tr>
            <td>21.</td>
            <td>TAHUN LULUS</td>
            <td>:</td>
            <td>{{ $data->tahun_lulus }} </td>
        </tr>
        <tr>
            <td style="border-top:2px solid black" colspan="4"><strong>DATA PERKULIAHAN</strong></td>
        </tr>
        <tr>
            <td>22.</td>
            <td colspan="3">PILIHAN PROGRAM STUDI</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                <table
                    style="width:100%; border-spacing: 0px; border-top: 2px solid black; border-left: 2px solid black; border-right: 2px solid black;">
                    <tr style="font-weight: bold;">
                        <td style="border-bottom: 2px solid black;">(01)</td>
                        <td style="border-bottom: 2px solid black;">FAKULTAS EKONOMI DAN BISNIS</td>
                        <td style="border-bottom: 2px solid black; border-left: 2px solid black;">(02)</td>
                        <td style="border-bottom: 2px solid black;">FAKULTAS SAINS DAN TEKNOLOGI</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->prodi1==60201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>62201 - EKONOMI PEMBANGUNAN (EP)</td>
                        <td>
                            <?php if ($data->prodi1==54251): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>54251 - KEHUTANAN (KHUT)</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->prodi1==61201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>61201 - MANAJEMEN (MNJ)</td>
                        <td>
                            <?php if ($data->prodi1==55201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>55201 - INFORMATIKA (IF)</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <?php if ($data->prodi1==57201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>57201 - SISTEM INFORMASI (SI)</td>
                    </tr>
                </table>
                <table style="width:100%; border: 1px solid black; text-align: left ;">
                    <tr>
                        <td style="width:287px">PRODI PILIHAN KEDUA</td>
                        <td style="width: 18px;">
                            <?php if ($data->prodi2==60201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td style="padding-right: 10px; width: 10px;">EP</td>
                        <td style="width: 18px;">
                            <?php if ($data->prodi2==54251): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td style="padding-right: 10px; width: 10px;">KHUT</td>
                        <td style="width: 18px;">
                            <?php if ($data->prodi2==61201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px" height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td style="padding-right: 10px; width: 10px;">MNJ</td>
                        <td style="width: 18px;">
                            <?php if ($data->prodi2==55201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td style="padding-right: 10px; width: 10px;">IF</td>
                        <td style="width: 18px;">
                            <?php if ($data->prodi2==57201): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td style="width: 30px">SI</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>23.</td>
            <td>WAKTU PERKULIAHAN</td>
            <td>:</td>
            <td>
                <?php if ($data->id_program_kuliah==1): ?>
                <img style="position: absolute; float: left; padding-right: 5px;"
                    src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px">
                <?php else: ?>
                <img style="position: absolute; float: left; padding-right: 5px;"
                    src="data:image/png;base64, {{ $default['kotak'] }}" width="15px">
                <?php endif ?>
                <span style="float:left; padding-right: 10px;">REGULER PAGI </span>

                <?php if ($data->id_program_kuliah==2 || $data->id_program_kuliah==3): ?>
                <img style="position: absolute; float: left; padding-right: 5px;"
                    src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px">
                <?php else: ?>
                <img style="position: absolute; float: left; padding-right: 5px;"
                    src="data:image/png;base64, {{ $default['kotak'] }}" width="15px">
                <?php endif ?>

                <?php if ($data->id_program_kuliah==3): ?>
                <span style="float:left;">REGULER PEKERJA </span>
                <?php else: ?>
                <span style="float:left;">REGULER MALAM </span>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td style="border-top:2px solid black;">24.</td>
            <td style="border-top:2px solid black;" colspan="3">DARI MANA ANDA MENDAPATKAN INFORMASI UM JAMBI ?
                <span><strong><i>*Ceklis Pilihan Anda</i></strong></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                <table style="width:100%;">
                    <tr>
                        <td style="width:18px">
                            <?php if ($data->informasi_kuliah==1): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Website</td>
                        <td style="width:18px">
                            <?php if ($data->informasi_kuliah==6): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Dosen UM Jambi : _____________</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->informasi_kuliah==2): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Sosial Media : _____________</td>
                        <td>
                            <?php if ($data->informasi_kuliah==7): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Tendik UM Jambi : _____________</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->informasi_kuliah==3): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Keluarga</td>
                        <td>
                            <?php if ($data->informasi_kuliah==8): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Teman Kuliah : _____________</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->informasi_kuliah==4): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>TIM Promosi UM JAMBI</td>
                        <td>
                            <?php if ($data->informasi_kuliah==9): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Lainnya : _____________</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($data->informasi_kuliah==5): ?>
                            <img src="data:image/png;base64, {{ $default['ceklis'] }}" width="15px"
                                height="15px">
                            <?php else: ?>
                            <img src="data:image/png;base64, {{ $default['kotak'] }}" width="15px" height="15px">
                            <?php endif ?>
                        </td>
                        <td>Baliho, Spanduk, Billboard</td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4"
                style="border-top:2px solid black; padding-right: 15px; text-align: right; font-size: 16px">Jambi,
                {{ $default['tanggal_formulir'] }}</td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="0" style="width: 100%; text-align: center; font-weight: bold;">
                    <tr>
                        <td>PANITIAN PENDAFTARAN</td>
                        <td rowspan="3" align="center" style="width:150px"; height="150px"></td>
                        <td>CALON MAHASISWA/I</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Terdaftar Secara Online</td>
                        <td>{{ $data->nama_mahasiswa }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border-top:2px solid black; text-align: left;">
                <strong>*Lengkapi Persyaratan Berikut Lalu Kumpulkan di Sekretarian PMB UM Jambi </strong><br>1.
                Fotocopy Ijazah/SKHU/SKL Legalisir 2 Lembar <br>2. Pas Foto Studi Warna Terbaru 2x3 dan 3x4
                Masing-masing 1 Lembar <br> 3. Fotocopy KTP dan Kartu Keluarga Masing-masing 1 Lembar
            </td>
        </tr>
    </table>
</body>

</html>
