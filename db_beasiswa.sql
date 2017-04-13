-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 05:05 PM
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
('111', 'Beasiswa Kebutuhan', 'Genap', '2014/2015', '2017-04-12', '2017-04-19', 999, 1, 'aaa'),
('220', 'Beasiswa Anak Karyawan', 'Genap', '2001/2009', '2017-04-12', '2017-04-13', 200, 1, 'Keterangan'),
('A01', 'Beasiswa Anak Karyawan', 'Genap', '2016/2017', '2017-04-07', '2018-04-09', 125, 1, 'Beasiswa bagi anak karyawan'),
('A02', 'Beasiswa Anak Karyawan', 'Ganjil', '2016/2017', '2017-04-07', '2017-04-10', 111, 0, 'mmmm'),
('B01', 'Beasiswa Prestasi', 'Genap', '2016/2017', '2017-04-07', '2017-04-09', 200, 1, 'Beasiswa bagi mahasiswa berprestasi, hanya dipilih 3 mahasiswa dengan IPK tertinggi'),
('B08', 'Beasiswa Prestasi', 'Ganjil', '2016/2017', '2017-04-06', '2017-04-08', 9, 0, 'nanana'),
('K01', 'Beasiswa Kebutuhan', 'Genap', '2016/2017', '2016-11-15', '2016-11-22', 150, 0, 'Bagi mahasiswa yang membutuhkan'),
('P01', 'Pinjaman Registrasi', 'Genap', '2016/2017', '2017-04-07', '2017-04-09', 125, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna '),
('P09', 'Pinjaman Registrasi', 'Genap', '2019/2020', '2017-04-13', '2017-04-16', 22, 1, 'sdaadsad'),
('sss', 'Beasiswa Anak Karyawan', 'Genap', '2016/2017', '2017-04-12', '2017-05-06', 888, 1, 'qqq');

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
('72140034', '72', 'nama', 'L', '2017-04-12', 'njnkjni22', 'mnjn', '222', '2j2', 11),
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
  `nominal_disetujui` int(11) DEFAULT NULL,
  `sisa_pinjaman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kd_daftar`, `nim`, `kd_bsw`, `tgl_daftar`, `semester`, `thn_ajaran`, `nominal_pengajuan`, `nominal_disetujui`, `sisa_pinjaman`) VALUES
('11111111', '72140033', 'P09', '2017-04-10 06:22:04', 'GenAP', '19/10', 10000000, NULL, NULL),
('12122', '72140034', 'P09', '2017-04-13 13:05:54', 'GENAP', '2014', 9999, 46578, NULL),
('BBBBBB', '72140033', 'P01', '2017-04-10 06:21:25', 'Genap', '16/17', 10000000, 900000, NULL),
('uuu', '72140033', 'A01', '2017-04-11 01:01:01', 'j', '6', 233, 12334, NULL);

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

--
-- Triggers `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `TG_update_sisa_pinjaman` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN
 UPDATE pendaftaran SET sisa_pinjamank=sisa_pinjaman-NEW.nominal_bayar
 WHERE kd_daftar=NEW.kd_daftar;
END
$$
DELIMITER ;

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
('S04', 'Scan Slip Gaji Orangtua', '9'),
('S05', 'Surat bukti pembayaran listrik terakhir', '9'),
('S06', 'Jumlah SKS yang diambil', '11'),
('S07', 'Scan KHS', '9'),
('S08', 'Scan Daftar Nilai', '9'),
('S09', 'Scan Invoice', '9'),
('S10', 'Scan Kartu Keluarga', '9'),
('S11', 'No HP Orangtua', '1'),
('S12', 'Nama Orangtua', '1'),
('S13', 'NIK orangtua', '1'),
('S14', 'Fakultas / Unit', '1');

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
(52, 'K02', 'B01'),
(80, 'S08', 'B01'),
(81, 'S09', 'B01'),
(82, 'S07', 'B01'),
(83, 'S06', 'A01'),
(84, 'S07', 'A01'),
(85, 'S12', 'A01'),
(86, 'S13', 'A01'),
(87, 'S14', 'A01'),
(88, 'S06', 'A01'),
(89, 'S09', 'A01'),
(90, 'S03', 'K01'),
(91, 'S04', 'K01'),
(92, 'S05', 'K01'),
(93, 'S10', 'K01'),
(94, 'S03', 'P01'),
(95, 'S08', 'P01'),
(96, 'S07', 'P01'),
(97, 'S09', 'P01'),
(98, 'S11', 'P01'),
(99, 'S10', 'P01'),
(100, 'K01', 'sss'),
(101, 'K02', 'sss'),
(102, 'S03', 'sss'),
(103, 'S04', 'sss'),
(104, 'S05', 'sss'),
(105, 'S06', 'sss'),
(106, 'S07', 'sss'),
(107, 'S13', 'sss'),
(108, 'K01', 'P09'),
(109, 'K02', 'P09'),
(110, 'S04', 'P09'),
(111, 'S06', 'P09'),
(112, 'S08', 'P09'),
(113, 'S10', 'P09');

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_syarat_beasiswa`
--
CREATE TABLE `view_syarat_beasiswa` (
`kd_syarat` char(3)
,`nama_syarat` varchar(99)
,`kd_syarat_bsw` int(11)
,`nama_bsw` varchar(99)
);

-- --------------------------------------------------------

--
-- Structure for view `view_syarat_beasiswa`
--
DROP TABLE IF EXISTS `view_syarat_beasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_syarat_beasiswa`  AS  select `sb`.`kd_syarat` AS `kd_syarat`,`s`.`nama_syarat` AS `nama_syarat`,`sb`.`kd_syarat_bsw` AS `kd_syarat_bsw`,`b`.`nama_bsw` AS `nama_bsw` from ((`syarat_bsw` `sb` join `ref_syarat` `s` on((`sb`.`kd_syarat` = `s`.`kd_syarat`))) join `beasiswa` `b` on((`sb`.`kd_bsw` = `b`.`kd_bsw`))) order by `sb`.`kd_syarat_bsw` ;

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
  MODIFY `kd_syarat_bsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
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
