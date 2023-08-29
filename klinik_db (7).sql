-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 01:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataobat`
--

CREATE TABLE `dataobat` (
  `id_obat` int(1) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `penyimpanan` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `min_stock` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datapasien`
--

CREATE TABLE `datapasien` (
  `id_pasien` int(11) NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `jenis_pasien` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datapasien`
--

INSERT INTO `datapasien` (`id_pasien`, `kode_pasien`, `jenis_pasien`, `nama_lengkap`, `jenis_kelamin`, `umur`, `tgl_lahir`, `no_hp`, `alamat`) VALUES
(7, 'L.A0001', '', 'Adnan ', 'laki-laki', 10, '2013-04-23', 0, 'perum graha bakti persada'),
(8, 'P.A0001', '', 'ASTRI LESTARI', 'perempuan', 20, '2003-03-23', 0, 'cirata'),
(9, 'L.A0002', '', 'AWAL', 'laki-laki', 24, '1998-11-01', 0, 'PERUM GRAHA PANORAMA'),
(10, 'L.A0003', '', 'ALPONSO', 'laki-laki', 22, '2000-08-02', 0, 'PERUM GRAHA PANORAMA'),
(11, 'L.A0004', '', 'AGUS SYAHRUDIN', 'laki-laki', 31, '1991-12-09', 0, 'KP PASIR ASTANA 01/02'),
(12, 'L.A0005', 'BPJS', 'ABDUL ROJAK', 'laki-laki', 72, '1951-01-06', 0, 'BOJONG PICUNG BOJONG PETIR 1/3 '),
(13, 'L.A0006', '', 'ATEP MUHIDIN', 'laki-laki', 25, '1998-02-02', 0, 'Panojer'),
(14, 'P.A0002', '', 'AYU SITI ROBIAH', 'perempuan', 22, '2001-02-17', 0, 'pasir nangka'),
(15, 'P.A0003', '', 'AYRA', 'perempuan', 5, '2017-12-19', 0, 'cikijing'),
(16, 'P.A0004', '', 'AYU NINGTYAS', 'perempuan', 25, '1998-02-19', 0, 'ciranjang'),
(17, 'P.A0005', '', 'AYA', 'perempuan', 31, '1992-05-27', 0, 'selajambe'),
(18, 'P.A0006', '', 'AJENG NABILA', 'perempuan', 24, '1999-04-17', 0, 'cihaur 2 03/05 '),
(63, 'P.A0007', 'BPJS', 'ATIKAH', 'perempuan', 45, '1978-06-28', 0, 'JANGARI'),
(64, 'P.A0008', '', 'APE', 'perempuan', 74, '1949-09-28', 0, 'pasir peuti'),
(65, 'P.A0009', 'bpjs', 'ARTI YUNIA LESMAYANTI', 'perempuan', 45, '1978-03-06', 0, 'KP SUKASARI 01/06'),
(66, 'P.A0010', 'bpjs', 'ANISAH ROJA', 'perempuan', 22, '2000-09-05', 0, 'Kp. Pasir Tulang 1/2 '),
(67, 'P.A0011', '', 'ALIYA SALSABILA', 'perempuan', 53, '1970-01-01', 0, 'DANGDEUR 1/8'),
(68, 'L.A0007', '', 'ASEP IWAN', 'laki-laki', 53, '1970-01-01', 0, 'TUNGTURUNAN'),
(69, 'L.A0008', '', 'AMIN', 'laki-laki', 72, '1950-10-08', 0, 'CICADAS'),
(70, 'L.A0009', '', 'ADI', 'laki-laki', 53, '1970-01-01', 0, 'LEMBUR SAWAH'),
(71, 'L.A0010', '', 'ANDI PARISI', 'laki-laki', 37, '1986-05-25', 0, 'PASIR ASTANA'),
(72, 'L.A0011', 'bpjs', 'ADITYA WIBOWO', 'laki-laki', 37, '1986-06-19', 0, 'SELAJAMBE'),
(73, 'L.A0012', 'bpjs', 'A SAPEI', 'laki-laki', 64, '1958-10-09', 0, 'SELAJAMBE'),
(74, 'L.A0013', '', 'AHMAD M', 'laki-laki', 54, '1969-06-11', 0, 'KP CIJEJER'),
(75, 'L.A0014', '', 'ABI SUHERLAN', 'Selected Jenis Kelamin', 25, '1998-05-06', 0, 'PERUMAHAN PROTANMAS'),
(76, 'L.A0015', '', 'ALVINO RAFFASYA', 'laki-laki', 53, '1970-01-01', 0, 'SUKA HURIP 2/4 '),
(77, 'P.A0012', '', 'AMIRA RINDIANTI', 'perempuan', 4, '2019-03-21', 0, 'CIDAMAR 3/8'),
(78, 'P.A0013', 'bpjs', 'AYU SULASTRI', 'perempuan', 23, '2000-02-19', 0, 'KP CIWARU'),
(79, 'P.A0014', 'bpjs', 'ANISA PUTRI', 'perempuan', 6, '2016-10-20', 0, 'CIODENG'),
(80, 'P.A0015', '', 'AZZURA PUTRI', 'perempuan', 3, '2020-02-24', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_import` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jmlh_baris_import` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id_import`, `nama_file`, `waktu_upload`, `jmlh_baris_import`) VALUES
(2, '5_6305069001923889253.xlsx', '2023-07-21 09:43:00', 5),
(5, '5_6305069001923889253.xlsx', '2023-07-22 15:40:20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `kode_dokter` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_sip` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `kode_dokter`, `nama_dokter`, `no_hp`, `no_sip`) VALUES
(9, 'IIN0012', 'IIN HERYANI', '-', '-'),
(10, 'RIN0013', 'RINI DIASTUTI', '-', '-'),
(11, 'IQB0021', 'IQBAL', '087710113609', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `kode_pasien` varchar(255) NOT NULL,
  `jenis_pasien` varchar(255) NOT NULL,
  `kode_dokter` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `kode_obat` varchar(255) NOT NULL,
  `jmlh_obat` int(11) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `tgl_periksa` date NOT NULL,
  `tot_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `level`) VALUES
(1, 'binamedika', 'Binamedika', 'binamedika@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataobat`
--
ALTER TABLE `dataobat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `idx_kode_obat` (`kode_obat`);

--
-- Indexes for table `datapasien`
--
ALTER TABLE `datapasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `idx_kode_pasien` (`kode_pasien`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_import`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `idx_kode_dokter` (`kode_dokter`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `kode_pasien` (`kode_pasien`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_dokter` (`kode_dokter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataobat`
--
ALTER TABLE `dataobat`
  MODIFY `id_obat` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `datapasien`
--
ALTER TABLE `datapasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id_import` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`kode_pasien`) REFERENCES `datapasien` (`kode_pasien`),
  ADD CONSTRAINT `tb_riwayat_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `dataobat` (`kode_obat`),
  ADD CONSTRAINT `tb_riwayat_ibfk_3` FOREIGN KEY (`kode_dokter`) REFERENCES `tb_dokter` (`kode_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
