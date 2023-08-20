-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2023 at 08:15 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb-lara9`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gelombangs`
--

CREATE TABLE `gelombangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jalur_pendaftarans`
--

CREATE TABLE `jalur_pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_09_065942_create_gelombangs_table', 2),
(6, '2023_05_11_033159_create_jalur_pendaftarans_table', 2),
(7, '2023_05_11_034559_create_mahasiswas_table', 2),
(9, '2023_07_18_064337_add_id_dokumen_column_to_tb_mahasiswa_table', 4),
(10, '2023_07_18_065132_create_tb_dokumenmahasiswa_table', 5),
(11, '2023_07_22_061300_add_id_admin_column_to_tb_mahasiswadokumen_table', 6),
(12, '2023_07_24_034839_add_dokumen_wajib_column_to_tb_dokumenmahasiswa_table', 7),
(13, '2023_07_25_023457_create_tb_transaksi_table', 8),
(14, '2023_08_01_071101_add_validation_column_to_tb_dokumenmahasiswa_table', 9),
(15, '2023_08_02_005149_add_admin_validasi_column_to_tb_dokumenmahasiswa_table', 10),
(16, '2023_08_02_045014_add_validation_column_to_tb_mahasiswa_table', 11),
(17, '2023_08_09_084527_add_timestamps_column_to_tb_mahasiswa_table', 12),
(18, '2023_08_11_092530_create_verify_users_table', 13),
(19, '2023_08_20_174235_add_status_dokumen_final_column_to_tb_dokumenmahasiswa_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mjumain11@gmail.com', '$2y$10$pzYbRUn4.xDgLF8mQM5ZP.GE26ajqfUZTmAS55cVcF.b6vDrLPuda', '2023-05-15 02:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id`, `name`, `status`) VALUES
(1, 'ISLAM', 'Y'),
(2, 'PROTESTAN', 'Y'),
(3, 'KATHOLIK', 'Y'),
(4, 'HINDU', 'Y'),
(5, 'BUDHA', 'Y'),
(6, 'KHONG HU CU', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumenmahasiswa`
--

CREATE TABLE `tb_dokumenmahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` bigint(20) DEFAULT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `d_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_upload_ktp` timestamp NULL DEFAULT NULL,
  `tgl_validasi_ktp` timestamp NULL DEFAULT NULL,
  `ktp_status` enum('Y','N','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `d_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_upload_kk` timestamp NULL DEFAULT NULL,
  `tgl_validasi_kk` timestamp NULL DEFAULT NULL,
  `kk_status` enum('Y','N','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `dokumen_wajib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_upload_dokumen_wajib` timestamp NULL DEFAULT NULL,
  `tgl_validasi_dokumen_wajib` timestamp NULL DEFAULT NULL,
  `dokumen_wajib_status` enum('Y','N','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_upload_dokumen_pendukung` timestamp NULL DEFAULT NULL,
  `tgl_validasi_dokumen_pendukung` timestamp NULL DEFAULT NULL,
  `dokumen_pendukung_status` enum('Y','N','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `status_dokumen_final` enum('diterima','belum_diterima') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_diterima',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `email_validasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_validasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dokumenmahasiswa`
--

INSERT INTO `tb_dokumenmahasiswa` (`id`, `id_mahasiswa`, `nik`, `d_ktp`, `tgl_upload_ktp`, `tgl_validasi_ktp`, `ktp_status`, `d_kk`, `tgl_upload_kk`, `tgl_validasi_kk`, `kk_status`, `dokumen_wajib`, `tgl_upload_dokumen_wajib`, `tgl_validasi_dokumen_wajib`, `dokumen_wajib_status`, `dokumen_pendukung`, `tgl_upload_dokumen_pendukung`, `tgl_validasi_dokumen_pendukung`, `dokumen_pendukung_status`, `status_dokumen_final`, `keterangan`, `email_validasi`, `admin_validasi`, `created_at`, `updated_at`) VALUES
(18, 1, 1504031501930003, '2023-60201-02-0001-KTP-Yogi Prabowo.jpg', NULL, '2023-08-04 03:49:31', 'Ditolak', '2023-60201-02-0001-KK-Yogi Prabowo.jpg', NULL, '2023-08-01 20:59:08', 'Ditolak', '2023-60201-02-0001-dokumen_wajib-Yogi Prabowo.pdf', NULL, '2023-08-03 23:38:55', 'Ditolak', '2023-60201-02-0001-dokumen_pendukung-Yogi Prabowo.pdf', NULL, '2023-08-03 23:38:59', 'Ditolak', 'belum_diterima', 'KTP Belum Jelas', 'mjumain11@gmail.com', 1, NULL, NULL),
(19, 2, 15710701970021, '2023-60201-02-0002-KTP-Rivaldi Idris.jpg', '2023-08-15 02:55:59', NULL, 'N', '2023-60201-02-0002-KK-Rivaldi Idris.jpg', '2023-08-15 02:55:59', NULL, 'N', '2023-60201-02-0002-dokumen_wajib-Rivaldi Idris.pdf', '2023-08-15 02:55:59', NULL, 'N', '2023-60201-02-0002-dokumen_pendukung-Rivaldi Idris.pdf', '2023-08-15 02:55:59', NULL, 'N', 'belum_diterima', NULL, NULL, NULL, NULL, NULL),
(20, 4, 1571070801970022, '2023-554251-02-0004-KTP-Aldo Sepriadi.jpeg', '2023-08-19 12:03:30', '2023-08-20 11:58:29', 'Y', '2023-554251-02-0004-KK-Aldo Sepriadi.jpg', '2023-08-19 12:03:30', '2023-08-20 12:04:13', 'Y', '2023-554251-02-0004-dokumen_wajib-Aldo Sepriadi.pdf', '2023-08-19 12:03:30', '2023-08-20 12:08:19', 'Y', '2023-554251-02-0004-dokumen_pendukung-Aldo Sepriadi.pdf', '2023-08-19 12:03:30', '2023-08-20 12:08:27', 'Y', 'diterima', NULL, 'mjumain11@gmail.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gelombang`
--

CREATE TABLE `tb_gelombang` (
  `id_gelombang` int(11) NOT NULL,
  `kode_gelombang` varchar(11) NOT NULL,
  `nama_gelombang` varchar(100) NOT NULL,
  `status_gelombang` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gelombang`
--

INSERT INTO `tb_gelombang` (`id_gelombang`, `kode_gelombang`, `nama_gelombang`, `status_gelombang`) VALUES
(1, '01', 'Gelombang Pertama', 'Y'),
(2, '02', 'Gelombang Kedua', 'N'),
(3, '03', 'Gelombang Ketiga', 'N'),
(4, '04', 'Gelombang Keempat', 'N'),
(5, '05', 'Gelombang Kelima', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info_kuliah`
--

CREATE TABLE `tb_info_kuliah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info_kuliah`
--

INSERT INTO `tb_info_kuliah` (`id`, `nama`) VALUES
(1, 'Website'),
(2, 'Sosial Media'),
(3, 'Keluarga'),
(4, 'Tim Promosi UM Jambi'),
(5, 'Baliho, Spanduk, Billboard'),
(6, 'Dosen UM Jambi'),
(7, 'Karyawan UM Jambi'),
(8, 'Teman Kuliah di UM Jambi'),
(9, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jalur_pendaftaran`
--

CREATE TABLE `tb_jalur_pendaftaran` (
  `id_jalur_pendaftaran` int(11) NOT NULL,
  `nama_jalur_pendaftaran` varchar(255) NOT NULL,
  `status_jalur_pendaftaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jalur_pendaftaran`
--

INSERT INTO `tb_jalur_pendaftaran` (`id_jalur_pendaftaran`, `nama_jalur_pendaftaran`, `status_jalur_pendaftaran`) VALUES
(1, 'Jalur Reguler', ''),
(2, 'Jalur Alur Jenjang', ''),
(3, 'Jalur Pretasi Akademik', ''),
(4, 'Jalur Pretasi Non Akademik', ''),
(5, 'Jalur Kader Persyarikatan Muhammadiyah', ''),
(6, 'Jalur Hafidz Qur\'an', ''),
(7, 'Jalur Beasiswa (KIP-K)', ''),
(8, 'Jalur Transfer', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kelamin`
--

CREATE TABLE `tb_jenis_kelamin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_kelamin`
--

INSERT INTO `tb_jenis_kelamin` (`id`, `name`, `status`) VALUES
(1, 'Laki-Laki', 'Y'),
(2, 'Perempuan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang_sekolah`
--

CREATE TABLE `tb_jenjang_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenjang_sekolah`
--

INSERT INTO `tb_jenjang_sekolah` (`id`, `nama`) VALUES
(1, 'SMA'),
(2, 'SMK'),
(3, 'MA'),
(4, 'D3/D4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id`, `nama`) VALUES
('11.01', 'KAB. ACEH SELATAN'),
('11.02', 'KAB. ACEH TENGGARA'),
('11.03', 'KAB. ACEH TIMUR'),
('11.04', 'KAB. ACEH TENGAH'),
('11.05', 'KAB. ACEH BARAT'),
('11.06', 'KAB. ACEH BESAR'),
('11.07', 'KAB. PIDIE'),
('11.08', 'KAB. ACEH UTARA'),
('11.09', 'KAB. SIMEULUE'),
('11.10', 'KAB. ACEH SINGKIL'),
('11.11', 'KAB. BIREUEN'),
('11.12', 'KAB. ACEH BARAT DAYA'),
('11.13', 'KAB. GAYO LUES'),
('11.14', 'KAB. ACEH JAYA'),
('11.15', 'KAB. NAGAN RAYA'),
('11.16', 'KAB. ACEH TAMIANG'),
('11.17', 'KAB. BENER MERIAH'),
('11.18', 'KAB. PIDIE JAYA'),
('11.71', 'KOTA BANDA ACEH'),
('11.72', 'KOTA SABANG'),
('11.73', 'KOTA LHOKSEUMAWE'),
('11.74', 'KOTA LANGSA'),
('11.75', 'KOTA SUBULUSSALAM'),
('12.01', 'KAB. TAPANULI TENGAH'),
('12.02', 'KAB. TAPANULI UTARA'),
('12.03', 'KAB. TAPANULI SELATAN'),
('12.04', 'KAB. NIAS'),
('12.05', 'KAB. LANGKAT'),
('12.06', 'KAB. KARO'),
('12.07', 'KAB. DELI SERDANG'),
('12.08', 'KAB. SIMALUNGUN'),
('12.09', 'KAB. ASAHAN'),
('12.10', 'KAB. LABUHANBATU'),
('12.11', 'KAB. DAIRI'),
('12.12', 'KAB. TOBA'),
('12.13', 'KAB. MANDAILING NATAL'),
('12.14', 'KAB. NIAS SELATAN'),
('12.15', 'KAB. PAKPAK BHARAT'),
('12.16', 'KAB. HUMBANG HASUNDUTAN'),
('12.17', 'KAB. SAMOSIR'),
('12.18', 'KAB. SERDANG BEDAGAI'),
('12.19', 'KAB. BATU BARA'),
('12.20', 'KAB. PADANG LAWAS UTARA'),
('12.21', 'KAB. PADANG LAWAS'),
('12.22', 'KAB. LABUHANBATU SELATAN'),
('12.23', 'KAB. LABUHANBATU UTARA'),
('12.24', 'KAB. NIAS UTARA'),
('12.25', 'KAB. NIAS BARAT'),
('12.71', 'KOTA MEDAN'),
('12.72', 'KOTA PEMATANGSIANTAR'),
('12.73', 'KOTA SIBOLGA'),
('12.74', 'KOTA TANJUNG BALAI'),
('12.75', 'KOTA BINJAI'),
('12.76', 'KOTA TEBING TINGGI'),
('12.77', 'KOTA PADANGSIDIMPUAN'),
('12.78', 'KOTA GUNUNGSITOLI'),
('13.01', 'KAB. PESISIR SELATAN'),
('13.02', 'KAB. SOLOK'),
('13.03', 'KAB. SIJUNJUNG'),
('13.04', 'KAB. TANAH DATAR'),
('13.05', 'KAB. PADANG PARIAMAN'),
('13.06', 'KAB. AGAM'),
('13.07', 'KAB. LIMA PULUH KOTA'),
('13.08', 'KAB. PASAMAN'),
('13.09', 'KAB. KEPULAUAN MENTAWAI'),
('13.10', 'KAB. DHARMASRAYA'),
('13.11', 'KAB. SOLOK SELATAN'),
('13.12', 'KAB. PASAMAN BARAT'),
('13.71', 'KOTA PADANG'),
('13.72', 'KOTA SOLOK'),
('13.73', 'KOTA SAWAHLUNTO'),
('13.74', 'KOTA PADANG PANJANG'),
('13.75', 'KOTA BUKITTINGGI'),
('13.76', 'KOTA PAYAKUMBUH'),
('13.77', 'KOTA PARIAMAN'),
('14.01', 'KAB. KAMPAR'),
('14.02', 'KAB. INDRAGIRI HULU'),
('14.03', 'KAB. BENGKALIS'),
('14.04', 'KAB. INDRAGIRI HILIR'),
('14.05', 'KAB. PELALAWAN'),
('14.06', 'KAB. ROKAN HULU'),
('14.07', 'KAB. ROKAN HILIR'),
('14.08', 'KAB. SIAK'),
('14.09', 'KAB. KUANTAN SINGINGI'),
('14.10', 'KAB. KEPULAUAN MERANTI'),
('14.71', 'KOTA PEKANBARU'),
('14.72', 'KOTA DUMAI'),
('15.01', 'KAB. KERINCI'),
('15.02', 'KAB. MERANGIN'),
('15.03', 'KAB. SAROLANGUN'),
('15.04', 'KAB. BATANGHARI'),
('15.05', 'KAB. MUARO JAMBI'),
('15.06', 'KAB. TANJUNG JABUNG BARAT'),
('15.07', 'KAB. TANJUNG JABUNG TIMUR'),
('15.08', 'KAB. BUNGO'),
('15.09', 'KAB. TEBO'),
('15.71', 'KOTA JAMBI'),
('15.72', 'KOTA SUNGAI PENUH'),
('16.01', 'KAB. OGAN KOMERING ULU'),
('16.02', 'KAB. OGAN KOMERING ILIR'),
('16.03', 'KAB. MUARA ENIM'),
('16.04', 'KAB. LAHAT'),
('16.05', 'KAB. MUSI RAWAS'),
('16.06', 'KAB. MUSI BANYUASIN'),
('16.07', 'KAB. BANYUASIN'),
('16.08', 'KAB. OGAN KOMERING ULU TIMUR'),
('16.09', 'KAB. OGAN KOMERING ULU SELATAN'),
('16.10', 'KAB. OGAN ILIR'),
('16.11', 'KAB. EMPAT LAWANG'),
('16.12', 'KAB. PENUKAL ABAB LEMATANG ILIR'),
('16.13', 'KAB. MUSI RAWAS UTARA'),
('16.71', 'KOTA PALEMBANG'),
('16.72', 'KOTA PAGAR ALAM'),
('16.73', 'KOTA LUBUK LINGGAU'),
('16.74', 'KOTA PRABUMULIH'),
('17.01', 'KAB. BENGKULU SELATAN'),
('17.02', 'KAB. REJANG LEBONG'),
('17.03', 'KAB. BENGKULU UTARA'),
('17.04', 'KAB. KAUR'),
('17.05', 'KAB. SELUMA'),
('17.06', 'KAB. MUKO MUKO'),
('17.07', 'KAB. LEBONG'),
('17.08', 'KAB. KEPAHIANG'),
('17.09', 'KAB. BENGKULU TENGAH'),
('17.71', 'KOTA BENGKULU'),
('18.01', 'KAB. LAMPUNG SELATAN'),
('18.02', 'KAB. LAMPUNG TENGAH'),
('18.03', 'KAB. LAMPUNG UTARA'),
('18.04', 'KAB. LAMPUNG BARAT'),
('18.05', 'KAB. TULANG BAWANG'),
('18.06', 'KAB. TANGGAMUS'),
('18.07', 'KAB. LAMPUNG TIMUR'),
('18.08', 'KAB. WAY KANAN'),
('18.09', 'KAB. PESAWARAN'),
('18.10', 'KAB. PRINGSEWU'),
('18.11', 'KAB. MESUJI'),
('18.12', 'KAB. TULANG BAWANG BARAT'),
('18.13', 'KAB. PESISIR BARAT'),
('18.71', 'KOTA BANDAR LAMPUNG'),
('18.72', 'KOTA METRO'),
('19.01', 'KAB. BANGKA'),
('19.02', 'KAB. BELITUNG'),
('19.03', 'KAB. BANGKA SELATAN'),
('19.04', 'KAB. BANGKA TENGAH'),
('19.05', 'KAB. BANGKA BARAT'),
('19.06', 'KAB. BELITUNG TIMUR'),
('19.71', 'KOTA PANGKAL PINANG'),
('21.01', 'KAB. BINTAN'),
('21.02', 'KAB. KARIMUN'),
('21.03', 'KAB. NATUNA'),
('21.04', 'KAB. LINGGA'),
('21.05', 'KAB. KEPULAUAN ANAMBAS'),
('21.71', 'KOTA BATAM'),
('21.72', 'KOTA TANJUNG PINANG'),
('31.01', 'KAB. ADM. KEP. SERIBU'),
('31.71', 'KOTA ADM. JAKARTA PUSAT'),
('31.72', 'KOTA ADM. JAKARTA UTARA'),
('31.73', 'KOTA ADM. JAKARTA BARAT'),
('31.74', 'KOTA ADM. JAKARTA SELATAN'),
('31.75', 'KOTA ADM. JAKARTA TIMUR'),
('32.01', 'KAB. BOGOR'),
('32.02', 'KAB. SUKABUMI'),
('32.03', 'KAB. CIANJUR'),
('32.04', 'KAB. BANDUNG'),
('32.05', 'KAB. GARUT'),
('32.06', 'KAB. TASIKMALAYA'),
('32.07', 'KAB. CIAMIS'),
('32.08', 'KAB. KUNINGAN'),
('32.09', 'KAB. CIREBON'),
('32.10', 'KAB. MAJALENGKA'),
('32.11', 'KAB. SUMEDANG'),
('32.12', 'KAB. INDRAMAYU'),
('32.13', 'KAB. SUBANG'),
('32.14', 'KAB. PURWAKARTA'),
('32.15', 'KAB. KARAWANG'),
('32.16', 'KAB. BEKASI'),
('32.17', 'KAB. BANDUNG BARAT'),
('32.18', 'KAB. PANGANDARAN'),
('32.71', 'KOTA BOGOR'),
('32.72', 'KOTA SUKABUMI'),
('32.73', 'KOTA BANDUNG'),
('32.74', 'KOTA CIREBON'),
('32.75', 'KOTA BEKASI'),
('32.76', 'KOTA DEPOK'),
('32.77', 'KOTA CIMAHI'),
('32.78', 'KOTA TASIKMALAYA'),
('32.79', 'KOTA BANJAR'),
('33.01', 'KAB. CILACAP'),
('33.02', 'KAB. BANYUMAS'),
('33.03', 'KAB. PURBALINGGA'),
('33.04', 'KAB. BANJARNEGARA'),
('33.05', 'KAB. KEBUMEN'),
('33.06', 'KAB. PURWOREJO'),
('33.07', 'KAB. WONOSOBO'),
('33.08', 'KAB. MAGELANG'),
('33.09', 'KAB. BOYOLALI'),
('33.10', 'KAB. KLATEN'),
('33.11', 'KAB. SUKOHARJO'),
('33.12', 'KAB. WONOGIRI'),
('33.13', 'KAB. KARANGANYAR'),
('33.14', 'KAB. SRAGEN'),
('33.15', 'KAB. GROBOGAN'),
('33.16', 'KAB. BLORA'),
('33.17', 'KAB. REMBANG'),
('33.18', 'KAB. PATI'),
('33.19', 'KAB. KUDUS'),
('33.20', 'KAB. JEPARA'),
('33.21', 'KAB. DEMAK'),
('33.22', 'KAB. SEMARANG'),
('33.23', 'KAB. TEMANGGUNG'),
('33.24', 'KAB. KENDAL'),
('33.25', 'KAB. BATANG'),
('33.26', 'KAB. PEKALONGAN'),
('33.27', 'KAB. PEMALANG'),
('33.28', 'KAB. TEGAL'),
('33.29', 'KAB. BREBES'),
('33.71', 'KOTA MAGELANG'),
('33.72', 'KOTA SURAKARTA'),
('33.73', 'KOTA SALATIGA'),
('33.74', 'KOTA SEMARANG'),
('33.75', 'KOTA PEKALONGAN'),
('33.76', 'KOTA TEGAL'),
('34.01', 'KAB. KULON PROGO'),
('34.02', 'KAB. BANTUL'),
('34.03', 'KAB. GUNUNGKIDUL'),
('34.04', 'KAB. SLEMAN'),
('34.71', 'KOTA YOGYAKARTA'),
('35.01', 'KAB. PACITAN'),
('35.02', 'KAB. PONOROGO'),
('35.03', 'KAB. TRENGGALEK'),
('35.04', 'KAB. TULUNGAGUNG'),
('35.05', 'KAB. BLITAR'),
('35.06', 'KAB. KEDIRI'),
('35.07', 'KAB. MALANG'),
('35.08', 'KAB. LUMAJANG'),
('35.09', 'KAB. JEMBER'),
('35.10', 'KAB. BANYUWANGI'),
('35.11', 'KAB. BONDOWOSO'),
('35.12', 'KAB. SITUBONDO'),
('35.13', 'KAB. PROBOLINGGO'),
('35.14', 'KAB. PASURUAN'),
('35.15', 'KAB. SIDOARJO'),
('35.16', 'KAB. MOJOKERTO'),
('35.17', 'KAB. JOMBANG'),
('35.18', 'KAB. NGANJUK'),
('35.19', 'KAB. MADIUN'),
('35.20', 'KAB. MAGETAN'),
('35.21', 'KAB. NGAWI'),
('35.22', 'KAB. BOJONEGORO'),
('35.23', 'KAB. TUBAN'),
('35.24', 'KAB. LAMONGAN'),
('35.25', 'KAB. GRESIK'),
('35.26', 'KAB. BANGKALAN'),
('35.27', 'KAB. SAMPANG'),
('35.28', 'KAB. PAMEKASAN'),
('35.29', 'KAB. SUMENEP'),
('35.71', 'KOTA KEDIRI'),
('35.72', 'KOTA BLITAR'),
('35.73', 'KOTA MALANG'),
('35.74', 'KOTA PROBOLINGGO'),
('35.75', 'KOTA PASURUAN'),
('35.76', 'KOTA MOJOKERTO'),
('35.77', 'KOTA MADIUN'),
('35.78', 'KOTA SURABAYA'),
('35.79', 'KOTA BATU'),
('36.01', 'KAB. PANDEGLANG'),
('36.02', 'KAB. LEBAK'),
('36.03', 'KAB. TANGERANG'),
('36.04', 'KAB. SERANG'),
('36.71', 'KOTA TANGERANG'),
('36.72', 'KOTA CILEGON'),
('36.73', 'KOTA SERANG'),
('36.74', 'KOTA TANGERANG SELATAN'),
('51.01', 'KAB. JEMBRANA'),
('51.02', 'KAB. TABANAN'),
('51.03', 'KAB. BADUNG'),
('51.04', 'KAB. GIANYAR'),
('51.05', 'KAB. KLUNGKUNG'),
('51.06', 'KAB. BANGLI'),
('51.07', 'KAB. KARANGASEM'),
('51.08', 'KAB. BULELENG'),
('51.71', 'KOTA DENPASAR'),
('52.01', 'KAB. LOMBOK BARAT'),
('52.02', 'KAB. LOMBOK TENGAH'),
('52.03', 'KAB. LOMBOK TIMUR'),
('52.04', 'KAB. SUMBAWA'),
('52.05', 'KAB. DOMPU'),
('52.06', 'KAB. BIMA'),
('52.07', 'KAB. SUMBAWA BARAT'),
('52.08', 'KAB. LOMBOK UTARA'),
('52.71', 'KOTA MATARAM'),
('52.72', 'KOTA BIMA'),
('53.01', 'KAB. KUPANG'),
('53.02', 'KAB TIMOR TENGAH SELATAN'),
('53.03', 'KAB. TIMOR TENGAH UTARA'),
('53.04', 'KAB. BELU'),
('53.05', 'KAB. ALOR'),
('53.06', 'KAB. FLORES TIMUR'),
('53.07', 'KAB. SIKKA'),
('53.08', 'KAB. ENDE'),
('53.09', 'KAB. NGADA'),
('53.10', 'KAB. MANGGARAI'),
('53.11', 'KAB. SUMBA TIMUR'),
('53.12', 'KAB. SUMBA BARAT'),
('53.13', 'KAB. LEMBATA'),
('53.14', 'KAB. ROTE NDAO'),
('53.15', 'KAB. MANGGARAI BARAT'),
('53.16', 'KAB. NAGEKEO'),
('53.17', 'KAB. SUMBA TENGAH'),
('53.18', 'KAB. SUMBA BARAT DAYA'),
('53.19', 'KAB. MANGGARAI TIMUR'),
('53.20', 'KAB. SABU RAIJUA'),
('53.21', 'KAB. MALAKA'),
('53.71', 'KOTA KUPANG'),
('61.01', 'KAB. SAMBAS'),
('61.02', 'KAB. MEMPAWAH'),
('61.03', 'KAB. SANGGAU'),
('61.04', 'KAB. KETAPANG'),
('61.05', 'KAB. SINTANG'),
('61.06', 'KAB. KAPUAS HULU'),
('61.07', 'KAB. BENGKAYANG'),
('61.08', 'KAB. LANDAK'),
('61.09', 'KAB. SEKADAU'),
('61.10', 'KAB. MELAWI'),
('61.11', 'KAB. KAYONG UTARA'),
('61.12', 'KAB. KUBU RAYA'),
('61.71', 'KOTA PONTIANAK'),
('61.72', 'KOTA SINGKAWANG'),
('62.01', 'KAB. KOTAWARINGIN BARAT'),
('62.02', 'KAB. KOTAWARINGIN TIMUR'),
('62.03', 'KAB. KAPUAS'),
('62.04', 'KAB. BARITO SELATAN'),
('62.05', 'KAB. BARITO UTARA'),
('62.06', 'KAB. KATINGAN'),
('62.07', 'KAB. SERUYAN'),
('62.08', 'KAB. SUKAMARA'),
('62.09', 'KAB. LAMANDAU'),
('62.10', 'KAB. GUNUNG MAS'),
('62.11', 'KAB. PULANG PISAU'),
('62.12', 'KAB. MURUNG RAYA'),
('62.13', 'KAB. BARITO TIMUR'),
('62.71', 'KOTA PALANGKARAYA'),
('63.01', 'KAB. TANAH LAUT'),
('63.02', 'KAB. KOTABARU'),
('63.03', 'KAB. BANJAR'),
('63.04', 'KAB. BARITO KUALA'),
('63.05', 'KAB. TAPIN'),
('63.06', 'KAB. HULU SUNGAI SELATAN'),
('63.07', 'KAB. HULU SUNGAI TENGAH'),
('63.08', 'KAB. HULU SUNGAI UTARA'),
('63.09', 'KAB. TABALONG'),
('63.10', 'KAB. TANAH BUMBU'),
('63.11', 'KAB. BALANGAN'),
('63.71', 'KOTA BANJARMASIN'),
('63.72', 'KOTA BANJARBARU'),
('64.01', 'KAB. PASER'),
('64.02', 'KAB. KUTAI KARTANEGARA'),
('64.03', 'KAB. BERAU'),
('64.07', 'KAB. KUTAI BARAT'),
('64.08', 'KAB. KUTAI TIMUR'),
('64.09', 'KAB. PENAJAM PASER UTARA'),
('64.11', 'KAB. MAHAKAM ULU'),
('64.71', 'KOTA BALIKPAPAN'),
('64.72', 'KOTA SAMARINDA'),
('64.74', 'KOTA BONTANG'),
('65.01', 'KAB. BULUNGAN'),
('65.02', 'KAB. MALINAU'),
('65.03', 'KAB. NUNUKAN'),
('65.04', 'KAB. TANA TIDUNG'),
('65.71', 'KOTA TARAKAN'),
('71.01', 'KAB. BOLAANG MONGONDOW'),
('71.02', 'KAB. MINAHASA'),
('71.03', 'KAB. KEPULAUAN SANGIHE'),
('71.04', 'KAB. KEPULAUAN TALAUD'),
('71.05', 'KAB. MINAHASA SELATAN'),
('71.06', 'KAB. MINAHASA UTARA'),
('71.07', 'KAB. MINAHASA TENGGARA'),
('71.08', 'KAB. BOLAANG MONGONDOW UTARA'),
('71.09', 'KAB. KEP. SIAU TAGULANDANG BIARO'),
('71.10', 'KAB. BOLAANG MONGONDOW TIMUR'),
('71.11', 'KAB. BOLAANG MONGONDOW SELATAN'),
('71.71', 'KOTA MANADO'),
('71.72', 'KOTA BITUNG'),
('71.73', 'KOTA TOMOHON'),
('71.74', 'KOTA KOTAMOBAGU'),
('72.01', 'KAB. BANGGAI'),
('72.02', 'KAB. POSO'),
('72.03', 'KAB. DONGGALA'),
('72.04', 'KAB. TOLI TOLI'),
('72.05', 'KAB. BUOL'),
('72.06', 'KAB. MOROWALI'),
('72.07', 'KAB. BANGGAI KEPULAUAN'),
('72.08', 'KAB. PARIGI MOUTONG'),
('72.09', 'KAB. TOJO UNA UNA'),
('72.10', 'KAB. SIGI'),
('72.11', 'KAB. BANGGAI LAUT'),
('72.12', 'KAB. MOROWALI UTARA'),
('72.71', 'KOTA PALU'),
('73.01', 'KAB. KEPULAUAN SELAYAR'),
('73.02', 'KAB. BULUKUMBA'),
('73.03', 'KAB. BANTAENG'),
('73.04', 'KAB. JENEPONTO'),
('73.05', 'KAB. TAKALAR'),
('73.06', 'KAB. GOWA'),
('73.07', 'KAB. SINJAI'),
('73.08', 'KAB. BONE'),
('73.09', 'KAB. MAROS'),
('73.10', 'KAB. PANGKAJENE KEPULAUAN'),
('73.11', 'KAB. BARRU'),
('73.12', 'KAB. SOPPENG'),
('73.13', 'KAB. WAJO'),
('73.14', 'KAB. SIDENRENG RAPPANG'),
('73.15', 'KAB. PINRANG'),
('73.16', 'KAB. ENREKANG'),
('73.17', 'KAB. LUWU'),
('73.18', 'KAB. TANA TORAJA'),
('73.22', 'KAB. LUWU UTARA'),
('73.24', 'KAB. LUWU TIMUR'),
('73.26', 'KAB. TORAJA UTARA'),
('73.71', 'KOTA MAKASSAR'),
('73.72', 'KOTA PARE PARE'),
('73.73', 'KOTA PALOPO'),
('74.01', 'KAB. KOLAKA'),
('74.02', 'KAB. KONAWE'),
('74.03', 'KAB. MUNA'),
('74.04', 'KAB. BUTON'),
('74.05', 'KAB. KONAWE SELATAN'),
('74.06', 'KAB. BOMBANA'),
('74.07', 'KAB. WAKATOBI'),
('74.08', 'KAB. KOLAKA UTARA'),
('74.09', 'KAB. KONAWE UTARA'),
('74.10', 'KAB. BUTON UTARA'),
('74.11', 'KAB. KOLAKA TIMUR'),
('74.12', 'KAB. KONAWE KEPULAUAN'),
('74.13', 'KAB. MUNA BARAT'),
('74.14', 'KAB. BUTON TENGAH'),
('74.15', 'KAB. BUTON SELATAN'),
('74.71', 'KOTA KENDARI'),
('74.72', 'KOTA BAU BAU'),
('75.01', 'KAB. GORONTALO'),
('75.02', 'KAB. BOALEMO'),
('75.03', 'KAB. BONE BOLANGO'),
('75.04', 'KAB. PAHUWATO'),
('75.05', 'KAB. GORONTALO UTARA'),
('75.71', 'KOTA GORONTALO'),
('76.01', 'KAB. PASANGKAYU'),
('76.02', 'KAB. MAMUJU'),
('76.03', 'KAB. MAMASA'),
('76.04', 'KAB. POLEWALI MANDAR'),
('76.05', 'KAB. MAJENE'),
('76.06', 'KAB. MAMUJU TENGAH'),
('81.01', 'KAB. MALUKU TENGAH'),
('81.02', 'KAB. MALUKU TENGGARA'),
('81.03', 'KAB. KEPULAUAN TANIMBAR'),
('81.04', 'KAB. BURU'),
('81.05', 'KAB. SERAM BAGIAN TIMUR'),
('81.06', 'KAB. SERAM BAGIAN BARAT'),
('81.07', 'KAB. KEPULAUAN ARU'),
('81.08', 'KAB. MALUKU BARAT DAYA'),
('81.09', 'KAB. BURU SELATAN'),
('81.71', 'KOTA AMBON'),
('81.72', 'KOTA TUAL'),
('82.01', 'KAB. HALMAHERA BARAT'),
('82.02', 'KAB. HALMAHERA TENGAH'),
('82.03', 'KAB. HALMAHERA UTARA'),
('82.04', 'KAB. HALMAHERA SELATAN'),
('82.05', 'KAB. KEPULAUAN SULA'),
('82.06', 'KAB. HALMAHERA TIMUR'),
('82.07', 'KAB. PULAU MOROTAI'),
('82.08', 'KAB. PULAU TALIABU'),
('82.71', 'KOTA TERNATE'),
('82.72', 'KOTA TIDORE KEPULAUAN'),
('91.01', 'KAB. MERAUKE'),
('91.02', 'KAB. JAYAWIJAYA'),
('91.03', 'KAB. JAYAPURA'),
('91.04', 'KAB. NABIRE'),
('91.05', 'KAB. KEPULAUAN YAPEN'),
('91.06', 'KAB. BIAK NUMFOR'),
('91.07', 'KAB. PUNCAK JAYA'),
('91.08', 'KAB. PANIAI'),
('91.09', 'KAB. MIMIKA'),
('91.10', 'KAB. SARMI'),
('91.11', 'KAB. KEEROM'),
('91.12', 'KAB. PEGUNUNGAN BINTANG'),
('91.13', 'KAB. YAHUKIMO'),
('91.14', 'KAB. TOLIKARA'),
('91.15', 'KAB. WAROPEN'),
('91.16', 'KAB. BOVEN DIGOEL'),
('91.17', 'KAB. MAPPI'),
('91.18', 'KAB. ASMAT'),
('91.19', 'KAB. SUPIORI'),
('91.20', 'KAB. MAMBERAMO RAYA'),
('91.21', 'KAB. MAMBERAMO TENGAH'),
('91.22', 'KAB. YALIMO'),
('91.23', 'KAB. LANNY JAYA'),
('91.24', 'KAB. NDUGA'),
('91.25', 'KAB. PUNCAK'),
('91.26', 'KAB. DOGIYAI'),
('91.27', 'KAB. INTAN JAYA'),
('91.28', 'KAB. DEIYAI'),
('91.71', 'KOTA JAYAPURA'),
('92.01', 'KAB. SORONG'),
('92.02', 'KAB. MANOKWARI'),
('92.03', 'KAB. FAK FAK'),
('92.04', 'KAB. SORONG SELATAN'),
('92.05', 'KAB. RAJA AMPAT'),
('92.06', 'KAB. TELUK BINTUNI'),
('92.07', 'KAB. TELUK WONDAMA'),
('92.08', 'KAB. KAIMANA'),
('92.09', 'KAB. TAMBRAUW'),
('92.10', 'KAB. MAYBRAT'),
('92.11', 'KAB. MANOKWARI SELATAN'),
('92.12', 'KAB. PEGUNUNGAN ARFAK'),
('92.71', 'KOTA SORONG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(255) NOT NULL,
  `id_jalur_pendaftaran` varchar(5) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_mahasiswa` varchar(250) DEFAULT NULL,
  `nik` longtext,
  `nisn` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `id_kelurahan` varchar(25) DEFAULT NULL,
  `id_kecamatan` varchar(25) DEFAULT NULL,
  `id_kabupaten` varchar(25) DEFAULT NULL,
  `id_provinsi` varchar(25) DEFAULT NULL,
  `id_program_kuliah` varchar(10) DEFAULT NULL,
  `prodi1` varchar(10) DEFAULT NULL,
  `prodi2` varchar(10) DEFAULT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `id_asal_sekolah` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `alamat_sekolah` varchar(255) DEFAULT NULL,
  `jurusan_sekolah` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(5) DEFAULT NULL,
  `nama_ayah` varchar(250) DEFAULT NULL,
  `nama_ibu` varchar(250) DEFAULT NULL,
  `alamat_orangtua` varchar(255) DEFAULT NULL,
  `informasi_kuliah` varchar(250) DEFAULT NULL,
  `id_dokumen` bigint(20) DEFAULT NULL,
  `tgl_validasi` timestamp NULL DEFAULT NULL,
  `status_validasi` enum('Y','N') NOT NULL DEFAULT 'N',
  `keterangan` varchar(255) DEFAULT NULL,
  `gelombang` int(11) NOT NULL,
  `admin_validasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `no_registrasi`, `id_jalur_pendaftaran`, `gambar`, `nama_mahasiswa`, `nik`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `hp`, `email`, `jalan`, `rt`, `id_kelurahan`, `id_kecamatan`, `id_kabupaten`, `id_provinsi`, `id_program_kuliah`, `prodi1`, `prodi2`, `nama_instansi`, `jabatan`, `id_asal_sekolah`, `nama_sekolah`, `alamat_sekolah`, `jurusan_sekolah`, `tahun_lulus`, `nama_ayah`, `nama_ibu`, `alamat_orangtua`, `informasi_kuliah`, `id_dokumen`, `tgl_validasi`, `status_validasi`, `keterangan`, `gelombang`, `admin_validasi`, `created_at`, `updated_at`) VALUES
(3, '2023-60201-02-0003', '1', 'kYuts9zywpO5kD7HXciz3xouwi7xoJ3yktzm9wKK.jpg', 'Yogi Prabowo', '1571070801970004', '157890', 'Jambi', '2023-08-11', '1', '1', '089602768743', 'sudiarto@gmail.com', 'Walisongo', '03/01', '15.02.13.2002', '15.02.13', '15.02', '15', '2', '60201', '61201', 'Mahasiswa', 'Pelajar', '1', 'SMA Negeri 11 Kota Jambi', 'Walisongo', 'IPA', '2019', 'Dekrial', 'Ponisah', 'Walisongo', '2', NULL, '2023-08-18 01:09:30', 'Y', 'Sudah Tervalidasi', 1, 1, NULL, '2023-08-18 01:09:30'),
(4, '2023-554251-02-0004', '4', 'DqfcwlSQrunfKtFoaNYUPtJ6tX8bfJntX3ddUNvk.jpg', 'Aldo Sepriadi', '1571070801970022', '157899', 'Jambi', '1997-01-08', '1', '1', '089602768743', 'sukiantoro11@gmail.com', 'Walisongo', '03/01', '15.71.01.1002', '15.71.01', '15.71', '15', '2', '554251', '60201', 'Perkuliahan', 'Pelajar', '1', 'SMA Negeri 10 Kota Jambi', 'Walisongo', 'IPA', '2015', 'Ihsan', 'Liberty', 'Walisongo', '5', NULL, NULL, 'N', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`, `status`) VALUES
(55201, 'S1 - Informatika', 'Y'),
(57201, 'S1 - Sistem Informasi', 'Y'),
(60201, 'S1 - Ekonomi Pembangunan', 'Y'),
(61201, 'S1 - Manajemen', 'Y'),
(554251, 'S1 - Kehutanan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program_kuliah`
--

CREATE TABLE `tb_program_kuliah` (
  `id_program_kuliah` int(11) NOT NULL,
  `nama_program_kuliah` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_program_kuliah`
--

INSERT INTO `tb_program_kuliah` (`id_program_kuliah`, `nama_program_kuliah`, `status`) VALUES
(1, 'Reguler Pagi', 'Y'),
(2, 'Reguler Malam', 'Y'),
(3, 'Reguler Pekerja', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah_pembayaran` bigint(20) DEFAULT NULL,
  `terbilang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_kuliah` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `tanggal_upload` timestamp NULL DEFAULT NULL,
  `tanggal_validasi` timestamp NULL DEFAULT NULL,
  `status_validasi` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_validasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `jumlah_pembayaran`, `terbilang`, `berkas`, `id_program_kuliah`, `id_prodi`, `tanggal_upload`, `tanggal_validasi`, `status_validasi`, `operator_validasi`, `created_at`, `updated_at`) VALUES
(12, 59, 200000, NULL, '15710701970021-Bukti_Pembayaran-accessrate23@gmail.com.jpg', 2, 61201, '2023-08-18 12:08:16', '2023-08-18 12:21:47', 'Y', '1', NULL, '2023-08-18 12:21:47'),
(13, 62, 200000, NULL, '1571070801970022-Bukti_Pembayaran-sukiantoro11@gmail.com.jpg', 2, 554251, '2023-08-19 10:32:00', NULL, 'N', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Muhammad Jumain', 'mjumain11@gmail.com', '2023-05-08 22:08:53', '$2y$10$aKTH9iyG4sfJK6ssn1uJQ.iR4yRaH.iVZ90cN3PSZ5ma.M4.AqDXO', 'admin', NULL, '2023-05-08 22:08:26', '2023-05-08 22:08:53'),
(5, 1571070801970004, 'Muhammad Jumain', 'mjumain08@gmail.com', '2023-05-26 21:14:22', '$2y$10$aKTH9iyG4sfJK6ssn1uJQ.iR4yRaH.iVZ90cN3PSZ5ma.M4.AqDXO', 'user', NULL, '2023-05-26 21:13:10', '2023-05-26 21:14:22'),
(6, 102025, 'Muhammad Jumain', 'main@main.com', '2023-06-06 04:11:09', '$2y$10$aKTH9iyG4sfJK6ssn1uJQ.iR4yRaH.iVZ90cN3PSZ5ma.M4.AqDXO', 'user', NULL, '2023-06-05 21:10:05', '2023-06-05 21:10:05'),
(7, 1571070801970009, 'Marsudi', 'sudiarto@gmail.com', NULL, '$2y$10$aKTH9iyG4sfJK6ssn1uJQ.iR4yRaH.iVZ90cN3PSZ5ma.M4.AqDXO', 'user', NULL, '2023-07-10 18:40:31', '2023-07-10 18:40:31'),
(59, 15710701970021, 'Rika', 'accessrate23@gmail.com', '2023-08-14 04:44:32', '$2y$10$laR4x5TJ5mOnUO/tR6jJ4.MdDb073d9J9vYYoopxhH1q2V4vJ9xPW', 'user', NULL, '2023-08-11 22:56:31', '2023-08-14 04:44:32'),
(62, 1571070801970022, 'Aldo', 'sukiantoro11@gmail.com', '2023-08-16 05:21:31', '$2y$10$VZ4q4tW1P1voTHjIRT6V9.2gxkcOxGDMf7kL/QOQSHtMEmH08lMJq', 'user', NULL, '2023-08-16 05:21:01', '2023-08-16 05:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gelombangs`
--
ALTER TABLE `gelombangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalur_pendaftarans`
--
ALTER TABLE `jalur_pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokumenmahasiswa`
--
ALTER TABLE `tb_dokumenmahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  ADD PRIMARY KEY (`id_gelombang`);

--
-- Indexes for table `tb_info_kuliah`
--
ALTER TABLE `tb_info_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jalur_pendaftaran`
--
ALTER TABLE `tb_jalur_pendaftaran`
  ADD PRIMARY KEY (`id_jalur_pendaftaran`);

--
-- Indexes for table `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenjang_sekolah`
--
ALTER TABLE `tb_jenjang_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_program_kuliah`
--
ALTER TABLE `tb_program_kuliah`
  ADD PRIMARY KEY (`id_program_kuliah`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gelombangs`
--
ALTER TABLE `gelombangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalur_pendaftarans`
--
ALTER TABLE `jalur_pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_dokumenmahasiswa`
--
ALTER TABLE `tb_dokumenmahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  MODIFY `id_gelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_info_kuliah`
--
ALTER TABLE `tb_info_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jalur_pendaftaran`
--
ALTER TABLE `tb_jalur_pendaftaran`
  MODIFY `id_jalur_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenjang_sekolah`
--
ALTER TABLE `tb_jenjang_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554252;

--
-- AUTO_INCREMENT for table `tb_program_kuliah`
--
ALTER TABLE `tb_program_kuliah`
  MODIFY `id_program_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
