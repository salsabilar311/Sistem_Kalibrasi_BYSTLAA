-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2024 pada 05.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalibrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `no_order` int(11) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `tgl_kalibrasi` date DEFAULT NULL,
  `detail_order` varchar(50) NOT NULL,
  `calibrator` varchar(5) NOT NULL,
  `no_seri` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_sertifikat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`no_order`, `id_merk`, `id_tipe`, `region`, `tgl_kalibrasi`, `detail_order`, `calibrator`, `no_seri`, `tgl_masuk`, `tgl_sertifikat`) VALUES
(0, 4, 19, 'STL D5', '2023-09-26', '0-K1-BYSTLAA-2023', 'K1', NULL, NULL, NULL),
(123, 1, 1, 'STL D8', '2023-09-20', '123-K1-BYSTLAA-2023', 'K1', NULL, NULL, NULL),
(171, 3, 16, 'STL DI', '2023-09-26', '171-K2-BYSTLAA-2023', 'K2', NULL, NULL, NULL),
(27, 2, 2, 'LAA D1', '2023-09-16', '27-K2-BYSTLAA-2023', 'K2', NULL, NULL, NULL),
(98, 2, 2, 'STL D5', '2023-09-22', '98-K1-BYSTLAA-2023', 'K1', NULL, NULL, NULL),
(98, 1, 1, 'STL DIII', '2023-09-21', '98-K2-BYSTLAA-2023', 'K2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalibrator`
--

CREATE TABLE `kalibrator` (
  `calibrator` varchar(5) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kalibrator`
--

INSERT INTO `kalibrator` (`calibrator`, `message`) VALUES
('K1', 'Alat dikalibrasi menggunakan Precision Multi Product Calibrator Transmille 3041A sn L1555H19'),
('K2', 'Alat dikalibrasi menggunakan Precision Multi Product Calibrator Transmille 3041A sn L1649J21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager`
--

CREATE TABLE `manager` (
  `nim_manager` int(11) NOT NULL,
  `nama_manager` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `manager`
--

INSERT INTO `manager` (`nim_manager`, `nama_manager`) VALUES
(42273, 'Syihabudin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Fluke'),
(2, 'Sanwa'),
(3, 'Krisbow'),
(4, 'Kyoritsu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `region` varchar(10) NOT NULL,
  `name_owner` varchar(100) NOT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`region`, `name_owner`, `address_1`, `address_2`) VALUES
('BPSTL', 'Signalling Telecommunication and Electricity Training Center', 'Jl. Laswi No. 23 Bandung', NULL),
('BYSTLAA', 'UPT Balai Yasa Sintel dan LAA', 'Jl. Kiaracondong No. 92A Bandung', NULL),
('LAA D1', 'WORKSHOP LAA DAOP 1 JAKARTA', 'Jl. Bukit Duri Utara No.1 Manggarai Kec. Tebet Jakarta Selatan', 'Gedung Pusdalopka PT KAI (Persero) Daop 2 Jakarta'),
('LAA D6', 'WORKSHOP LAA DAOP 6 YOGYAKARTA', 'Jl. Krasak Timur Dalam No. 22-C Bausasran Kec. Danurejan', 'Kota Yogyakarta, Daerah Istimewa Yogyakarta'),
('STL D1', 'WORKSHOP SINTELIS DAOP 1 JAKARTA', 'Jl. Bukit Duri Utara No.1 Manggarai Kec. Tebet Jakarta Selatan', 'Gedung Pusdalopka PT KAI (Persero) Daop 1 Jakarta'),
('STL D2', 'WORKSHOP SINTELIS DAOP 2 BANDUNG', 'Jl. Stasiun Barat Kebon Jeruk kec. Andir Kota Bandung 40181', 'Gedung Pusdalopka PT KAI (Persero) Lantai 1 Stasiun Bandung'),
('STL D3', 'WORKSHOP SINTELIS DAOP 3 CIREBON', 'Komplek Stasiun Cirebon, Jalan Kramat', 'Pintu Utara Stasiun Cirebon ( Gate 4 ) Kejaksan Cirebon'),
('STL D4', 'WORKSHOP SINTELIS DAOP 4 SEMARANG', 'Jl. Taman Tawang No. 02', 'Kota Semarang 50211'),
('STL D5', 'WORKSHOP SINTELIS DAOP 5 PURWOKERTO', 'Jl. Gober No. 1 Gang Pundak', 'Purwokerto Banyumas 53132 '),
('STL D6', 'WORKSHOP SINTELIS DAOP 6 YOGYAKARTA', 'Jl. Pasar Kembang ', 'Gedong Tengen Yogyakarta 55272'),
('STL D7', 'WORKSHOP SINTELIS DAOP 7 MADIUN', 'Jl. Kompol Sunaryo No. 35 Madiun Lor Manguharjo', 'Kota Madiun Jawa Timur 63123'),
('STL D8', 'WORKSHOP SINTELIS DAOP 8 SURABAYA', NULL, NULL),
('STL D9', 'WORKSHOP SINTELIS DAOP 9 JEMBER', 'Jl. Dahlia no 2, Jember, 68118', NULL),
('STL DI', 'WORKSHOP SINTELIS DIVRE I MEDAN', 'Jl. Prof. H. M. Yamin, S.H, Kelurahan Gang Buntu', 'Kecamatan Medan Timur, Medan.'),
('STL DII', 'RESOR SINTELIS DIVRE II PADANG', NULL, NULL),
('STL DIII', 'WORKSHOP SINTELIS DIVRE III PALEMBANG', 'Jl. Jendral Ahmad Yani No.541 Sebrang Ulu II', 'Palembang Sumsel 30263'),
('STL DIV', 'WORKSHOP SINTELIS DIVRE IV TANJUNGKARANG', 'Jl. Pemuda No.115 Tanjungkarang Bandar Lampung, 35125', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengukuran`
--

CREATE TABLE `pengukuran` (
  `detail_order` varchar(20) DEFAULT NULL,
  `besaran_ukur` varchar(50) DEFAULT NULL,
  `range_` float DEFAULT NULL,
  `s_range` varchar(10) DEFAULT NULL,
  `standar` float DEFAULT NULL,
  `s_standar` varchar(10) DEFAULT NULL,
  `x1` float DEFAULT NULL,
  `x2` float DEFAULT NULL,
  `x3` float DEFAULT NULL,
  `x4` float DEFAULT NULL,
  `x5` float DEFAULT NULL,
  `x6` float DEFAULT NULL,
  `rata_rata` float DEFAULT NULL,
  `s_rata_rata` varchar(10) DEFAULT NULL,
  `koreksi_standar` float DEFAULT NULL,
  `s_koreksi_standar` varchar(10) DEFAULT NULL,
  `std_dev` float DEFAULT NULL,
  `s_std_dev` varchar(10) DEFAULT NULL,
  `rata_rata_koreksi` float DEFAULT NULL,
  `s_rata_rata_koreksi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengukuran`
--

INSERT INTO `pengukuran` (`detail_order`, `besaran_ukur`, `range_`, `s_range`, `standar`, `s_standar`, `x1`, `x2`, `x3`, `x4`, `x5`, `x6`, `rata_rata`, `s_rata_rata`, `koreksi_standar`, `s_koreksi_standar`, `std_dev`, `s_std_dev`, `rata_rata_koreksi`, `s_rata_rata_koreksi`) VALUES
('0-K1-BYSTLAA-2023', 'Tegangan DC', 600, 'mV', 100, 'mV', 100, 100, 100, 100, 100, 100, 100, 'mV', -0.0005, 'mV', 0, 'mV', 99.9995, 'mV'),
('0-K1-BYSTLAA-2023', 'Tegangan DC', 600, 'mV', 0.3, 'V', 300, 300, 300, 300, 300, 300, 300, 'mV', 0.0000012, 'mV', 0, 'mV', 0.300001, 'mV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_merk_avo`
--

CREATE TABLE `relasi_merk_avo` (
  `id_relasi_merk` int(11) NOT NULL,
  `fluke` varchar(5) NOT NULL,
  `sanwa` varchar(10) DEFAULT NULL,
  `krisbow` varchar(10) DEFAULT NULL,
  `kyoritsu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `relasi_merk_avo`
--

INSERT INTO `relasi_merk_avo` (`id_relasi_merk`, `fluke`, `sanwa`, `krisbow`, `kyoritsu`) VALUES
(1, '101', 'CD800A', 'KW206-272', '1011'),
(2, '117', 'CD771', NULL, '1009'),
(3, '175', NULL, NULL, 'KEW SNAP 2055'),
(4, '179', NULL, NULL, 'KEW 2007R'),
(5, '289', NULL, NULL, 'KEW SNAP 2003A'),
(6, '317', NULL, NULL, NULL),
(7, '319', NULL, NULL, NULL),
(8, '323', NULL, NULL, NULL),
(9, '17B+', NULL, NULL, NULL),
(10, '87V', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_region`
--

CREATE TABLE `relasi_region` (
  `id_relasi_region` int(11) NOT NULL,
  `stl_d1` varchar(20) NOT NULL,
  `laa_d1` varchar(20) DEFAULT NULL,
  `stl_d2` varchar(20) DEFAULT NULL,
  `stl_d3` varchar(20) DEFAULT NULL,
  `stl_d4` varchar(20) DEFAULT NULL,
  `stl_d5` varchar(20) DEFAULT NULL,
  `stl_d6` varchar(20) DEFAULT NULL,
  `laa_d6` varchar(20) DEFAULT NULL,
  `stl_d7` varchar(20) DEFAULT NULL,
  `stl_d8` varchar(20) DEFAULT NULL,
  `stl_d9` varchar(20) DEFAULT NULL,
  `stl_dI` varchar(20) DEFAULT NULL,
  `stl_dII` varchar(20) DEFAULT NULL,
  `stl_dIII` varchar(20) DEFAULT NULL,
  `stl_dIV` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `relasi_region`
--

INSERT INTO `relasi_region` (`id_relasi_region`, `stl_d1`, `laa_d1`, `stl_d2`, `stl_d3`, `stl_d4`, `stl_d5`, `stl_d6`, `laa_d6`, `stl_d7`, `stl_d8`, `stl_d9`, `stl_dI`, `stl_dII`, `stl_dIII`, `stl_dIV`) VALUES
(1, '1.1 MER', '1.1 RK', '2.1 PWK', '3.1 PAB', '4.1 TG', '5.1 PPK', '6.1 WT', '6.1 YK', '7.1 PA', '8.1 BJ', '9.1 PB', 'I.1 SBT', 'II.1 PD', 'III.1 KPT', 'IV.1 TNK'),
(2, '1.2 SG', '1.2 PRP', '2.2 RH', '3.2 PGB', '4.2 PK', '5.2 KRR', '6.2 RWL', '6.2 KT', '7.2 MN', '8.2 BBT', '9.2 KK', 'I.2 BLW', NULL, 'III.2 SDN', 'IV.2 RJS'),
(3, '1.3 RK', '1.3 SRP', '2.3 CJ', '3.3 TIS', '4.3 BTG', '5.3 PWT', '6.3 YK', '6.3 SLO', '7.3 NJ', '8.3 LMG', '9.3 JR', 'I.3 MDN', NULL, 'III.3 PBM', 'IV.3 KB'),
(4, '1.4 TGS', '1.4 THB', '2.4 CMI', '3.4 JTB', '4.4 WLR', '5.4 SDR', '6.4 BBN', 'WS', '7.4 KTS', '8.4 KDA', '9.4 KLT', 'I.4 LBP', NULL, 'III.4 NRU', 'IV.4 NRR'),
(5, '1.5 SRP', '1.5 DU', '2.5 BD', '3.5 CN', '4.5 KLN', '5.5 KWG', '6.5 KT', NULL, '7.5 JG', '8.5 SBI', '9.5 KBR', 'I.5 TBI', NULL, 'III.5 GNM', 'IV.5 MP'),
(6, '1.6 THB', '1.6 JAKK', '2.6 KAC', '3.6 TGN', '4.6 SMT', '5.6 MA', '6.6 PWS', NULL, '7.6 KD', '8.6 SGU', '9.6 BW', 'I.6 BDT', NULL, 'III.6 ME', 'IV.6 BTA'),
(7, '1.7 TNG', '1.7 PSE', '2.7 NG', '3.7 CLD', '4.8 BBG', '5.7 KYA', '6.7 SLO', NULL, '7.7 TA', '8.7 WO', 'WS', 'I.7 PRA', NULL, 'III.7 LT', 'IV.7 PNW'),
(8, '1.8 DU', '1.8 MRI', '2.8 CB', '3.8 KGG', '4.9 GBN', '5.8 GB', '6.8 SUM', NULL, '7.8 BL', '8.8 MR', NULL, 'I.8 KIS', NULL, 'III.8 LLG', 'IV.8 PGG'),
(9, '1.9 MRI', '1.9 JNG', '2.9 TSM', 'WS', '4.10 KNN', '5.9 KM', '6.9 KMR', NULL, 'WR', '8.9 SDA', NULL, 'I.9 PUR', NULL, 'WS', 'WS'),
(10, '1.10 JAKK', '1.10 CKR', '2.10 BJR', NULL, '4.11 CU', '5.10 KTA', '6.10 SR', NULL, NULL, '8.10 BG', NULL, 'I.10 RAP', NULL, NULL, NULL),
(11, '1.11 TPK', '1.11 PSM', 'WS', NULL, 'WS', 'WS', 'WS', NULL, NULL, '8.11 ML', NULL, 'I.11 ANB', NULL, NULL, NULL),
(12, '1.12 PSE', '1.12 DP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.12 KPN', NULL, 'WS', NULL, NULL, NULL),
(13, '1.13 JNG', '1.13 BOO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WS', NULL, NULL, NULL, NULL, NULL),
(14, '1.14 BKS', '1.14 NMO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '1.15 CKR', '1.15 BSH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '1.16 KW', 'WS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '1.17 CKP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'WS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialist`
--

CREATE TABLE `spesialist` (
  `nip_spesialist` int(11) NOT NULL,
  `nama_spesialist` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spesialist`
--

INSERT INTO `spesialist` (`nip_spesialist`, `nama_spesialist`) VALUES
(61558, 'Ahmad Kadafi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(100) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `nama_tipe`, `id_merk`) VALUES
(1, '87V', 1),
(2, '106', 1),
(3, 'CD800A', 2),
(4, 'CD772', 2),
(5, '117', 1),
(6, '175', 1),
(7, '177', 1),
(8, '179', 1),
(9, '289', 1),
(10, '317', 1),
(11, '319', 1),
(12, '323', 1),
(13, '324', 1),
(14, '325', 1),
(15, 'CD771', 2),
(16, 'KW06-270', 3),
(17, 'Kew Snap 2033', 4),
(18, 'Kew Snap 2055', 4),
(19, '1009', 4),
(20, '1011', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_order`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `detail_ibfk_4` (`region`),
  ADD KEY `detail_ibfk_5` (`calibrator`);

--
-- Indeks untuk tabel `kalibrator`
--
ALTER TABLE `kalibrator`
  ADD PRIMARY KEY (`calibrator`);

--
-- Indeks untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`nim_manager`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`region`);

--
-- Indeks untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD KEY `pengukuran_ibfk_1` (`detail_order`);

--
-- Indeks untuk tabel `relasi_merk_avo`
--
ALTER TABLE `relasi_merk_avo`
  ADD PRIMARY KEY (`id_relasi_merk`);

--
-- Indeks untuk tabel `relasi_region`
--
ALTER TABLE `relasi_region`
  ADD PRIMARY KEY (`id_relasi_region`);

--
-- Indeks untuk tabel `spesialist`
--
ALTER TABLE `spesialist`
  ADD PRIMARY KEY (`nip_spesialist`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `id_merk` (`id_merk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `relasi_merk_avo`
--
ALTER TABLE `relasi_merk_avo`
  MODIFY `id_relasi_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `relasi_region`
--
ALTER TABLE `relasi_region`
  MODIFY `id_relasi_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id_tipe`),
  ADD CONSTRAINT `detail_ibfk_4` FOREIGN KEY (`region`) REFERENCES `pemilik` (`region`),
  ADD CONSTRAINT `detail_ibfk_5` FOREIGN KEY (`calibrator`) REFERENCES `kalibrator` (`calibrator`);

--
-- Ketidakleluasaan untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD CONSTRAINT `pengukuran_ibfk_1` FOREIGN KEY (`detail_order`) REFERENCES `detail` (`detail_order`);

--
-- Ketidakleluasaan untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD CONSTRAINT `id_merk` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
