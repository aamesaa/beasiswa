-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30 Mei 2017 pada 13.49
-- Versi Server: 10.1.19-MariaDB
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
-- Struktur dari tabel `beasiswa`
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
  `Keterangan` mediumtext NOT NULL,
  `isPublish` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`kd_bsw`, `nama_bsw`, `semt`, `thn_ajar`, `tgl_buka`, `tgl_tutup`, `kuota`, `isTampil`, `Keterangan`, `isPublish`) VALUES
('A01', 'Beasiswa Anak Karyawan', 'Genap', '2016/2017', '2017-04-07', '2018-04-09', 129, 0, 'Beasiswa bagi anak karyawan', 1),
('A03', 'Beasiswa Anak Karyawan', 'Genap', '2016/2017', '2017-04-12', '2017-05-06', 888, 1, 'qqq', 0),
('B01', 'Beasiswa Prestasi', 'Genap', '2016/2017', '2017-04-07', '2017-04-10', 200, 1, 'Beasiswa bagi mahasiswa berprestasi, hanya dipilih 3 mahasiswa dengan IPK tertinggi', 0),
('B08', 'Beasiswa Prestasi', 'Ganjil', '2016/2017', '2017-04-06', '2017-04-08', 9, 1, 'nanana', 0),
('B10', 'Beasiswa Anak Karyawan', 'Genap', '2013/2012', '2017-04-12', '2017-04-27', 99, 1, 'ww', 0),
('K01', 'Beasiswa Kebutuhan', 'Genap', '2016/2017', '2016-11-15', '2016-11-22', 150, 1, 'Bagi mahasiswa yang membutuhkan', 0),
('P01', 'Pinjaman Registrasi', 'Genap', '2016/2017', '2017-04-07', '2017-05-17', 125, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ', 0),
('P09', 'Pinjaman Registrasi', 'Genap', '2019/2020', '2017-04-13', '2017-04-16', 22, 1, 'sdaadsad', 1),
('P10', 'Pinjaman Registrasi', 'Genap', '2017/2018', '2017-05-23', '2017-05-31', 120, 0, 'Beasiswa Regis', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `kd_prodi`, `nama_mhs`, `gender`, `tgl_lahir`, `email`, `alamat`, `kode_pos`, `no_telp`, `total_sks`) VALUES
('01140001', '01', 'Evelina Putri', 'P', '1996-04-26', 'evelina@mail.com', 'Purwokerto', '12345', '081210113154', 114),
('11140001', '11', 'Renny Rusmadayanti', 'P', '1996-05-01', 'renny@mail.com', 'Pontianak', '13345', '081210113155', 120),
('12150001', '12', 'Reinald Ariel', 'L', '1997-05-01', 'renata@mail.com', 'maguwo', '55283', '081210113254', 111),
('24120001', '24', 'Nikita Willy', 'P', '1996-05-01', 'nikita@mail.com', 'kota baru', '55288', '081210113156', 124),
('31150001', '31', 'Josea', 'L', '1997-05-02', 'joe@mail.com', 'kudus', '15656', '08525126678', 130),
('41140001', '41', 'Lupita Nyong', 'P', '1997-05-03', 'lupita@mail.com', 'kota gede', '55287', '081210113144', 120),
('61140001', '61', 'Ryan Wibowo', 'L', '1996-05-01', 'ryan@mail.com', 'sleman', '55288', '081210113166', 114),
('71140011', '71', 'Juan Salsa', 'L', '1996-05-04', 'aamesaa@mail.com', 'klaten', '55224', '098', 134),
('72140033', '72', 'Charoline Septa', 'P', '1997-02-21', 'cs@mail.com', 'smd', '55224', '098', 134),
('72140034', '72', 'Azhalia Amesa', 'L', '2017-04-12', 'aamesaa@mail.com', 'mnjn', '222', '2j2', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kd_daftar` int(8) NOT NULL,
  `nim` char(8) NOT NULL,
  `kd_bsw` char(3) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nominal_pengajuan` int(11) NOT NULL,
  `nominal_disetujui` int(11) DEFAULT NULL,
  `sisa_pinjaman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`kd_daftar`, `nim`, `kd_bsw`, `tgl_daftar`, `nominal_pengajuan`, `nominal_disetujui`, `sisa_pinjaman`) VALUES
(11111111, '72140033', 'P01', '2017-04-10 06:22:04', 10000000, 900000, 900000),
(11111112, '01140001', 'P01', '2017-05-26 09:40:53', 1000000, 900000, 800000),
(11111113, '71140011', 'A01', '2017-05-29 12:19:53', 1000000, 90000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kd_bayar` int(11) NOT NULL,
  `kd_daftar` int(8) NOT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nominal_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kd_bayar`, `kd_daftar`, `tgl_bayar`, `nominal_bayar`) VALUES
(1002, 11111111, '2017-05-18 08:53:29', 500),
(1003, 11111112, '2017-05-30 11:44:43', 100000);

--
-- Trigger `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `TG_update_sisa_pinjaman` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN
 UPDATE pendaftaran SET sisa_pinjaman=sisa_pinjaman-NEW.nominal_bayar
 WHERE kd_daftar=NEW.kd_daftar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_gender`
--

CREATE TABLE `ref_gender` (
  `gender` char(1) NOT NULL,
  `nama_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_gender`
--

INSERT INTO `ref_gender` (`gender`, `nama_gender`) VALUES
('L', 'pria'),
('P', 'wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_prodi`
--

CREATE TABLE `ref_prodi` (
  `kd_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_prodi`
--

INSERT INTO `ref_prodi` (`kd_prodi`, `nama_prodi`) VALUES
('01', 'Teologi'),
('11', 'Manajemen'),
('12', 'Akuntansi'),
('24', 'Desain Produk'),
('31', 'Bioteknologi'),
('41', 'Kedokteran'),
('61', 'Arsitektur'),
('71', 'Teknik Informatika'),
('72', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_syarat`
--

CREATE TABLE `ref_syarat` (
  `kd_syarat` char(3) NOT NULL,
  `nama_syarat` varchar(99) NOT NULL,
  `tipe_syarat` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_syarat`
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
-- Struktur dari tabel `syarat_bsw`
--

CREATE TABLE `syarat_bsw` (
  `kd_syarat_bsw` int(11) NOT NULL,
  `kd_syarat` char(3) NOT NULL,
  `kd_bsw` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat_bsw`
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
(89, 'S09', 'A01'),
(90, 'S03', 'K01'),
(91, 'S04', 'K01'),
(92, 'S05', 'K01'),
(93, 'S10', 'K01'),
(94, 'S03', 'P01'),
(95, 'S08', 'P09'),
(96, 'S07', 'P01'),
(97, 'S09', 'P01'),
(98, 'S11', 'P01'),
(99, 'S10', 'P01'),
(100, 'K01', 'A03'),
(101, 'K02', 'A03'),
(102, 'S03', 'A03'),
(103, 'S04', 'A03'),
(104, 'S05', 'A03'),
(105, 'S06', 'A03'),
(106, 'S07', 'A03'),
(107, 'S13', 'A03'),
(108, 'K01', 'P09'),
(109, 'K02', 'P09'),
(110, 'S04', 'P09'),
(111, 'S06', 'P09'),
(112, 'S08', 'P09'),
(113, 'S10', 'P09'),
(139, 'S05', 'B10'),
(140, 'S06', 'B10'),
(141, 'S07', 'B10'),
(142, 'K01', 'P10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_daftar`
--

CREATE TABLE `syarat_daftar` (
  `kd_syarat_dftr` int(11) NOT NULL,
  `kd_daftar` int(8) NOT NULL,
  `kd_syarat_bsw` int(11) NOT NULL,
  `isi_syarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat_daftar`
--

INSERT INTO `syarat_daftar` (`kd_syarat_dftr`, `kd_daftar`, `kd_syarat_bsw`, `isi_syarat`) VALUES
(1, 11111111, 95, 'ssss'),
(3, 11111111, 94, '200000'),
(4, 11111111, 96, '11111111_S07'),
(5, 11111111, 97, '11111111_S09'),
(6, 11111111, 98, '1111'),
(7, 11111111, 99, '11111111_S10'),
(8, 11111111, 94, '100000'),
(9, 11111111, 96, '11111111_S07.pdf'),
(10, 11111111, 97, '11111111_S09.pdf'),
(11, 11111111, 98, '1111'),
(12, 11111111, 99, '11111111_S10.pdf'),
(13, 11111113, 83, '140'),
(14, 11111113, 84, '11111113_S07.pdf'),
(15, 11111113, 85, 'Alwahis Bamesongka'),
(16, 11111113, 86, '62120001'),
(17, 11111113, 87, 'Fakultas Teknologi Informasi'),
(19, 11111113, 89, '11111113_S09.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `system_usr`
--

CREATE TABLE `system_usr` (
  `user_id` char(8) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `system_usr`
--

INSERT INTO `system_usr` (`user_id`, `password`, `role`) VALUES
('72140033', 'halohalo', 2),
('72140034', 'halohalo', 0),
('admin', 'admin', 1),
('wr3', 'wr3', 9),
('wr_wr', 'wr', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_ref`
--

CREATE TABLE `user_ref` (
  `role` int(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_ref`
--

INSERT INTO `user_ref` (`role`, `role_name`) VALUES
(0, 'Mahasiswa'),
(1, 'Admin'),
(2, 'Wakil Dekan 3'),
(9, 'Wakil Rektor 3');

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`);

--
-- Indexes for table `user_ref`
--
ALTER TABLE `user_ref`
  ADD PRIMARY KEY (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kd_daftar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11111115;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `kd_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `syarat_bsw`
--
ALTER TABLE `syarat_bsw`
  MODIFY `kd_syarat_bsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `syarat_daftar`
--
ALTER TABLE `syarat_daftar`
  MODIFY `kd_syarat_dftr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `ref_prodi` (`kd_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`gender`) REFERENCES `ref_gender` (`gender`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`NIM`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`kd_bsw`) REFERENCES `beasiswa` (`kd_bsw`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`kd_daftar`) REFERENCES `pendaftaran` (`kd_daftar`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `syarat_bsw`
--
ALTER TABLE `syarat_bsw`
  ADD CONSTRAINT `syarat_bsw_ibfk_1` FOREIGN KEY (`kd_syarat`) REFERENCES `ref_syarat` (`kd_syarat`),
  ADD CONSTRAINT `syarat_bsw_ibfk_2` FOREIGN KEY (`kd_bsw`) REFERENCES `beasiswa` (`kd_bsw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `syarat_daftar`
--
ALTER TABLE `syarat_daftar`
  ADD CONSTRAINT `syarat_daftar_ibfk_2` FOREIGN KEY (`kd_syarat_bsw`) REFERENCES `syarat_bsw` (`kd_syarat_bsw`) ON UPDATE CASCADE,
  ADD CONSTRAINT `syarat_daftar_ibfk_3` FOREIGN KEY (`kd_daftar`) REFERENCES `pendaftaran` (`kd_daftar`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `system_usr`
--
ALTER TABLE `system_usr`
  ADD CONSTRAINT `system_usr_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_ref` (`role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
