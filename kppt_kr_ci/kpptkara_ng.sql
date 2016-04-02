-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2016 at 11:00 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `kpptkara_ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `id_desa` tinyint(4) unsigned NOT NULL,
  `nama_desa` varchar(100) DEFAULT NULL,
  `id_kecamatan` tinyint(3) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `id_kecamatan`, `updated_at`, `created_at`) VALUES
(1, 'master', NULL, NULL, NULL),
(2, 'Ubud', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ijin_lokasi`
--

CREATE TABLE IF NOT EXISTS `ijin_lokasi` (
  `id_ijin_lokasi` int(10) unsigned NOT NULL,
  `id_permohonan_ijin` int(11) DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `bukti_kepemilikan` varchar(200) DEFAULT NULL,
  `alamat_jalan` varchar(200) DEFAULT NULL,
  `alamat_dusun` varchar(200) DEFAULT NULL,
  `alamat_desa_id` tinyint(11) unsigned DEFAULT NULL,
  `status_tanah` varchar(200) DEFAULT NULL COMMENT '??',
  `penggunaan_lahan_skrng` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipr`
--

CREATE TABLE IF NOT EXISTS `ipr` (
  `id_ipr` int(10) unsigned NOT NULL,
  `id_permohonan_ijin` int(11) DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `bukti_kepemilikan` varchar(200) DEFAULT NULL,
  `alamat_jalan` varchar(200) DEFAULT NULL,
  `alamat_dusun` varchar(200) DEFAULT NULL,
  `alamat_desa_id` tinyint(11) unsigned DEFAULT NULL,
  `status_tanah` varchar(200) DEFAULT NULL COMMENT '??',
  `penggunaan_lahan_skrng` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_ipr` tinyint(3) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipr_jenis`
--

CREATE TABLE IF NOT EXISTS `ipr_jenis` (
  `id_ipr_jenis` tinyint(3) unsigned NOT NULL,
  `nama_jenis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipr_jenis`
--

INSERT INTO `ipr_jenis` (`id_ipr_jenis`, `nama_jenis`) VALUES
(1, 'Usaha'),
(2, 'Tower'),
(3, 'Rumah Tinggal'),
(4, 'Luar Kawasan'),
(5, 'Kawasan');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` tinyint(3) unsigned NOT NULL,
  `nama_jabatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Front Office'),
(2, 'Kepala Bagian'),
(3, 'Kasi');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ijin`
--

CREATE TABLE IF NOT EXISTS `jenis_ijin` (
  `id_jenis_ijin` int(10) unsigned NOT NULL,
  `jenis_ijin` varchar(200) DEFAULT NULL,
  `singkatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ijin`
--

INSERT INTO `jenis_ijin` (`id_jenis_ijin`, `jenis_ijin`, `singkatan`) VALUES
(1, 'IPR', 'IPR');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` tinyint(3) unsigned NOT NULL,
  `nama_kecamatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Ubud');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE IF NOT EXISTS `pemohon` (
  `nik` char(16) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_jalan` varchar(200) DEFAULT NULL,
  `alamat_dusun` varchar(200) DEFAULT NULL,
  `alamat_desa_id` tinyint(4) unsigned NOT NULL,
  `agama` enum('Hindu','Islam','Kristen','Katolik','Budha') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_jalan`, `alamat_dusun`, `alamat_desa_id`, `agama`, `no_telp`, `created_at`, `updated_at`, `type`) VALUES
('1', 'master', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` tinyint(3) unsigned NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) NOT NULL,
  `id_jabatan` tinyint(4) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `passwd`, `created_at`, `updated_at`, `last_login`, `remember_token`, `id_jabatan`) VALUES
(1, 'adisparta', '631e031f0dd34bce838cebcc27afd5da', '2016-02-26 13:58:20', '2016-02-26 02:35:18', '2016-02-26 02:58:20', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_ijin`
--

CREATE TABLE IF NOT EXISTS `permohonan_ijin` (
  `id_permohonan_ijin` int(10) unsigned NOT NULL,
  `nik` char(16) NOT NULL,
  `id_jenis_ijin` int(10) unsigned DEFAULT NULL,
  `jenis_permohonan` tinyint(3) unsigned DEFAULT NULL COMMENT '1=pengajuan baru, 2=perpanjangan, 3=perubahan, 4=perluasan',
  `id_perusahaan` int(10) unsigned DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_ijin` varchar(20) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '0=draft, 1=lanjut'
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_ijin`
--

INSERT INTO `permohonan_ijin` (`id_permohonan_ijin`, `nik`, `id_jenis_ijin`, `jenis_permohonan`, `id_perusahaan`, `tgl_pengajuan`, `created_at`, `updated_at`, `no_ijin`, `token`, `type`) VALUES
(87, '1', 1, NULL, NULL, NULL, '2016-02-26 02:48:25', '2016-02-26 02:48:25', '1143266773', 'Fox3qj8dchtdRkat18RFNmj6Szjg5bK812y6sW1HZvOymOmj8EA63EiYgclUYEluKrApEf2ln4pSmHlH5g', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_permohonan_ijin`
--

CREATE TABLE IF NOT EXISTS `persyaratan_permohonan_ijin` (
  `id_persyaratan_permohonan_ijin` int(10) unsigned NOT NULL,
  `id_permohonan_ijin` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '0=belum, 1=sudah',
  `fname` varchar(200) DEFAULT NULL,
  `id_syarat_ijin` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan_permohonan_ijin`
--

INSERT INTO `persyaratan_permohonan_ijin` (`id_persyaratan_permohonan_ijin`, `id_permohonan_ijin`, `status`, `fname`, `id_syarat_ijin`) VALUES
(135, 87, 1, 'b651f0464a9dcf427bdbb4337093820b845613714.png', 1),
(136, 87, 1, 'b651f0464a9dcf427bdbb4337093820b511171153.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(10) unsigned NOT NULL,
  `npwp` char(16) DEFAULT NULL,
  `nama_perusahaan` varchar(200) DEFAULT NULL,
  `alamat_perusahaan` text,
  `no_telp_perusahaan` varchar(200) DEFAULT NULL,
  `email_perusahaan` varchar(200) DEFAULT NULL,
  `akta_pendirian_nomor` varchar(200) DEFAULT NULL,
  `akta_pendirian_tanggal` varchar(200) DEFAULT NULL,
  `modal_usaha` double DEFAULT NULL,
  `KBLI` int(10) unsigned DEFAULT NULL,
  `keterangan` text,
  `jenis_badan_usaha` varchar(200) DEFAULT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `npwp`, `nama_perusahaan`, `alamat_perusahaan`, `no_telp_perusahaan`, `email_perusahaan`, `akta_pendirian_nomor`, `akta_pendirian_tanggal`, `modal_usaha`, `KBLI`, `keterangan`, `jenis_badan_usaha`, `type`) VALUES
(1, 'asd', 'asdf', 'asdf', 'asdf', 'sa@sadf', 'sdf', 'sdf', 0, 0, 'asdf', 'asfd', 1),
(2, 'asdf', 'asf', 'sadf', 'asfd', 'asdf@sadf', 'asdf', 'asdf', 0, 0, '', 'afds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE IF NOT EXISTS `syarat` (
  `id_syarat` int(10) unsigned NOT NULL,
  `nama_syarat` text,
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `nama_syarat`, `keterangan`) VALUES
(1, 'Surat Pengantar Camat Setempat', NULL),
(2, 'Foto copy KTP (Kitas/Paspor untuk WNA)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syarat_ijin`
--

CREATE TABLE IF NOT EXISTS `syarat_ijin` (
  `id_syarat_ijin` int(10) unsigned NOT NULL,
  `id_jenis_ijin` int(10) unsigned NOT NULL,
  `id_syarat` int(10) unsigned NOT NULL,
  `mandatory` tinyint(3) unsigned NOT NULL COMMENT '1=harus, 0=opsional'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat_ijin`
--

INSERT INTO `syarat_ijin` (`id_syarat_ijin`, `id_jenis_ijin`, `id_syarat`, `mandatory`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `ijin_lokasi`
--
ALTER TABLE `ijin_lokasi`
  ADD PRIMARY KEY (`id_ijin_lokasi`),
  ADD KEY `alamat_desa_id` (`alamat_desa_id`);

--
-- Indexes for table `ipr`
--
ALTER TABLE `ipr`
  ADD PRIMARY KEY (`id_ipr`),
  ADD KEY `alamat_desa_id` (`alamat_desa_id`),
  ADD KEY `jenis_ipr` (`jenis_ipr`);

--
-- Indexes for table `ipr_jenis`
--
ALTER TABLE `ipr_jenis`
  ADD PRIMARY KEY (`id_ipr_jenis`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_ijin`
--
ALTER TABLE `jenis_ijin`
  ADD PRIMARY KEY (`id_jenis_ijin`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `alamat_desa_id` (`alamat_desa_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `permohonan_ijin`
--
ALTER TABLE `permohonan_ijin`
  ADD PRIMARY KEY (`id_permohonan_ijin`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_jenis_ijin` (`id_jenis_ijin`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `persyaratan_permohonan_ijin`
--
ALTER TABLE `persyaratan_permohonan_ijin`
  ADD PRIMARY KEY (`id_persyaratan_permohonan_ijin`),
  ADD KEY `id_permohonan_ijin` (`id_permohonan_ijin`),
  ADD KEY `id_syarat_ijin` (`id_syarat_ijin`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `syarat_ijin`
--
ALTER TABLE `syarat_ijin`
  ADD PRIMARY KEY (`id_syarat_ijin`),
  ADD KEY `id_syarat` (`id_syarat`),
  ADD KEY `id_jenis_ijin` (`id_jenis_ijin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ijin_lokasi`
--
ALTER TABLE `ijin_lokasi`
  MODIFY `id_ijin_lokasi` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipr`
--
ALTER TABLE `ipr`
  MODIFY `id_ipr` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ipr_jenis`
--
ALTER TABLE `ipr_jenis`
  MODIFY `id_ipr_jenis` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_ijin`
--
ALTER TABLE `jenis_ijin`
  MODIFY `id_jenis_ijin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permohonan_ijin`
--
ALTER TABLE `permohonan_ijin`
  MODIFY `id_permohonan_ijin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `persyaratan_permohonan_ijin`
--
ALTER TABLE `persyaratan_permohonan_ijin`
  MODIFY `id_persyaratan_permohonan_ijin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `syarat_ijin`
--
ALTER TABLE `syarat_ijin`
  MODIFY `id_syarat_ijin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Constraints for table `ijin_lokasi`
--
ALTER TABLE `ijin_lokasi`
  ADD CONSTRAINT `ijin_lokasi_ibfk_1` FOREIGN KEY (`alamat_desa_id`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `ipr`
--
ALTER TABLE `ipr`
  ADD CONSTRAINT `ipr_ibfk_1` FOREIGN KEY (`alamat_desa_id`) REFERENCES `desa` (`id_desa`),
  ADD CONSTRAINT `ipr_ibfk_2` FOREIGN KEY (`jenis_ipr`) REFERENCES `ipr_jenis` (`id_ipr_jenis`);

--
-- Constraints for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `pemohon_ibfk_1` FOREIGN KEY (`alamat_desa_id`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `permohonan_ijin`
--
ALTER TABLE `permohonan_ijin`
  ADD CONSTRAINT `permohonan_ijin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pemohon` (`nik`),
  ADD CONSTRAINT `permohonan_ijin_ibfk_2` FOREIGN KEY (`id_jenis_ijin`) REFERENCES `jenis_ijin` (`id_jenis_ijin`),
  ADD CONSTRAINT `permohonan_ijin_ibfk_3` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `persyaratan_permohonan_ijin`
--
ALTER TABLE `persyaratan_permohonan_ijin`
  ADD CONSTRAINT `persyaratan_permohonan_ijin_ibfk_1` FOREIGN KEY (`id_permohonan_ijin`) REFERENCES `permohonan_ijin` (`id_permohonan_ijin`),
  ADD CONSTRAINT `persyaratan_permohonan_ijin_ibfk_2` FOREIGN KEY (`id_syarat_ijin`) REFERENCES `syarat_ijin` (`id_syarat_ijin`);

--
-- Constraints for table `syarat_ijin`
--
ALTER TABLE `syarat_ijin`
  ADD CONSTRAINT `syarat_ijin_ibfk_1` FOREIGN KEY (`id_syarat`) REFERENCES `syarat` (`id_syarat`),
  ADD CONSTRAINT `syarat_ijin_ibfk_2` FOREIGN KEY (`id_jenis_ijin`) REFERENCES `jenis_ijin` (`id_jenis_ijin`);

