-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2017 at 10:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `kd_bsw` char(3) NOT NULL,
  `nama_bsw` varchar(99) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `isTampil` tinyint(1) NOT NULL,
  `Keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`kd_bsw`, `nama_bsw`, `tgl_buka`, `tgl_tutup`, `kuota`, `isTampil`, `Keterangan`) VALUES
('A01', 'Beasiswa Anak Karyawan', '2017-04-07', '2017-04-09', 125, 1, 'Beasiswa bagi anak karyawan'),
('B01', 'Beasiswa Prestasi', '2017-04-07', '2017-04-09', 200, 1, 'Beasiswa bagi mahasiswa berprestasi, hanya dipilih 3 mahasiswa dengan IPK tertinggi'),
('B08', 'bb', '2017-04-06', '2017-04-08', 9, 0, 'n'),
('K01', 'Beasiswa Kebutuhan', '2016-11-15', '2016-11-22', 150, 1, 'Bagi mahasiswa yang membutuhkan'),
('P01', 'Pinjaman Registrasi', '2017-04-07', '2017-04-09', 125, 1, 'pinjamaann bagi mhs');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(8) NOT NULL,
  `kd_prodi` char(2) NOT NULL,
  `nama_mhs` varchar(99) NOT NULL,
  `gender` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(99) NOT NULL,
  `alamat` varchar(999) NOT NULL,
  `kode_pos` char(5) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `total_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kd_daftar` char(8) NOT NULL,
  `nim` char(8) NOT NULL,
  `kd_bsw` char(3) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `semester` char(9) NOT NULL,
  `thn_ajaran` char(6) NOT NULL,
  `nominal_pengajuan` int(11) NOT NULL,
  `nominal_disetujui` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kd_bayar` int(11) NOT NULL,
  `kd_daftar` char(8) NOT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nominal_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_gender`
--

CREATE TABLE `ref_gender` (
  `gender` char(1) NOT NULL,
  `nama_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_prodi`
--

CREATE TABLE `ref_prodi` (
  `kd_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_syarat`
--

CREATE TABLE `ref_syarat` (
  `kd_syarat` char(3) NOT NULL,
  `nama_syarat` varchar(99) NOT NULL,
  `tipe_syarat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_syarat`
--

INSERT INTO `ref_syarat` (`kd_syarat`, `nama_syarat`, `tipe_syarat`) VALUES
('K01', 'Scan KTM', '1'),
('K02', 'IPK', '2'),
('S03', 'nominal pengajuan', '3'),
('S04', 'Surat keterangan tidak mampu', '1'),
('S05', 'Surat tagihan listrik terakhir', '1'),
('S06', 'Jumlah SKS yang diambil', '3'),
('S07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_bsw`
--

CREATE TABLE `syarat_bsw` (
  `kd_syarat_bsw` int(11) NOT NULL,
  `kd_syarat` char(3) NOT NULL,
  `kd_bsw` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat_bsw`
--

INSERT INTO `syarat_bsw` (`kd_syarat_bsw`, `kd_syarat`, `kd_bsw`) VALUES
(1, 'K01', 'B08'),
(2, 'K02', 'A01'),
(3, 'S05', 'A01'),
(4, 'S04', 'A01'),
(5, 'S03', 'A01'),
(6, 'K01', 'B01'),
(7, 'K02', 'B01');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_daftar`
--

CREATE TABLE `syarat_daftar` (
  `kd_syarat_dftr` int(11) NOT NULL,
  `kd_daftar` char(8) NOT NULL,
  `kd_syarat_bsw` int(11) NOT NULL,
  `isi_syarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_usr`
--

CREATE TABLE `system_usr` (
  `user_id` char(8) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_usr`
--

INSERT INTO `system_usr` (`user_id`, `password`, `role`) VALUES
('72140033', 'halohalo', 0),
('admin', 'admin', 1),
('user', 'user', 0),
('wd', 'wd', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`kd_bsw`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `kd_prodi` (`kd_prodi`),
  ADD KEY `gender` (`gender`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`kd_daftar`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_bsw` (`kd_bsw`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kd_bayar`),
  ADD KEY `pengembalian_ibfk_1` (`kd_daftar`);

--
-- Indexes for table `ref_gender`
--
ALTER TABLE `ref_gender`
  ADD PRIMARY KEY (`gender`);

--
-- Indexes for table `ref_prodi`
--
ALTER TABLE `ref_prodi`
  ADD PRIMARY KEY (`kd_prodi`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indexes for table `ref_syarat`
--
ALTER TABLE `ref_syarat`
  ADD PRIMARY KEY (`kd_syarat`);

--
-- Indexes for table `syarat_bsw`
--
ALTER TABLE `syarat_bsw`
  ADD PRIMARY KEY (`kd_syarat_bsw`),
  ADD KEY `kd_syarat` (`kd_syarat`),
  ADD KEY `kd_bsw` (`kd_bsw`);

--
-- Indexes for table `syarat_daftar`
--
ALTER TABLE `syarat_daftar`
  ADD PRIMARY KEY (`kd_syarat_dftr`),
  ADD KEY `kd_daftar` (`kd_daftar`),
  ADD KEY `syarat_daftar_ibfk_2` (`kd_syarat_bsw`);

--
-- Indexes for table `system_usr`
--
ALTER TABLE `system_usr`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `kd_bayar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `syarat_bsw`
--
ALTER TABLE `syarat_bsw`
  MODIFY `kd_syarat_bsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `syarat_daftar`
--
ALTER TABLE `syarat_daftar`
  MODIFY `kd_syarat_dftr` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `ref_prodi` (`kd_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`gender`) REFERENCES `ref_gender` (`gender`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`kd_bsw`) REFERENCES `beasiswa` (`kd_bsw`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`kd_daftar`) REFERENCES `pendaftaran` (`kd_daftar`);

--
-- Constraints for table `syarat_bsw`
--
ALTER TABLE `syarat_bsw`
  ADD CONSTRAINT `syarat_bsw_ibfk_1` FOREIGN KEY (`kd_syarat`) REFERENCES `ref_syarat` (`kd_syarat`),
  ADD CONSTRAINT `syarat_bsw_ibfk_2` FOREIGN KEY (`kd_bsw`) REFERENCES `beasiswa` (`kd_bsw`);

--
-- Constraints for table `syarat_daftar`
--
ALTER TABLE `syarat_daftar`
  ADD CONSTRAINT `syarat_daftar_ibfk_1` FOREIGN KEY (`kd_daftar`) REFERENCES `pendaftaran` (`kd_daftar`),
  ADD CONSTRAINT `syarat_daftar_ibfk_2` FOREIGN KEY (`kd_syarat_bsw`) REFERENCES `syarat_bsw` (`kd_syarat_bsw`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
