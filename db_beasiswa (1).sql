-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 08:03 AM
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
  `semt` char(6) NOT NULL,
  `thn_ajar` char(9) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `isTampil` tinyint(1) NOT NULL,
  `Keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`kd_bsw`, `nama_bsw`, `semt`, `thn_ajar`, `tgl_buka`, `tgl_tutup`, `kuota`, `isTampil`, `Keterangan`) VALUES
('A01', 'Beasiswa Anak Karyawan', 'Genap', '2016/2017', '2017-04-07', '2018-04-09', 125, 1, 'Beasiswa bagi anak karyawan'),
('A02', 'Beasiswa Anak Karyawan', 'Ganjil', '2016/2017', '2017-04-07', '2017-04-10', 111, 0, 'mmmm'),
('B01', 'Beasiswa Prestasi', 'Genap', '2016/2017', '2017-04-07', '2017-04-09', 200, 1, 'Beasiswa bagi mahasiswa berprestasi, hanya dipilih 3 mahasiswa dengan IPK tertinggi'),
('B08', 'Beasiswa Prestasi', 'Ganjil', '2016/2017', '2017-04-06', '2017-04-08', 9, 0, 'nanana'),
('K01', 'Beasiswa Kebutuhan', 'Genap', '2016/2017', '2016-11-15', '2016-11-22', 150, 1, 'Bagi mahasiswa yang membutuhkan'),
('P01', 'Pinjaman Registrasi', 'Genap', '2016/2017', '2017-04-07', '2017-04-09', 125, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');

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

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `kd_prodi`, `nama_mhs`, `gender`, `tgl_lahir`, `email`, `alamat`, `kode_pos`, `no_telp`, `total_sks`) VALUES
('72140033', '72', 'Charoline Septa', 'P', '1997-02-21', 'cs@mail.com', 'smd', '55224', '098', 134),
('user', '71', 'Azhalia Amesa', 'L', '1996-05-04', 'aamesaa@mail.com', 'klaten', '55224', '098', 134);

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

--
-- Dumping data for table `ref_gender`
--

INSERT INTO `ref_gender` (`gender`, `nama_gender`) VALUES
('L', 'pria'),
('P', 'wanita');

-- --------------------------------------------------------

--
-- Table structure for table `ref_prodi`
--

CREATE TABLE `ref_prodi` (
  `kd_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_prodi`
--

INSERT INTO `ref_prodi` (`kd_prodi`, `nama_prodi`) VALUES
('01', 'theologi'),
('41', 'Kedokteran'),
('61', 'Bioteknologi'),
('71', 'Teknik Informatika'),
('72', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `ref_syarat`
--

CREATE TABLE `ref_syarat` (
  `kd_syarat` char(3) NOT NULL,
  `nama_syarat` varchar(99) NOT NULL,
  `tipe_syarat` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_syarat`
--

INSERT INTO `ref_syarat` (`kd_syarat`, `nama_syarat`, `tipe_syarat`) VALUES
('K01', 'Scan KTM', '9'),
('K02', 'IPK', '11'),
('S03', 'nominal pengajuan', '12'),
('S04', 'Surat keterangan tidak mampu', '9'),
('S05', 'Surat tagihan listrik terakhir', '9'),
('S06', 'Jumlah SKS yang diambil', '11');

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
(7, 'K02', 'B01'),
(8, 'K01', 'K01'),
(9, 'K01', 'B01');

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
  MODIFY `kd_syarat_bsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
